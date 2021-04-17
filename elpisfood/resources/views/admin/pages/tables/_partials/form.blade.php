@include('admin.includes.alerts')

<div class="form-group">
    <label>identificador da mesa:</label>
    <input type="text" name="identify" class="form-control" placeholder="Nome:" value="{{ $table->identify ?? old('identify') }}">
</div>
<div class="form-group">
    <label>Descrição:</label>
    <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $table->description ?? old('description') }}</textarea>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
