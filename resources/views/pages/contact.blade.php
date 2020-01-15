@extends('layouts.default')

@section('main')
	<section class="ftco-section-parallax mt-5">
		<div class="parallax-img d-flex align-items-center">
			<div class="container">
				<div class="row d-flex pt-4 justify-content-center">
					<div class="col-md-7 text-center heading-section heading-section-white ftco-animate fadeInUp ftco-animated">
						<h2>Subcribe to our Newsletter</h2>
						<p>Get the latest updates on your favourite books.</p>
						<div class="row d-flex justify-content-center mt-5">
							<div class="col-md-8">
								<form action="#" class="subscribe-form">
									<div class="form-group d-flex">
										<input type="text" class="form-control" placeholder="Enter email address">
										<input type="submit" value="Subscribe" class="submit px-3">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="ftco-section contact-section ftco-degree-bg">
		<div class="container">
			<div class="row d-flex contact-info">
				<div class="col-md-12 mb-4">
					<h2 class="h4">Contact Information</h2>
				</div>
				<div class="w-100"></div>
				<div class="col-md-3">
					<p><span>Address:</span> 35 Jules Street, Jeppestown Johannesburg, 1200</p>
				</div>
				<div class="col-md-3">
					<p><span>Phone:</span> <a href="tel://1234567920">+27 11 235 9811</a></p>
				</div>
				<div class="col-md-3">
					<p><span>Email:</span> <a href="mailto:bookstore@umuzi.org">bookstore@umuzi.org</a></p>
				</div>
				<div class="col-md-3">
					<p><span>Website</span> <a href="#">bookstore.umuzi.org</a></p>
				</div>
			</div>
			<div class="row block-9">
				<div class="col-md-6 mx-auto">
					<form action="#">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Your Name">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Your Email">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Subject">
						</div>
						<div class="form-group">
							<textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" value="Send Message" class="btn btn-primary py-3 px-5" style="border-radius: 2px">
						</div>
					</form>
				
				</div>
			</div>
		</div>
	</section>
	@include('partials.footer')
@endsection