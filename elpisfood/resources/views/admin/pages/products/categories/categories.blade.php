@extends('adminlte::page')

@section('title', "Categoria do produto {{$product->title}}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('products.index',$product->id)}}">Produtos</a></li>
        <li class="breadcrumb-item active"><a href="{{route('products.categories',$product->id)}}" class="active">Perfis</a></li>
    </ol>
    <h1>Categoria do produto {{$product->title}}
    <a href="{{route('products.categories.available',$product->id)}}" class="btn btn-dark">ADD Nova categoria <i class="fas fa-plus-circle"></i></a></h1>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('profiles.search')}}" method="post" class="form form-inline">
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
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>
                                {{$category->name}}
                            </td>

                            <td styled="width=10px;">
                                <a href="{{route('products.categories.detach',[$category->id, $product->id])}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
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

