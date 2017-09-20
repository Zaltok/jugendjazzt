@extends('admin.layouts.admin')

@section('title', __('views.admin.users.index.title'))

@section('content')
    <div class="row">
        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>@sortablelink('bezeichnung', 'Bezeichnung')</th>
                <th>@sortablelink('jahr',  'Jahr')</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($veranstaltungen as $veranstaltung)
                <tr>
                    <td>{{ $veranstaltung->bezeichnung }}</td>
                    <td>{{ $veranstaltung->jahr }}</td>
                    <td>
                        <!--<a class="btn btn-xs btn-primary" href="{{ route('admin.users.show', [$veranstaltung->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.show') }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-xs btn-info" href="{{ route('admin.users.edit', [$veranstaltung->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.edit') }}">
                            <i class="fa fa-pencil"></i>
                        </a>-->
                        {{--@if(!$user->hasRole('administrator'))--}}
                            {{--<button class="btn btn-xs btn-danger user_destroy"--}}
                                    {{--data-url="{{ route('admin.users.destroy', [$user->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.delete') }}">--}}
                                {{--<i class="fa fa-trash"></i>--}}
                            {{--</button>--}}
                        {{--@endif--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

@endsection