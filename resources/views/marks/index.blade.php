@extends('layouts.comport')

@section('content')
	<div>
		<h3 class="mb-30 title_color">Marks</h3>
		<div class="button-group-area">
			<a href="{{ route('marks.create') }}" class="genric-btn primary radius">Create</a>
			<a href="{{ route('marks.index') }}" class="genric-btn info radius">Сбросить</a>
		</div>
		<div class="text-right">
			<form action="{{ route('marks.index') }}" method="GET">
				<div class="d-inline-block">
					<input type="text" name="title" placeholder="Title" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Title'" class="single-input" value="{{ $params['title'] }}">
				</div>
				<div class="d-inline-block">
					<input type="text" name="sub_title" placeholder="Sub title" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Sub title'" class="single-input" value="{{ $params['sub_title'] }}">
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
							<a href="{{ route('marks.index', ['sort' => 'title', 'order' => ($sort === 'title' && $order === 'ASC') ? 0 : 1]) }}">Title 
								@if($sort === 'title')
									<i class="fa fa-long-arrow-{{ $order === 'ASC' ? 'down' : 'up' }}" aria-hidden="true"></i>
								@endif
							</a>
						</th>
						<th class="pl-4">
							<a href="{{ route('marks.index', ['sort' => 'sub_title', 'order' => ($sort === 'sub_title' && $order === 'ASC') ? 0 : 1]) }}">Sub Title 
								@if($sort === 'sub_title')
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
							<td class="pl-4">{{ $model->sub_title }}</td>
							<td class="pl-4 text-right">
								<div class="button-group-area mt-10">
									<a href="{{ route('marks.show', $model->id) }}" class="genric-btn info-border radius">View</a>
									<a href="{{ route('marks.edit', $model->id) }}" class="genric-btn primary-border radius">Edit</a>
									<div class="d-inline-block">
										<form action="{{ route('marks.destroy', $model->id) }}" method="POST">
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