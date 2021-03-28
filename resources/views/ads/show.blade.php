@extends('layouts.comport')

@section('content')
	<div>
		<h3 class="mb-30 title_color">Модели / Просмотр</h3>
		<div>
			<a href="{{ route('ads.index') }}" class="genric-btn primary-border radius">Go back</a>
		</div>
		<br>
		<div class="d-sm-flex justify-content-around">
			<div class="px-4">
				<h3 class="typo-list">Title</h3>
				<p>{{ $model->title }}</p>
				<h3 class="typo-list">Description</h3>
				<p>{{ $model->description }}</p>
				<h3 class="typo-list">Region</h3>
				<p>{{ $model->region->title }}</p>
				<h3 class="typo-list">City</h3>
				<p>{{ $model->city->title }}</p>
				<h3 class="typo-list">Model</h3>
				<p>{{ $model->carModel->title }}</p>
				<h3 class="typo-list">Mark</h3>
				<p>{{ $model->mark->title }}</p>
			</div>
			<div class="px-4">
				<h3 class="typo-list">Color</h3>
				<div style="position: relative; width: 180px;">
					<p>{{ $model->color->color }}</p>
					<div class="color-box" style="height: 24px; background-color: {{ $model->color->color }};"></div>
				</div>
				<h3 class="typo-list">Year</h3>
				<p>{{ $model->year }}</p>
				<h3 class="typo-list">Amount</h3>
				<p>{{ $model->amount }} {{ $model->currency }}</p>
				<h3 class="typo-list">Status</h3>
				<p>{!! App\Models\Ads::getStatusText($model->status, $model->expire_date) !!}</p>
				<h3 class="typo-list">Создан</h3>
				<p>{{ $model->created_at }}</p>
				<h3 class="typo-list">Обнавлен</h3>
				<p>{{ $model->updated_at }}</p>
			</div>
			<div>
				<div style="width: 200px;">
					@if($model->image_path) 
						<img style="width: 100%;" src="/{{ $model->image_path }}" alt="">
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection