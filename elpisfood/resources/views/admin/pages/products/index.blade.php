@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('products.index') }}" class="active">Produtos</a></li>
    </ol>

    <h1>Produto <a href="{{ route('products.create') }}" class="btn btn-dark">ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('products.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        @include('admin.includes.alerts')
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th width="100">Imagem</th>
                        <th>Nome</th>
                        <th width="270">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>
                                <img src="{{url("storage/{$product->image}")}}" alt="{{ $product->title }}" style="max-width:90px">
                            </td>
                            <td>
                                {{ $product->title }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info">Editar</a>
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-warning">Ver</a>
                                <a href="{{ route('products.categories', $product->id) }}" class="btn btn-warning" title="categorias">Categorias</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $products->appends($filters)->links() !!}
            @else
                {!! $products->links() !!}
            @endif
        </div>
    </div>
@stop
