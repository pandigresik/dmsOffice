<!-- Grup Field -->
<div class="form-group">
    {!! Form::label('grup', __('models/resources.fields.grup').':') !!}
    <p>{{ $resources->grup }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/resources.fields.name').':') !!}
    <p>{{ $resources->name }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', __('models/resources.fields.description').':') !!}
    <p>{{ $resources->description }}</p>
</div>

<!-- Specification Field -->
<div class="form-group">
    {!! Form::label('specification', __('models/resources.fields.specification').':') !!}
    <p><ul><li>{!! implode('</li><li>',$resources->specification) !!}</li></ul></p>
</div>

