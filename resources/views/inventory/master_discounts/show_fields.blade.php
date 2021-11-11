<!-- Code Field -->
<div class="form-group row">
    {!! Form::label('code', __('models/masterDiscounts.fields.code').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $masterDiscount->code }}</p>
    </div>
</div>

<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/masterDiscounts.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $masterDiscount->name }}</p>
    </div>
</div>

<!-- Amount Value Field -->
<div class="form-group row">
    {!! Form::label('amount_value', __('models/masterDiscounts.fields.amount_value').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $masterDiscount->amount_value }}</p>
    </div>
</div>

<!-- Amount Procent Field -->
<div class="form-group row">
    {!! Form::label('amount_procent', __('models/masterDiscounts.fields.amount_procent').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $masterDiscount->amount_procent }}</p>
    </div>
</div>

<!-- Start Date Field -->
<div class="form-group row">
    {!! Form::label('start_date', __('models/masterDiscounts.fields.start_date').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $masterDiscount->start_date }}</p>
    </div>
</div>

<!-- End Date Field -->
<div class="form-group row">
    {!! Form::label('end_date', __('models/masterDiscounts.fields.end_date').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $masterDiscount->end_date }}</p>
    </div>
</div>

