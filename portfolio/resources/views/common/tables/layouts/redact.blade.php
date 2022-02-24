{{-- 
$edit=view('tables.custom.redact',compact('path','item','edit'));
$del =view('tables.custom.redact',compact('path','item','del'));
 --}}
@switch($action)
@case('new')
	<form action="{{$path}}/create" method="GET">
		<button type="submit" class="redact-btn redact-new">
			<i class="fas fa-asterisk"></i>
		</button>
	</form>
@break
@case('edit')
			<form action="{{$path}}/{{$item->id}}/edit" method="GET">
				<button type="submit" class="redact-btn redact-edit">
					<i class="far fa-edit"></i>
				</button>
			</form>
@break
@case('del')
			<form action="{{$path}}/{{$item->id}}" method="POST">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value="DELETE">
				<button type="submit" class="redact-btn redact-del">
					<i class="far fa-trash-alt"></i>
				</button>
			</form>
@break
@case('id')
	<input type="hidden" name="id" value="{{$item->id}}">
@break
@default
@endswitch