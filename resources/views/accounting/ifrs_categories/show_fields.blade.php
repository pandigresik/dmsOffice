<!-- Entity Id Field -->
<div class="form-group row">
    {!! Form::label('entity_id', __('models/ifrsCategories.fields.entity_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $ifrsCategories->entity_id }}</p>
    </div>
</div>

<!-- Category Type Field -->
<div class="form-group row">
    {!! Form::label('category_type', __('models/ifrsCategories.fields.category_type').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $ifrsCategories->category_type }}</p>
    </div>
</div>

<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/ifrsCategories.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $ifrsCategories->name }}</p>
    </div>
</div>

<!-- Destroyed At Field -->
<div class="form-group row">
    {!! Form::label('destroyed_at', __('models/ifrsCategories.fields.destroyed_at').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $ifrsCategories->destroyed_at }}</p>
    </div>
</div>

