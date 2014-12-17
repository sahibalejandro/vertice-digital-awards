{{-- Kill Form --}}
{{ Form::open(['route' => ["admin.{$type}.destroy", $id], 'method' => 'delete', 'class' => 'form-micro']) }}
<button type="submit" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button>
{{ Form::close() }}
{{-- /Kill Form --}}
