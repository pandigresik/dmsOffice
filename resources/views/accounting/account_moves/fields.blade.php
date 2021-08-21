<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/accountMoves.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>
</div>

<!-- Company Id Field -->
<div class="form-group row">
    {!! Form::label('company_id', __('models/accountMoves.fields.company_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('company_id', $companyItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>

<!-- Account Journal Id Field -->
<div class="form-group row">
    {!! Form::label('account_journal_id', __('models/accountMoves.fields.account_journal_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('account_journal_id', $accountJournalItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>

<!-- Ref Field -->
<div class="form-group row">
    {!! Form::label('ref', __('models/accountMoves.fields.ref').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('ref', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Date Field -->
<div class="form-group row">
    {!! Form::label('date', __('models/accountMoves.fields.date').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('date', null, ['class' => 'form-control datetime', 'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'date']) !!}
</div>
</div>

<!-- State Field -->
<div class="form-group row">
    {!! Form::label('state', __('models/accountMoves.fields.state').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('state', null, ['class' => 'form-control','maxlength' => 10,'maxlength' => 10]) !!}
</div>
</div>

<!-- Amount Field -->
<div class="form-group row">
    {!! Form::label('amount', __('models/accountMoves.fields.amount').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('amount', null, ['class' => 'form-control']) !!}
</div>
</div>

<!-- Move Type Field -->
<div class="form-group row">
    {!! Form::label('move_type', __('models/accountMoves.fields.move_type').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('move_type', null, ['class' => 'form-control']) !!}
</div>
</div>

<!-- Narration Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('narration', __('models/accountMoves.fields.narration').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::textarea('narration', null, ['class' => 'form-control']) !!}
</div>
</div>

<!-- Stock Picking Id Field -->
<div class="form-group row">
    {!! Form::label('stock_picking_id', __('models/accountMoves.fields.stock_picking_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('stock_picking_id', $stockPickingItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>
