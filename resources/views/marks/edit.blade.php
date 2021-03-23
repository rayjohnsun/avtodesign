@extends('layouts.comport')

@section('content')
	
	<div>
		<div style="max-width: 500px;" class="mx-auto">
			<h3>Update Mark: {{ $model->title }}</h3>
			<form action="{{ route('marks.update', $model->id) }}" method="POST">
				@csrf
				@method('PUT')
				<div class="mt-3">
					<input type="text" name="title" placeholder="Title" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Title'" required class="single-input" value="{{ $model->title }}">
				</div>
				<div class="mt-3">
					<input type="text" name="sub_title" placeholder="Sub title" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Sub title'" class="single-input" value="{{ $model->sub_title }}">
				</div>
				<div class="mt-3">
					<button type="submit" class="genric-btn primary circle arrow">Update</button>
				</div>
			</form>
		</div>
	</div>

@endsection