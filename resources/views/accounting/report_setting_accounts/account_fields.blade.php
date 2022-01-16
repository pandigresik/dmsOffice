        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::select('', $accountItems, null, ['class' => 'form-control select2', 'data-placeholder'
                        => 'Pilih
                        COA'],$accounts->toArray() ) !!}
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-primary" onclick="addItemList(this)"><i
                                class="fa fa-plus"></i>
                            Item</button>
                    </div>
                </div>
                @php
                $reportSettingAccountAccount = isset($reportSettingAccount) ?
                $reportSettingAccount->details : [];
                @endphp
                <div id="account-block">
                    @foreach ($reportSettingAccountAccount as $item)
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" name="details[]" checked value="{{ $item->account_id }}"
                                class="form-check-input">
                            {{ $accounts[$item->account_id]->name ?? '' }} (
                            {{ $accounts[$item->account_id]->code ?? '' }}
                            )
                            <i style="cursor:pointer" class="fa fa-trash text-danger"
                                onclick="$(this).closest('div').remove()"></i>
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @push('scripts')
        <script>
            function addItemList(elm) {
                const _divRow = $(elm).closest('div.row')
                const _select = _divRow.find('select');
                const _selectedAccount = _select.val()
                const _accountBlock = $('#account-block')
                if (_.isEmpty(_selectedAccount)) {
                    main.alertDialog('Warning', 'Account belum dipilih')
                    return
                }

                if (_accountBlock.find('input[value=' + _selectedAccount + ']')
                    .length) {
                    main.alertDialog('Warning', 'Account sudah dipilih sebelumnya')
                    return
                }
                const _optionSelected = _select.find('option:selected')
                const _item = `
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" name="details[]" checked="" value="${_optionSelected.val()}" class="form-check-input">
                        ${_optionSelected.attr('name')} ( ${_optionSelected.attr('code')} )
                        <i style="cursor:pointer" class="fa fa-trash text-danger" onclick="$(this).closest('div').remove()"></i>
                    </label>
                </div>
            `
                $(_item).appendTo(_accountBlock)                
            }
        </script>
        @endpush