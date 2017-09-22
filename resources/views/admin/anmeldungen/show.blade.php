@extends('admin.layouts.admin')

@section('title', __('views.admin.users.show.title', ['name' => $anmeldung->Teilnehmer->Vorname]))

@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>


            <tr>
                <th>Name:</th>
                <td>{{ $anmeldung->Teilnehmer->Vorname }} {{ $anmeldung->Teilnehmer->Nachname }}</td>
            </tr>

            <tr>
                <th>Alter</th>
                <td>
                    {{$anmeldung->Teilnehmer->Alter()}}
                </td>
            </tr>


            <tr>
                <th>{{ __('views.admin.users.show.table_header_6') }}</th>
                <td>{{ $anmeldung->created_at }} ({{ $anmeldung->created_at->diffForHumans() }})</td>
            </tr>

            <tr>
                <th>{{ __('views.admin.users.show.table_header_7') }}</th>
                <td>{{ $anmeldung->updated_at }} ({{ $anmeldung->updated_at->diffForHumans() }})</td>
            </tr>
            <tr>
                <th>Anmeldung</th>
                <td>
                    <p>
                    @if ($anmeldung->angemeldet == 1)

                    @else
                        <a class="btn btn-success" href="/admin/anmeldung/anmelden/{{$anmeldung->id}}">Anmelden</a>
                        <!-- ausblenden wenn bezahlt -->
                    @endif
                    </p>
                    <p>
                    @if ($anmeldung->bezahlt == 1 || $anmeldung->helfer == 1)

                    @else
                        <a class="btn btn-success" href="/admin/anmeldung/helfer/{{$anmeldung->id}}">Helfer</a>
                        <a class="btn btn-success" href="/admin/anmeldung/bezahlen/{{$anmeldung->id}}">Bezahlen</a>
                        <!-- ausblenden wenn bezahlt -->
                    @endif
                    </p><p>
                        @if ($anmeldung->Teilnehmer->Alter() >= 18 || $anmeldung->elternerklaerung == 1)

                        @else
                            <a class="btn btn-success" href="/admin/anmeldung/bescheinigung/{{$anmeldung->id}}">Bescheinigung erhalten</a>

                        @endif
                    </p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection