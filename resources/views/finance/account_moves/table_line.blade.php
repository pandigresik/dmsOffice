<table class="table table-bordered" id="table-account-line">
    <thead>
        <tr>
            <th>Account</th>
            <th>Nama Account</th>
            <th>Keterangan</th>
            <th>Debet</th>
            <th>Kredit</th>
            <th></th>
        </tr>
    </thead>
    <tbody onchange="updateSummaryBalance(this)">
        @if(isset($lines))
            @foreach ($lines as $item)
                @include('finance.account_moves.item_line', ['item' => $item])    
            @endforeach
        @else
            @include('finance.account_moves.item_line', ['item' => null])
        @endif        
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3">Jumlah</th>
            <th class="debet">{!! Form::text('', 0, ['class' => 'form-control inputmask', 'required' => 'required', 'readonly' => 'readonly', 'data-optionmask' => json_encode(config('local.number.currency'))]) !!}</th>
            <th class="credit">{!! Form::text('', 0, ['class' => 'form-control inputmask', 'required' => 'required', 'readonly' => 'readonly', 'data-optionmask' => json_encode(config('local.number.currency'))]) !!}</th>
        </tr>
    </tfoot>
</table>


@push('scripts')
    <script type="text/javascript">
        function updateSummaryBalance(_elm){
            const _table = $(_elm).closest('table')
            let _debet = 0, _credit = 0, _unmaskedvalue, _option
            $(_elm).find('input[name="account_move_line[debet][]"]').each(function(){
                _option = $(this).data('optionmask') || {}
                _unmaskedvalue = $(this).inputmask('unmaskedvalue')
                if (_option.radixPoint === ',') {
                    _unmaskedvalue = _unmaskedvalue.replace(',', '.')
                }
                _debet += parseInt(_unmaskedvalue)
            })

            _table.find('tfoot th.debet input').val(_debet)
            _table.find('tfoot th.debet input').trigger('change')

            $(_elm).find('input[name="account_move_line[credit][]"]').each(function(){
                _option = $(this).data('optionmask') || {}
                _unmaskedvalue = $(this).inputmask('unmaskedvalue')
                if (_option.radixPoint === ',') {
                    _unmaskedvalue = _unmaskedvalue.replace(',', '.')
                }
                _credit += parseInt(_unmaskedvalue)
            })

            _table.find('tfoot th.credit input').val(_credit)
            _table.find('tfoot th.credit input').trigger('change')

        }
    </script>
@endpush