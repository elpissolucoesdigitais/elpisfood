@extends('adminlte::page')

@section('title', 'Detalhes do Usuário {{$user->name}}')

@section('content_header')
    <h1>Detalhes do Usuário</h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li><strong>Nome:</strong> {{$user->name}}</li>
                <li><strong>E-mail:</strong> {{$user->email}}</li>
                <li><strong>Empresa:</strong> {{$user->tenant->name}}</li>

            </ul>

            @include('admin.includes.alerts')

            <form action="{{route('users.destroy',$user->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Deletar <i class="fas fa-trash-alt"></i></button>
                <a href="{{route('users.index')}}"class="btn btn-dark">Voltar <i class="fas fa-undo"></i></a>
            </form>
        </div>
    </div>
@endsection
