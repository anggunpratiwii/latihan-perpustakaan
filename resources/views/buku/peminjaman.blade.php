@extends ('layouts.perpus12')

@section ('content')


    <<div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body bg-white">
                        <h1 class="h3 font-weight-bold mb-4">Data Peminjaman</h1>
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif


                        <div class="mb-4 d-flex justify-content-between">
                            <a href="{{ route('peminjaman.tambah') }}" class="btn btn-info">
                                + Tambah Data Peminjaman
                        </a>
                        <a href="{{ route('print') }}" class="btn btn-primary">
                            <i class="fa fa-download"></i>Ekspor PDF</a>                      
                    </div>

                    <table class="table-auto w-full border-collapse border border-gray-400">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border">Nama Peminjam</th>
                                <th class="px-4 py-2 border">Buku yang Dipinjam</th>
                                <th class="px-4 py-2 border">Tanggal Peminjaman</th>
                                <th class="px-4 py-2 border">Tanggal Pengembalian</th>
                                <th class="px-4 py-2 border">Tanggal Sekarang</th>
                                <th class="px-4 py-2 border">Status</th>
                                <th class="px-4 py-2 border">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($peminjaman as $p)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $p->user->name }}</td>
                                    <td class="px-4 py-2 border">{{ $p->buku->judul }}</td>
                                    <td class="px-4 py-2 border">{{ $p->tanggal_peminjaman }}</td>
                                    <td class="px-4 py-2 border">{{ $p->tanggal_pengembalian }}</td>
                                    <td class="px-4 py-2 border">{{ $p->tanggal_sekarang }}</td>
                                  

                                    <td class="px-4 py-2">
                                        @if($p->status === 'Dipinjam')
                                           <span class="badge bg-warning">{{ $p->status }}</span>
                                        @elseif($p->status === 'Dikembalikan')
                                           <span class="badge bg-primary">{{ $p->status }}</span>
                                        @elseif($p->status === 'Denda')
                                           <span class="badge bg-danger">{{ $p->status }}</span>   
                                           @endif
                                    </td>
                                    <td class="px-4 py-2">
                                        @if ($p->status === 'Dipinjam')
                                            <form id="from {{$p->id}}" action="{{ route('peminjaman.kembalikan', $p->id) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">
                                                    Kembalikan</button>
                                            </form>
                                        @elseif ($p->status === 'Denda')
                                            <a href="{{route ('peminjaman.denda', $p->id)}}" class="btn btn-danger">
                                            Bayar Denda
                                            </a>
                                            @else ($p-> === 'Dikembalikan')
                                            -
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-2 border text-center">Tidak ada data buku.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection