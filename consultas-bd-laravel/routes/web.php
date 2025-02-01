<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidoController;

Route::get('/', function () {
    return view('welcome');
});

//Creando las rutas para plas consultas desde el controlador PedidoCOntroller
Route::get('/insertar-datos', [PedidoController::class, 'insertarDatos']);//Insertar datos
Route::get('/pedidos-usuario/{id}', [PedidoController::class, 'pedidosUsuario']);//pedidos por el id del usuario
Route::get('/pedidos-con-usuarios', [PedidoController::class, 'pedidosConUsuarios']);//detalle de los pedidos con su respectivo usuario
Route::get('/pedidos-en-rango', [PedidoController::class, 'pedidosEnRango']);//Rango de pedidos de $100 a $250
Route::get('/usuarios-con-r', [PedidoController::class, 'usuariosConR']);//Listar usuarios con nombres que inicien con la letra "R"
Route::get('/total-pedidos-usuario/{id}', [PedidoController::class, 'totalPedidosUsuario']);//total de pedidos de un usuario en especifico por el id
Route::get('/pedidos-ordenados', [PedidoController::class, 'pedidosOrdenados']);//Pedidos ordenados de forma descendente según el total
Route::get('/suma-total-pedidos', [PedidoController::class, 'sumaTotalPedidos']);//Suma total de los pedidos
Route::get('/pedido-mas-barato', [PedidoController::class, 'pedidoMasBarato']);// pedido más barato con el detalle del usuario
Route::get('/pedidos-agrupados', [PedidoController::class, 'pedidosAgrupadosPorUsuario']);//pedidos y total con su respectivo usuario