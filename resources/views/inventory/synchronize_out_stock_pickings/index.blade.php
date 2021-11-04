@extends('layouts.app')

@section('content')
    @push('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Synchronize In Stock Pickings</li>
    </ol>
    @endpush
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             synchronizeOutStockPickings
                             
                         </div>
                         {!! Form::open(['route' => 'inventory.synchronizeOutStockPickings.store']) !!}
                         <div class="card-body">                             
                             @include('inventory.synchronize_in_stock_pickings.table')                                                          
                              <div class="pull-right mr-3">
                                     
                              </div>
                         </div>
                         <div class="card-footer">
                            <!-- Submit Field -->
                            <div class="form-group col-sm-12 text-right">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                <a href="{{ route('inventory.synchronizeOutStockPickings.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                         {!! Form::close() !!}
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

