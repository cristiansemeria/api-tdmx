<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckOrigin
{
    /**
     * Handle an incoming request.
     *
     *
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Define un arreglo con los orígenes permitidos
        $allowedOrigins = [
            'http://tudestinomexico.test',
            'https://tudestinomx.com',
            'https://test.tudestinomx.com',
            // agrega más URLs que quieras permitir
        ];

        // Obtener el header Origin o Referer
        $origin = $request->header('Origin') ?? $request->header('Referer');

        // Si existe el origin, verifica que esté en la lista de permitidos
        if ($origin && !collect($allowedOrigins)->contains(fn($allowedOrigin) => str_contains($origin, $allowedOrigin))) {
            return response()->json(['message' => 'Origin not allowed'], 403);
        }

        return $next($request);
    }
}
