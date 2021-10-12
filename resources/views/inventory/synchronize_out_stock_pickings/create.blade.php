@extends('layouts.app')

@section('content')
    @push('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
      <li class="breadcrumb-item">
         <a href="{!! route('inventory.synchronizeOutStockPickings.index') !!}">Synchronize In Stock Picking</a>
      </li>
      <li class="breadcrumb-item active">Create</li>
    </ol>
    @endpush
     <div class="container-fluid">
          <div class="animated fadeIn">
                @include('coreui-templates::common.errors')
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::open(['route' => 'inventory.synchronizeOutStockPickings.store']) !!}
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>Create Synchronize In Stock Picking</strong>
                            </div>
                            <div class="card-body">                                

                                   @include('inventory.synchronize_in_stock_pickings.fields')
                                
                            </div>
                            <div class="card-footer">
                                <!-- Submit Field -->
                                <div class="form-group col-sm-12">
                                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                    <a href="{{ route('inventory.synchronizeOutStockPickings.index') }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>                    
                </div>
           </div>
    </div>
@endsection
