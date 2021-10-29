<!-- Iid Field -->
<div class="form-group row">
    {!! Form::label('iId', __('models/dmsArDoccustomers.fields.iId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('iId', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Szdocid Field -->
<div class="form-group row">
    {!! Form::label('szDocId', __('models/dmsArDoccustomers.fields.szDocId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szDocId', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Dtmdoc Field -->
<div class="form-group row">
    {!! Form::label('dtmDoc', __('models/dmsArDoccustomers.fields.dtmDoc').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('dtmDoc', null, ['class' => 'form-control datetime', 'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'dtmDoc']) !!}
</div>
</div>

<!-- Szcustomerid Field -->
<div class="form-group row">
    {!! Form::label('szCustomerId', __('models/dmsArDoccustomers.fields.szCustomerId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szCustomerId', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Szname Field -->
<div class="form-group row">
    {!! Form::label('szName', __('models/dmsArDoccustomers.fields.szName').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szName', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Bnewcustomer Field -->
<div class="form-group row">
    {!! Form::label('bNewCustomer', __('models/dmsArDoccustomers.fields.bNewCustomer').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    <label class="checkbox-inline">
        {!! Form::hidden('bNewCustomer', 0) !!}
        {!! Form::checkbox('bNewCustomer', '1', null) !!}
    </label>
</div>
</div>


<!-- Szidcard Field -->
<div class="form-group row">
    {!! Form::label('szIDCard', __('models/dmsArDoccustomers.fields.szIDCard').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szIDCard', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Bhasdifferentcollectaddress Field -->
<div class="form-group row">
    {!! Form::label('bHasDifferentCollectAddress', __('models/dmsArDoccustomers.fields.bHasDifferentCollectAddress').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    <label class="checkbox-inline">
        {!! Form::hidden('bHasDifferentCollectAddress', 0) !!}
        {!! Form::checkbox('bHasDifferentCollectAddress', '1', null) !!}
    </label>
</div>
</div>


<!-- Intprintedcount Field -->
<div class="form-group row">
    {!! Form::label('intPrintedCount', __('models/dmsArDoccustomers.fields.intPrintedCount').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('intPrintedCount', null, ['class' => 'form-control']) !!}
</div>
</div>

<!-- Szbranchid Field -->
<div class="form-group row">
    {!! Form::label('szBranchId', __('models/dmsArDoccustomers.fields.szBranchId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szBranchId', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Szcompanyid Field -->
<div class="form-group row">
    {!! Form::label('szCompanyId', __('models/dmsArDoccustomers.fields.szCompanyId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szCompanyId', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Szdocstatus Field -->
<div class="form-group row">
    {!! Form::label('szDocStatus', __('models/dmsArDoccustomers.fields.szDocStatus').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szDocStatus', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Szhierarchyid Field -->
<div class="form-group row">
    {!! Form::label('szHierarchyId', __('models/dmsArDoccustomers.fields.szHierarchyId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szHierarchyId', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Szhierarchyfull Field -->
<div class="form-group row">
    {!! Form::label('szHierarchyFull', __('models/dmsArDoccustomers.fields.szHierarchyFull').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szHierarchyFull', null, ['class' => 'form-control','maxlength' => 1000,'maxlength' => 1000]) !!}
</div>
</div>

<!-- Szdocfupid Field -->
<div class="form-group row">
    {!! Form::label('szDocFUpId', __('models/dmsArDoccustomers.fields.szDocFUpId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szDocFUpId', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Szusercreatedid Field -->
<div class="form-group row">
    {!! Form::label('szUserCreatedId', __('models/dmsArDoccustomers.fields.szUserCreatedId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szUserCreatedId', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}
</div>
</div>

<!-- Szuserupdatedid Field -->
<div class="form-group row">
    {!! Form::label('szUserUpdatedId', __('models/dmsArDoccustomers.fields.szUserUpdatedId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szUserUpdatedId', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}
</div>
</div>

<!-- Dtmcreated Field -->
<div class="form-group row">
    {!! Form::label('dtmCreated', __('models/dmsArDoccustomers.fields.dtmCreated').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('dtmCreated', null, ['class' => 'form-control datetime', 'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'dtmCreated']) !!}
</div>
</div>

<!-- Dtmlastupdated Field -->
<div class="form-group row">
    {!! Form::label('dtmLastUpdated', __('models/dmsArDoccustomers.fields.dtmLastUpdated').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('dtmLastUpdated', null, ['class' => 'form-control datetime', 'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'dtmLastUpdated']) !!}
</div>
</div>
