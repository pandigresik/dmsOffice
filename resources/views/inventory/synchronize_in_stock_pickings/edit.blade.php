@extends('layouts.app')

@section('content')
    @push('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
          <li class="breadcrumb-item">
             <a href="{!! route('inventory.synchronizeInStockPickings.index') !!}">Synchronize In Stock Picking</a>
          </li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
    @endpush
    <div class="container-fluid">
         <div class="animated fadeIn">
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                    {!! Form::model($synchronizeInStockPicking, ['route' => ['inventory.synchronizeInStockPickings.update', $synchronizeInStockPicking->id], 'method' => 'patch']) !!}
                      <div class="card">                            
                          <div class="card-header">
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>Edit Synchronize In Stock Picking</strong>
                          </div>
                          <div class="card-body">                              

                              @include('inventory.synchronize_in_stock_pickings.fields')

                              
                          </div>
                          <div class="card-footer">
                            <!-- Submit Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                <a href="{{ route('inventory.synchronizeInStockPickings.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                          </div>                          
                        </div>
                        {!! Form::close() !!}
                    </div>                    
                </div>
         </div>
    </div>
@endsection