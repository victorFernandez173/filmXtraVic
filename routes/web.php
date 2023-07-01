<?php

use App\Http\Controllers\CriticaController;
use App\Http\Controllers\EvaluacionController;
use App\Http\Controllers\FichaValoracionController;
use App\Http\Controllers\TopObrasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TopValoracionesController;
use App\Http\Controllers\BienvenidaController;
use App\Http\Controllers\ObtenerObraController;
use App\Http\Controllers\LikeController;


/*
|--------------------------------------------------------------------------
| Rutas web
|--------------------------------------------------------------------------
|
| Rutas cargadas para por el RouteServiceProvider desde un grupo que contiene el grupo "web" middleware.
|
*/


Route::get('/', [BienvenidaController::class, 'bienvenida'])->name('/');

Route::post('/', [BienvenidaController::class, 'buscarTitulo'])->name('/buscado');

Route::get('obra/{titulo}', [ObtenerObraController::class, 'fichaPelicula'])->name('obra');

Route::get('top', [TopObrasController::class, 'cargarDatos'])->name('top');

Route::get('valoraciones', [TopValoracionesController::class, 'cargarDatos'])->name('valoraciones');

Route::get('valoraciones/{titulo}', [FichaValoracionController::class, 'obtenerFichaValoracion'])->name('fichaValoraciones');

Route::post('/like', [LikeController::class, 'darLike'])->name('darLike')->middleware('auth', 'verified');

Route::post('evaluar', [EvaluacionController::class, 'evaluar'])->name('evaluar')->middleware('auth', 'verified');

Route::post('criticar', [CriticaController::class, 'criticar'])->name('criticar')->middleware('auth', 'verified');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



// TODO fallo en el bloque de criticas, ej. EL PADRINO 2
// TODO tener en cuenta que si una persona accede con google y te intentas registrar con una cuenta estandar con ese mismo correo, el formulario de registro no deja. Pero quizas en la pagina de usuario se debería permitir asignar una contraseña.
// TODO otra situacion es la inversa: estar registrado con una cuenta standard e intentar loguearse con google con el mismo email. Como controlar eso? Por ahora hay un dd(e->getMessage())
// TODO eventserviceprovider event envio mail registros puede ser util?
// TODO event en RegisteredUserController, implementar para algo
// TODO borrar cuenta/editar contraseña con cuenta de redes sociales???
// TODO 'route model binding' para las rutas de obra
// TODO rutas agrupadas por bloques
// TODO rediseño rutas ej. una ruta para poner crítica otra para modificarla
// TODO chequear consultas & inyección de dependencias (service container)
// TODO sección de la web: listas propias/usuarios
// TODO honeypot (tallpad)
// TODO evaluación/criticas en el perfil de usuario
// TODO podcast en el permanent layout
// TODO avatar de usuario, completar las posibilidades de edición de datos personales en pagina de usuario
// TODO sección fotos de pelicula
// TODO roles para los gestores en una posible futura sección de gestion de datos
// TODO notificaciones de algún tipo?? likes? criticas? estudiar (bootcamp ojear codigo)
// TODO policies para las modificaciones (bootcamp ojear codigo)
// TODO api de cines? hay algo?
// TODO error 404 y otras paginas de error mejorar configuración
// TODO mail, documentación al final de bootcamp
// TODO despliegue? posibilidades
// TODO ordenamiento: de críticas, otros ordenamientos para obras...
// TODO buscador mejorar: paginación, mensajes con los resultados...
// TODO session bbdd driver, tabla con almacenamiento de sesiones
// TODO pop ups para el logueo, registro, likes...
// TODO corregir tooltip en titulos componente Poster.vue
// TODO codigo ficha valoraciones, solucionar
// TODO aplicar video optimización de código de favoritos
