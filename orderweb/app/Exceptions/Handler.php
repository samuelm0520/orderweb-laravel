<?php

namespace App\Exceptions;

use App\Models\Activity;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\UnauthorizedException;
use Spatie\FlareClient\Http\Exceptions\NotFound;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    //captura una excepcion antes de pintar la vista
    public function render($request, Throwable $exception)
    {
        if($exception instanceof NotFoundHttpException)
        {
            if(Auth::check())
            {
               return response()->view('errors.404', [], 404);
            }
    
            return redirect()->route('auth.index');
        }
        
        if($exception instanceof UnauthorizedException)
        {
            if(Auth::check())
            {
               return response()->view('errors.403', [], 403);
            }
    
            return redirect()->route('auth.index');
        }

        return parent::render($request, $exception);
    }
    
}
