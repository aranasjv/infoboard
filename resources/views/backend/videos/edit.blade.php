@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.videos.management') . ' | ' . trans('labels.backend.videos.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.videos.management') }}
        <small>{{ trans('labels.backend.videos.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($videos, ['route' => ['admin.videos.update', $videos->id], 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data', 'method' => 'PATCH', 'id' => 'edit-video']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.videos.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.videos.partials.videos-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.videos.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.videos.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!--form-group-->
            </div><!--box-body-->
        </div><!--box box-success -->
    {{ Form::close() }}
@endsection
