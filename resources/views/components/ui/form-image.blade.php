@props([
    "endpoint"
])

<form action="{{ $endpoint }}" method="POST"  enctype="multipart/form-data">
    @method("PATCH")
    @csrf
    <label for="image">
        <span>Atualizar imagem</span>
        <br>
        <input id="image" type="file" name="image">
    </label>
    <button>Enviar</button>
</form>