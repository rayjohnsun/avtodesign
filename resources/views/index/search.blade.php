@extends('layouts.comport')

@section('top')
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<h2>Job Search</h2>
			<p>There spirit beginning bearing the open at own every give appear in third you sawe two boys</p>
		</div>
	</div>
@endsection

@section('content')
	<div>
		<div class="search-area">

			@include('widgets.searchwidget', ['carModels' => $carModels, 'regions' => $regions])

			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center mt-5">
						<span>49 Results found for “Telecommunication”</span>
					</div>
				</div>
			</div>
		</div>

		<section class="jobs-area section-padding">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">

						@foreach($models as $model)

							@include('widgets.carsinglewidget', ['model' => $model])

						@endforeach

						<!-- <div class="single-job mb-4 d-lg-flex justify-content-between">
							<div class="job-text">
								<h4>Assistant Executive - Production/ Quality Control</h4>
								<ul class="mt-4">
									<li class="mb-3"><h5><i class="fa fa-map-marker"></i> new yourk, USA</h5></li>
									<li class="mb-3"><h5><i class="fa fa-pie-chart"></i> Applied Chemistry & Chemical Engineering / Chemistry</h5></li>
									<li><h5><i class="fa fa-clock-o"></i> Deadline Deadline: Dec 11, 2018</h5></li>
								</ul>
							</div>
							<div class="job-img align-self-center">
								<img src="/assets/images/job1.png" alt="job">
							</div>
							<div class="job-btn align-self-center">
								<a href="#" class="third-btn job-btn1">full time</a>
								<a href="#" class="third-btn">apply</a>
							</div>
						</div>
						<div class="single-job mb-4 d-lg-flex justify-content-between">
							<div class="job-text">
								<h4>Asst. Manager, Production (Woven Dyeing)</h4>
								<ul class="mt-4">
									<li class="mb-3"><h5><i class="fa fa-map-marker"></i> new yourk, USA</h5></li>
									<li class="mb-3"><h5><i class="fa fa-pie-chart"></i> Applied Chemistry & Chemical Engineering / Chemistry</h5></li>
									<li><h5><i class="fa fa-clock-o"></i> Deadline Deadline: Dec 11, 2018</h5></li>
								</ul>
							</div>
							<div class="job-img align-self-center">
								<img src="/assets/images/job2.png" alt="job">
							</div>
							<div class="job-btn align-self-center">
								<a href="#" class="third-btn job-btn2">full time</a>
								<a href="#" class="third-btn">apply</a>
							</div>
						</div>
						<div class="single-job mb-4 d-lg-flex justify-content-between">
							<div class="job-text">
								<h4>Deputy Manager/ Assistant Manager - Footwear</h4>
								<ul class="mt-4">
									<li class="mb-3"><h5><i class="fa fa-map-marker"></i> new yourk, USA</h5></li>
									<li class="mb-3"><h5><i class="fa fa-pie-chart"></i> Applied Chemistry & Chemical Engineering / Chemistry</h5></li>
									<li><h5><i class="fa fa-clock-o"></i> Deadline Deadline: Dec 11, 2018</h5></li>
								</ul>
							</div>
							<div class="job-img align-self-center">
								<img src="/assets/images/job3.png" alt="job">
							</div>
							<div class="job-btn align-self-center">
								<a href="#" class="third-btn job-btn3">full time</a>
								<a href="#" class="third-btn">apply</a>
							</div>
						</div>
						<div class="single-job mb-4 d-lg-flex justify-content-between">
							<div class="job-text">
								<h4>R&D Manager (Technical Lab Department)</h4>
								<ul class="mt-4">
									<li class="mb-3"><h5><i class="fa fa-map-marker"></i> new yourk, USA</h5></li>
									<li class="mb-3"><h5><i class="fa fa-pie-chart"></i> Applied Chemistry & Chemical Engineering / Chemistry</h5></li>
									<li><h5><i class="fa fa-clock-o"></i> Deadline Deadline: Dec 11, 2018</h5></li>
								</ul>
							</div>
							<div class="job-img align-self-center">
								<img src="/assets/images/job4.png" alt="job">
							</div>
							<div class="job-btn align-self-center">
								<a href="#" class="third-btn job-btn4">full time</a>
								<a href="#" class="third-btn">apply</a>
							 </div>
						</div>
						<div class="single-job d-lg-flex justify-content-between">
							<div class="job-text">
								<h4>Manager/ Asst. Manager (Quality Assurance)</h4>
								<ul class="mt-4">
									<li class="mb-3"><h5><i class="fa fa-map-marker"></i> new yourk, USA</h5></li>
									<li class="mb-3"><h5><i class="fa fa-pie-chart"></i> Applied Chemistry & Chemical Engineering / Chemistry</h5></li>
									<li><h5><i class="fa fa-clock-o"></i> Deadline Deadline: Dec 11, 2018</h5></li>
								</ul>
							</div>
							<div class="job-img align-self-center">
								<img src="/assets/images/job5.png" alt="job">
							</div>
							<div class="job-btn align-self-center">
								<a href="#" class="third-btn job-btn2">full time</a>
								<a href="#" class="third-btn">apply</a>
							</div>
						</div> -->
					</div>
				</div>
				<div class="more-job-btn mt-5 text-center">
					<a href="#" class="template-btn">more job post</a>
				</div>
			</div>
		</section>
	</div>
@endsection