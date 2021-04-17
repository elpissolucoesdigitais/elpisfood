@extends('adminlte::page')

@section('title', 'Editar o Produto')

@section('content_header')
    <h1>Editar o Produto</h1>

@stop
@include('admin.includes.alerts')
@section('content')
    <div class="card">
        <div class="card-body">
                <form action="{{route('products.update',$product->id)}}" class="form" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('admin.pages.products._partials.form')
                </form>
        </div>
    </div>
@endsection
