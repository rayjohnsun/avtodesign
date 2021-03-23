@extends('layouts.comport')

@section('content')
	<div>
		<h3 class="mb-30 title_color">Ads</h3>
		<div class="button-group-area mb-3">
			<a href="{{ route('user-ads.create') }}" class="genric-btn primary radius">Create</a>
			<a href="{{ route('user-ads.index') }}" class="genric-btn info radius">Сбросить</a>
		</div>
		<div class="text-right">
			<form action="{{ route('user-ads.index') }}" method="GET">
				<div class="mb-3">
					<div class="d-inline-block">
						<input type="text" name="title" placeholder="Title" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Title'" class="single-input" value="{{ $params['title'] }}">
					</div>
					<div class="d-inline-block">
						<div class="form-select" style="width: 200px;">
							<select name="region_id" id="RegionId">
								<option value="">Region</option>
								@foreach($regions as $region)
									<option value="{{ $region->id }}" {{ ($region->id == $params['region_id']) ? 'selected' : '' }}>{{ $region->title }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="d-inline-block">
						<div class="form-select" style="width: 200px;">
							<select name="city_id" id="CityId"  placeholder="City"></select>
						</div>
					</div>
				</div>
				<div class="mb-3">
					<div class="d-inline-block">
						<input type="text" name="year" placeholder="Year" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Year'" class="single-input" value="{{ $params['year'] }}">
					</div>
					<div class="d-inline-block">
						<div class="form-select" style="width: 200px;">
							<select name="model_id" id="ModelId">
								<option value="">Model</option>
								@foreach($carModels as $carModel)
									<option value="{{ $carModel->id }}" {{ ($carModel->id == $params['model_id']) ? 'selected' : '' }}>{{ $carModel->title }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="d-inline-block">
						<div class="form-select" style="width: 200px;">
							<select name="mark_id" id="ModelId">
								<option value="">Mark</option>
								@foreach($marks as $mark)
									<option value="{{ $mark->id }}" {{ ($mark->id == $params['mark_id']) ? 'selected' : '' }}>{{ $mark->title }}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="mb-3">
					<div class="d-inline-block">
						<div class="form-select" style="width: 200px;">
							<select name="status" id="ModelId">
								<option value="-1">Status</option>
								@foreach(App\Models\Ads::$statuses as $st)
									<option value="{{ $st['value'] }}" {{ ($st['value'] == $params['status'] && $params['status'] > -1) ? 'selected' : '' }}>{{ $st['text'] }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="d-inline-block">
						<button type="submit" class="genric-btn primary-border arrow">Search</button>
					</div>
				</div>
			</form>
		</div>
		<br>
		<div class="progress-table-wrap">
			<table class="my-table">
				<thead class="">
					<tr>
						<th class="pl-4">#</th>
						<th class="pl-4">
							<a href="{{ route('user-ads.index', ['sort' => 'title', 'order' => ($sort === 'title' && $order === 'ASC') ? 0 : 1]) }}">Title 
								@if($sort === 'title')
									<i class="fa fa-long-arrow-{{ $order === 'ASC' ? 'down' : 'up' }}" aria-hidden="true"></i>
								@endif
							</a>
						</th>
						<th class="pl-4"> <span>Region</span> </th>
						<th class="pl-4"> <span>City</span> </th>
						<th class="pl-4"> <span>Model</span> </th>
						<th class="pl-4"> <span>Mark</span> </th>
						<th class="pl-4">
							<a href="{{ route('user-ads.index', ['sort' => 'year', 'order' => ($sort === 'year' && $order === 'ASC') ? 0 : 1]) }}">Year 
								@if($sort === 'year')
									<i class="fa fa-long-arrow-{{ $order === 'ASC' ? 'down' : 'up' }}" aria-hidden="true"></i>
								@endif
							</a>
						</th>
						<th class="pl-4"> <span>Amount</span> </th>
						<th class="pl-4">
							<a href="{{ route('user-ads.index', ['sort' => 'status', 'order' => ($sort === 'status' && $order === 'ASC') ? 0 : 1]) }}">Status 
								@if($sort === 'status')
									<i class="fa fa-long-arrow-{{ $order === 'ASC' ? 'down' : 'up' }}" aria-hidden="true"></i>
								@endif
							</a>
						</th>
						<th class="pl-4"></th>
					</tr>
				</thead>
				<tbody>
					@foreach($models as $key => $model)
						<tr>
							<td class="pl-4">{{ ($key + 1) }}</td>
							<td class="pl-4">
								<div>
									<div style="width: 40px;">
										@if($model->image_path)
											<img style="width: 100%;" src="/{{ $model->image_path }}" alt="">
										@endif
									</div>
									<div>{{ $model->title }}</div>
								</div>
							</td>
							<td class="pl-4">{{ $model->region->title }}</td>
							<td class="pl-4">{{ $model->city->title }}</td>
							<td class="pl-4">{{ $model->carModel->title }}</td>
							<td class="pl-4">{{ $model->mark->title }}</td>
							<td class="pl-4">{{ $model->year }}</td>
							<td class="pl-4">{{ $model->amount }} {{ $model->currency }}</td>
							<td class="pl-4">{!! App\Models\Ads::getStatusText($model->status, $model->expire_date) !!}</td>
							<td class="pl-4 text-right">
								<div class="mb-2">
									<a href="{{ route('user-ads.show', $model->id) }}" class="genric-btn info-border radius">View</a>
								</div>
								@if(App\Models\Ads::availableToEdit($model->status, $model->expire_date))
								<div class="mb-2">
									<a href="{{ route('user-ads.edit', $model->id) }}" class="genric-btn primary-border radius">Edit</a>
								</div>
								@endif
								<div>
									<div class="d-inline-block">
										<form action="{{ route('user-ads.destroy', $model->id) }}" method="POST">
											@csrf()
											@method('DELETE')
											<button type="submit" class="genric-btn danger-border radius">Delete</button>
										</form>
									</div>
								</div>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
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

			AdsPage.generateCitiesForRegion(RegionId.val(), CityId)
			RegionId.change(function () {
				AdsPage.generateCitiesForRegion($(this).val(), CityId)
			})

			// let ColorId = $('#ColorId')
			// let ColorInputDiv = $('#ColorInputDiv')

			// AdsPage.generateColor(ColorId, ColorInputDiv)
			// ColorId.change(function () {
			// 	AdsPage.generateColor($(this), ColorInputDiv)
			// })

		})
	</script>

@endsection