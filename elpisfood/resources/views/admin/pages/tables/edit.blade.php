@extends('adminlte::page')

@section('title', 'Editar a Mesa')

@section('content_header')
    <h1>Editar a Mesa</h1>

@stop
@include('admin.includes.alerts')
@section('content')
    <div class="card">
        <div class="card-body">
                <form action="{{route('tables.update',$table->id)}}" class="form" method="POST">
                    @csrf
                    @method('PUT')
                    @include('admin.pages.tables._partials.form')
                </form>
        </div>
    </div>
@endsection
