@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Dashboard</div>

    <div class="panel-body">
        @if(session('notification'))
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

        <form action="/usuario/{{$user->id}}" method="POST">

            {{csrf_field() }}

            <div class="form-group">
                <label>email</label>
                <input type="email" name="email" class="form-control" readonly value="{{ old('email',$user->email)}}">
            </div>
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name',$user->name)}}">
            </div>
            <div class="form-group">
                <label>contraseña <em>ingresar solo si se desea modificar</em></label>
                <input type="text" name="password" class="form-control" value="{{ old('password')}}">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Guardar usuario</button>
            </div>
        </form>

        <form action="">
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <div class="row">
                <div class="col-md-4">
                    <select name="project_id" class="form-control" id="select-project">
                        <option value="">Seleciones proyecto</option>
                        @foreach ($projects as $project)
                            <option value="{{$project->id}}">{{$project->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <select name="level_id" class="form-control" id="select-level">
                        <option value="">Selecione nivel</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-primary btn-block">asignar proyecto</button>
                </div>
            </div>
        </form>


        <table class="table">
            <thead>
                <tr>
                    <th>proyecto</th>
                    <th>nivel</th>
                    <th>opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects_user as $project_user)
                <tr>
                    <td>{{ $project_user->project->name}}</td>
                    <td>{{ $project_user->level->name}}</td>
                    <td>
                        <a href="" class="btn btn-sm btn-primary">Editar</a>
                        <a href="" class="btn btn-sm btn-danger">borrar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection



@section('scripts')
    <script src="/js/admin/users/edit.js"></script>
@endsection