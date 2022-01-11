        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Accounts</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                @php
                                    $reportSettingAccountAccount = isset($reportSettingAccount) ? $reportSettingAccount->details()->pluck('account_id','account_id') : []; 
                                @endphp                                
                                @forelse ($accounts as $index => $groupAccounts)
                                    <div class="col-md-3">
                                        <div class="card border-primary">
                                            <div class="card-header">
                                                <div class="">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" onclick="checkAll(this,'.card')">
                                                        {{ $index }}                                                        
                                                    </label>
                                                </div>                                            
                                            </div>
                                            <div class="card-body">
                                            @foreach ($groupAccounts as $item)
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" name="details[]" @if(isset($reportSettingAccountAccount[$item->id])) checked @endif value="{{ $item->id }}" class="form-check-input">
                                                        {{ $item->name }} ( {{ $item->code }} ) 
                                                        <i class="input-helper"></i>
                                                    </label>
                                                </div>
                                            @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    ----
                                @endforelse                 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function checkAll(elm, parent){
                const _checked = $(elm).is(':checked') ? 1 : 0                
                $(elm).closest(parent).find(':checkbox').not(elm).prop('checked', _checked)
            }
        </script>