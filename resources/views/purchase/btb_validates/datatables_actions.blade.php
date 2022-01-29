{!! Form::open(['route' => ['purchase.btbValidates.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
<!--
    <a href="{{ route('purchase.btbValidates.show', $id) }}" class='btn btn-ghost-success'>
       <i class="fa fa-eye"></i>
    </a>
-->
    <a href="{{ route('purchase.btbValidates.edit', $id) }}" class='btn btn-ghost-info' title="update ekspedisi">
       <i class="fa fa-truck"></i>
    </a>

    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-ghost-danger',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
