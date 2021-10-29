<!-- Iid Field -->
<div class="form-group row">
    {!! Form::label('iId', __('models/dmsArCustomers.fields.iId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('iId', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Szid Field -->
<div class="form-group row">
    {!! Form::label('szId', __('models/dmsArCustomers.fields.szId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szId', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Szname Field -->
<div class="form-group row">
    {!! Form::label('szName', __('models/dmsArCustomers.fields.szName').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szName', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Szdescription Field -->
<div class="form-group row">
    {!! Form::label('szDescription', __('models/dmsArCustomers.fields.szDescription').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szDescription', null, ['class' => 'form-control','maxlength' => 200,'maxlength' => 200]) !!}
</div>
</div>

<!-- Szhierarchyid Field -->
<div class="form-group row">
    {!! Form::label('szHierarchyId', __('models/dmsArCustomers.fields.szHierarchyId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szHierarchyId', null, ['class' => 'form-control','maxlength' => 200,'maxlength' => 200]) !!}
</div>
</div>

<!-- Szhierarchyfull Field -->
<div class="form-group row">
    {!! Form::label('szHierarchyFull', __('models/dmsArCustomers.fields.szHierarchyFull').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szHierarchyFull', null, ['class' => 'form-control','maxlength' => 1000,'maxlength' => 1000]) !!}
</div>
</div>

<!-- Szidcard Field -->
<div class="form-group row">
    {!! Form::label('szIDCard', __('models/dmsArCustomers.fields.szIDCard').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szIDCard', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Bhasdifferentcollectaddress Field -->
<div class="form-group row">
    {!! Form::label('bHasDifferentCollectAddress', __('models/dmsArCustomers.fields.bHasDifferentCollectAddress').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    <label class="checkbox-inline">
        {!! Form::hidden('bHasDifferentCollectAddress', 0) !!}
        {!! Form::checkbox('bHasDifferentCollectAddress', '1', null) !!}
    </label>
</div>
</div>


<!-- Szcode Field -->
<div class="form-group row">
    {!! Form::label('szCode', __('models/dmsArCustomers.fields.szCode').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szCode', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Szusercreatedid Field -->
<div class="form-group row">
    {!! Form::label('szUserCreatedId', __('models/dmsArCustomers.fields.szUserCreatedId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szUserCreatedId', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}
</div>
</div>

<!-- Szuserupdatedid Field -->
<div class="form-group row">
    {!! Form::label('szUserUpdatedId', __('models/dmsArCustomers.fields.szUserUpdatedId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szUserUpdatedId', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}
</div>
</div>

<!-- Dtmcreated Field -->
<div class="form-group row">
    {!! Form::label('dtmCreated', __('models/dmsArCustomers.fields.dtmCreated').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('dtmCreated', null, ['class' => 'form-control datetime', 'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'dtmCreated']) !!}
</div>
</div>

<!-- Dtmlastupdated Field -->
<div class="form-group row">
    {!! Form::label('dtmLastUpdated', __('models/dmsArCustomers.fields.dtmLastUpdated').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('dtmLastUpdated', null, ['class' => 'form-control datetime', 'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'dtmLastUpdated']) !!}
</div>
</div>

<!-- Szmcoid Field -->
<div class="form-group row">
    {!! Form::label('szMCOId', __('models/dmsArCustomers.fields.szMCOId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szMCOId', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>