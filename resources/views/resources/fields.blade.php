<!-- Grup Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grup', __('models/resources.fields.grup').':') !!}
    {!! Form::text('grup', null, ['class' => 'form-control','maxlength' => 30,'maxlength' => 30, 'required' => 'required']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/resources.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', __('models/resources.fields.description').':') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control editor']) !!}
</div>

<!-- Specification Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('specification', __('models/resources.fields.specification').':') !!}
    {!! Form::select('specification[]',$optionItems, array_keys($optionItems) , array_merge(['class' => 'form-control select2', 'multiple' => 'multiple'], ['data-optionselect' => json_encode(config('local.select2.tag'))] )) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('resources.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
