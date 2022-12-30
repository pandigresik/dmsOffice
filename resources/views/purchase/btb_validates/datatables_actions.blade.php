{!! Form::open(['route' => ['purchase.btbValidates.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('purchase.btbValidates.edit', $id) }}" class='btn btn-ghost-info' title="update ekspedisi">
       <i class="fa fa-truck"></i>
    </a>
    @if (!$invoiced)
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-ghost-danger',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}    
    @endif
</div>
{!! Form::close() !!}
