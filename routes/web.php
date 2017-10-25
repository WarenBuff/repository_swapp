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


Route::get('/', function () {
    return view('welcome');
});


//Route::get('admin/squads/{squad}', 'SquadController@show');
//Route::get('admin/guilds/{guild}', 'GuildController@show');
/*Route::resource('guilds', 'GuildController', ['only' => [
    'show'
]]);*/
Route::get('squads/create', function(){
    return redirect()->route('voyager.squads.create');
});
Route::get('squads/{id}', 'SquadController@show');

Route::get('guilds/create', function(){
    return redirect()->route('voyager.guilds.create');
});
Route::get('guilds/{id}', 'GuildController@show');

Route::group(['prefix' => ''], function () {
    Voyager::routes();


});




