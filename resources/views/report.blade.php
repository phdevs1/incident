@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Dashboard</div>

    <div class="panel-body">
        <form>
            <div class="form-group">
                <label>categoria</label>
                <select name="category_id" class="form-control"></select>
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
                <input type="text" name="tittle" class="form-control">
            </div>
            <div class="form-group">
                <label>descripción</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                
                <button class="btn btn-primary">Registrar</button>
            </div>
        </form>
    </div>
</div>
@endsection
