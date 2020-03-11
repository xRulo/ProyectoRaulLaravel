<?php
use Illuminate\Http\Request;
use App\Instrumento;
use Illuminate\Support\Facades\Validator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'InstrumentoController@index');

Route::post('/instrumento', function (Request $request) {
    $validator = Validator::make($request->all(), [
    'nombre' => 'required | max:30',
    'tipo' => 'required',
    'precio' => 'required | numeric | min:1 | max:99999',
    'cantidad' => 'required | numeric | min:1 | max:99999',
    'color' => 'required',
    'marca' => 'required',
    'estado' => 'required',
    'descripcion' => 'sometimes|nullable|string'
    ]);
    if ($validator->fails()) {
    return redirect('/')
    ->withInput()
    ->withErrors($validator);
    }
    $task = new Instrumento;
    $task->nombre = $request->nombre;
    $task->tipo = $request->tipo;
    $task->precio = $request->precio;
    $task->cantidad = $request->cantidad;
    $task->color = $request->color;
    $task->marca = $request->marca;
    $task->estado = $request->estado;
    $task->descripcion = $request->descripcion;

    $task->save();
    return redirect('/');
    });

Route::post('/instrumento/deleteinstrumento', 'InstrumentoController@deleteInstrumento');