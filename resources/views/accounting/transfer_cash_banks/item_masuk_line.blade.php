    <tr>
        <td>
            {!! Form::text('transfer_cash_bank_detail[no_reference][]', $item->no_reference ?? '' , ['class' => 'form-control','maxlength' => 100, 'required' =>
        'required']) !!}
        </td>
        <td>
            {!! Form::select('transfer_cash_bank_detail[account][]', $accountItems, $item->account ?? '', ['class' => 'form-control select2', 'required' =>
        'required']) !!}
        </td>        
        <td>
            {!! Form::text('transfer_cash_bank_detail[description][]', $item->description ?? '', ['class' => 'form-control','maxlength' => 256, 'required' =>
        'required']) !!}
        </td>        
        <td>
            {!! Form::text('transfer_cash_bank_detail[amount][]', $item->amount ?? '0', ['class' => 'form-control inputmask', 'required' => 'required', 'data-unmask' =>
        1, 'data-optionmask' => json_encode(config('local.number.currency'))]) !!}
        </td>
        <td>
            @if ($lastIndex)
                <button onclick="addRowSelect2(this)" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></button>
            @else
                <button onclick="removeRow(this)" class="btn btn-primary btn-sm"><i class="fa fa-minus"></i></button>
            @endif
            
        </td>
    </tr>