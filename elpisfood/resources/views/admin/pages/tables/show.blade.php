@extends('adminlte::page')

@section('title', "Detalhes da mesa {$table->identify}")

@section('content_header')
    <h1>Detalhes da mesa</h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li><strong>Identificação:</strong> {{$table->identify}}</li>
                <li><strong>Descrição:</strong> {{$table->description}}</li>

            </ul>

            @include('admin.includes.alerts')

            <form action="{{route('tables.destroy',$table->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Deletar <i class="fas fa-trash-alt"></i></button>
                <a href="{{route('tables.index')}}"class="btn btn-dark">Voltar <i class="fas fa-undo"></i></a>
            </form>
        </div>
    </div>
@endsection
