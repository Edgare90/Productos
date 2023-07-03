
@extends('menu')

@section('contenido')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif


<div class="container">
<table class="table">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Precio</th>
        <th scope="col">Cantidad</th>
        <th scope="col">------</th>
        <th scope="col">------</th>
      </tr>
    </thead>
    <tbody>
        @if($productos->count())
             @foreach ($productos as $producto)
                <tr>
                    <th scope="row">{{ $producto->nombre}}</th>
                    <td>{{ $producto->precio }}</td>
                    <td>{{ $producto->cantidad }}</td>
                    <td>
                        <form action="{{ route('elimina',$producto->id) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>

                    </td>
                    <td>
                        <form action="{{ route('editar',$producto->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-info">Editar</button>
                        </form>

                    </td>
                </tr>
             @endforeach
        @endif
    </tbody>
</table> 
</div>
@endsection      