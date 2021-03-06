    <tr>
        <td>
            {!! Form::select('account_move_line[account_id][]', $accountItems, $item->account_id ?? '', ['class' => 'form-control select2', 'required' =>
        'required', 'onchange' => 'setNameAccountLine(this)'], $accountOptionItems) !!}
        </td>
        <td>
            {!! Form::text('account_move_line[name][]', $item->name ?? '' , ['class' => 'form-control','maxlength' => 100, 'required' =>
        'required']) !!}
        </td>
        <td>
            {!! Form::text('account_move_line[description][]', $item->description ?? '', ['class' => 'form-control','maxlength' => 256, 'required' =>
        'required']) !!}
        </td>
        <td>
            {!! Form::text('account_move_line[debit][]', $item->debit ?? '0', ['class' => 'form-control inputmask', 'required' => 'required', 'data-unmask' =>
        1, 'data-optionmask' => json_encode(config('local.number.currency'))]) !!}
        </td>
        <td>
            {!! Form::text('account_move_line[credit][]', $item->credit ?? '0', ['class' => 'form-control inputmask', 'required' => 'required', 'data-unmask' =>
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
        function setNameAccountLine(elm){
            const _tr = $(elm).closest('tr')
            const _nameElm = _tr.find('input[name="account_move_line[name][]"]')
            _nameElm.val($(elm).find('option:selected').attr('name'))
        }

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