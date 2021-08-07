<!-- Bookable Type Field -->
<div class="form-group">
    {!! Form::label('bookable_type', __('models/bookableAvailabilities.fields.bookable_type').':') !!}
    <p>{{ $bookableAvailabilities->bookable_type }}</p>
</div>

<!-- Bookable Id Field -->
<div class="form-group">
    {!! Form::label('bookable_id', __('models/bookableAvailabilities.fields.bookable_id').':') !!}
    <p>{{ $bookableAvailabilities->bookable_id }}</p>
</div>

<!-- Range Field -->
<div class="form-group">
    {!! Form::label('range', __('models/bookableAvailabilities.fields.range').':') !!}
    <p>{{ $bookableAvailabilities->range }}</p>
</div>

<!-- From Field -->
<div class="form-group">
    {!! Form::label('from', __('models/bookableAvailabilities.fields.from').':') !!}
    <p>{{ $bookableAvailabilities->from }}</p>
</div>

<!-- To Field -->
<div class="form-group">
    {!! Form::label('to', __('models/bookableAvailabilities.fields.to').':') !!}
    <p>{{ $bookableAvailabilities->to }}</p>
</div>

<!-- Is Bookable Field -->
<div class="form-group">
    {!! Form::label('is_bookable', __('models/bookableAvailabilities.fields.is_bookable').':') !!}
    <p>{{ $bookableAvailabilities->is_bookable }}</p>
</div>

<!-- Priority Field -->
<div class="form-group">
    {!! Form::label('priority', __('models/bookableAvailabilities.fields.priority').':') !!}
    <p>{{ $bookableAvailabilities->priority }}</p>
</div>

