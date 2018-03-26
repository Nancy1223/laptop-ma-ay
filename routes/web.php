<?php

Route::get('/','IndexController@verIndex');

Route::get('index/inicioadmin','IndexController@adminIndex');
Route::match(['get','post'],'usuario/insertar', 'UsuarioController@actionInsertar');
Route::get('usuario/lista', 'UsuarioController@actionVer');
Route::get('usuario/eliminar/{codigoUsuario}','UsuarioController@actionEliminar');
Route::get('usuario/editar/{codigoUsuario}','UsuarioController@actionditar');
Route::post('usuario/editar','UsuarioController@actionEditar');

Route::post('usuario/login','UsuarioController@actionLogIn');
Route::get('usuario/logout','UsuarioController@actionLogOut');

Route::match(['get','post'],'cliente/insertar', 'ClienteController@actionInsertar');
Route::get('cliente/lista', 'ClienteController@actionVer');
Route::get('cliente/eliminar/{codigoUsuario}','ClienteController@actionEliminar');
Route::get('cliente/editar/{codigoUsuario}','ClienteController@actionditar');
Route::post('cliente/editar','ClienteController@actionEditar');

Route::match(['get','post'],'laptop/insertar', 'LaptopController@actionInsertar');
Route::get('laptop/lista', 'LaptopController@actionVer');
Route::get('laptop/eliminar/{codigoLaptop}','LaptopController@actionEliminar');
Route::get('laptop/editar/{codigoLaptop}','LaptopController@actionditar');
Route::post('laptop/editar','LaptopController@actionEditar');

Route::match(['get','post'],'prestamo/insertar', 'PrestamoController@actionInsertar');
Route::get('prestamo/lista', 'PrestamoController@actionVer');
Route::get('prestamo/eliminar/{codigoPrestamo}','PrestamoController@actionEliminar');
Route::get('prestamo/editar/{codigoPrestamo}','PrestamoController@actionditar');
Route::post('prestamo/editar','PrestamoController@actionEditar');

//reportes 
Route::match(['get','post'],'reporte/ganancia','ReporteController@gananciadeldia');
Route::match(['get','post'],'reporte/laptopprestamo','ReporteController@laptopprestamo');