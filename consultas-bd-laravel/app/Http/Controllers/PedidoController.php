<?php

//Controlador donde se manejara todos los métodos para cada una de las consultas
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Pedido;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    /**En esta función insertamos 5 registros en cada una de las tablas, usuarios y pedidos, 
     * esta función nos permite hacer la insersión de los datos en cada tabla, sin necesidad de hacer la consulta por separado*/
    public function insertarDatos()
    {
        //Tabla usuarios
        $usuarios = [
            ['nombre' => 'Roxana Mendez', 'correo' => 'r@example.com', 'telefono' => '123456789'],
            ['nombre' => 'Marcos Santos', 'correo' => 'm@example.com', 'telefono' => '987654321'],
            ['nombre' => 'Kenia paiz', 'correo' => 'ken@example.com', 'telefono' => '555666777'],
            ['nombre' => 'Lucia Solis', 'correo' => 'l@example.com', 'telefono' => '111222333'],
            ['nombre' => 'Estefany Muñoz', 'correo' => 'teff@example.com', 'telefono' => '444555666'],
        ];
        
        foreach ($usuarios as $usuario) {
            Usuario::create($usuario);
        }
        
        //tabla pedidos
        $pedidos = [
            ['producto' => 'Laptop', 'cantidad' => 10, 'total' => 1200, 'id_usuario' => 1],
            ['producto' => 'Mouse', 'cantidad' => 2, 'total' => 40, 'id_usuario' => 2],
            ['producto' => 'Teclado', 'cantidad' => 53, 'total' => 1540, 'id_usuario' => 3],
            ['producto' => 'Monitor', 'cantidad' => 1, 'total' => 250, 'id_usuario' => 4],
            ['producto' => 'Impresora', 'cantidad' => 1, 'total' => 150, 'id_usuario' => 5],
        ];
        
        foreach ($pedidos as $pedido) {
            Pedido::create($pedido);
        }
        
        //Mensaje de retorno cuando los datos se insertan correctamente
        return "Datos insertados correctamente.";
    }
    
    // 2. Recuperar todos los pedidos asociados al usuario con ID 2
    public function pedidosUsuario($id)
    {
        return Pedido::where('id_usuario', $id)->get();
    }
    
    // 3. Obtenemos la información detallada de los pedidos, donde vamos a incluir el nombre y correo del usuario
    public function pedidosConUsuarios()
    {
        return Pedido::with('usuario')->get();
    }
    
    // 4. Pedidos con total entre $100 y $250
    public function pedidosEnRango()
    {
        //Nos retornara solo aquellos pedidos que esten en el rango de $100 a $250
        return Pedido::whereBetween('total', [100, 250])->get();
    }
    
    // 5. Usuarios cuyos nombres comienzan con "R"
    public function usuariosConR()
    {
        return Usuario::where('nombre', 'LIKE', 'R%')->get();
    }
    
    // 6. Total de pedidos para el usuario con ID 5
    public function totalPedidosUsuario($id)
    {
        //Nos retornara solamente el usuario cuyo ID sea 5
        return Pedido::where('id_usuario', $id)->count();
    }
    
    // 7. Pedidos ordenados de forma descendente según el total
    public function pedidosOrdenados()
    {
        return Pedido::with('usuario')->orderBy('total', 'desc')->get();
    }
    
    // 8. Suma total del campo "total" en la tabla de pedidos
    public function sumaTotalPedidos()
    {
        return Pedido::sum('total');
    }
    
    // 9. Pedido más económico con el nombre del usuario asociado
    public function pedidoMasBarato()
    {
        return Pedido::with('usuario')->orderBy('total', 'asc')->first();
    }
    
    // 10. Producto, cantidad y total agrupados por usuario
    public function pedidosAgrupadosPorUsuario()
    {
        return DB::table('pedidos')
            ->select('id_usuario', DB::raw('GROUP_CONCAT(producto) as productos'), DB::raw('SUM(cantidad) as cantidad_total'), DB::raw('SUM(total) as total_pedidos'))
            ->groupBy('id_usuario')
            ->get();
    }
}
