@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Dashboard</div>

    <div class="panel-body">
        @if (session('notification'))
            <div class="alert alert-success">
                {{ session('notification') }}
            </div>
        @endif

        @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/usuarios') }}" method="POST">

            {{csrf_field() }}

            <div class="form-group">
                <label>email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email')}}">
            </div>
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name')}}">
            </div>
            <div class="form-group">
                <label>contraseña</label>
                <input type="text" name="password" class="form-control" value="{{ old('password', str_random(8))}}">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Registrar usuario</button>
            </div>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>email</th>
                    <th>nombre</th>
                    <th>opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->name }}</td>
                    <td>
                        <a href="/usuario/{{$user->id}}" class="btn btn-sm btn-primary">Editar</a>
                        <a href="/usuario/{{$user->id}}/eliminar" class="btn btn-sm btn-danger">borrar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
