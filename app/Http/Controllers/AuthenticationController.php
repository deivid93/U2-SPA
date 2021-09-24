<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Proveedor;

class AuthenticationController extends Controller
{
    public function signin(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6'
        ]);

        
        
        
        if (!Auth::attempt($attr)) {
            return response(['message'=> 'Credenciales no coinciden'], 401);
            
        }
        return response(['token' => auth()->user()->createToken('API Token')->plainTextToken], 201);

    }

    public function signout()
    {
        if(auth()->user()){
            auth()->user()->tokens()->delete();
            $message = ['message' => 'Tokens Revoked'];
        }else{
            $message = ['message' => 'Usuario no esta logeado'];
        }
        
        return $message;
    }
    
    public function pedidos(Request $request){      
        if(isset($request->id)){
            $id = trim($request->id);
            //$pedidos = Pedido::find($id)->productos;
            //$pedidos = Producto::where('id', '=', $id)->with('pedidos')->get();
            $pedidos = Pedido::where('id', '=', $id)->with('productos')->get();

            //$pedidos = Producto::with(['pedidos'=>function($q) use ($id){$q->where('pedido_id',36);}])->get();
            /*$pedidos = Producto::whereHas('pedidos', function($q) use($id) {
                $q->whereIn('id', $id);
            })->get();*/
        }else{
            $fecha = trim($request->fecha);
            $pedidos = Pedido::where('fecha_entrega', '=', $fecha)->with('productos')->get();
        }
        
        return response(['pedidos' => $pedidos], 200);        
    }

    public function pedidosAll(Request $request){
        $pedidos = Pedido::all();
        return response(['pedidos' => $pedidos], 200);        
    }

    public function proveedores(Request $request){              
        $producto_id = trim($request->producto);
        $producto = Producto::where('id', '=', $producto_id)->first();
        
        $proveedores = Proveedor::where('id', '=', $producto->proveedor_id)->first();
        return response(['proveedores' => $proveedores], 200);        
    }
}
