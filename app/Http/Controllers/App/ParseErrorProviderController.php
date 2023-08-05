<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParseErrorProviderController extends Controller
{
    public function parseErrorProvider()
    {
        return 'This is a sample syntax error where the semicolon is missed.'
    }
}
