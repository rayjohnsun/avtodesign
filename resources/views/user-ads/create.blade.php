@extends('layouts.comport')

@section('content')
	
	<div>
		<div style="max-width: 500px;" class="mx-auto">
			<h3>Create Ads</h3>
			<form action="{{ route('user-ads.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="mt-3">
					<div class="single-input">
						<input type="file" name="image" placeholder="Image" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Image'" required style="line-height: 20px;" accept="image/*">
					</div>
				</div>

				<div class="mt-3">
					<input type="text" name="title" placeholder="Title" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Title'" required class="single-input" value="{{ old('title') }}">
				</div>

				<div class="mt-3">
					<input type="text" name="description" placeholder="Description" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Description'" class="single-input" value="{{ old('description') }}">
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
					<div class="form-select">
						<select name="city_id" id="CityId" placeholder="City" onfocus="this.placeholder = ''" onblur="this.placeholder = 'City'">
						</select>
					</div>
				</div>

				<div class="mt-3">
					<div class="form-select">
						<select name="model_id" id="ModelId" placeholder="Model" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Model'" required>
							@foreach($carModels as $carModel)
								<option value="{{ $carModel->id }}" {{ $carModel->id === old('model_id') ? 'selected' : '' }}>{{ $carModel->title }}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="mt-3">
					<div class="form-select">
						<select name="mark_id" id="MarkId" placeholder="Mark" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mark'" required>
							@foreach($marks as $mark)
								<option value="{{ $mark->id }}" {{ $mark->id === old('mark_id') ? 'selected' : '' }}>{{ $mark->title }}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="mt-3" style="position: relative;">
					<div class="form-select">
						<select name="color_id" id="ColorId" placeholder="Color" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Color'" required>
							@foreach($colors as $color)
								<option value="{{ $color->id }}" data-color="{{ $color->color }}" {{ $color->id === old('color_id') ? 'selected' : '' }}>{{ $color->title }}</option>
							@endforeach
						</select>
					</div>
					<div id="ColorInputDiv" class="color-box" style="left: 100%;"></div>
				</div>

				<div class="mt-3">
					<input type="text" name="year" placeholder="Year" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Year'" required class="single-input" value="{{ old('year') }}">
				</div>

				<div class="mt-3">
					<input type="text" name="amount" placeholder="Amount" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Amount'" required class="single-input" value="{{ old('amount') }}">
				</div>

				<div class="mt-3">
					<div class="form-select">
						<select name="currency" id="CurrencyId" placeholder="Currency" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Currency'" required>
							@foreach(App\Models\Ads::$currencies as $curr)
								<option value="{{ $curr['value'] }}" {{ $curr['value'] === old('currency') ? 'selected' : '' }}>{{ $curr['text'] }} ({{ $curr['value'] }})</option>
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

@section('js-script')

	<script src="/js/ajax_request.js"></script>
	<script src="/js/ads_page.js"></script>

	<script>
		$(function() {

			let RegionId = $('#RegionId')
			let CityId = $('#CityId')

			AdsPage.generateCitiesForRegion(RegionId.val(), CityId, '{{ old("city_id") }}')
			RegionId.change(function () {
				AdsPage.generateCitiesForRegion($(this).val(), CityId)
			})

			let ColorId = $('#ColorId')
			let ColorInputDiv = $('#ColorInputDiv')

			AdsPage.generateColor(ColorId, ColorInputDiv)
			ColorId.change(function () {
				AdsPage.generateColor($(this), ColorInputDiv)
			})

		})
	</script>

@endsection