
@include('admin.includes.alerts')
@csrf

<div class="form-group">
    <label>Nome</label>
    <input type="text" name="name" placeholder="nome" class="form-control" value="{{$profile->name ?? old('name')}}">
</div>
<div class="form-group">
    <label>Descrição</label>
    <input type="text" name="description" placeholder="nome" class="form-control" value="{{$profile->description ?? old('description')}}">
</div>
<div class="form-group">
        <button type="submit" class="btn btn-info">Enviar</button>
</div>


