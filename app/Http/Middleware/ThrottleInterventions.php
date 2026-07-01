<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Cache\RateLimiter;
use Illuminate\Http\Request;

class ThrottleInterventions
{
    protected $limiter;
    
    public function __construct(RateLimiter $limiter)
    {
        $this->limiter = $limiter;
    }
    
    public function handle(Request $request, Closure $next)
    {
        // Limiter les créations d'interventions : 10 par minute par utilisateur
        if ($request->isMethod('post') || $request->isMethod('put')) {
            $key = 'create_intervention:' . auth()->id();
            
            if ($this->limiter->tooManyAttempts($key, 10)) {
                return back()->with('error', 'Trop de requêtes. Veuillez patienter.');
            }
            
            $this->limiter->hit($key, 60); // 60 secondes
        }
        
        return $next($request);
    }
}
