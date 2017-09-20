<?php

namespace App\Http\Controllers\Admin;

use App\Anmeldung;
use App\Teilnehmer;
use App\Veranstaltung;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeilnehmerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.teilnehmer.index', ['teilnehmer' => Veranstaltung::find(1)->Anmeldungen()]);
    }

    public function AnmeldeBtn($id)
    {
        $anmeldung = Anmeldung::find($id);
        $anmeldung->angemeldet = true;
        $anmeldung->save();
        return back()->withInput();
    }

    public function BezahltBtn($id)
    {
        $anmeldung = Anmeldung::find($id);
        $anmeldung->bezahlt = true;
        $anmeldung->save();
        return back()->withInput();
    }

    public function HelferBtn($id)
    {
        $anmeldung = Anmeldung::find($id);
        $anmeldung->helfer = true;
        $anmeldung->save();
        return back();
    }

    public function BescheinigungBtn($id)
    {
        $anmeldung = Anmeldung::find($id);
        $anmeldung->elternerklaerung = true;
        $anmeldung->save();
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Add()
    {
        return view('admin.teilnehmer.add');
    }

    public function Import(Request $request)
    {
        $file = $request->File;

        $file_handle = fopen($file, 'r');
        $start = false;
        $ende = false;
        while (!feof($file_handle) && !$ende) {
            $line = fgetcsv($file_handle, 2056, ";");
            $teilnehmer = new Teilnehmer();
            $teilnehmer->Nachname = utf8_encode($line[4]);
            $teilnehmer->Vorname = utf8_encode($line[5]);
            $teilnehmer->Alter = $line[6];
            $teilnehmer->PLZ = str_split($line[21], 5)[0];
            $teilnehmer->Ort = str_split($line[21], 5)[0];
            $teilnehmer->Strasse = utf8_encode($line[20]);
            $teilnehmer->Telefon = $line[22];
            $teilnehmer->Mobil = " ";
            $teilnehmer->Instrument1 = $line[7];
            $teilnehmer->Instrument1Seit = (strlen($line[8]) > 0) ? $line[8] : 0;
            $teilnehmer->Instrument1Unt = (strlen($line[9]) > 0) ? $line[9] : 0;
            $teilnehmer->save();
        }

        fclose($file_handle);
        die();
        return redirect()->intended(route('admin.teilnehmer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ImportForm()
    {
        return view('admin.teilnehmer.import');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $teilnehmer = new Teilnehmer();
        $teilnehmer->Nachname = $request->get("Nachname");
        $teilnehmer->Vorname = $request->get("Vorname");
        $teilnehmer->Alter = $request->get("Alter");
        $teilnehmer->PLZ = 27283;
        $teilnehmer->Ort = "Verden";
        $teilnehmer->Strasse = "Heisterkamp 10";
        $teilnehmer->Telefon = "0123456";
        $teilnehmer->Mobil = "0123456";
        $teilnehmer->save();
        return redirect()->intended(route('admin.teilnehmer'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.teilnehmer.show', ['user' => $user = Teilnehmer::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
