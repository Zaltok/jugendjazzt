@extends('admin.layouts.admin')

@section('title', __('views.admin.users.show.title', ['name' => $user->Vorname]))

@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>


            <tr>
                <th>Name:</th>
                <td>{{ $user->Vorname }} {{ $user->Nachname }}</td>
            </tr>

            <tr>
                <th>Alter</th>
                <td>
                    {{$user->Alter}}
                </td>
            </tr>
            <tr>
                <th>Instrument</th>
                <td>
                    {{$user->Instrument1}}<br />
                    seit {{$user->Instrument1Seit}} Jahren<br/>
                    Unterricht {{$user->Instrument1Unt}} Jahren<br/>
                </td>
            </tr>

            <tr>
                <th>{{ __('views.admin.users.show.table_header_6') }}</th>
                <td>{{ $user->created_at }} ({{ $user->created_at->diffForHumans() }})</td>
            </tr>

            <tr>
                <th>{{ __('views.admin.users.show.table_header_7') }}</th>
                <td>{{ $user->updated_at }} ({{ $user->updated_at->diffForHumans() }})</td>
            </tr>
            <tr>
                <th>Anmeldung</th>
                <td>
                    <p>
                    @if ($user->Angemeldet === 1)

                    @else
                        <a class="btn btn-success" href="/admin/teilnehmer/anmelden/{{$user->id}}">Anmelden</a>
                        <!-- ausblenden wenn bezahlt -->
                    @endif
                    </p>
                    <p>
                    @if ($user->Bezahlt === 1 || $user->Helfer === 1)

                    @else
                        <a class="btn btn-success" href="/admin/teilnehmer/helfer/{{$user->id}}">Helfer</a>
                        <a class="btn btn-success" href="/admin/teilnehmer/bezahlen/{{$user->id}}">Bezahlen</a>
                        <!-- ausblenden wenn bezahlt -->
                    @endif
                    </p><p>
                        @if ($user->Alter >= 18 || $user->BescheinigungErhalten === 1)

                        @else
                            <a class="btn btn-success" href="/admin/teilnehmer/bescheinigung/{{$user->id}}">Bescheinigung erhalten</a>

                        @endif
                    </p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection