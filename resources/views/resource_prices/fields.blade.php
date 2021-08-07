<!-- Resource Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('resource_id', __('models/resourcePrices.fields.resource_id').':') !!}
    {!! Form::select('resource_id', $resourceItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', __('models/resourcePrices.fields.price').':') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('resourcePrices.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
