@extends('layouts.comport')

@section('content')
	<div>
		<h3 class="mb-30 title_color">Colors</h3>
		<div class="button-group-area">
			<a href="{{ route('colors.create') }}" class="genric-btn primary radius">Create</a>
			<a href="{{ route('colors.index') }}" class="genric-btn info radius">Сбросить</a>
		</div>
		<div class="text-right">
			<form action="{{ route('colors.index') }}" method="GET">
				<div class="d-inline-block">
					<input type="text" name="title" placeholder="Title" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Title'" class="single-input" value="{{ $params['title'] }}">
				</div>
				<div class="d-inline-block">
					<input type="text" name="color" placeholder="Color" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Color'" class="single-input" value="{{ $params['color'] }}">
				</div>
				<div class="d-inline-block">
					<button type="submit" class="genric-btn primary-border arrow">Search</button>
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
							<a href="{{ route('colors.index', ['sort' => 'title', 'order' => ($sort === 'title' && $order === 'ASC') ? 0 : 1]) }}">Title 
								@if($sort === 'title')
									<i class="fa fa-long-arrow-{{ $order === 'ASC' ? 'down' : 'up' }}" aria-hidden="true"></i>
								@endif
							</a>
						</th>
						<th class="pl-4">
							<a href="{{ route('colors.index', ['sort' => 'color', 'order' => ($sort === 'color' && $order === 'ASC') ? 0 : 1]) }}">Color 
								@if($sort === 'color')
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
							<td class="pl-4">{{ $model->title }}</td>
							<td class="pl-4">
								<div style="position: relative;width: 180px;">
									<div>{{ $model->color }}</div>
									<div class="color-box" style="height: 100%;background-color: {{ $model->color }};"></div>
								</div>
							</td>
							<td class="pl-4 text-right">
								<div class="button-group-area mt-10">
									<a href="{{ route('colors.show', $model->id) }}" class="genric-btn info-border radius">View</a>
									<a href="{{ route('colors.edit', $model->id) }}" class="genric-btn primary-border radius">Edit</a>
									<div class="d-inline-block">
										<form action="{{ route('colors.destroy', $model->id) }}" method="POST">
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