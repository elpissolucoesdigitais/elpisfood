@extends('adminlte::page')

@section('title', 'Detalhes do Perfil')

@section('content_header')
    <h1>Detalhes do Plano</h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li><strong>Nome:</strong> {{$profile->name}}</li>
                <li><strong>Descrição:</strong> {{$profile->description}}</li>

            </ul>

            @include('admin.includes.alerts')

            <form action="{{route('profiles.destroy',$profile->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Deletar <i class="fas fa-trash-alt"></i></button>
                <a href="{{route('profiles.index')}}"class="btn btn-dark">Voltar <i class="fas fa-undo"></i></a>
            </form>
        </div>
    </div>
@endsection
