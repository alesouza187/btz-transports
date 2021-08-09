<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/motorista', 'MotoristaController@index')->name('listar_motoristas');
Route::get('/motorista/cadastrar', 'MotoristaController@cadastrar');
Route::post('/motorista/salvar', 'MotoristaController@salvar');
Route::get('/motorista/{id}/info', 'MotoristaController@info');
Route::get('/motorista/{id}/alterar', 'MotoristaController@alterar');
Route::post('/motorista/{id}/alterar', 'MotoristaController@salvar_alterar');
Route::delete('/motorista/{id}', 'MotoristaController@deletar');
Route::get('/motorista/{id}/desativar_ativar', 'MotoristaController@desativar_ativar');


Route::get('/veiculo', 'VeiculoController@index')->name('listar_veiculos');
Route::get('/veiculo/cadastrar', 'VeiculoController@cadastrar');
Route::post('/veiculo/salvar', 'VeiculoController@salvar');
Route::get('/veiculo/{id}/info', 'VeiculoController@info');
Route::delete('/veiculo/{id}', 'VeiculoController@deletar');
Route::get('/veiculo/{id}/alterar', 'VeiculoController@alterar');
Route::post('/veiculo/{id}/alterar', 'VeiculoController@salvar_alterar');


Route::get('/abastecimento', 'AbastecimentoController@index')->name('cadastrar_abastecimento');
Route::post('/abastecimento/salvar', 'AbastecimentoController@salvar');

Route::get('/relatorio', 'RelatorioController@index')->name('listar_abastecimento');
Route::post('/relatorio/emitir', 'RelatorioController@emitir');
Route::post('/relatorio/listar', 'RelatorioController@listar');