@extends('layouts.default')

@section('main')
	<section class="ftco-section">
		<div class="container">
			<section class="ftco-about d-md-flex ">
				<div class="one-half img mt-5" style="background-image: url({{ asset('images/uploads/09.jpg') }});"></div>
				<div class="one-half ftco-animate fadeInUp ftco-animated mb-5">
					<div class="ftco-animate fadeInUp ftco-animated">
						<h2 class="mb-4">Login to your account</h2>
					</div>
					<div>
						<form method="post" class="search-destination" autocomplete="off">

							@csrf

							@if ($errors->any())
								<div class="alert alert-danger">{{ $errors->first() }}</div>
							@endif

							<div class="row">
								<div class="col-sm-12 align-items-end">
									<div class="form-group">
										<label htmlFor="#">Email</label>
										<div class="form-field">
											<div class="icon"><span class="icon-envelope"></span></div>
											<input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" />
										</div>
									</div>
								</div>
								<div class="col-sm-12 align-items-end">
									<div class="form-group">
										<label htmlFor="#">Password</label>
										<div class="form-field">
											<div class="icon"><span class="icon-asterisk"></span></div>
											<input type="password" name="password" class="form-control" placeholder="Password" />
										</div>
									</div>
								</div>
								
								<div class="col-sm-12 align-self-end">
									<div class="form-group">
										<div class="form-field">
											<input type="submit" value="Login" class="form-control btn btn-primary" />
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</section>
		</div>
	</section>
	@include('partials.footer')
@endsection