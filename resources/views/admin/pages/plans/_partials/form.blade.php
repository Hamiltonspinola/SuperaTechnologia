@include('admin.includes.alerts')

<div class="form-group">
    <label for="name">Nome: </label>
        <input type="text" name="name" id="" class="form-control" placeholder="Nome:" value="{{ $plans->name ?? '' }}">
    </div>

    <div class="form-group">
    <label for="name">Preço: </label>
        <input type="text" name="price" id="" class="form-control" placeholder="Preço:" value="{{ $plans->price ?? '' }}">
    </div>

    <div class="form-group">
    <label for="name">Descrição: </label>
        <input type="text" name="description" id="" class="form-control" placeholder="Descrição:" value="{{ $plans->description ?? '' }}">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-dark">Enviar</button>
</div>