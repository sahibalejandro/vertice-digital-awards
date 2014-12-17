{{-- Name Field --}}
<div class="form-group">
    {{ Form::label('name', 'Name:', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        {{ Form::text('name', null, ['class' => 'form-control', 'maxlength' => 50]) }}
    </div>
</div>
{{-- /Name Field --}}

@if ($category)
{{-- Current image Field --}}
<div class="form-group">
    {{ Form::label('current_image', 'Current image:', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <img src="{{ $category->image('photo', 'thumb') }}" alt="{{{ $category->name }}}"/>
    </div>
</div>
{{-- /Current image Field --}}
@endif

{{-- Image Field --}}
<div class="form-group">
    {{ Form::label('photo_file', 'Image:', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        {{ Form::file('photo_file') }}
    </div>
</div>
{{-- /Image Field --}}

{{-- Submit button --}}
<div class="row">
    <div class="col-sm-3 col-sm-offset-2">
        {{ Form::submit('Save changes', ['class' => 'btn btn-primary']) }}
    </div>
</div>
{{-- /Submit button --}}
