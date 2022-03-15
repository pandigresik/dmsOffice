<div class="container-fluid">
          <div class="animated fadeIn">
                @include('coreui-templates::common.errors')
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::open(['route' => 'accounting.transferCashBanks.store']) !!}
                        <div class="card">
                            
                            <div class="card-body">                                
                                   @include('accounting.transfer_cash_banks.fields', ['type' => 'KM'])
                                   <div class="table-responsive">
                                    @include('accounting.transfer_cash_banks.table_masuk_line')                                    
                                    </div>
                                   
                            </div>
                            <div class="card-footer">
                                <!-- Submit Field -->
                                <div class="form-group col-sm-12">
                                    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
                                    <a href="{{ route('accounting.transferCashBanks.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
           </div>
    </div>