<!-- Iid Field -->
<div class="form-group row">
    {!! Form::label('iId', __('models/dmsInvCarrierdrivers.fields.iId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('iId', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Szid Field -->
<div class="form-group row">
    {!! Form::label('szId', __('models/dmsInvCarrierdrivers.fields.szId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szId', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Intitemnumber Field -->
<div class="form-group row">
    {!! Form::label('intItemNumber', __('models/dmsInvCarrierdrivers.fields.intItemNumber').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('intItemNumber', null, ['class' => 'form-control']) !!}
</div>
</div>

<!-- Szdrivername Field -->
<div class="form-group row">
    {!! Form::label('szDriverName', __('models/dmsInvCarrierdrivers.fields.szDriverName').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szDriverName', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>
