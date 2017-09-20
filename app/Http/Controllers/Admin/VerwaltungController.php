<?php

namespace App\Http\Controllers\Admin;
use App\Teilnehmer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VerwaltungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Instrumental() {
        return view('admin.teilnehmer.index', ['teilnehmer' => Teilnehmer::get()]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Combo() {
        return view('admin.teilnehmer.index', ['teilnehmer' => Teilnehmer::get()]);
    }
}
