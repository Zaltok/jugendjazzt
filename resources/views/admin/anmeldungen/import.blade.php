@extends('admin.layouts.admin')

@section('title',"Teilnehmer Import" )

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            {{ Form::open(['route'=>['admin.anmeldung.import'],'method' => 'post','class'=>'form-horizontal form-label-left', 'files' => true]) }}

            <div class="form-group">
                {!! Form::label('CSV Datei') !!}
                {!! Form::file('File', null) !!}
            </div>

                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-success"> Import start </button>
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