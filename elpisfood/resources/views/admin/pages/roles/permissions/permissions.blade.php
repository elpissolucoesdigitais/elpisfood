@extends('adminlte::page')

@section('title', "Permissões do perfil {$role->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('roles.permissions',$role->id)}}" class="active">Permissões do perfil</a></li>
    </ol>
    <h1>Permissões do perfil {{$role->name}}
    <a href="{{route('roles.permissions.available',$role->id)}}" class="btn btn-dark">ADD Nova Permissão <i class="fas fa-plus-circle"></i></a></h1>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('roles.search')}}" method="post" class="form form-inline">
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
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>
                                {{$permission->id}}
                            </td>
                            <td>
                                {{$permission->name}}
                            </td>

                            <td styled="width=10px;">
                                <a href="{{route('roles.permission.detach',[$role->id, $permission->id])}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
           </table>
           <div class="card-footer">
               @if (isset($filters))
                    {{$permissions->appends($filters)->links()}}
               @else
                    {{$permissions->links()}}
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

