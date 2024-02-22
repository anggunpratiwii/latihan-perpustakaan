@extends('layouts.perpus12')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 class="h3 text-2xl font-semibold mb-4">Formulir Edit Buku</h1>
                    </div>

                    <div class="card-body">
                        @if(session('success'))
                            <p class="text-success">{{ session('success') }}</p>
                        @endif

                        <form action="{{ route('buku.update', $buku->id) }}" method="post" >
                            @csrf
                            @method('patch')
                            <div class="mb-4">
                                <label for="nama_buku" class="form-label">Nama Buku:</label>
                                <input type="text" name="nama_buku" value="{{ $buku->nama_buku }}"  class="form-control" required="required">
                                
                            </div>
                            <button type=" submit" class="btn btn-success">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection