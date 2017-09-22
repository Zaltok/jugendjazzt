<?php

namespace App\Http\Controllers\Admin;

use App\InstrumentEinschaetzung;
use App\Teilnehmer;
use App\Veranstaltung;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Anmeldung;
use App\Instrument;

class VerwaltungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anmeldungen = Anmeldung::where("veranstaltung_id", 1)->get();

        return view('admin.anmeldungen.index', ['anmeldungen' => $anmeldungen]);
    }

    public function anmeldungCreate(Request $request)
    {
        $anmeldung = new Anmeldung();
        $teilnehmer = Teilnehmer::where("Nachname", $request->get("Nachname"))->where("Vorname", $request->get("Vorname"))->get();
        if ($teilnehmer->count() == 1) {
            $currentTeilnehmer = $teilnehmer->first();
        } else {
            $currentTeilnehmer = new Teilnehmer();
            $currentTeilnehmer->Nachname = $request->get("Nachname");
            $currentTeilnehmer->Vorname = $request->get("Vorname");
        }
        if ($request->get("Geburtsdatum") != null) {
            $currentTeilnehmer->Geburtstag = $request->get("Geburtsdatum");
        }
        if ($request->get("PLZ") != null) {
            $currentTeilnehmer->PLZ = $request->get("PLZ");
        }
        if ($request->get("Ort") != null) {
            $currentTeilnehmer->Ort = $request->get("Ort");
        }
        if ($request->get("Strasse") != null) {
            $currentTeilnehmer->Strasse = $request->get("Strasse");
        }
        if ($request->get("Telefon") != null) {
            $currentTeilnehmer->Telefon = $request->get("Telefon");
        }
        if ($request->get("Mobil") != null) {
            $currentTeilnehmer->Mobil = $request->get("Mobil");
        }
        if ($request->get("AG") != null) {
            $currentTeilnehmer->AGBB = $request->get("AG");
        }
        if ($request->get("BigBand") != null) {
            $currentTeilnehmer->bigband = $request->get("BigBand");
        }
        if ($request->get("Combo") != null) {
            $currentTeilnehmer->combo = $request->get("Combo");
        }
        $currentTeilnehmer->save();
        $anmeldung->Teilnehmer()->associate($currentTeilnehmer);
        $anmeldung->Veranstaltung()->associate(Veranstaltung::find(1));


        if($request->get("Instrument") > 0) {
            //Instrument 1 Speichern
            $hauptinstrument = Instrument::find($request->get("Instrument"))->get()->first();
            $ie = new InstrumentEinschaetzung();
            $ie->seit = $request->get("instrument_seit");
            $ie->unterricht_seit = $request->get("instrument_unt");
            $ie->Instrument()->associate($hauptinstrument);
            $ie->Teilnehmer()->associate($currentTeilnehmer);
            $ie->save();
            $hauptinstrument->InstrumentEinschaetzung()->save($ie);
            $anmeldung->Hauptinstrument()->associate($hauptinstrument);
        }

        //Instrument 2 Speichern
        if($request->get("Instrument2") > 0) {
            $zweitInstrument = Instrument::find($request->get("Instrument2"))->get()->first();
            $ie2 = new InstrumentEinschaetzung();
            $ie2->seit = $request->get("instrument2_seit");
            $ie2->unterricht_seit = $request->get("instrument2_unt");
            $ie2->Instrument()->associate($zweitInstrument);
            $ie2->Teilnehmer()->associate($currentTeilnehmer);
            $ie2->save();
            $zweitInstrument->InstrumentEinschaetzung()->save($ie2);
            $anmeldung->Zweitinstrument()->associate($zweitInstrument);
        }

        $anmeldung->save();
        exit();

    }

    public function anmeldungCreateForm()
    {
        $instrumente = Instrument::all()->sortBy('bezeichnung')->pluck('bezeichnung', 'id')->prepend('Bitte auswählen', '');
        return view('admin.anmeldungen.add',['instrumente' => $instrumente]);
    }


    public function Loeschen($id)
    {
        $anmeldung = Anmeldung::find($id);
        $anmeldung->deleted = true;
        $anmeldung->save();
        return back()->withInput();
    }

    public function Aktivieren($id)
    {
        $anmeldung = Anmeldung::find($id);
        $anmeldung->deleted = false;
        $anmeldung->save();
        return back()->withInput();
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Instrumental()
    {
        $anmeldungen = Anmeldung::where("veranstaltung_id", 1)->get();
        return view('admin.anmeldungen.instrumental', ['anmeldungen' => $anmeldungen]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Combo()
    {
        return view('admin.teilnehmer.index', ['teilnehmer' => Teilnehmer::get()]);
    }

    public function EditForm($id)
    {
        $anmeldung = Anmeldung::find($id);
        $teilnehmer = Teilnehmer::find($anmeldung->Teilnehmer->id);
        $hauptinstrument = $anmeldung->Hauptinstrument;
        $zweitInstrument = $anmeldung->Zweitinstrument;
        $hauptinstrument->Einschaetzung = $teilnehmer->InstrumentEinschaetzung()->where("instrument_id", $hauptinstrument->id)->get()->first();


        if ($zweitInstrument == null) {
            $zweitInstrument = new Instrument();
            $zweitInstrument->Einschaetzung = new InstrumentEinschaetzung();
        } else {
            $zweitInstrument->Einschaetzung = $teilnehmer->InstrumentEinschaetzung()->where("instrument_id", $zweitInstrument->id)->get()->first();
        }

        $instrumente = Instrument::all()->sortBy('bezeichnung')->pluck('bezeichnung', 'id')->prepend('Bitte auswählen', '');
        return view('admin.anmeldungen.edit', ['anmeldung' => $anmeldung = Anmeldung::find($id), 'hauptinstrument' => $hauptinstrument, 'zweitinstrument' => $zweitInstrument, 'instrumente' => $instrumente]);
    }

    public function Edit(Request $request)
    {
        $anmeldung = Anmeldung::find($request->get('id'));
        $teilnehmer = $anmeldung->Teilnehmer()->first();
        $teilnehmer->Geburtstag = ($teilnehmer->Geburtstag != $request->get("Geburtsdatum")) ? $request->get("Geburtsdatum") : $teilnehmer->Geburtstag;
        $teilnehmer->PLZ = ($teilnehmer->PLZ != $request->get("PLZ")) ? $request->get("PLZ") : $teilnehmer->PLZ;
        $teilnehmer->Ort = ($teilnehmer->Ort != $request->get("Ort")) ? $request->get("Ort") : $teilnehmer->Ort;
        $teilnehmer->Strasse = ($teilnehmer->Strasse != $request->get("Strasse")) ? $request->get("Strasse") : $teilnehmer->Strasse;
        $teilnehmer->Telefon = ($teilnehmer->Telefon != $request->get("Telefon")) ? $request->get("Telefon") : $teilnehmer->Telefon;
        $teilnehmer->Mobil = ($teilnehmer->Mobil != $request->get("Mobil")) ? $request->get("Mobil") : $teilnehmer->Mobil;
        $teilnehmer->AGBB = ($teilnehmer->AGBB != $request->get("AG")) ? $request->get("AG") : $teilnehmer->AGBB;
        $teilnehmer->bigband = ($teilnehmer->bigband != $request->get("BigBand")) ? $request->get("BigBand") : $teilnehmer->bigband;
        $teilnehmer->combo = ($teilnehmer->combo != $request->get("Combo")) ? $request->get("Combo") : $teilnehmer->combo;
        $anmeldung->uebernachtung = ($teilnehmer->uebernachtung != $request->get("uebernachtung") && strlen($request->get("uebernachtung")) > 0) ? $request->get("uebernachtung") : $teilnehmer->uebernachtung;
        $instrEin = $teilnehmer->InstrumentEinschaetzung()->where("instrument_id", $request->get("Instrument"))->first();
        if ($instrEin instanceof InstrumentEinschaetzung) {
            $instrEin->seit = $request->get("instrument_seit");
            $instrEin->unterricht_seit = $request->get("instrument_unt");
            $instrEin->save();
            $anmeldung->Hauptinstrument()->associate(Instrument::find($request->get("Instrument")));
        } else {
            if ($request->get("Instrument") > 0) {
                $instrEin = new InstrumentEinschaetzung();
                $instrEin->Instrument()->associate(Instrument::find($request->get("Instrument")));
                $instrEin->seit = $request->get("instrument_seit");
                $instrEin->unterricht_seit = $request->get("instrument_unt");
                $instrEin->Teilnehmer()->associate($teilnehmer);
                $instrEin->save();
                $anmeldung->Hauptinstrument()->associate(Instrument::find($request->get("Instrument")));
            }
        }
        $instrEin2 = $teilnehmer->InstrumentEinschaetzung()->where("instrument_id", $request->get("Instrument2"))->first();
        if ($instrEin2 instanceof InstrumentEinschaetzung) {
            $instrEin2->seit = $request->get("instrument2_seit");
            $instrEin2->unterricht_seit = $request->get("instrument2_unt");
            $instrEin2->save();
            $anmeldung->Zweitinstrument()->associate(Instrument::find($request->get("Instrument2")));
        } else {
            if ($request->get("Instrument2") > 0) {
                $instrEin2 = new InstrumentEinschaetzung();
                $instrEin2->Instrument()->associate(Instrument::find($request->get("Instrument2")));
                $instrEin2->seit = $request->get("instrument2_seit");
                $instrEin2->unterricht_seit = $request->get("instrument2_unt");
                $instrEin2->Teilnehmer()->associate($teilnehmer);
                $instrEin2->save();
                $anmeldung->Zweitinstrument()->associate(Instrument::find($request->get("Instrument2")));
            }
        }
        $teilnehmer->save();
        $anmeldung->save();
        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.anmeldungen.show', ['anmeldung' => $anmeldung = Anmeldung::find($id)]);
    }

    public function Import(Request $request)
    {
        $veranstaltung = Veranstaltung::find(1);
        $file = $request->File;

        $file_handle = fopen($file, 'r');
        $start = false;
        $ende = false;
        $teilnehmers = array();
        while (!feof($file_handle) && !$ende) {
            $anmeldung = new Anmeldung();
            $anmeldung->Veranstaltung()->associate($veranstaltung);
            $line = fgetcsv($file_handle, 2056, ";");
            if (strlen($line[0]) > 0) {

                $loadteilnehmer = Teilnehmer::where("Nachname", utf8_encode($line[4]))->where("Vorname", utf8_encode($line[5]))->get();

                if ($loadteilnehmer->count() == 1) {
                    $teilnehmer = $loadteilnehmer->first();
                    if ($veranstaltung->Anmeldungen()->where('teilnehmer_id', $teilnehmer->id)->get()->count() > 0) {
                        $anmeldung = $veranstaltung->Anmeldungen()->where('teilnehmer_id', $teilnehmer->id)->get()->first();

                    } else {
                        $anmeldung->Teilnehmer()->associate($teilnehmer);
                    }
                } else {
                    $teilnehmer = new Teilnehmer();
                    $anmeldung->Teilnehmer()->associate($teilnehmer);

                }
                $teilnehmer->Nachname = strlen($line[4]) > 0 ? utf8_encode($line[4]) : "";
                $teilnehmer->Vorname = strlen($line[5]) > 0 ? utf8_encode($line[5]) : "";
                $teilnehmer->Alter = strlen($line[6]) > 0 ? utf8_encode($line[6]) : 0;
                $teilnehmer->PLZ = strlen($line[21]) > 0 ? utf8_encode(str_split($line[21], 5)[0]) : "";
                $teilnehmer->Ort = strlen($line[21]) > 0 && count(explode(" ", $line[21])) > 1 ? utf8_encode(explode(" ", $line[21])[1]) : "";
                $teilnehmer->Strasse = strlen($line[20]) > 0 ? utf8_encode($line[20]) : "";
                $teilnehmer->Telefon = strlen($line[22]) > 0 ? utf8_encode($line[22]) : "";
                $teilnehmer->Mobil = strlen($line[23]) > 0 ? utf8_encode($line[23]) : "";
                $teilnehmer->Email = strlen($line[24]) > 0 ? utf8_encode($line[24]) : "";
                $teilnehmer->save();

                if (strlen($line[7]) > 0) {

                    $instr1 = Instrument::where("kuerzel", utf8_decode($line[7]))->get()->first();
                    if (!($instr1 instanceof Instrument)) {
                        $instr1 = new Instrument();
                        $instr1->kuerzel = utf8_decode($line[7]);
                        $instr1->bezeichnung = utf8_decode($line[7]);
                        $instr1->save();
                    }
                    $instr1 = Instrument::where("kuerzel", utf8_decode($line[7]))->get()->first();
                    $instr1E = InstrumentEinschaetzung::where("teilnehmer_id", $teilnehmer->id)->where("instrument_id", $instr1->id)->get();
                    $actualYear = date("Y");
                    if ($instr1E->count() == 0) {
                        $instr1E = new InstrumentEinschaetzung();
                        //$instr1E->Teilnehmer()->associate($teilnehmer);
                        $instr1E->Instrument()->associate($instr1);
                        $instr1E->seit = (strlen($line[8]) > 0) ? $actualYear - $line[8] : $actualYear;
                        $instr1E->unterricht_seit = (strlen($line[9]) > 0) ? $actualYear - $line[9] : $actualYear;

                        $instr1E->Teilnehmer()->associate($teilnehmer);
                        $instr1E->save();

                    } else {
                        $instr1E = $instr1E->first();
                        $instr1E->seit = (strlen($line[8]) > 0) ? $actualYear - $line[8] : $actualYear;
                        $instr1E->unterricht_seit = (strlen($line[9]) > 0) ? $actualYear - $line[9] : $actualYear;
                        $instr1E->save();
                    }
                    if (!($instr1E->Teilnehmer()->find($teilnehmer->id) instanceof Teilnehmer)) {
                        $instr1E->Teilnehmer()->associate($teilnehmer);

                    }
                    $anmeldung->Hauptinstrument()->associate($instr1);
                } else {
                    continue;
                }
                if (strlen($line[10]) > 0) {

                    $instr1 = Instrument::where("kuerzel", $line[10])->get()->first();
                    if (!($instr1 instanceof Instrument)) {
                        $instr1 = new Instrument();
                        $instr1->kuerzel = utf8_decode($line[10]);
                        $instr1->bezeichnung = utf8_decode($line[10]);
                        $instr1->save();
                    }
                    $instr1 = Instrument::where("kuerzel", utf8_decode($line[10]))->get()->first();
                    $instr1E = InstrumentEinschaetzung::where("teilnehmer_id", $teilnehmer->id)->where("instrument_id", $instr1->id)->get();
                    $actualYear = date("Y");
                    if ($instr1E->count() == 0) {
                        $instr1E = new InstrumentEinschaetzung();
                        //$instr1E->Teilnehmer()->associate($teilnehmer);
                        $instr1E->Instrument()->associate($instr1);
                        $instr1E->seit = (strlen($line[11]) > 0) ? $actualYear - $line[11] : $actualYear;
                        $instr1E->unterricht_seit = (strlen($line[12]) > 0) ? $actualYear - $line[12] : $actualYear;

                        $instr1E->Teilnehmer()->associate($teilnehmer);
                        $instr1E->save();

                    } else {
                        $instr1E = $instr1E->first();
                        $instr1E->seit = (strlen($line[11]) > 0) ? $actualYear - $line[11] : $actualYear;
                        $instr1E->unterricht_seit = (strlen($line[12]) > 0) ? $actualYear - $line[12] : $actualYear;
                        $instr1E->save();
                    }
                    if (!($instr1E->Teilnehmer()->find($teilnehmer->id) instanceof Teilnehmer)) {
                        $instr1E->Teilnehmer()->associate($teilnehmer);

                    }
                    $anmeldung->Zweitinstrument()->associate($instr1);
                }
                if ($anmeldung->Teilnehmer()->count() == 0) {
                    $anmeldung->Teilnehmer()->associate($teilnehmer);
                }
                $anmeldung->uebernachtung = ($line[25] > 0) ? $line[25] : 0;
                $anmeldung->bemerkung = (strlen($line[1]) > 0) ? $line[1] : "";
                $anmeldung->save();
                array_push($teilnehmers, $anmeldung);
            }
        }
        fclose($file_handle);
        return redirect()->intended(route('admin.anmeldungenuebersicht'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ImportForm()
    {
        return view('admin.anmeldungen.import');
    }
}
