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

       <form action="" method="POST">

            {{csrf_field() }}

            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name',$project->name) }}">
            </div>
            <div class="form-group">
                <label>Descripcion</label>
                <input type="text" name="description" class="form-control" value="{{ old('description',$project->description) }}">
            </div>
            <div class="form-group">
                <label>Fecha de inicio</label>
                <input type="date" name="start" class="form-control" value="{{ old('start', $project->start)}}">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Guardar proyecto</button>
            </div>
        </form>

        <div class="row">
            <div class="col-md-6">
                 <p>Categorias</p>
                 <form action="/categorias" method="POST" class="form-inline">

                    {{ csrf_field() }}
                    <input type="hidden" name="project_id" value="{{ $project->id}}">
                    <div class="form-group">
                         <input type="text" name="name" placeholder="ingrese el nombre" class="form-control">
                     </div>
                     <button class="btn btn-primary">añadir</button>
                     
                 </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th>categoria</th>
                            <th>opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category )
                        <tr>
                            <td>{{$category->name}}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" data-category="{{ $category->id }}">Editar</button>
                                <a href="/categoria/{{$category->id}}/eliminar" class="btn btn-sm btn-danger">borrar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <p>Niveles</p>
                <form action="/niveles" method="POST" class="form-inline">
                    {{ csrf_field() }}
                    <input type="hidden" name="project_id" value="{{ $project->id}}">
                     <div class="form-group">
                         <input type="text" name="name" placeholder="ingrese el nombre" class="form-control">
                     </div>
                     <button class="btn btn-primary">añadir</button>
                     
                 </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>nivel</th>
                            <th>opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($levels as $key => $level)
                        <tr>
                            <td>N{{ $key +1 }}</td>
                            <td>{{ $level->name}}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" data-level="{{ $level->id}}">Editar</button>
                                <a href="/nivel/{{$level->id}}/eliminar" class="btn btn-sm btn-danger">borrar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

       
    </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="modalEditCategory">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modificar categoria</h4>
      </div>
      <form action="/categoria/editar" method="POST">
        {{ csrf_field() }}
          <div class="modal-body">
            <input type="hidden" name="category_id" id="category_id" value="">
            <div class="form-group">
                <label>nombre de la categoria</label>
                <input type="text" class="form-control" name="name" id="category_name" value="">
            </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">cancelar</button>
            <button type="submit" class="btn btn-primary">guardar</button>
          </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="modalEditLevel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modificar nivel</h4>
      </div>
      <form action="/nivel/editar" method="POST">

            {{ csrf_field() }}
          <div class="modal-body">
            <input type="hidden" name="level_id" id="level_id" value="">
            <div class="form-group">
                <label>nombre del nivel</label>
                <input type="text" class="form-control" name="name" id="level_name" value="">
            </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">cancelar</button>
            <button type="submit" class="btn btn-primary">guardar</button>
          </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection


@section('scripts')
    <script src="/js/admin/projects/edit.js"></script>
@endsection