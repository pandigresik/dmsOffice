<!-- Iid Field -->
<div class="form-group row">
    {!! Form::label('iId', __('models/dmsInvWarehouses.fields.iId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('iId', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Szid Field -->
<div class="form-group row">
    {!! Form::label('szId', __('models/dmsInvWarehouses.fields.szId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szId', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Szname Field -->
<div class="form-group row">
    {!! Form::label('szName', __('models/dmsInvWarehouses.fields.szName').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szName', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Szdescription Field -->
<div class="form-group row">
    {!! Form::label('szDescription', __('models/dmsInvWarehouses.fields.szDescription').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szDescription', null, ['class' => 'form-control','maxlength' => 200,'maxlength' => 200]) !!}
</div>
</div>

<!-- Szbranchid Field -->
<div class="form-group row">
    {!! Form::label('szBranchId', __('models/dmsInvWarehouses.fields.szBranchId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szBranchId', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Ballowforsalestransaction Field -->
<div class="form-group row">
    {!! Form::label('bAllowForSalesTransaction', __('models/dmsInvWarehouses.fields.bAllowForSalesTransaction').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    <label class="checkbox-inline">
        {!! Form::hidden('bAllowForSalesTransaction', 0) !!}
        {!! Form::checkbox('bAllowForSalesTransaction', '1', null) !!}
    </label>
</div>
</div>


<!-- Szusercreatedid Field -->
<div class="form-group row">
    {!! Form::label('szUserCreatedId', __('models/dmsInvWarehouses.fields.szUserCreatedId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szUserCreatedId', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}
</div>
</div>

<!-- Szuserupdatedid Field -->
<div class="form-group row">
    {!! Form::label('szUserUpdatedId', __('models/dmsInvWarehouses.fields.szUserUpdatedId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szUserUpdatedId', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}
</div>
</div>

<!-- Dtmcreated Field -->
<div class="form-group row">
    {!! Form::label('dtmCreated', __('models/dmsInvWarehouses.fields.dtmCreated').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('dtmCreated', null, ['class' => 'form-control datetime', 'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'dtmCreated']) !!}
</div>
</div>

<!-- Dtmlastupdated Field -->
<div class="form-group row">
    {!! Form::label('dtmLastUpdated', __('models/dmsInvWarehouses.fields.dtmLastUpdated').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('dtmLastUpdated', null, ['class' => 'form-control datetime', 'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'dtmLastUpdated']) !!}
</div>
</div>
