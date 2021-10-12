<!-- Entity Id Field -->
<div class="form-group row">
    {!! Form::label('entity_id', __('models/ifrsReportingPeriods.fields.entity_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $ifrsReportingPeriods->entity_id }}</p>
    </div>
</div>

<!-- Period Count Field -->
<div class="form-group row">
    {!! Form::label('period_count', __('models/ifrsReportingPeriods.fields.period_count').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $ifrsReportingPeriods->period_count }}</p>
    </div>
</div>

<!-- Status Field -->
<div class="form-group row">
    {!! Form::label('status', __('models/ifrsReportingPeriods.fields.status').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $ifrsReportingPeriods->status }}</p>
    </div>
</div>

<!-- Calendar Year Field -->
<div class="form-group row">
    {!! Form::label('calendar_year', __('models/ifrsReportingPeriods.fields.calendar_year').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $ifrsReportingPeriods->calendar_year }}</p>
    </div>
</div>

<!-- Destroyed At Field -->
<div class="form-group row">
    {!! Form::label('destroyed_at', __('models/ifrsReportingPeriods.fields.destroyed_at').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $ifrsReportingPeriods->destroyed_at }}</p>
    </div>
</div>

<!-- Closing Date Field -->
<div class="form-group row">
    {!! Form::label('closing_date', __('models/ifrsReportingPeriods.fields.closing_date').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $ifrsReportingPeriods->closing_date }}</p>
    </div>
</div>

