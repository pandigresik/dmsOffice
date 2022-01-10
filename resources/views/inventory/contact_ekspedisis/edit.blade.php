     <div class="">
          <div class="animated fadeIn">                
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::model($contactEkspedisi,['data-submitable' => 0]) !!}
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>@lang('crud.create')  @lang('models/contactEkspedisis.singular')</strong>
                            </div>
                            <div class="card-body">                                
                                   @include('inventory.contact_ekspedisis.fields')                                
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
            const _template = `@include('inventory.contact_ekspedisis.card')`
            const _form = $(elm).closest('form');
            if(_form.valid()){                                
                const _idForm = '{{ $idForm }}'
                const _divWrapper = $('.button-caller').closest('div').find('.content-info')
                const _json = _form.serializeJSON()['contactEkspedisis'][_idForm]
                _divWrapper.append(
                    _template.replace('{contactName}', _json['name'])
                            .replace('{contactPosition}', _json['position'])
                            .replace('{contactEmail}', _json['email'])
                            .replace('{contactMobile}', _json['mobile'])
                            .replace('{contactAddress}', _json['address'])
                            .replace('{contactCity}', _json['city'])                            
                            .replace('{contactForm}', main.generateFormField(`contactEkspedisis[${_idForm}]`, _json).join(''))
                )
                _form.closest('.bootbox').find('button.bootbox-close-button').click()
            }
        }        
    </script>
