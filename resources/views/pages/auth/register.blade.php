@extends('layouts.default')

@section('main')
	<section class="ftco-section">
	    <div class="container">
			<section class="ftco-about d-md-flex">
		    	<div class="one-half img mt-5" style="background-image: url({{ asset('images/uploads/09.jpg') }});"></div>
		    	<div class="one-half ftco-animate fadeInUp ftco-animated">
			        <div class="ftco-animate fadeInUp ftco-animated">
			          	<h2 class="mb-4">Register account</h2>
			        </div>
			        <div>
		  				<form method="post" class="search-destination" autocomplete="off">

		  					@csrf

		  					@if ($errors->any())
		  						<div class="alert alert-danger">{{ $errors->first() }}</div>
		  					@endif

		  					@if (Session::has('success'))
		  						<div class="alert alert-success">{{ Session::get('success') }}</div>
		  					@endif
		  					
		                    <div class="row">
		                        <div class="col-sm-12 align-items-end">
		                            <div class="form-group">
		                                <label htmlFor="#">Fullnames</label>
		                                <div class="form-field">
		                                    <div class="icon"><span class="icon-user"></span></div>
		                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Fullnames" />
		                                </div>
		                            </div>
		                        </div>
		                        <div class="col-sm-12 align-items-end">
		                            <div class="form-group">
		                                <label htmlFor="#">Surname</label>
		                                <div class="form-field">
		                                    <div class="icon"><span class="icon-user"></span></div>
		                                    <input type="text" class="form-control" name="surname" value="{{ old('surname') }}" placeholder="Surname" />
		                                </div>
		                            </div>
		                        </div>
		                        <div class="col-sm-6 align-items-end">
		                            <div class="form-group">
		                                <label htmlFor="#">Cohort</label>
		                                <div class="form-field">
		                                    <div class="select-wrap">
		                                        <div class="icon"><span class="ion-ios-checkbox"></span></div>
		                                        <select name="cohort" id="" class="form-control">
		                                        	@foreach(['C-12','C-13','C-14','C-15','C-16','C-17','C-18','C-19', 'N/A'] as $cohort)
			                                            <option>{{ $cohort }}</option>
		                                            @endforeach
		                                        </select>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="col-sm-6 align-items-end">
		                            <div class="form-group">
		                                <label htmlFor="#">Department</label>
		                                <div class="form-field">
		                                    <div class="select-wrap">
		                                        <div class="icon"><span class="ion-ios-checkbox"></span></div>
		                                        <select name="department" class="form-control">
		                                        	<option>Copyright</option>
		                                        	<option>UX/UI</option>
		                                        	<option>Data Science</option>
		                                        	<option>Web Development</option>
		                                        	<option>Mobile Development</option>
		                                        	<option>Management</option>
		                                        </select>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="col-sm-12 align-items-end">
		                            <div class="form-group">
		                                <label htmlFor="#">Email</label>
		                                <div class="form-field">
		                                    <div class="icon"><span class="icon-envelope"></span></div>
		                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" />
		                                </div>
		                            </div>
		                        </div>
		                        <div class="col-sm-6 align-items-end">
		                            <div class="form-group">
		                                <label htmlFor="#">Password</label>
		                                <div class="form-field">
		                                    <div class="icon"><span class="icon-asterisk"></span></div>
		                                    <input type="password" class="form-control" name="password" placeholder="Password" />
		                                </div>
		                            </div>
		                        </div>
		                        <div class="col-sm-6 align-items-end">
		                            <div class="form-group">
		                                <label htmlFor="#">Repeat Password</label>
		                                <div class="form-field">
		                                    <div class="icon"><span class="icon-asterisk"></span></div>
		                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Repeat Password" />
		                                </div>
		                            </div>
		                        </div>
		                        
		                        <div class="col-sm-12 align-self-end">
		                            <div class="form-group">
		                                <div class="form-field">
		                                    <input type="submit" value="Register" class="form-control btn btn-primary" />
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