@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>

@stop

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <i class="fas fa-users"></i>
                </span>

              <div class="info-box-content">
                <span class="info-box-text">Usuários</span>
                <span class="info-box-number">{{$totalUsers}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>


          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <i class="fas fa-tablet"></i>
                </span>

              <div class="info-box-content">
                <span class="info-box-text">Mesas</span>
                <span class="info-box-number">{{$totalTables}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>


          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <i class="fas fa-layer-group"></i>
                </span>

              <div class="info-box-content">
                <span class="info-box-text">Categorias</span>
                <span class="info-box-number">{{$totalCategories}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <i class="fas fa-utensils"></i>
                </span>

              <div class="info-box-content">
                <span class="info-box-text">Produtos</span>
                <span class="info-box-number">{{$totalProducts}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>


          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <i class="fas fa-building"></i>
                </span>

              <div class="info-box-content">
                <span class="info-box-text">Empresas</span>
                <span class="info-box-number">{{$totalTenants}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>


          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <i class="fas fa-list"></i>
                </span>

              <div class="info-box-content">
                <span class="info-box-text">Planos</span>
                <span class="info-box-number">{{$totalPlans}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <i class="fas fa-user-tag"></i>
                </span>

              <div class="info-box-content">
                <span class="info-box-text">Cargos</span>
                <span class="info-box-number">{{$totalRoles}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>


          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <i class="fas fa-male"></i>
                </span>

              <div class="info-box-content">
                <span class="info-box-text">Perfis</span>
                <span class="info-box-number">{{$totalProfiles}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <i class="fas fa-user-lock"></i>
                </span>

              <div class="info-box-content">
                <span class="info-box-text">Permissões</span>
                <span class="info-box-number">{{$totalPermissions}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
    </div>


@endsection
