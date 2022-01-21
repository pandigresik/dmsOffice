@extends('layouts.app')

@section('content')
    @push('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
      <li class="breadcrumb-item">
         <a href="{!! route('purchase.btbValidates.index') !!}">@lang('models/btbValidates.singular')</a>
      </li>
      <li class="breadcrumb-item active">@lang('crud.add_new')</li>
    </ol>
    @endpush
     <div class="container-fluid">
          <div class="animated fadeIn">
                @include('coreui-templates::common.errors')
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::open(['route' => 'purchase.btbValidates.store']) !!}
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>@lang('crud.create')  @lang('models/btbValidates.singular')</strong>
                            </div>
                            <div class="card-body">                   
                                <!-- Range Period Field -->
                                <div class="form-group row">
                                    {!! Form::label('period_range', __('models/btbValidates.fields.period_range').':', ['class' => 'col-md-2 col-form-label']) !!}
                                    <div class="col-md-4"> 
                                        {!! Form::text('period_range', null, ['class' => 'form-control datetime', 'data-optiondate' => json_encode( ['singleDatePicker' => false, 'locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'period_range']) !!}
                                    </div>
                                    <div class="clo-md-3 mr-2">
                                        {!! Form::select('branch_id', $branchItems, null, ['class' => 'form-control', 'required' => 'required']) !!}
                                    </div>
                                    <div class="clo-md-3">
                                        {!! Form::button(__('crud.process'), ['class' => 'btn btn-success', 'data-target' => '#listbtb', 'data-url' => route('purchase.btbValidates.create'), 'data-json' => '{}', 'data-ref' => 'input[name=period_range],select[name=branch_id]' ,'onclick' => 'main.loadDetailPage(this,\'get\')']) !!}
                                    </div>
                                </div>

                                <div class="">
                                    <div id="listbtb"></div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <!-- Submit Field -->
                                <div class="form-group col-sm-12">
                                    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
                                    <a href="{{ route('purchase.btbValidates.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}                        
                    </div>
                </div>
           </div>
    </div>
@endsection
@push('scripts')
<script type="text/javascript">
    
</script>
@endpush