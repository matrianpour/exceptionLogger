<?php

namespace App\Exceptions;

use App\Models\LoggableException;
use Closure;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $this->reportable(function (Throwable $exception) {
           
        });
        
        $this->renderable(function (Throwable $exception, Request $request) {
            
            if(Auth::check()) {
                
                $loggableException = LoggableException::create([
                    'user_id' => auth()->user()->getAuthIdentifier(),
                    'tracking_code' => LoggableException::generateUniqueTrackingCode(),
                    'request' => $exception
                ]);
                
                $trackingCode = $loggableException->tracking_code;
                
                return response()->view('errors.general-exception', ['trackingCode' => $trackingCode],  200 );
            }
            
        });
    }
}
