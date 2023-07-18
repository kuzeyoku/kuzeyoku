<?php

namespace App\Http\Controllers;

use Jackiedo\DotenvEditor\Facades\DotenvEditor;

class SetupController extends Controller
{
    public function index()
    {
        $return = DotenvEditor::doSomething();

        dd(env("DB_DATABASE"));
        return view('setup');
    }
}
