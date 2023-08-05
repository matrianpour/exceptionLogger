<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FatalErrorProviderController extends Controller
{
    public function fatalErrorProvider()
    {
        return $this->undifinedFunction();
    }
}