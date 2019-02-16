@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.events.management') . ' | ' . trans('labels.backend.events.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.events.management') }}
        <small>{{ trans('labels.backend.events.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($events, ['route' => ['admin.events.update', $events->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-event']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.events.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.events.partials.events-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.events.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.events.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!--form-group-->
            </div><!--box-body-->
        </div><!--box box-success -->
    {{ Form::close() }}
@endsection
