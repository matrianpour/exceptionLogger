<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LogableException extends Exception
{
    public function report(): void
    {
    }
 
    public function render(Request $request, Exception $exception)
    {
        dd($request->fullUrl());
    //   $log = new DbLog;
    //   $log->user_id = Auth::user()->id;
    //   $log->action = $request->fullUrl();
    //   $log->exception = $exception;
    //   $log->save(); 
      return back()->with('error', 'Something Went Wrong.');
    }
}
