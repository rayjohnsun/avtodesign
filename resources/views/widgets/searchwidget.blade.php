<div class="search-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<form action="{{ route('index_search') }}" method="GET" class="d-md-flex justify-content-between">
					<select name="model_id">
						<option value="">Выбрать модел</option>
						@foreach($carModels as $carModel)
							<option value="{{ $carModel->id }}">{{ $carModel->title }}</option>
						@endforeach
					</select>
					<select name="region_id">
						<option value="">Выбрать регион</option>
						@foreach($regions as $region)
							<option value="{{ $region->id }}">{{ $region->title }}</option>
						@endforeach
					</select>
					<input name="title" type="text" placeholder="Search Keyword" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'" required>
					<button type="submit" class="template-btn">find Car</button>
				</form>
			</div>
		</div>
	</div>
</div>