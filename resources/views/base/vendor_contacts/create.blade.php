     <div class="">
          <div class="animated fadeIn">                
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::open(['data-submitable' => 0]) !!}
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
                                    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary', 'onclick' => 'generateCard(this)']) !!}
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
        function generateCard(elm){
            const _template = `@include('base.vendor_contacts.card')`
            const _form = $(elm).closest('form');
            if(_form.valid()){                                
                const _idForm = '{{ $idForm }}'
                const _divWrapper = $('.button-caller').closest('div').find('.content-info')
                const _json = _form.serializeJSON()['vendorContact'][_idForm]
                _divWrapper.append(
                    _template.replace('{contactName}', _json['name'])
                            .replace('{contactPosition}', _json['position'])
                            .replace('{contactMobile}', _json['mobile'])
                            .replace('{contactTop}', _json['payment_term'])                        
                            .replace('{contactProgram}', _json['program'])
                            .replace('{contactForm}', main.generateFormField(`vendorContact[${_idForm}]`, _json).join(''))
                )
                _form.closest('.bootbox').find('button.bootbox-close-button').click()
            }
        }        
    </script>
