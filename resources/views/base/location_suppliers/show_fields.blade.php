<!-- Dms Ap Supplier Id Field -->
<div class="form-group row">
    {!! Form::label('dms_ap_supplier_id', __('models/locationSuppliers.fields.dms_ap_supplier_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $locationSupplier->dms_ap_supplier_id }}</p>
    </div>
</div>

<!-- Address Field -->
<div class="form-group row">
    {!! Form::label('address', __('models/locationSuppliers.fields.address').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $locationSupplier->address }}</p>
    </div>
</div>

<!-- City Field -->
<div class="form-group row">
    {!! Form::label('city', __('models/locationSuppliers.fields.city').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $locationSupplier->city }}</p>
    </div>
</div>

<!-- State Field -->
<div class="form-group row">
    {!! Form::label('state', __('models/locationSuppliers.fields.state').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $locationSupplier->state }}</p>
    </div>
</div>

<!-- Additional Cost Field -->
<div class="form-group row">
    {!! Form::label('additional_cost', __('models/locationSuppliers.fields.additional_cost').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $locationSupplier->additional_cost }}</p>
    </div>
</div>

