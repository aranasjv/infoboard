<div class="box-body">

    <div class="form-group">
        {{ Form::label('name', trans('Title'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('title', null, ['class' => 'form-control box-size', 'placeholder' => trans('Title'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('name', trans('Content'), ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
        {{ Form::textarea('content', null, ['class' => 'form-control box-size','rows' => 5, 'cols' => 5, 'placeholder' => trans('Content'), 'required' => 'required']) }}
    </div><!--col-lg-10-->
    </div><!--col-lg-10-->
</div><!--form control-->

</div><!--box-body-->

@section("after-scripts")
    <script type="text/javascript">
        Backend.Announcement.selectors.GenerateSlugUrl = "{{route('admin.generate.slug')}}";
        Backend.Announcement.selectors.SlugUrl = "{{url('/')}}";
        Backend.Announcement.init();
    </script>
@endsection
