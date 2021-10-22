     <div class="">
          <div class="animated fadeIn">                
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::open() !!}
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>Create @lang('models/vendorLocations.singular')</strong>
                            </div>
                            <div class="card-body">                                
                                   @include('base.vendor_locations.fields')                                
                            </div>
                            <div class="card-footer">
                                <!-- Submit Field -->
                                <div class="form-group col-sm-12">
                                    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
                                    <button type="button" onclick="$('button.bootbox-close-button').click()" class="btn btn-default">@lang('crud.cancel')</button>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
           </div>
    </div>
    <script type="text/javascript">
        $(function(){
            setTimeout(function () {
                const _dialog = $('.modal-dialog:visible')
                _dialog.addClass('modal-dialog-scrollable')
                main.initFormatInput(_dialog)
            }, 500)            
        })
    </script>
