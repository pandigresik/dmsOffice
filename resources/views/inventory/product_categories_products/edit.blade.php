     <div class="">
          <div class="animated fadeIn">                
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::model($contactEkspedisi,['data-submitable' => 0]) !!}
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>Create @lang('models/productCategoriesProducts.singular')</strong>
                            </div>
                            <div class="card-body">                                
                                   @include('inventory.product_categories_products.fields')                                
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
            const _template = `@include('inventory.product_categories_products.card')`
            const _form = $(elm).closest('form');
            if(_form.valid()){                                
                const _idForm = '{{ $idForm }}'
                const _divWrapper = $('.button-caller').closest('div').find('.content-info')
                const _json = _form.serializeJSON()['productCategoriesProducts'][_idForm]
                const _optionSelected = _form.find('select option:selected').text().split(' | ')
                _divWrapper.append(
                    _template.replace('{productId}', _optionSelected[0])
                            .replace('{productName}', _optionSelected[1])
                            .replace('{productUom}', _optionSelected[2])                       
                            .replace('{contactForm}', main.generateFormField(`productCategoriesProducts[${_idForm}]`, _json).join(''))
                )
                _form.closest('.bootbox').find('button.bootbox-close-button').click()
            }
        }        
    </script>
