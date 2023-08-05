<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoggableException;
use Illuminate\Contracts\Support\Renderable;


class ExeptionController extends Controller
{
    public function index(): Renderable
    {
        $exceptions = LoggableException::paginate(10);
        return view('admin.exceptions.index', compact('exceptions'));
    }

    public function show(int $trackingCode): Renderable
    {
        $exception = LoggableException::findByTrackingCode($trackingCode);
        return view('admin.exceptions.show', compact('exception'));
    }
}
