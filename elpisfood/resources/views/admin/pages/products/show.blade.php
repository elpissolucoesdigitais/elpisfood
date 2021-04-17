@extends('adminlte::page')

@section('title', "Detalhes do Produto {$product->name}")

@section('content_header')
    <h1>Detalhes do Produto</h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <img src="{{url("storage/{$product->image}")}}" alt="{{ $product->title }}" style="max-width:90px">
                </li>
                <li><strong>Nome:</strong> {{$product->title}}</li>
                <li><strong>Flag:</strong> {{$product->flag}}</li>
                <li><strong>Descrição:</strong> {{$product->description}}</li>

            </ul>

            @include('admin.includes.alerts')

            <form action="{{route('products.destroy',$product->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Deletar <i class="fas fa-trash-alt"></i></button>
                <a href="{{route('products.index')}}"class="btn btn-dark">Voltar <i class="fas fa-undo"></i></a>
            </form>
        </div>
    </div>
@endsection
