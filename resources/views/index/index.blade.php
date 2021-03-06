@extends('layouts.comport')

@section('top-block')
	<section class="banner-area">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6 px-0">
					<div class="banner-bg"></div>
				</div>
				<div class="col-lg-6 align-self-center">
					<div class="banner-text">
						<h1>find your dream <span>job</span> with comport</h1>
						<p class="py-3">Wherein herb beginning. Moved after gathering. Sea hi crate fowl man replenish place divided likeness herb one two lnetn Winged moving saw, may over.</p>
						<a href="#" class="secondary-btn">explore now<span class="flaticon-next"></span></a>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('content')
	<div>

		<div class="search-area">

			@include('widgets.searchwidget', ['carModels' => $carModels, 'regions' => $regions])
			
		</div>

		<section class="jobs-area section-padding2">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="jobs-title">
							<h2>Browse recent Cars</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="jobs-tab tab-item">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="home-tab" data-toggle="tab" href=".cl-recent" role="tab" aria-controls="home" aria-selected="true">recent</a>
								</li>
								<!-- <li class="nav-item">
									<a class="nav-link" id="profile-tab" data-toggle="tab" href=".cl-full-time" role="tab" aria-controls="profile" aria-selected="false">full time</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="contact-tab" data-toggle="tab" href=".cl-part-time" role="tab" aria-controls="part-time" aria-selected="false">part time</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="contact-tab2" data-toggle="tab" href=".cl-intern" role="tab" aria-controls="intern" aria-selected="false">intern</a>
								</li> -->
							</ul>
						</div>
					</div>
				</div>
				<div class="row">

					@foreach($models as $model)

						@include('widgets.carwidget', ['model' => $model])

					@endforeach

				</div>
				<div class="more-job-btn mt-5 text-center">
					<a href="#" class="template-btn">more job post</a>
				</div>
			</div>
		</section>

		<section class="feature-area section-padding2">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<div class="single-feature mb-4 mb-lg-0">
							<h4>UX/UI Designer</h4>
							<p class="py-3">There spirit beginning bearing the open at own every give appear in third you sawe two boys</p>
							<a href="#" class="secondary-btn">explore now<span class="flaticon-next"></span></a>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="single-feature mb-4 mb-lg-0">
							<h4>web Designer</h4>
							<p class="py-3">There spirit beginning bearing the open at own every give appear in third you sawe two boys</p>
							<a href="#" class="secondary-btn">explore now<span class="flaticon-next"></span></a>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="single-feature">
							<h4>Accounting and Finance</h4>
							<p class="py-3">There spirit beginning bearing the open at own every give appear in third you sawe two boys</p>
							<a href="#" class="secondary-btn">explore now<span class="flaticon-next"></span></a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="category-area section-padding">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-top text-center">
							<h2>Find job by category</h2>
							<p>Open lesser winged midst wherein may morning</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="single-category text-center mb-4">
							<img src="/assets/images/cat1.png" alt="category">
							<h4>accounting & Finance</h4>
							<h5>250 open job</h5>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="single-category text-center mb-4">
							<img src="/assets/images/cat2.png" alt="category">
							<h4>production & operation</h4>
							<h5>250 open job</h5>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="single-category text-center mb-4">
							<img src="/assets/images/cat3.png" alt="category">
							<h4>telecommunication</h4>
							<h5>250 open job</h5>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="single-category text-center mb-4">
							<img src="/assets/images/cat4.png" alt="category">
							<h4>garments & textile</h4>
							<h5>250 open job</h5>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="single-category text-center mb-4 mb-lg-0">
							<img src="/assets/images/cat5.png" alt="category">
							<h4>marketing and sales</h4>
							<h5>250 open job</h5>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="single-category text-center mb-4 mb-lg-0">
							<img src="/assets/images/cat6.png" alt="category">
							<h4>engineer & architech</h4>
							<h5>250 open job</h5>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="single-category text-center mb-4 mb-md-0">
							<img src="/assets/images/cat7.png" alt="category">
							<h4>design & crative</h4>
							<h5>250 open job</h5>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="single-category text-center">
							<img src="/assets/images/cat8.png" alt="category">
							<h4>customer support</h4>
							<h5>250 open job</h5>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="newsletter-area section-padding">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-top text-center">
							<h2>Get job information daily</h2>
							<p>Subscribe to our newsletter and get a coupon code!</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<form action="#">
							<input type="email" placeholder="Your email here" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your email here'" required>
							<button type="submit" class="template-btn">subscribe now</button>
						</form>
					</div>
				</div>
			</div>
		</section>

		<section class="employee-area section-padding">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-top text-center">
							<h2>Happy employee</h2>
							<p>Open lesser winged midst wherein may morning</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="employee-slider owl-carousel">
							<div class="single-slide d-sm-flex">
								<div class="slide-img employee1">
									<div class="hover-state">
										<div class="hover-text text-center">
											<h3>david aron</h3>
											<h5>Facebook</h5>
										</div>
									</div>
								</div>
								<div class="slide-text align-self-center">
									<i class="fa fa-quote-left"></i>
									<p>Appear, called day. Sixth two after eve moved called winged very heaven two lights let all third gathered.</p>
								</div>
							</div>
							<div class="single-slide d-sm-flex">
								<div class="slide-img employee2">
									<div class="hover-state">
										<div class="hover-text text-center">
											<h3>david aron</h3>
											<h5>Twitter</h5>
										</div>
									</div>
								</div>
								<div class="slide-text align-self-center">
									<i class="fa fa-quote-left"></i>
									<p>Appear, called day. Sixth two after eve moved called winged very heaven two lights let all third gathered.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="blog" class="news-area section-padding3">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-top text-center">
							<h2>Company latest news</h2>
							<p>Open lesser winged midst wherein may morning</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-6">
						<div class="single-news mb-5 mb-lg-0">
							<div class="news-img news-img1"></div>
							<div class="news-tag">
								<ul class="my-4">
									<li><h5><i class="fa fa-calendar-o"></i> 20th sep, 2018</h5></li>
									<li class="separator mx-2"><span></span></li>
									<li><h5><i class="fa fa-folder-open-o"></i> company</h5></li>
								</ul>
							</div>
							<div class="news-title">
								<h4><a href="#">Lime recalls electric scooters over battery fire.</a></h4>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="single-news mb-5 mb-lg-0">
							<div class="news-img news-img2"></div>
							<div class="news-tag">
								<ul class="my-4">
									<li><h5><i class="fa fa-calendar-o"></i> 18th sep, 2018</h5></li>
									<li class="separator mx-2"><span></span></li>
									<li><h5><i class="fa fa-folder-open-o"></i> company</h5></li>
								</ul>
							</div>
							<div class="news-title">
								<h4><a href="#">Apple resorts to promo deals trade to boost</a></h4>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="single-news">
							<div class="news-img news-img3"></div>
							<div class="news-tag">
								<ul class="my-4">
									<li><h5><i class="fa fa-calendar-o"></i> 25th sep, 2018</h5></li>
									<li class="separator mx-2"><span></span></li>
									<li><h5><i class="fa fa-folder-open-o"></i> company</h5></li>
								</ul>
							</div>
							<div class="news-title">
								<h4><a href="#">Lime recalls electric scooters over battery fire.</a></h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="download-area section-padding">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-6">
						<div class="download-text">
							<h2>Download the app your mobile today</h2>
							<p class="py-3">Light earth also land can't. May you midst shall lights blessed in lights Have gathered image morning blessed grass him. Appear female rule all seas she'd winged</p>
							<div class="download-button d-sm-flex flex-row justify-content-start">
								<div class="download-btn mb-3 mb-sm-0 flex-row d-flex">
									<i class="fa fa-apple" aria-hidden="true"></i>
									<a href="#">
									<p>
									<span>Available</span> <br>
									on App Store
									</p>
									</a>
								</div>
								<div class="download-btn dark flex-row d-flex">
									<i class="fa fa-android" aria-hidden="true"></i>
									<a href="#">
									<p>
									<span>Available</span> <br>
									on Play Store
									</p>
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 pr-0">
						<div class="download-img"></div>
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection