@extends('layouts.comport')

@section('content')
	<div>
		<h3 class="mb-30 title_color">Colors / Просмотр</h3>
		<div>
			<a href="{{ route('colors.index') }}" class="genric-btn primary-border radius">Go back</a>
		</div>
		<br>
		<h3 class="typo-list">Title</h3>
		<p>{{ $model->title }}</p>
		<h3 class="typo-list">Color</h3>
		<div style="position: relative; width: 180px;">
			<p>{{ $model->color }}</p>
			<div class="color-box" style="height: 24px; background-color: {{ $model->color }};"></div>
		</div>
		<h3 class="typo-list">Создан</h3>
		<p>{{ $model->created_at }}</p>
		<h3 class="typo-list">Обнавлен</h3>
		<p>{{ $model->updated_at }}</p>
	</div>
@endsection