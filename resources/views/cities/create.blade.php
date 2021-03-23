@extends('layouts.comport')

@section('content')
	
	<div>
		<div style="max-width: 500px;" class="mx-auto">
			<h3>Create City</h3>
			<form action="{{ route('cities.store') }}" method="POST">
				@csrf
				<div class="mt-3">
					<input type="text" name="title" placeholder="Title" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Title'" required class="single-input" value="{{ old('title') }}">
				</div>
				<div class="mt-3">
					<input type="text" name="sub_title" placeholder="Sub title" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Sub title'" class="single-input" value="{{ old('sub_title') }}">
				</div>
				<div class="mt-3">
					<div class="form-select">
						<select name="region_id" id="RegionId" placeholder="Region" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Region'" required>
							@foreach($regions as $region)
								<option value="{{ $region->id }}" {{ $region->id === old('region_id') ? 'selected' : '' }}>{{ $region->title }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="mt-3">
					<button type="submit" class="genric-btn primary circle arrow">Create</button>
				</div>
			</form>
		</div>
	</div>

@endsection