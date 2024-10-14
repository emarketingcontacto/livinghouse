<?php

use App\Models\Images;
use App\Models\Biztype;
use App\Models\Categories;
use App\Models\Properties;
use App\Models\Inmobiliarias;


use App\Http\Controllers\Casas;
use App\Http\Controllers\Terrenos;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Comercios;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Departamentos;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\AboutusController;
use App\Http\Controllers\BiztypeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NotarialController;
use App\Http\Controllers\AseroriasController;
use App\Http\Controllers\AvaluosController;
use App\Http\Controllers\InfonavitController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\InmobiliariasController;
use App\Http\Controllers\ContactosController;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Images Link */
// Route::get('/linkstorage', function(){
//     Artisan::call('storage:link');
// });

/* Home */
Route::get('/', function () {
// Hero
   $imagesHero = DB::table('properties')
   ->join('images', 'properties.propId', '=' ,'images.propId')
   ->select('properties.propName', 'properties.propId','properties.propDetails' ,'images.imageName')
   ->orderBy('properties.propId', 'asc')
   ->get();

   //Houses
   $LastHouses = DB::table('properties')
   ->select ('properties.propName', 'properties.propId','properties.propDetails', 'categories.categoryName', 'biztypeName', 'images.imageName')
   ->join('categories', 'categories.categoryId', '=','properties.categoryId' )
   ->join('biztype', 'biztype.biztypeId', '=', 'properties.biztypeId')
   ->join('images', 'images.propId', '=','properties.propId')
   ->where('categories.categoryName','=','Casa')
   ->orderBy('properties.propId', 'desc')
   ->get();

//Apartments
$LastAppartments = DB::table('properties')
   ->select ('properties.propName', 'properties.propId','properties.propDetails', 'categories.categoryName', 'biztypeName', 'images.imageName')
   ->join('categories', 'categories.categoryId', '=','properties.categoryId' )
   ->join('biztype', 'biztype.biztypeId', '=', 'properties.biztypeId')
   ->join('images', 'images.propId', '=','properties.propId')
   ->where('categories.categoryName','=','Departamento')
   ->orderBy('properties.propId', 'desc')
   ->get();

//Terrenos
$LastTerrenos = DB::table('properties')
   ->select ('properties.propName', 'properties.propId','properties.propDetails', 'categories.categoryName', 'biztypeName', 'images.imageName')
   ->join('categories', 'categories.categoryId', '=','properties.categoryId' )
   ->join('biztype', 'biztype.biztypeId', '=', 'properties.biztypeId')
   ->join('images', 'images.propId', '=','properties.propId')
   ->where('categories.categoryName','=','Terreno')
   ->orderBy('properties.propId', 'desc')
   ->get();

//Comercios
$LastComercios = DB::table('properties')
   ->select ('properties.propName', 'properties.propId','properties.propDetails', 'categories.categoryName', 'biztypeName', 'images.imageName')
   ->join('categories', 'categories.categoryId', '=','properties.categoryId' )
   ->join('biztype', 'biztype.biztypeId', '=', 'properties.biztypeId')
   ->join('images', 'images.propId', '=','properties.propId')
   ->where('categories.categoryName','=','Comercio')
   ->orderBy('properties.propId', 'desc')
   ->get();

//Inmobiliarias
$inmobiliarias = DB::table('inmobiliarias')
->select('inmobiliarias.*')
->orderBy('inmoName', 'desc')
->limit(4)
->get();

    return view('welcome', [
        'imagesHero'=> $imagesHero,
        'LastHouses'=>$LastHouses,
        'LastAppartments'=>$LastAppartments,
        'LastTerrenos'=>$LastTerrenos,
        'LastComercios'=>$LastComercios,
        'inmobiliarias'=>$inmobiliarias
        ]);
});

/* BizTypes */
//Index
Route::get('/Biztype', [BiztypeController::class, 'index'])->name('Biztype.index');
//Create
Route::get('/Biztype/create', [BiztypeController::class,'create'])->name('Biztype.create');
//Store
Route::post('/Biztype', [BiztypeController::class,'store'])->name('Biztype.store');
//Edit
Route::get('/Biztype/{biztype}/edit', [BiztypeController::class,'edit'])->name('Biztype.edit');
//Update
Route::put('/Biztype/{biztype}/update', [BiztypeController::class,'update'])->name('Biztype.update');
//Delete
Route::delete('/Biztype/{biztype}/destroy', [BiztypeController::class,'destroy'])->name('Biztype.destroy');

/*Categories*/
//Index
Route::get('/Categories', [CategoriesController::class, 'index'])->name('Categories.index');
//Create
Route::get('/Categories/create', [CategoriesController::class,'create'])->name('Categories.create');
//Store
Route::post('/Categories', [CategoriesController::class,'store'])->name('Categories.store');
//Edit
Route::get('/Categories/{category}/edit', [CategoriesController::class,'edit'])->name('Categories.edit');
//Update
Route::put('/Categories/{category}/update', [CategoriesController::class,'update'])->name('Categories.update');
//Delete
Route::delete('/Categories/{category}/destroy', [CategoriesController::class,'destroy'])->name('Categories.destroy');

