@extends('admin.layouts.admin')

@section('title', __('views.admin.users.index.title'))

@section('content')
    <div class="row">
        <div  style="width:49%">
        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>Vorname</th>
                <th>Nachname</th>
                <th>Alter</th>
                <th>Instrument</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($anmeldungen as $anmeldung)
                <tr>
                    <td>{{ $anmeldung->Teilnehmer->Vorname }}</td>
                    <td>{{ $anmeldung->Teilnehmer->Nachname }}</td>
                    <td>{{ $anmeldung->Teilnehmer->Alter() }}</td>
                    <td>{{ $anmeldung->Hauptinstrument->kuerzel}}</td>

                    <td>
                        <a class="btn btn-xs btn-primary" href="{{ route('admin.anmeldung.show', [$anmeldung->id]) }}"
                           data-toggle="tooltip" data-placement="top"
                           data-title="{{ __('views.admin.users.index.show') }}">
                            <i class="fa fa-eye"></i>
                        </a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
        <div style="display:block; width:47%; float:right;">
            {{ Form::open(['route'=>['admin.anmeldungerstellen'],'method' => 'put','class'=>'form-horizontal form-label-left']) }}
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" class="btn btn-success"> Speichern</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection