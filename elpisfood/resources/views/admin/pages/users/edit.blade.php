@extends('adminlte::page')

@section('title', 'Editar o usuário')

@section('content_header')
    <h1>Editar o usuário</h1>

@stop
@include('admin.includes.alerts')
@section('content')
    <div class="card">
        <div class="card-body">
                <form action="{{route('users.update',$user->id)}}" class="form" method="POST">
                    @csrf
                    @method('PUT')
                    @include('admin.pages.users._partials.form')
                </form>
        </div>
    </div>
@endsection
