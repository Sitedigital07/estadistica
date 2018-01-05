<?php


Route::group(['middleware' => ['auths','administrador']], function (){

Route::get('gestion/estadisticav', 'Digitalsite\Estadistica\Http\EstadisticaController@index');

Route::get('gestion/estadistica/meses', 'Digitalsite\Estadistica\Http\EstadisticaController@meses');

Route::get('gestion/estadistica/mapa', 'Digitalsite\Estadistica\Http\EstadisticaController@mapa');

Route::get('gestion/estadistica/keywords', 'Digitalsite\Estadistica\Http\EstadisticaController@keywords');

Route::get('gestion/estadistica/paginas', 'Digitalsite\Estadistica\Http\EstadisticaController@paginas');

Route::get('gestion/estadistica/idioma', 'Digitalsite\Estadistica\Http\EstadisticaController@idioma');

Route::get('gestion/estadistica/referidos', 'Digitalsite\Estadistica\Http\EstadisticaController@referidos');

Route::get('gestion/estadistica/bloqueo', 'Digitalsite\Estadistica\Http\EstadisticaController@blocks');

Route::resource('gestion/estadistica/crearbloqueo', 'Digitalsite\Estadistica\Http\EstadisticaController@crearblocks');

Route::resource('gestion/estadistica/eliminar', 'Digitalsite\Estadistica\Http\EstadisticaController@eliminar');


Route::get('gestion/estadistica/bloqueo', 'Digitalsite\Estadistica\Http\EstadisticaController@blocks');

Route::get('/gestion/estadistica/crear-block', function(){

    return View::make('estadistica::crear-block');
});





Route::get('informe/estadistica', function(){
       
       $min_price = Input::has('min_price') ? Input::get('min_price') : 0;
       $max_price = Input::has('max_price') ? Input::get('max_price') : 10000000;
       $clientes =  Input::get('cliente') ;
       $estados =  Input::get('estado') ;
   
     
         $unitarios =  $productos = DB::table('estadistica')
          ->selectRaw('count(ip) as sum')
          ->get();


        
   return View::make('estadistica::indexa')->with('unitarios', $unitarios);
});



Route::get('gestion/estadistica', function(){

$min_price = Input::has('min_price') ? Input::get('min_price') : 0;
       $max_price = Input::has('max_price') ? Input::get('max_price') : 10000000;

	

         $visitas = DB::table('estadistica')
          ->whereBetween('fecha', array($min_price, $max_price))
          ->count();

    $nuevousuario = DB::table('estadistica')
     ->whereBetween('fecha', array($min_price, $max_price))
     ->select('ip')
     ->distinct()
     ->count('ip');

	$conteopagina = DB::table('pages')->count(); 

	$paginas = DB::table('estadistica')
     ->whereBetween('fecha', array($min_price, $max_price))
     ->select('pagina')
     ->selectRaw('count(ip) as sum')
     ->groupBy('pagina')
     ->orderBy('sum', 'desc')
     ->get();


   $referidos = DB::table('estadistica')
     ->whereBetween('fecha', array($min_price, $max_price))
     ->select('referido')
     ->selectRaw('count(ip) as sum')
     ->groupBy('referido')
     ->orderBy('sum', 'desc')
     ->get();

       $ciudades = DB::table('estadistica')
     ->whereBetween('fecha', array($min_price, $max_price))
     ->select('ciudad')
     ->selectRaw('count(ip) as sum')
     ->groupBy('ciudad')
     ->orderBy('sum', 'desc')
     ->get();


      $idiomas = DB::table('estadistica')
     ->whereBetween('fecha', array($min_price, $max_price))
     ->select('idioma')
     ->selectRaw('count(ip) as sum')
     ->groupBy('idioma')
     ->orderBy('sum', 'desc')
     ->get();

      $meses = DB::table('estadistica')
     ->whereBetween('fecha', array($min_price, $max_price))
     ->select('mes')
     ->selectRaw('count(ip) as sum')
     ->groupBy('mes')
      ->orderBy('cp', 'asc')
     ->get();

      $paises = DB::table('estadistica')
     ->whereBetween('fecha', array($min_price, $max_price))
     ->select('pais')
     ->selectRaw('count(ip) as sum')
     ->groupBy('pais')
     ->get();

	return View::make('estadistica::estadisticaweb', compact(['visitas','nuevousuario','conteopagina','paginas','referidos','ciudades','idiomas','meses','paises']));
});



});