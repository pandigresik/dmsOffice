<!-- Iid Field -->
<div class="form-group row">
    {!! Form::label('iId', __('models/dmsApSuppliers.fields.iId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('iId', null, ['class' => 'form-control','maxlength' => 50,'readonly' => 'readonly']) !!}
</div>
</div>

<!-- Szid Field -->
<div class="form-group row">
    {!! Form::label('szId', __('models/dmsApSuppliers.fields.szId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szId', null, ['class' => 'form-control','maxlength' => 50,'readonly' => 'readonly']) !!}
</div>
</div>

<!-- Szname Field -->
<div class="form-group row">
    {!! Form::label('szName', __('models/dmsApSuppliers.fields.szName').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szName', null, ['class' => 'form-control','maxlength' => 50,'readonly' => 'readonly']) !!}
</div>
</div>

<!-- Szdescription Field -->
<div class="form-group row">
    {!! Form::label('szDescription', __('models/dmsApSuppliers.fields.szDescription').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szDescription', null, ['class' => 'form-control','maxlength' => 200,'readonly' => 'readonly']) !!}
</div>
</div>