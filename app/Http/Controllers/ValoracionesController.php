<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class ValoracionesController
{
    /**
     * Peticiones GET: carga inicial o enlaces de filtrado de la barra lateral
     * @return Response
     */
    public function cargarDatos(): Response
    {
        // Renderizamos & props
        return Inertia::render('Valoraciones');
    }
}
