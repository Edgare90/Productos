<?php

namespace App\Http\Controllers;
use App\Models\producto;
use Illuminate\Http\Request;
use Session;
use Redirect;

class ProductoController extends Controller
{
    
    public function index()
    {
        $productos = producto::all();
        return view('productos.index', compact('productos'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'cantidad' => 'required|numeric'
        ]);

        producto::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'cantidad' => $request->cantidad,
        ]);

        Session::flash('message','Registro Agregado');
        return Redirect::to('/listado');

    }

    public function show()
    {
        $productos = producto::all();
        //return $productos;
        return view('productos', compact('productos'));
    }

    public function elimina(producto $id)
    {
        //dd($id);
        $id->delete();
        return redirect()->route('listado')->with('delete', 'Producto eliminado con éxito');
    }

    public function edit($id)
    {
        $productos = producto::select('*')->where('id','=',$id)->first();
        return view('productos.productos_detalle', compact('productos'));
       // dd($productos->nombre);
    }

    public function update(Request $request, $id)
    {
        $producto = producto::find($id);
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->cantidad = $request->cantidad;
        $producto->save();
        return redirect()->route('listado')->with('mensaje', 'Producto editado con éxito')->with("tipo", 'Exito');;
    }


}
