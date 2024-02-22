@extends ('layouts.perpus12')

@section ('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <div class="mb-4">
                        <a href="{{ route('buku.create') }}" class="bg-blue-500 hover:bg-blue-700 text-black border font-bold py-2 px-4 rounded">
                            + Tambah Data Buku
                        </a>
                    </div>
                    <table class="mx-auto min-w-full border rounded-md overflow-hidden">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="py-2 px-4">Judul</th>
                                <th class="py-2 px-4">Penulis</th>
                                <th class="py-2 px-4">Penerbit</th>
                                <th class="py-2 px-4">Tahun</th>
                                <th class="col-1 px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($buku as $b)
                                <tr class="hover:bg-gray-50">
                                    <td class="py-2 px-4">{{ $b->judul }}</td>
                                    <td class="py-2 px-4">{{ $b->penulis }}</td>
                                    <td class="py-2 px-4">{{ $b->penerbit }}</td>
                                    <td class="py-2 px-4">{{ $b->tahun_terbit }}</td>
                                    <td class="py-2 px-4">
                                    <form method="post" action="{{route('buku.destroy', $b->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>    
                                        Hapus</button>
                                    <td>
                                    <a class="btn btn-warning" href="{{route('buku.edit', $b->id)}}">Edit</a>
                                    
                                </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data buku.</td>
                                    </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection