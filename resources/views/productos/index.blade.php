
@extends('menu')

@section('contenido')

<div id="cierraDiv">
    @if(Session::has('message'))
       <p style="background-color:#7ce1e6"; onclick="cerrar();>{{Session::get('message')}}</p>
    @endif
</div>


<div id="cierraDiv1">
    @if(session("mensaje") && session("tipo"))
           <p style="background-color:#7ce1e6"; onclick="cerrar();">{{session('mensaje')}}</p> 
    @endif
</div>


<div id="cierraDiv2">
    @if(Session::has('delete'))
       <p style="background-color:#7ce1e6"; onclick="cerrar();"">{{Session::get('delete')}}</p>
    @endif
</div>

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



<script>
    function cerrar()
    {
        var x = document.getElementById("cierraDiv");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }

        var x2 = document.getElementById("cierraDiv1");
        if (x2.style.display === "none") {
                x2.style.display = "block";
            } else {
                x2.style.display = "none";
            }
    
         var x3 = document.getElementById("cierraDiv2");
        if (x3.style.display === "none") {
                x3.style.display = "block";
            } else {
                x3.style.display = "none";
            }    
    }

</script>