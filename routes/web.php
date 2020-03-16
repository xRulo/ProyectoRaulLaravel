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

/**
 * Llama al método index de InstrumentoController
 * 
 * @var		string	:get(
 * @global
 *//**
 * @var		mixed	@index')
 * @global
 */
Route::get('/', 'InstrumentoController@index');

/**
 * Recibe el formulario, valida y muestra los errores/envía los datos a la base de datos.
 * 
 * @var		string	:post(
 * @global
 *//**
 * @var		request	$reques
 * @global
 */
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


/**
 * Llama al método deleteInstrumento de InstrumentoController
 * 
 * @var		string	:post(
 * @global
 *//**
 * @var		mixed	@deleteInstrumento')
 * @global
 */
Route::post('/instrumento/deleteinstrumento', 'InstrumentoController@deleteInstrumento');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
