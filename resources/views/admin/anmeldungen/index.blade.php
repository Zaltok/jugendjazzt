@extends('admin.layouts.admin')

@section('title', __('views.admin.users.index.title'))

@section('content')
    <div class="row">
        <p><a href="/admin/anmeldung/hinzufuegen" class="btn btn-success" style="float:right;">Anmeldung hinzufügen</a>
            <a href="/admin/anmeldung/import" class="btn btn-success" style="float:right;">Anmeldungen importieren</a>
        </p>
        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>Angemeldet?</th>
                <th>Vorname</th>
                <th>Nachname</th>
                <th>Alter</th>
                <th>Instrument</th>
                <th>Erklärung fehlt</th>
                <th>Helfer/Bezahlt</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($anmeldungen as $anmeldung)
                <tr @if($anmeldung->deleted == 1)style="background-color: #cccccc;"
                    @elseif($anmeldung->BandErhalten == 1) style="background-color:darkviolet; color:#ffffff;"@endif>
                    <td>
                        @if ($anmeldung->deleted == 1)
                            <i class="fa fa-ban" style="color:red; font-size: 16px;"> <span
                                        class="hidden">Abgesagt</span></i>
                        @elseif ($anmeldung->angemeldet == 1)
                            <i class="fa fa-check" style="color:green; font-size: 16px;"> <span class="hidden">Ja</span></i>
                        @else
                            <i class="fa fa-close" style="color:red; font-size: 16px;"> <span class="hidden">Nein</span></i>
                        @endif</td>

                    <td>{{ $anmeldung->Teilnehmer->Vorname }}</td>
                    <td>{{ $anmeldung->Teilnehmer->Nachname }}</td>
                    <td>{{ $anmeldung->Teilnehmer->Alter() }}</td>
                    <td>{{ $anmeldung->Hauptinstrument->kuerzel}}</td>
                    <td style="text-align: center;">
                        @if ($anmeldung->elternerklaerung == 1 || $anmeldung->Teilnehmer->Alter() >= 18)
                            <i class="fa fa-check" style="color:green; font-size: 20px;"><span
                                        class="hidden">Fehlt.</span></i>
                        @else
                            <i class="fa fa-warning" style="color:red; font-size: 20px;"><span class="hidden">Erklärung erhalten.</span></i>
                        @endif
                    </td>
                    <td style="text-align: center;">
                        @if ($anmeldung->helfer == 0 && $anmeldung->bezahlt == 0)
                            <i class="fa fa-question" style="color:red; font-size: 20px;"><span
                                        class="hidden">Fehlt!</span></i>
                        @elseif($anmeldung->helfer == 1)
                            <i class="fa fa-header" style="color:green; font-size: 20px;"><span
                                        class="hidden">Helfer</span></i>
                        @else
                            <i class="fa fa-euro" style="color:green; font-size: 20px;"><span
                                        class="hidden">Bezahlt</span></i>
                        @endif
                    </td>
                    <td>
                        @if($anmeldung->deleted != 1)
                            <a class="btn btn-xs btn-primary"
                               href="{{ route('admin.anmeldung.show', [$anmeldung->id]) }}"
                               data-toggle="tooltip" data-placement="top"
                               data-title="{{ __('views.admin.users.index.show') }}">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a class="btn btn-xs btn-primary"
                               href="{{ route('admin.anmeldung.bearbeiten', [$anmeldung->id]) }}"
                               data-toggle="tooltip" data-placement="top"
                               data-title="Bearbeiten" style="background-color:grey;">
                                <i class="fa fa-edit" style=""></i>
                            </a>
                            <a class="btn btn-xs btn-primary"
                               href="{{ route('admin.anmeldung.loeschen', [$anmeldung->id]) }}"
                               data-toggle="tooltip" data-placement="top"
                               data-title="Entfernen" style="background-color:red;">
                                <i class="fa fa-remove" style=""></i>
                            </a>
                            @if($anmeldung->BandErhalten == 0)
                                <a class="btn btn-xs btn-primary"
                                   href="{{ route('admin.anmeldung.banderhalten', [$anmeldung->id]) }}"
                                   data-toggle="tooltip" data-placement="top"
                                   data-title="Band ausgeben" style="background-color:darkviolet; color: #ffffff;">
                                    <i class="fa fa-music" style=""></i>
                                </a>
                            @endif
                        @else
                            <a class="btn btn-xs btn-primary"
                               href="{{ route('admin.anmeldung.aktivieren', [$anmeldung->id]) }}"
                               data-toggle="tooltip" data-placement="top"
                               data-title="Aktivieren" style="background-color:green;">
                                <i class="fa fa-check" style=""></i>
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="pull-right">

        </div>
    </div>
@endsection