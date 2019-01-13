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

        <form action="{{ url('/proyectos') }}" method="POST">

            {{csrf_field() }}

            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name')}}">
            </div>
            <div class="form-group">
                <label>Descripcion</label>
                <input type="text" name="description" class="form-control" value="{{ old('description')}}">
            </div>
            <div class="form-group">
                <label>Fecha de inicio</label>
                <input type="date" name="start" class="form-control" value="{{ old('start', date('Y-m-d'))}}">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Registrar proyecto</button>
            </div>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>nombre</th>
                    <th>descripcion</th>
                    <th>fecha de inicio</th>
                    <th>opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                <tr>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->start ?: 'no se ha indicado' }}</td>
                    <td>
                        
                        @if ($project->trashed())
                            <a href="/proyecto/{{$project->id}}/restaurar" class="btn btn-sm btn-success">rest</a>
                        @else
                            <a href="/proyecto/{{$project->id}}" class="btn btn-sm btn-primary">Editar</a> 
                            <a href="/proyecto/{{$project->id}}/eliminar" class="btn btn-sm btn-danger">borrar</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
