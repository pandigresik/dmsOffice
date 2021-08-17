<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/warehouses.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Internal Code Field -->
<div class="form-group row">
    {!! Form::label('internal_code', __('models/warehouses.fields.internal_code').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('internal_code', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Company Id Field -->
<div class="form-group row">
    {!! Form::label('company_id', __('models/warehouses.fields.company_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('company_id', $companyItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>