/*Properties*/
//Index
Route::get('/Properties', [PropertiesController::class, 'index'])->name('Properties.index');
//Show
Route::get('/Properties/{property}/show', [PropertiesController::class, 'show'])->name('Properties.show');
//Create
Route::get('/Properties/create', [PropertiesController::class,'create'])->name('Properties.create');
//Store
Route::post('/Properties', [PropertiesController::class,'store'])->name('Properties.store');
//Edit
Route::get('/Properties/{property}/edit', [PropertiesController::class,'edit'])->name('Properties.edit');
//Update
Route::put('/Properties/{property}/update', [PropertiesController::class,'update'])->name('Properties.update');
//Delete
Route::delete('/Properties/{property}/destroy', [PropertiesController::class,'destroy'])->name('Properties.destroy');

/* Inmobiliarias */
//Index
Route::get('/Inmobiliarias', [InmobiliariasController::class, 'index'])->name('Inmobiliarias.index');
//Show
Route::get('/Inmobiliarias/{inmo}/show', [InmobiliariasController::class, 'show'])->name('Inmobiliarias.show');
//Create
Route::get('/Inmobiliarias/create', [InmobiliariasController::class,'create'])->name('Inmobiliarias.create');
//Store
Route::post('/Inmobiliarias', [InmobiliariasController::class,'store'])->name('Inmobiliarias.store');
//Edit
Route::get('/Inmobiliarias/{inmo}/edit', [InmobiliariasController::class,'edit'])->name('Inmobiliarias.edit');
//Update
Route::put('/Inmobiliarias/{inmo}/update', [InmobiliariasController::class,'update'])->name('Inmobiliarias.update');
//Delete
Route::delete('/Inmobiliarias/{inmo}/destroy', [InmobiliariasController::class,'destroy'])->name('Inmobiliarias.destroy');

/*Contactos*/
// Index
Route::get('/Contactos', [ContactosController::class, 'index'])->name('Contactos.index');
//Create
Route::get('/Contactos/create', [ContactosController::class,'create'])->name('Contactos.create');
//Store
Route::post('/Contactos', [ContactosController::class,'store'])->name('Contactos.store');
//Edit
Route::get('/Contactos/{contacto}/edit', [ContactosController::class,'edit'])->name('Contactos.edit');
//Update
Route::put('/Contactos/{contacto}/update', [ContactosController::class,'update'])->name('Contactos.update');
//Delete
Route::delete('/Contactos/{contacto}/destroy', [ContactosController::class,'destroy'])->name('Contactos.destroy');



/*Images*/
//Index
Route::get('/Imagenes/', [ImagesController::class, 'index'])->name('Imagenes.index');
//Create
Route::get('/Imagenes/{property}/create', [ImagesController::class,'create'])->name('Imagenes.create');
//Store
Route::post('/Imagenes', [ImagesController::class,'store'])->name('Imagenes.store');

//Edit
Route::get('/Images/{property}/edit', [ImagesController::class,'edit'])->name('Imagenes.edit');
//Update
Route::put('/Images/{property}/update', [ImagesController::class,'update'])->name('Imagenes.update');
//Delete
Route::delete('/Imagenes/{image}/destroy', [ImagesController::class,'destroy'])->name('Imagenes.destroy');

/*Departamentos */
//Route::get('/Departamentos',[Departamentos::class, 'index'])->name('Departamentos.index');
Route::get('/Departamentos',[Departamentos::class, 'index'])->name('Departamentos.index');
/*Casas*/
Route::get('/Casas',Casas::class)->name('Casas');
/* Terrenos */
Route::get('/Terrenos',Terrenos::class)->name('Terrenos');
/* Comercios */
Route::get('/Comercios',Comercios::class)->name('Comercios');

/*User*/
//Index
Route::get('/User', [UserController::class, 'index'])->name('User.index');
//Create
Route::get('/User/create', [UserController::class,'create'])->name('User.create');
//Store
Route::post('/User', [UserController::class,'store'])->name('User.store');
//Show
Route::get('/User/{user}/show', [UserController::class, 'show'])->name('User.show');
//Edit
Route::get('/User/{user}/edit', [UserController::class,'edit'])->name('User.edit');
//Update
Route::put('/User/{user}/update', [UserController::class,'update'])->name('User.update');
//Delete
Route::delete('/User/{user}/destroy', [UserController::class,'destroy'])->name('User.destroy');

/*Registration */
//Login
Route::get('User/login', [UserController::class, 'login'])->name('User.login');
//Logout
Route::post('User/logout', [UserController::class, 'logout'])->name('User.logout');
//Authenticate
Route::post('User/authenticate', [UserController::class, 'authenticate'])->name('User.authenticate');

/*Contact */
Route::get('/Contact',ContactController::class)->name('Contact');
/*Aboutus*/
Route::get('/Aboutus',AboutusController::class)->name('Aboutus');

/* Servicios */
//Asesorias
Route::get('/Servicios/Asesorias',AseroriasController::class)->name('Asesorias');
//Infonavit
Route::get('/Servicios/Infonavit',InfonavitController::class)->name('Infonavit');
//Servicios Notariales
Route::get('/Servicios/Notarial',NotarialController::class)->name('Notarial');
// Avaluos
Route::get('/Servicios/Avaluos',AvaluosController::class)->name('Avaluos');


