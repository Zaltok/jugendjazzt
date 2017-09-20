<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Veranstaltung;

class VeranstaltungController extends Controller
{
    public function index() {
        return view('admin.veranstaltung.index', ['veranstaltungen' => Veranstaltung::get()]);
    }
}
