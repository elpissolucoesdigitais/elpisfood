@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('profiles.index')}}" class="active">Perfis</a></li>
    </ol>
    <h1>Perfis <a href="{{route('profiles.create')}}" class="btn btn-dark">ADD <i class="fas fa-plus-circle"></i></a></h1>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="" method="post" class="form form-inline">
                @csrf

                <input type="text" name="filter" class="form-control" placeholder="pesquisar" value="{{$filters['filter'] ?? ''}}">
                <button type="submit" class="btn btn-dark">Filtrar<i class="fas fa-sort-alpha-up"></i></button>
            </form>
        </div>
        <div class="card-body">
           <table class="table table-condensed">
               <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="250">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>
                                {{$profile->name}}
                            </td>

                            <td styled="width=10px;">
                                <a href="{{route('profiles.edit',$profile->id)}}"class="btn btn-info">Editar</a>
                                <a href="{{route('profiles.show',$profile->id)}}" class="btn btn-warning">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
           </table>
           <div class="card-footer">
               @if (isset($filters))
                    {{$profiles->appends($filters)->links()}}
               @else
                    {{$profiles->links()}}
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

