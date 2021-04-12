@extends('adminlte::page')

@section('title', "Perfis da Permissões {$permission->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('permissions.profiles',$permission->id)}}" class="active">Permissões do perfil</a></li>
    </ol>
    <h1>Perfis da Permissões <strong>{{$permission->name}}</strong></h1>

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
                        <th>Nome</th>
                        <th width="50px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>
                                {{$profile->name}}
                            </td>

                            <td width="50px">
                                <a href="{{route('profiles.permission.detach',[$profile->id, $permission->id])}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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

