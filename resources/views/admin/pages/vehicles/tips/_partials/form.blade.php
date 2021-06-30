@include('admin.includes.alerts')

<div class="form-group">

    <label for="name">Marca: </label>
    <input type="text" name="marca" id="marca" class="form-control" placeholder="Digite a marca do veículo" value="{{ $tips->marca ?? old('marca') }}">
    
    <label for="name">Modelo: </label>
    <input type="text" name="modelo" id="modelo" class="form-control" placeholder="Digite o modelo do veículo" value="{{ $tips->modelo ?? old('modelo') }}">
    
    <label for="name">Versão: </label>
    <input type="text" name="versao" id="versao" class="form-control" placeholder="Digite a versão do veículo" value="{{ $tips->versao ?? old('versao') }}">

</div>

<div class="form-group">

    <button type="submit" class="btn btn-info">Enviar</button>
    
</div>