@extends('menu')

@section('contenido')

<div class="container">
<form  action="{{ route('update',$productos->id)}}" method="POST">
    @csrf
      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $productos->nombre }}">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Precio</label>
        <textarea class="form-control" id="precio" name="precio">{{ $productos->precio }}</textarea>
      </div>
      <div class="form-group">
          <label for="sku">Cantidad</label>
          <input type="text" class="form-control" id="cantidad" name="cantidad" value="{{ $productos->cantidad }}">
      </div>
     
      <button type="submit" class="btn btn-primary">Editar</button>
    </form>
</div>

@endsection