<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('especialidades', 'frontpageController@especialidades');
Route::get('promociones', 'frontpageController@promociones');
Route::get('instalaciones', 'frontpageController@instalaciones');
Route::get('tratamientos', 'frontpageController@tratamientos');

Route::get('cita', 'frontpageController@cita');
Route::resource('factura', 'FacturaController');




Route::controllers([
    'users'    => 'UsersController',
    'auth'     => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',

]);
//Rutas para el administrador
Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'namespace' => '\Admin'], function(){

    Route::get('/', 'AdminController@index');

    Route::resource('factura', 'FacturarController');
    Route::resource('users', 'UsersController');
    Route::resource('ivas', 'IvaController');
    Route::resource('turnos', 'TurnosController');
    Route::resource('insumos', 'insumosController');
    Route::resource('proveedores', 'ProveedorController');
    Route::resource('productos', 'ProductoController');
    Route::resource('especialidades', 'EspecialidadController');
    Route::resource('especialistas', 'EspecialistaController');


    Route::resource('pdf-usuarios', 'PdfController');
    Route::resource('pdf-insumos', 'PdfInsumosController');
    Route::resource('pdf-proveedores', 'PdfProveedoresController');


    Route::get('perfil',             'UsersController@perfil');
    Route::get('editarPerfil'  ,     'UsersController@editarPerfil');
    Route::resource('userPerfil',    'UserPerfilController');
    Route::get('especialidad',       'EspecialidadController@guardar');

    Route::get('agendar/{date}',     'AgendarController@index');
    Route::resource('agendar',        'AgendarController');
    Route::resource('consultas',     'ConsultasController');
    Route::resource('historial',     'IntervencionController');
    Route::resource('intervencion',  'IntervencionController');

    //Route::resource('pagar',         'PagarController');
    Route::resource('intervencion2', 'Intervencion2Controller');
    Route::resource('tratamiento',   'TratamientoController');

    Route::resource('pagar',  'PagosController');
    Route::resource('configurar-forma-de-pago', 'FormaPagoController');


    Route::resource('configurar', 'ConfigurarController');

    Route::get('/pagos/{id}',  [

        'as'      => 'pagos_usuario',
        'uses'    => 'PagosController@pagos']

    );

    Route::get('/pdfFactura/{id}',   [

        'as'      => 'pdfFactura',
        'uses'    => 'PdfFacturaController@verFactura']
    );

    Route::get('/ingresar-pago/{id}',  [

            'as'      => 'ingresar-pago',
            'uses'    => 'PagosController@pagando']

    );

    Route::post('/pagado/{id}', [

        'as'      => 'pagado',
        'uses'    =>'PagosController@pagado'

    ]);



});

