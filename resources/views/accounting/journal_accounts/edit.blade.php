@extends('layouts.app')

@section('content')
    @push('breadcrumb')
        <ol class="breadcrumb border-0 m-0">
          <li class="breadcrumb-item">
             <a href="{!! route('accounting.journalAccounts.index') !!}">@lang('models/journalAccounts.singular')</a>
          </li>
          <li class="breadcrumb-item active">@lang('crud.edit')</li>
        </ol>
    @endpush
    <div class="container-fluid">
         <div class="animated fadeIn">
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                    {!! Form::model($journalAccount, ['route' => ['accounting.journalAccounts.update', $journalAccount->id], 'method' => 'patch']) !!}  
                      <div class="card">                          
                          <div class="card-header">
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>Edit @lang('models/journalAccounts.singular')</strong>
                          </div>
                          <div class="card-body">                              

                              @include('accounting.journal_accounts.fields')

                              
                            </div>
                          <div class="card-footer">
                          <!-- Submit Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
                                <a href="{{ route('accounting.journalAccounts.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
                            </div>
                          </div>                            
                      </div>                    
                    {!! Form::close() !!}  
                    </div>                    
                </div>
         </div>
    </div>
@endsection