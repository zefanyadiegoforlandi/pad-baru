<x-app-layout>
    <div class=" flex items-center justify-center py-8">
        <!-- Modal content -->
        <div class="modal-content bg-white mx-4 md:mx-auto w-full max-w-lg rounded p-8 shadow-lg">
                    <!-- Modal header -->
            <div class="modal-header text-black text-center py-2 rounded-t" style="background-color: #C6D2B9;">
                <h2 class="text-xl md:text-2xl font-bold">INFORMASI LAHAN</h2>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{ route('buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
            
                    <div class="mb-4">
                        <label for="nama" class="block text-gray-700 font-bold">ID LAHAN</label>
                        <input type="text" name="nama" id="nama" class="border border-gray-300 rounded px-3 py-2 w-full">
                    </div>
                    <div class="mb-4">
                        <label for="nama" class="block text-gray-700 font-bold">ID FARMER</label>
                        <input type="text" name="nama" id="nama" class="border border-gray-300 rounded px-3 py-2 w-full">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-bold">LUAS LAHAN</label>
                        <input type="text" name="email" id="email" class="border border-gray-300 rounded px-3 py-2 w-full">
                    </div>
                    <div class="mb-4">
                        <label for="alamat" class="block text-gray-700 font-bold">ALAMT LAHAN</label>
                        <textarea name="alamat" id="alamat" class="border border-gray-300 rounded px-3 py-4 w-full max-w-full h-20 resize-y"></textarea>
                    </div>
                    
                    <div class="flex justify-end space-x-4 mt-4">
                        <form action="{{ route('form-lahan.destroy', $fl->id_lahan) }}" method="POST">
                            <button type="button" class="px-4 py-2 text-white rounded" style="background-color: #C63838;"> 
                                Delete
                            </button>
                        </form>

                        <button type="submit" class="px-4 py-2 text-white rounded"
                        style="background-color: #416D14;">Edit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Modal footer -->
    </div>
</x-app-layout>    

<td>
    <form action="{{ route('buku.edit', $b->id) }}">
        <button class="btn btn-primary" onclick="return confirm('Yakin mau diedit?')">Edit</button>
    </form>
    <form action="{{ route('buku.destroy', $b->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" onclick="return confirm('Yakin mau dihapus?')">Hapus</button>
    </form>
</td>