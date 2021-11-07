@extends('layouts.app')

@section('content')
    @push('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
      <li class="breadcrumb-item">
         <a href="{!! route('synchronizes.index') !!}">@lang('models/synchronizes.singular')</a>
      </li>
      <li class="breadcrumb-item active">@lang('crud.add_new')</li>
    </ol>
    @endpush
     <div class="container-fluid">
          <div class="animated fadeIn">
                @include('coreui-templates::common.errors')
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::open(['route' => 'synchronizes.store', 'data-submitable' => 0]) !!}
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>Create @lang('models/synchronizes.singular')</strong>
                            </div>
                            <div class="card-body">                                

                                   @include('synchronizes.fields')
                                
                            </div>
                            <div class="card-footer">
                                <!-- Submit Field -->
                                <div class="form-group col-sm-12">
                                    {!! Form::submit(__('crud.sync'), ['class' => 'btn btn-primary', 'onclick' => 'synchronize(this)']) !!}
                                    <a href="{{ route('synchronizes.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
           </div>
    </div>
@endsection

<script type="text/javascript">
    let intervalProgress;
    function synchronize(elm){
        const _form = $(elm).closest('form')
        const _url = _form.attr('action')
        $(elm).prop('disabled',1)
        $.post(_url,{},function(data){
            
        })
        intervalProgress = setInterval(() => {
            updateProgressBar()    
        }, 4000);        
    }
    function updateProgressBar(){
        const _url = '{{ route('synchronizes.progress') }}'
        let _caches = []
        let _progress = 0
        const _minWidthProgress = 2
        $.ajax({
            url: _url,
            data: {},
            dataType: 'json',
            type: 'get',
            beforeSend: function() {},
            success: function(data) {
                _caches = data.caches
                console.log(_caches);
                for(let i in _caches){                    
                    _progress = _caches[i]['progress']
                    console.log('progress' + _progress);
                    if(_progress > _minWidthProgress){
                        $('#progress_'+i).attr('aria-valuenow',_progress).css('width',_progress+'%').text(_progress+'%')
                    }
                }
                if(data.state == 'done'){
                    clearInterval(intervalProgress)
                    main.alertDialog('Info', 'Proses sinkronisasi berhasil', function(){
                        window.history.back();
                    })
                }
            },
            //async: false
        })        
    }
    
</script>
