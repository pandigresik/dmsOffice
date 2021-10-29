<!-- Iid Field -->
<div class="form-group row">
    {!! Form::label('iId', __('models/dmsInvProductitemcategories.fields.iId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('iId', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Szid Field -->
<div class="form-group row">
    {!! Form::label('szId', __('models/dmsInvProductitemcategories.fields.szId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szId', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Intitemnumber Field -->
<div class="form-group row">
    {!! Form::label('intItemNumber', __('models/dmsInvProductitemcategories.fields.intItemNumber').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('intItemNumber', null, ['class' => 'form-control']) !!}
</div>
</div>

<!-- Szcategorytypeid Field -->
<div class="form-group row">
    {!! Form::label('szCategoryTypeId', __('models/dmsInvProductitemcategories.fields.szCategoryTypeId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szCategoryTypeId', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Szcategoryvalue Field -->
<div class="form-group row">
    {!! Form::label('szCategoryValue', __('models/dmsInvProductitemcategories.fields.szCategoryValue').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szCategoryValue', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>
