<div class="box-body">

    <div class="form-group">
        {{ Form::label('name', trans('Title'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('title', null, ['class' => 'form-control box-size', 'placeholder' => trans('Title'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('name', trans('Content'), ['class' => 'col-lg-2 control-label required']) }}

        {{ Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => trans('Content'), 'required' => 'required']) }}
    </div><!--col-lg-10-->
</div><!--form control-->

<div class="form-group">
    {{ Form::label('Start Date', trans('Start Date'), ['class' => 'col-lg-2 control-label required']) }}

    <div class="col-lg-10">
        @if(!empty($events->start_date))
            {{ Form::date('start_date', \Carbon\Carbon::parse($events->event_date)->format('m/d/Y'), ['class' => 'form-control datetimepicker1 box-size', 'placeholder' => trans('validation.attributes.backend.blogs.publish'), 'required' => 'required', 'id' => 'datetimepicker1']) }}
        @else
            {{ Form::date('start_date', null, ['class' => 'form-control datetimepicker1 box-size', 'placeholder' => trans('validation.attributes.backend.blogs.publish'), 'required' => 'required', 'id' => 'datetimepicker1']) }}
        @endif
    </div><!--col-lg-10-->
</div><!--form control-->

<div class="form-group">
    {{ Form::label('End Date', trans('End Date'), ['class' => 'col-lg-2 control-label required']) }}

    <div class="col-lg-10">
        @if(!empty($events->end_date))
            {{ Form::date('end_date', \Carbon\Carbon::parse($events->event_date)->format('m/d/Y'), ['class' => 'form-control datetimepicker1 box-size', 'placeholder' => trans('validation.attributes.backend.blogs.publish'), 'required' => 'required', 'id' => 'datetimepicker1']) }}
        @else
            {{ Form::date('end_date', null, ['class' => 'form-control datetimepicker1 box-size', 'placeholder' => trans('validation.attributes.backend.blogs.publish'), 'required' => 'required', 'id' => 'datetimepicker1']) }}
        @endif
    </div><!--col-lg-10-->
</div><!--form control-->

</div><!--box-body-->

@section("after-scripts")
    <script type="text/javascript">
        Backend.Event.selectors.GenerateSlugUrl = "{{route('admin.generate.slug')}}";
        Backend.Event.selectors.SlugUrl = "{{url('/')}}";
        Backend.Event.init();
    </script>
@endsection
