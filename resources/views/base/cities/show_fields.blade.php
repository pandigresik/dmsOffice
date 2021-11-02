<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/cities.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $city->name }}</p>
    </div>
</div>

<!-- Province Field -->
<div class="form-group row">
    {!! Form::label('province', __('models/cities.fields.province').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $city->province }}</p>
    </div>
</div>

