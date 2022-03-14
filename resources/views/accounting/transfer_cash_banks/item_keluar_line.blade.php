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
            {!! Form::text('transfer_cash_bank_detail[pic][]', $item->pic ?? '', ['class' => 'form-control', 'required' =>
        'required']) !!}
        </td>        
        <td>
            {!! Form::text('transfer_cash_bank_detail[description][]', $item->description ?? '', ['class' => 'form-control','maxlength' => 256, 'required' =>
        'required']) !!}
        </td>        
        <td>
            {!! Form::text('transfer_cash_bank_detail[amount][]', $item->credit ?? '0', ['class' => 'form-control inputmask', 'required' => 'required', 'data-unmask' =>
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

@push('scripts')
    <script type="text/javascript">        
        function addRowSelect2(_elm){
            const _tr = $(_elm).closest('tr')
            _tr.find('select.select2').select2('destroy')
            main.addRow($(_elm), reinitSelect2 )
        }
        function reinitSelect2(_newTr){
            _newTr.find('.is-valid').removeClass('is-valid')
            main.initSelect(_newTr.closest('tbody'))
            _newTr.find('select,input').prop('required',1)
            main.initInputmask(_newTr)
        }
    </script>
@endpush