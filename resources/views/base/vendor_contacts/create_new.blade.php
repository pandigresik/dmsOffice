     <div class="">
          <div class="animated fadeIn">                
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::open(['data-dontsubmit' => 1]) !!}
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>Create @lang('models/vendorContacts.singular')</strong>
                            </div>
                            <div class="card-body">                                
                                   @include('base.vendor_contacts.fields')                                
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
                // _dialog.find('form').submit(function(e){                    
                //     e.preventDefault()
                //     console.log('create card')
                //     return false                    
                // })
                main.initFormatInputWithoutValidate(_dialog)                
                const _defaultObjValidate = main.defaultValidateOption()                
                const _objValidateTmp = {
                    submitHandler: function (_form) {
                    // const _form = this.currentForm
                        $(_form).find('.inputmask').each(function () {
                            if ($(this).data('unmask')) {
                            // @ts-ignore
                            const _option = $(this).data('optionmask') || {}
                            let _unmaskedvalue = $(this).inputmask('unmaskedvalue')
                            if (_option.radixPoint === ',') {
                                _unmaskedvalue = _unmaskedvalue.replace(',', '.')
                            }
                            $(this).inputmask('remove')
                            $(this).val(_unmaskedvalue)
                            }
                        })                    

                        console.log('create-card')             
                    },        
                }                
                const _objValidate = {
                    ..._defaultObjValidate,
                    ..._objValidateTmp
                }
                _dialog.find('form').validate(_objValidate)
            }, 500)



        })
    </script>
