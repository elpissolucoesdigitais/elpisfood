@extends('adminlte::page')

@section('title', "Detalhes do Categoria {$category->name}")

@section('content_header')
    <h1>Detalhes do Categoria</h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li><strong>Nome:</strong> {{$category->name}}</li>
                <li><strong>URL:</strong> {{$category->url}}</li>
                <li><strong>Descrição:</strong> {{$category->description}}</li>

            </ul>

            @include('admin.includes.alerts')

            <form action="{{route('categories.destroy',$category->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Deletar <i class="fas fa-trash-alt"></i></button>
                <a href="{{route('categories.index')}}"class="btn btn-dark">Voltar <i class="fas fa-undo"></i></a>
            </form>
        </div>
    </div>
@endsection
