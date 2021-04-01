@extends('adminlte::page')

@section('title', 'Cadastrar novo Plano')

@section('content_header')
    <h1>Cadastrar novo Plano</h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
                <form action="{{route('plans.store')}}" class="form" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" name="name" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Preço</label>
                        <input type="text" name="price" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                </form>
        </div>
    </div>
@endsection
