@extends('menu')

@section('contenido')

<div class="container">
<form  action="{{ route('inserta')}}" method="POST">
    @csrf
      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre Producto" value="{{ old('nombre') }}">
        @error('nombre')
            <p>{{ $message }}</p>
        @enderror
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Precio</label>
        <input type="text" id="precio" name="precio" class="form-control" value="{{ old('precio') }}" placeholder="Precio Producto">
        @error('precio')
            <p>{{ $message }}</p>
        @enderror
      </div>
      <div class="form-group">
          <label for="sku">Cantidad</label>
          <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad de Productos" value="{{ old('cantidad') }}">
          @error('cantidad')
            <p>{{ $message }}</p>
          @enderror
      </div>
     
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </div>

@endsection

