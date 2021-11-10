<!-- Szid Field -->
<div class="form-group row">
    {!! Form::label('szId', __('models/dmsInvCarriers.fields.szId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::text('szId', null, ['class' => 'form-control','maxlength' => 50,'readonly' => 'readonly']) !!}
</div>
</div>

<!-- Szname Field -->
<div class="form-group row">
    {!! Form::label('szName', __('models/dmsInvCarriers.fields.szName').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::text('szName', null, ['class' => 'form-control','maxlength' => 50,'readonly' => 'readonly']) !!}
</div>
</div>

<!-- Szdescription Field -->
<div class="form-group row">
    {!! Form::label('szDescription', __('models/dmsInvCarriers.fields.szDescription').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-6"> 
    {!! Form::text('szDescription', null, ['class' => 'form-control','maxlength' => 200,'readonly' => 'readonly']) !!}
</div>
</div>