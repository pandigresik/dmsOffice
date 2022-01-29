<div class="form-group row">
    {!! Form::hidden($prefixName.'[stateForm]', $stateForm) !!}    
    {!! Form::label('trip', __('models/tripEkspedisis.fields.trip').':', ['class' => 'col-md-4 col-form-label']) !!}    
    <div class="col-md-8">
        {!! Form::select($prefixName.'[trip_id]',$tripItems, null,['class' => 'form-control select2', 'required' =>
        'required']) !!}
    </div>
</div>

<!-- Price Field -->
<div class="form-group row">
    {!! Form::label('price', __('models/trips.fields.price').':', ['class' => 'col-md-4 col-form-label'])
    !!}
    <div class="col-md-8">
        {!! Form::text('price', null, ['class' => 'form-control inputmask', 'required' => 'required', 'data-unmask' =>
        1, 'data-optionmask' => json_encode(config('local.number.decimal'))]) !!}
    </div>
</div>

<!-- Origin Additional Price Field -->
<div class="form-group row">
    {!! Form::label('origin_additional_price', __('models/trips.fields.origin_additional_price').':', ['class'
    => 'col-md-4 col-form-label']) !!}
    <div class="col-md-8">
        {!! Form::text('origin_additional_price', null, ['class' => 'form-control inputmask', 'required' => 'required',
        'data-unmask' => 1, 'data-optionmask' => json_encode(config('local.number.decimal'))]) !!}
    </div>
</div>

<!-- Destination Additional Price Field -->
<div class="form-group row">
    {!! Form::label('destination_additional_price', __('models/trips.fields.destination_additional_price').':',
    ['class' => 'col-md-4 col-form-label']) !!}
    <div class="col-md-8">
        {!! Form::text('destination_additional_price', null, ['class' => 'form-control inputmask', 'required' =>
        'required', 'data-unmask' => 1, 'data-optionmask' => json_encode(config('local.number.decimal'))]) !!}
    </div>
</div>

<!-- Start Date Field -->
<div class="form-group row">
    {!! Form::label('start_date', __('models/productPrices.fields.start_date').':', ['class' => 'col-md-4
    col-form-label']) !!}
    <div class="col-md-8">
        {!! Form::text('start_date', null, ['class' => 'form-control datetime', 'required' => 'required'
        ,'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript')
        ]]),'id'=>'start_date']) !!}
    </div>
</div>
