@extends('layouts.perpus12')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 class="h3 text-2xl font-semibold mb-4">Formulir Edit User</h1>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <p class="text-success">{{ session('success') }}</p>
                        @endif

                        <form action="{{ route('users.edit', $users->id) }}" method="get"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('patch')
                                            <div class="form-group">
                                <label for="name" class="form-label">Nama:</label>
                                <input type="text" class="form-control" value="{{ $users->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" value="{{ $users->email }}"  required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" value="{{ $users->password }}"  required>
                            </div>
                            <div class="form-group">
                                <label for="roles">Role:</label>
                                <select class="form-control" id="roles" name="roles[]" multiple required>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                             <button type="submit" class="btn btn-success">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection