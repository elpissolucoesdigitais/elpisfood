@extends('adminlte::page')

@section('title', 'Detalhes da Permissão')

@section('content_header')
    <h1>Detalhes da Permissão</h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li><strong>Nome:</strong> {{$permissions->name}}</li>
                <li><strong>Descrição:</strong> {{$permissions->description}}</li>

            </ul>

            @include('admin.includes.alerts')

            <form action="{{route('permissions.destroy',$permissions->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Deletar <i class="fas fa-trash-alt"></i></button>
                <a href="{{route('permissions.index')}}"class="btn btn-dark">Voltar <i class="fas fa-undo"></i></a>
            </form>
        </div>
    </div>
@endsection
