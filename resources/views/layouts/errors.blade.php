@if (count($errors))
	<div class="form-group">
		<div class="alert alert-danger">
			<ul style="list-style: none;">
				@foreach($errors->all() as $error)
					<li> {{ $error }} </li>
				@endforeach
			</ul>
		</div>
	</div>
@endif