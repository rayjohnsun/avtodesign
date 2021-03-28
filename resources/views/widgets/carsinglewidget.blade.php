<div class="single-job mb-4 d-lg-flex justify-content-between">
	<div class="job-text">
		<h4>{{ $model->title }}</h4>
		<ul class="mt-4">
			<li class="mb-3"><h5><i class="fa fa-map-marker"></i> {{ $model->region->title }}, {{ $model->city->title }}</h5></li>
			<li class="mb-3"><h5><i class="fa fa-pie-chart"></i> {{ $model->carModel->title }} </h5></li>
			<li class="mb-3"><h5><i class="fa fa-pie-chart"></i> {{ $model->mark->title }} / {{ $model->year }} / <span style="background-color: {{ $model->color->color }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></h5></li>
			<li><h5><i class="fa fa-clock-o"></i>{{ $model->updated_at }}</h5></li>
		</ul>
	</div>
	<div class="job-img align-self-center">
		@if($model->image_path) 
			<img style="height: 100px;" src="/{{ $model->image_path }}" alt="">
		@endif
	</div>
	<div class="job-btn align-self-center">
		<a href="#" class="third-btn job-btn1">full time</a>
		<a href="#" class="third-btn">Подробнее</a>
	</div>
</div>