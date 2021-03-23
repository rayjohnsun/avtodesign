@extends('layouts.comport')

@section('content')
	<div>
		<h3 class="mb-30 title_color">Regions / Просмотр</h3>
		<div>
			<a href="{{ route('regions.index') }}" class="genric-btn primary-border radius">Go back</a>
		</div>
		<br>
		<h3 class="typo-list">Title</h3>
		<p>{{ $model->title }}</p>
		<h3 class="typo-list">Sub title</h3>
		<p>{{ $model->sub_title }}</p>
		<h3 class="typo-list">Cities</h3>
		<p>
		@foreach($model->cities as $index => $city)
			<span>{{ $city->title }}{{($index + 1) < count($model->cities) ? ', ' : ''}}</span>
		@endforeach
		</p>
		<h3 class="typo-list">Создан</h3>
		<p>{{ $model->created_at }}</p>
		<h3 class="typo-list">Обнавлен</h3>
		<p>{{ $model->updated_at }}</p>
	</div>
@endsection