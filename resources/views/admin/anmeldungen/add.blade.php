@extends('admin.layouts.admin')

@section('title',"Anmeldung hinzufügen" )

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            {{ Form::open(['route'=>['admin.anmeldungerstellen'],'method' => 'put','class'=>'form-horizontal form-label-left']) }}
            <div class="form-group">
                <h3><label class="control-label col-md-3 col-sm-3 col-xs-12">Teilnehmer</label></h3>
            </div>
            <div class="form-group">

                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                    Vorname
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="name" type="text"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('Vorname')) parsley-error @endif"
                           name="Vorname" required >
                    @if($errors->has('Vorname'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('Vorname') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                    Nachname
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="name" type="text"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('Nachname')) parsley-error @endif"
                           name="Nachname" required>
                    @if($errors->has('Nachname'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('Nachname') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                    Geburtsdatum
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="Geburtsdatum" type="date"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('Geburtsdatum')) parsley-error @endif"
                           name="Geburtsdatum"

                    ">
                    @if($errors->has('Geburtsdatum'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('Geburtdatum') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                    PLZ
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="PLZ" type="text"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('PLZ')) parsley-error @endif"

                           name="PLZ"

                    >
                    @if($errors->has('PLZ'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('PLZ') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                    Ort
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="Ort" type="text"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('Ort')) parsley-error @endif"
                           name="Ort"

                    >
                    @if($errors->has('Ort'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('Ort') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                    Strasse
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="Strasse" type="text"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('Strasse')) parsley-error @endif"
                           name="Strasse"

                    >
                    @if($errors->has('Strasse'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('Strasse') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                    Telefon
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="Telefon" type="text"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('Telefon')) parsley-error @endif"
                           name="Telefon"

                    >
                    @if($errors->has('Telefon'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('Telefon') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                    Mobil
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="Mobil" type="text"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('Mobil')) parsley-error @endif"
                           name="Mobil"

                    >
                    @if($errors->has('Mobil'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('Mobil') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                    AG
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="AG" type="text"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('AG')) parsley-error @endif"
                           name="AG"


                    >
                    @if($errors->has('AG'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('AG') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                    Big Band Erfahrung
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="BigBand" type="number"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('BigBand')) parsley-error @endif"
                           name="BigBand"

                    >
                    @if($errors->has('BigBand'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('BigBand') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                    Combo/Band Erfahrung
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="Combo" type="number"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('Combo')) parsley-error @endif"
                           name="Combo"

                    >
                    @if($errors->has('Combo'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('Combo') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                    Übernachtung wie viele Personen?
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="uebernachtung" type="number"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('uebernachtung')) parsley-error @endif"
                           name="uebernachtung"



                    >
                    @if($errors->has('uebernachtung'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('uebernachtung') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <h3><label class="control-label col-md-3 col-sm-3 col-xs-12">Instrument 1</label></h3>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                    Instrument
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">

                    {!! Form::select('Instrument', $instrumente, null , array('class' => 'form-control col-md-7 col-xs-12 select2_group ', "required" => 1)) !!}
                    @if($errors->has('Instrument'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('Instrument') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                    seit wann
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="instrument_seit" type="number" min="2000" max="2017"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('instrument_seit')) parsley-error @endif"
                           name="instrument_seit"

                    >
                    @if($errors->has('instrument_seit'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('instrument_seit') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                    Unterricht seit wann
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="instrument_unt" type="number" min="2000" max="2017"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('instrument_unt')) parsley-error @endif"
                           name="instrument_unt"

                    >
                    @if($errors->has('instrument_unt'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('instrument_unt') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <h3><label class="control-label col-md-3 col-sm-3 col-xs-12">Instrument 2</label></h3>
            </div>
            <div class="form-group">
                <!-- todo Dropdown Menü -->
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                    Instrument 2
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::select('Instrument2', $instrumente, null, array('class' => 'form-control col-md-7 col-xs-12 select2_group ')) !!}
                    @if($errors->has('Instrument2'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('Instrument2') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                    seit wann
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="instrument2_seit" type="number" min="2000" max="2017"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('instrument2_seit')) parsley-error @endif"
                           name="instrument2_seit"

                    >
                    @if($errors->has('instrument2_seit'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('instrument2_seit') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                    Unterricht seit wann
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="instrument2_unt" type="number" min="2000" max="2017"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('instrument2_unt')) parsley-error @endif"
                           name="instrument2_unt"

                    >
                    @if($errors->has('instrument2_unt'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('instrument2_unt') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" class="btn btn-success"> Speichern</button>
                </div>
            </div>
            {{ Form::close() }}

        </div>
    </div>
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/users/edit.css')) }}
@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/users/edit.js')) }}
@endsection