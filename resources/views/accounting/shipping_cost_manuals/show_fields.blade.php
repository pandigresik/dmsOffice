<!-- Number Field -->
<div class="form-group row">
    {!! Form::label('number', __('models/shippingCostManuals.fields.number').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $shippingCostManual->number }}</p>
    </div>
</div>

<!-- Origin Branch Id Field -->
<div class="form-group row">
    {!! Form::label('origin_branch_id', __('models/shippingCostManuals.fields.origin_branch_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $shippingCostManual->origin_branch_id }}</p>
    </div>
</div>

<!-- Destination Branch Id Field -->
<div class="form-group row">
    {!! Form::label('destination_branch_id', __('models/shippingCostManuals.fields.destination_branch_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $shippingCostManual->destination_branch_id }}</p>
    </div>
</div>

<!-- Carrier Id Field -->
<div class="form-group row">
    {!! Form::label('carrier_id', __('models/shippingCostManuals.fields.carrier_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $shippingCostManual->carrier_id }}</p>
    </div>
</div>

<!-- Date Field -->
<div class="form-group row">
    {!! Form::label('date', __('models/shippingCostManuals.fields.date').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $shippingCostManual->date }}</p>
    </div>
</div>

<!-- Do References Field -->
<div class="form-group row">
    {!! Form::label('do_references', __('models/shippingCostManuals.fields.do_references').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $shippingCostManual->do_references }}</p>
    </div>
</div>

<!-- Sj References Field -->
<div class="form-group row">
    {!! Form::label('sj_references', __('models/shippingCostManuals.fields.sj_references').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $shippingCostManual->sj_references }}</p>
    </div>
</div>

<!-- Amount Field -->
<div class="form-group row">
    {!! Form::label('amount', __('models/shippingCostManuals.fields.amount').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $shippingCostManual->amount }}</p>
    </div>
</div>

