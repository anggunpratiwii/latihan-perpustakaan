@extends('layouts.perpus12')
 
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-lg">
                    <div class="card-body">
                    <h1 class="h3 font-weight-bold mb-4">Data User</h1>
                        <div class="mb-4">
                            <a href="{{route('users.create')}}" class="btn btn-primary">
                                + Tambah Pengguna
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $u)
                                    <tr>
                                        <td>{{ $u->id }}</td>
                                        <td>{{ $u->name }}</td>
                                        <td>{{ $u->email }}</td>
                                        <td>
                                            @foreach ($u->roles as $role)
                                                {{ $role->name }}
                                            @endforeach
                                        </td>   
                                        <td>
                                            <form method="post" action="{{route('users.destroy', $u->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>    
                                        Hapus</button>
                                        <a class="btn btn-info" href="{{route('users.edit', $u->id)}}">Edit</a>
                                    </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection