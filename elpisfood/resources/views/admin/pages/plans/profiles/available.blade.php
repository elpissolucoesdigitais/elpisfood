@extends('adminlte::page')

@section('title', "Perfis disponíveis para o plano {$plan->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.index',$plan->id)}}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.profiles',$plan->id)}}">Perfis</a></li>
        <li class="breadcrumb-item active"><a href="{{route('plans.profiles.available',$plan->id)}}" class="active">Disponíveis</a></li>

    </ol>
    <h1>Perfis disponíveis para o plano {{$plan->name}}</h1>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('plans.profiles.available',$plan->id)}}" method="post" class="form form-inline">
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
                    <form action="{{route('plans.profiles.attach',$plan->id)}}" method="post">
                        @csrf
                        @foreach ($profiles as $profile)
                        <tr>
                            <td>
                                <input type="checkbox" name="profiles[]" value="{{$profile->id}}">
                            </td>
                            <td>
                                {{$profile->name}}
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

