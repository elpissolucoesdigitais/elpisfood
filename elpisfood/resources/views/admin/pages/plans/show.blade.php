@extends('adminlte::page')

@section('title', 'Detalhes do Plano')

@section('content_header')
    <h1>Detalhes do Plano</h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li><strong>Nome:</strong> {{$plan->name}}</li>
                <li><strong>URL:</strong> {{$plan->url}}</li>
                <li><strong>Descrição:</strong> {{$plan->description}}</li>
                <li><strong>Preço</strong> R${{number_format($plan->price, 2, ',','.')}}</li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{route('plans.destroy',$plan->url)}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Deletar <i class="fas fa-trash-alt"></i></button>
                <a href="{{route('plans.index')}}"class="btn btn-dark">Voltar <i class="fas fa-undo"></i></a>
            </form>
        </div>
    </div>
@endsection
