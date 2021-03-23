@extends('layouts.comport')

@section('content')
	
	<div>
		<div style="max-width: 500px;" class="mx-auto">
			<h3>Create Region</h3>
			<form action="{{ route('regions.store') }}" method="POST">
				@csrf
				<div class="mt-3">
					<input type="text" name="title" placeholder="Title" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Title'" required class="single-input" value="{{ old('title') }}">
				</div>
				<div class="mt-3">
					<input type="text" name="sub_title" placeholder="Sub title" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Sub title'" class="single-input" value="{{ old('sub_title') }}">
				</div>
				<div class="mt-3">
					<button type="submit" class="genric-btn primary circle arrow">Create</button>
				</div>
			</form>
		</div>
	</div>

@endsection