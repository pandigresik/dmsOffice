<!-- Entity Id Field -->
<div class="form-group row">
    {!! Form::label('entity_id', __('models/ifrsReportingPeriods.fields.entity_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('entity_id', $entityItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>

<!-- Period Count Field -->
<div class="form-group row">
    {!! Form::label('period_count', __('models/ifrsReportingPeriods.fields.period_count').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('period_count', null, ['class' => 'form-control']) !!}
</div>
</div>

<!-- Status Field -->
<div class="form-group row">
    {!! Form::label('status', __('models/ifrsReportingPeriods.fields.status').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>
</div>

<!-- Calendar Year Field -->
<div class="form-group row">
    {!! Form::label('calendar_year', __('models/ifrsReportingPeriods.fields.calendar_year').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('calendar_year', null, ['class' => 'form-control datetime', 'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'calendar_year']) !!}
</div>
</div>

<!-- Destroyed At Field -->
<div class="form-group row">
    {!! Form::label('destroyed_at', __('models/ifrsReportingPeriods.fields.destroyed_at').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('destroyed_at', null, ['class' => 'form-control datetime', 'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'destroyed_at']) !!}
</div>
</div>

<!-- Closing Date Field -->
<div class="form-group row">
    {!! Form::label('closing_date', __('models/ifrsReportingPeriods.fields.closing_date').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('closing_date', null, ['class' => 'form-control datetime', 'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'closing_date']) !!}
</div>
</div>
