<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/accountMoves.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountMove->name }}</p>
    </div>
</div>

<!-- Company Id Field -->
<div class="form-group row">
    {!! Form::label('company_id', __('models/accountMoves.fields.company_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountMove->company_id }}</p>
    </div>
</div>

<!-- Account Journal Id Field -->
<div class="form-group row">
    {!! Form::label('account_journal_id', __('models/accountMoves.fields.account_journal_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountMove->account_journal_id }}</p>
    </div>
</div>

<!-- Ref Field -->
<div class="form-group row">
    {!! Form::label('ref', __('models/accountMoves.fields.ref').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountMove->ref }}</p>
    </div>
</div>

<!-- Date Field -->
<div class="form-group row">
    {!! Form::label('date', __('models/accountMoves.fields.date').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountMove->date }}</p>
    </div>
</div>

<!-- State Field -->
<div class="form-group row">
    {!! Form::label('state', __('models/accountMoves.fields.state').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountMove->state }}</p>
    </div>
</div>

<!-- Amount Field -->
<div class="form-group row">
    {!! Form::label('amount', __('models/accountMoves.fields.amount').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountMove->amount }}</p>
    </div>
</div>

<!-- Move Type Field -->
<div class="form-group row">
    {!! Form::label('move_type', __('models/accountMoves.fields.move_type').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountMove->move_type }}</p>
    </div>
</div>

<!-- Narration Field -->
<div class="form-group row">
    {!! Form::label('narration', __('models/accountMoves.fields.narration').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountMove->narration }}</p>
    </div>
</div>

<!-- Stock Picking Id Field -->
<div class="form-group row">
    {!! Form::label('stock_picking_id', __('models/accountMoves.fields.stock_picking_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountMove->stock_picking_id }}</p>
    </div>
</div>

