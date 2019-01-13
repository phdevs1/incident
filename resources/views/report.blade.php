@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Dashboard</div>

    <div class="panel-body">
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
                <label>categoria</label>
                <select name="category_id" class="form-control">
                    <option value="">General</option>
                    @foreach($categories as $category)
                     <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>serveridad</label>
                <select name="severety" class="form-control">
                    <option value="M">menor</option>
                    <option value="N">normal</option>
                    <option value="A">alta</option>
                </select>
            </div>
            <div class="form-group">
                <label>título</label>
                <input type="text" name="tittle" class="form-control" value="{{ old('tittle')}}">
            </div>
            <div class="form-group">
                <label>descripción</label>
                <textarea name="description" class="form-control">{{ old('description')}}</textarea>
            </div>
            <div class="form-group">
                
                <button class="btn btn-primary">Registrar</button>
            </div>
        </form>
    </div>
</div>
@endsection
