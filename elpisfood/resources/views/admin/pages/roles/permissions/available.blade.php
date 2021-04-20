@extends('adminlte::page')

@section('title', "Permissões disponíveis Cargo {$role->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('roles.permissions.available',$role->id)}}" class="active">Cargos</a></li>

    </ol>
    <h1>Permissões disponíveis Cargo {{$role->name}}</h1>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('roles.permissions.available',$role->id)}}" method="post" class="form form-inline">
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
                    <form action="{{route('roles.permissions.attach',$role->id)}}" method="post">
                        @csrf
                        @foreach ($permissions as $permission)
                        <tr>
                            <td>
                                <input type="checkbox" name="permissions[]" value="{{$permission->id}}">
                            </td>
                            <td>
                                {{$permission->name}}
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

