@include('admin.includes.alerts')

<div class="form-group">
    <label for="name">Nome: </label>
        <input type="text" name="name" id="" class="form-control" placeholder="Nome:" value="{{ $vehicles->name ?? '' }}">
    </div>
        <button type="submit" class="btn btn-dark">Enviar</button>
</div>