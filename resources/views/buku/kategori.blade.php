@extends ('layouts.perpus12')

@section ('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <a href="{{ route('kategori.create') }}" class="bg-blue-500 hover:bg-blue-700 text-black border font-bold py-2 px-4 rounded">
                            + Tambah Data kategori
                    <table class="min-w-full border rounded-md table overlow-hidden">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="py-2 px-4">Nama kategori</th>
                                <th class="col-1 px-4 py-2">Aksi</th>
                                </tr>
                                </thead>
                                </tbody>
                                    @forelse ($kategori as $k)
                                    <tr class="hover:bg-gray-50">
                                     <td class="py-2 px-4">{{$k->nama_kategori}}</td>
                                     <td class="py-2 px-4">
                                        <form method="post" action="{{route('kategori.destroy', $k->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>    
                                        Hapus</button>
                                    <td>
                                    <a class="btn btn-warning" href="{{route('kategori.edit', $k->id)}}">Edit</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-4 py-2 text-center">Tidak ada data kategori.</td>
                            </tr>
                                    @endforelse
                                 </tbody>
                                 </table>
                </div>
            </div>
        </div>
    </div>
@endsection