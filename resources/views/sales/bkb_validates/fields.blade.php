<!-- Doc Id Field -->
<div class="form-group row">
    {!! Form::label('doc_id', __('models/bkbValidates.fields.doc_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('doc_id', $docItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>

<!-- Dms Ar Customer Id Field -->
<div class="form-group row">
    {!! Form::label('dms_ar_customer_id', __('models/bkbValidates.fields.dms_ar_customer_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('dms_ar_customer_id', $dmsArCustomerItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>

<!-- Dms Pi Employee Id Field -->
<div class="form-group row">
    {!! Form::label('dms_pi_employee_id', __('models/bkbValidates.fields.dms_pi_employee_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('dms_pi_employee_id', $dmsPiEmployeeItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>

<!-- Disc Principle Sales Field -->
<div class="form-group row">
    {!! Form::label('disc_principle_sales', __('models/bkbValidates.fields.disc_principle_sales').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('disc_principle_sales', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Disc Distributor Sales Field -->
<div class="form-group row">
    {!! Form::label('disc_distributor_sales', __('models/bkbValidates.fields.disc_distributor_sales').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('disc_distributor_sales', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Disc Principle Dms Field -->
<div class="form-group row">
    {!! Form::label('disc_principle_dms', __('models/bkbValidates.fields.disc_principle_dms').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('disc_principle_dms', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Disc Distributor Dms Field -->
<div class="form-group row">
    {!! Form::label('disc_distributor_dms', __('models/bkbValidates.fields.disc_distributor_dms').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('disc_distributor_dms', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Invoiced Field -->
<div class="form-group row">
    {!! Form::label('invoiced', __('models/bkbValidates.fields.invoiced').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    <label class="checkbox-inline">
        {!! Form::hidden('invoiced', 0) !!}
        {!! Form::checkbox('invoiced', '1', null) !!}
    </label>
</div>
</div>

