<div class="animated fadeIn">
    @include('coreui-templates::common.errors')
    <div class="row">
        <div class="col-lg-12">
            {!! Form::open(['route' => 'purchase.invoices.store']) !!}
            <div class="card">                
                <div class="card-body">

                    @include('purchase.invoices.ekspedisi_fields')

                </div>
                <div class="card-footer">
                    <!-- Submit Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
                        <a href="{{ route('purchase.invoices.index') }}"
                            class="btn btn-default">@lang('crud.cancel')</a>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>