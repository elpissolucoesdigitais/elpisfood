@extends('adminlte::page')

@section('title', 'Editar o Cargo')

@section('content_header')
    <h1>Editar o Cargo</h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
                <form action="{{route('roles.update',$role->id)}}" class="form" method="POST">
                    @method('PUT')
                    @include('admin.pages.roles._partials.form')
                </form>
        </div>
    </div>
@endsection
