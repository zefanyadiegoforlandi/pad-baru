<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Http;
    use App\Models\DataFeed;
    use Carbon\Carbon;
    use App\Models\Users;
    use App\Models\Sensor;
    use App\Models\Lahan;
    use App\Models\User;


    class DashboardController extends Controller
    {

        /**
         * Displays the dashboard screen
         *
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
         */
        public function index()
        {
            $dataFeed = new DataFeed();
            $batas = 15;
            $user = User::orderBy('id', 'desc')->paginate($batas);
            $lahan= Lahan::orderBy('id_lahan', 'desc')->paginate($batas);
            $sensor = Sensor::orderBy('id_sensor', 'desc')->paginate($batas);
            $jumlah_users = User::count();
            $jumlah_sensor = Sensor::count();
            $jumlah_lahan = Lahan::count();
            return view('pages/dashboard/dashboard', compact('dataFeed','user', 'sensor','lahan','jumlah_users', 'jumlah_lahan', 'jumlah_sensor'));
        }

        public function information()
        {
            $dataFeed = new DataFeed();
            $jumlah_users = Users::count();
            $jumlah_sensor = Sensor::count();
            $jumlah_lahan = Lahan::count();
            return view('components/dashboard/dashboard.information', compact('dataFeed', 'jumlah_users', 'jumlah_lahan', 'jumlah_sensor'));
        }

        public function daftar_lahan()
        {
            $dataFeed = new DataFeed();
            $batas = 15;
            $lahan= Lahan::orderBy('id_lahan', 'desc')->paginate($batas);
            $no = $batas * ($lahan->currentPage() - 1);
            return view('pages/add/daftar-lahan', compact('dataFeed','lahan'));
        }
       

        public function daftar_farmer()
        {
            $dataFeed = new DataFeed();
            $batas = 15;
            $users = User::with(['lahan.sensor'])
            ->orderBy('id', 'desc')
            ->paginate($batas);

            $no=$batas*($users->currentPage() - 1);

            return view('pages/add/daftar-farmer', compact('dataFeed', 'users'));
        }

        public function daftar_sensor()
        {
            $dataFeed = new DataFeed();
            $batas = 15;
            $sensor = Sensor::orderBy('id_sensor', 'desc')->paginate($batas);
            $no = $batas * ($sensor->currentPage() - 1);
            return view('pages/add/daftar-sensor', compact('dataFeed','sensor'));
        }

        public function search_farmer(Request $request) {
            $batas = 5;
            $search = $request->search;
            $user = User::where('id', 'like', "%$search%")
                          ->orWhere('email', 'like', "%$search%")
                          ->paginate($batas);
            $no = $batas * ($user->currentPage() - 1);
            return view('pages/search/search-farmer', compact('search', 'user', 'no'));
        }

        
        public function search_lahan(Request $request) {
            $batas = 5;
            $search = $request->search;
            $lahan = Lahan::where('id_lahan', 'like', "%$search%")
                          ->orWhere('id_user', 'like', "%$search%")
                          ->orWhere('alamat_lahan', 'like', "%$search%") // Ubah di sini
                          ->orWhere('luas_lahan', 'like', "%$search%")
                          ->paginate($batas);
            $no = $batas * ($lahan->currentPage() - 1);
            return view('pages/search/search-lahan', compact('search', 'lahan', 'no'));
        }

        public function search_sensor(Request $request) {
            $batas = 5;
            $search = $request->search;
            $sensor = Sensor::where('id_sensor', 'like', "%$search%")
                          ->orWhere('id_lahan', 'like', "%$search%")
                          ->orWhere('tanggal_aktivasi', 'like', "%$search%")
                          ->paginate($batas);
        
            $no = $batas * ($sensor->currentPage() - 1);
            return view('pages/search/search-sensor', compact('search', 'sensor', 'no'));
        }

        public function store_lahan(Request $request)
        {
            $batas = 15;
            $lahan = Lahan::orderBy('id_lahan', 'desc')->paginate($batas);

            $request->validate([
                'id_user' => 'required|exists:users,id',
                'alamat_lahan' => 'required',
                'luas_lahan' => 'required|numeric',
                'id_lahan' => 'required|unique:lahan,id_lahan',
            ], [
                'id_user.exists' => 'ID User tidak tersedia dalam database.',
                'alamat_lahan.required' => 'Alamat lahan harus di isi.',
                'id_lahan.required' => 'ID Lahan harus diisi.',
                'id_lahan.unique' => 'ID Lahan sudah digunakan.',
                'luas_lahan.required' => 'Luas lahan harus diisi.',
                'luas_lahan.numeric' => 'Luas lahan harus berupa nilai numerik.',
            ]);

            // Simpan data lahan
            Lahan::create([
                'id_lahan' => $request->id_lahan,
                'id_user' => $request->id_user,
                'alamat_lahan' => $request->alamat_lahan,
                'luas_lahan' => $request->luas_lahan,
            ]);

            return redirect('/pages/add/daftar-lahan')->with('pesan', 'Data lahan berhasil ditambahkan');
        }



        public function store_farmer(Request $request)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'username' =>'required',
                'password' => 'required|min:8'
            ]);
            $batas = 15;
            $user= User::orderBy('id', 'desc')->paginate($batas);
            User::create([
                'name' =>$request->name,
                'email' => $request->email,
                'username' => $request->username,
                'password' => bcrypt($request->password)
                
            ]);
            return redirect('/pages/add/daftar-farmer')->with('pesan', 'Data farmer berhasil ditambahkan');
        }

        public function store_sensor(Request $request)
        {
            $request->validate([
                'id_lahan' => 'required',
                'tanggal_aktivasi' => 'required|date_format:Y-m-d H:i:s'
            ]);
            $batas = 15;
            $sensor= Sensor::orderBy('id_sensor', 'desc')->paginate($batas);
            Sensor::create([
                'id_lahan' =>$request->id_lahan,
                'tanggal_aktivasi' => $request->tanggal_aktivasi
            ]);
            return redirect('/pages/add/daftar-sensor')->with('pesan', 'Data farmer berhasil ditambahkan');
        }



        public function form_lahan_edit($id_lahan) {
            $lahan = Lahan::find($id_lahan);
            return view('form-lahan.edit', compact('lahan'));
        }
        

        public function form_lahan_destroy($id_lahan){
            $lahan = Lahan::find($id_lahan);
            $lahan->delete();
            return redirect('/pages/add/daftar-lahan');
        }
        
    }
