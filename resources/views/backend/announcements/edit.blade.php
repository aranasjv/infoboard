@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.announcements.management') . ' | ' . trans('labels.backend.announcements.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.announcements.management') }}
        <small>{{ trans('labels.backend.announcements.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($announcements, ['route' => ['admin.announcements.update', $announcements->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-announcement']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.announcements.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.announcements.partials.announcements-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.announcements.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.announcements.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!--form-group-->
            </div><!--box-body-->
        </div><!--box box-success -->
    {{ Form::close() }}
@endsection
