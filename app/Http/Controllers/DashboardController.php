<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Http;
    use App\Models\DataFeed;
    use Carbon\Carbon;
    use App\Models\User;
    use App\Models\Sensor;
    use App\Models\Lahan;

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
            $jumlah_users = User::count();
            $jumlah_sensor = Sensor::count();
            $jumlah_lahan = Lahan::count();
            $user = User::orderBy('id', 'desc')->paginate($batas);
            $lahan= Lahan::orderBy('id_lahan', 'desc')->paginate($batas);
            $sensor = Sensor::orderBy('id_sensor', 'desc')->paginate($batas);
            $no = $batas * ($user->currentPage() - 1);

            return view('pages/dashboard/dashboard', compact('dataFeed','user', 'jumlah_users', 'sensor', 'jumlah_sensor'));
        }
        public function daftar_farmer()
        {
            $dataFeed = new DataFeed();
            $batas = 15;
            $user= User::orderBy('id', 'desc')->paginate($batas);
            $no = $batas * ($user->currentPage() - 1);
            return view('pages/add/daftar-farmer', compact('dataFeed','user'));
        }

        public function daftar_lahan()
        {
            $dataFeed = new DataFeed();
            $batas = 15;
            $lahan= Lahan::orderBy('id_lahan', 'desc')->paginate($batas);
            $no = $batas * ($lahan->currentPage() - 1);
            return view('pages/add/daftar-lahan', compact('dataFeed','lahan'));
        }
        public function table_daftar_lahan()
        {
            $batas = 15;
            $lahan= Lahan::orderBy('id_lahan', 'desc')->paginate($batas);
            $no = $batas * ($lahan->currentPage() - 1);
            return view('components/table-daftar-lahan', compact('lahan'));
        }


        public function daftar_sensor()
        {
            $dataFeed = new DataFeed();
            $batas = 15;
            $sensor = Sensor::orderBy('id_sensor', 'desc')->paginate($batas);
            $no = $batas * ($sensor->currentPage() - 1);
            return view('pages/add/daftar-sensor', compact('dataFeed','sensor'));
        }

       
    }
