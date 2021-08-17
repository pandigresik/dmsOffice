{!! Form::open(['route' => ['inventory.stockInventories.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('inventory.stockInventories.show', $id) }}" class='btn btn-ghost-success'>
       <i class="fa fa-eye"></i>
    </a>    
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-ghost-danger',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
