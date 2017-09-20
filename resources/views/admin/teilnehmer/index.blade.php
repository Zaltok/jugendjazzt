@extends('admin.layouts.admin')

@section('title', __('views.admin.users.index.title'))

@section('content')
    <div class="row">
        <p><a href="/admin/teilnehmer/hinzufuegen" class="btn btn-success" style="float:right;" >Teilnehmer hinzufügen</a></p>
        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>Angemeldet?</th>
                <th>Nachname</th>
                <th>Vorname</th>
                <th>Alter</th>
                <th>Instrument</th>
                <th></th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($teilnehmer as $user)
                <tr>
                    <td>
                        @if ($user->Angemeldet === 1)
                            <i class="fa fa-check" style="color:green; font-size: 16px;"> <span class="hidden">Ja</span></i>
                        @else
                            <i class="fa fa-close" style="color:red; font-size: 16px;"> <span class="hidden">Nein</span></i>
                        @endif</td>
                    <td>{{ $user->Vorname }}</td>
                    <td>{{ $user->Nachname }}</td>
                    <td>{{ $user->Alter }}</td>
                    <td>{{ $user->Instrument1 }}</td>
                    <td style="text-align: center;">
                        @if ($user->BescheinigungErhalten === 0 && $user->Alter < 18)
                            <i class="fa fa-warning" style="color:red; font-size: 20px;"><span class="hidden">Fehlt noch was!</span></i>
                        @else

                            <!-- ausblenden wenn bezahlt -->
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="{{ route('admin.teilnehmer.show', [$user->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.show') }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-xs btn-info" href="{{ route('admin.users.edit', [$user->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.edit') }}">
                            <i class="fa fa-pencil"></i>
                        </a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="pull-right">

        </div>
    </div>
@endsection