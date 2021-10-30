<!-- Dms Inv Carrier Id Field -->
<div class="form-group row">
    {!! Form::label('dms_inv_carrier_id', __('models/locationEkspedisis.fields.dms_inv_carrier_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $locationEkspedisi->dms_inv_carrier_id }}</p>
    </div>
</div>

<!-- Address Field -->
<div class="form-group row">
    {!! Form::label('address', __('models/locationEkspedisis.fields.address').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $locationEkspedisi->address }}</p>
    </div>
</div>

<!-- City Field -->
<div class="form-group row">
    {!! Form::label('city', __('models/locationEkspedisis.fields.city').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $locationEkspedisi->city }}</p>
    </div>
</div>

<!-- State Field -->
<div class="form-group row">
    {!! Form::label('state', __('models/locationEkspedisis.fields.state').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $locationEkspedisi->state }}</p>
    </div>
</div>

<!-- Additional Cost Field -->
<div class="form-group row">
    {!! Form::label('additional_cost', __('models/locationEkspedisis.fields.additional_cost').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $locationEkspedisi->additional_cost }}</p>
    </div>
</div>

