@extends('adminlte::page')

@section('title', "Categorias disponíveis para o Produto {$product->title}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('products.index',$product->id)}}">Produtos</a></li>
        <li class="breadcrumb-item"><a href="{{route('products.categories',$product->id)}}">Categorias</a></li>
        <li class="breadcrumb-item active"><a href="{{route('products.categories.available',$product->id)}}" class="active">Disponíveis</a></li>

    </ol>
    <h1>Categorias disponíveis para o Produto {{$product->title}}</h1>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('products.categories.available',$product->id)}}" method="post" class="form form-inline">
                @csrf

                <input type="text" name="filter" class="form-control" placeholder="pesquisar" value="{{$filters['filter'] ?? ''}}">
                <button type="submit" class="btn btn-dark">Filtrar<i class="fas fa-sort-alpha-up"></i></button>
            </form>
        </div>
        <div class="card-body">
           <table class="table table-condensed">
               <thead>
                    <tr>
                        <th width="50px">#</th>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{route('products.categories.attach',$product->id)}}" method="post">
                        @csrf
                        @foreach ($categories as $category)
                        <tr>
                            <td>
                                <input type="checkbox" name="categories[]" value="{{$category->id}}">
                            </td>
                            <td>
                                {{$category->name}}
                            </td>
                        </tr>
                    @endforeach
                    @include('admin.includes.alerts')
                    <tr colspan="500">
                        <td>

                            <button type="submit" class="btn btn-success">Vincular</button>
                        </td>
                    </tr>
                    </form>
                </tbody>
           </table>
           <div class="card-footer">
               @if (isset($filters))
                    {{$categories->appends($filters)->links()}}
               @else
                    {{$categories->links()}}
               @endif

           </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

