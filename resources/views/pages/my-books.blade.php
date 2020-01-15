@extends('layouts.default')

@section('main')
	<section class="ftco-section contact-section ftco-degree-bg mt-md-5">
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<div class="row">
						<div class="col-12">
							<div class="row" style="background-color: #f9f9f9;">
								<h4 class="col-sm-12 py-3 mb-3 bg-dark text-light">Booked Books</h3>
								<p class="{{ $bookedBooks->count() > 0 ? 'd-none' : '' }} p-3">You have no booked books.</p>
								@foreach($bookedBooks as $booked)					
									<div class="col-sm-4 ftco-animate mb-3">
										<div class="destination mb-3 shadow-sm">
											<div 
												class="img img-3 d-flex justify-content-end align-items-end bg-zoom-in" 
												style="background-image: url({{ asset($booked->book->image) }}); height: 80px">
													<span class="badge badge-dark rounded-0">
														{{ $booked->from->format('d-m-Y') }} |
														{{ $booked->till->format('d-m-Y') }}
													</span>											
												</div>
											<div class="text p-3">
												<div class="d-flex">
													<div class="one">
														<h3>{{ $booked->book->author }}</h3>
														<p class="rate">
															@foreach([0,1,2,3,4] as $n)
																@if ($n < ceil($booked->book->stars/2))
																	<i class="icon-star"></i>
																@else
																	<i class="icon-star-o"></i>
																@endif
															@endforeach
															<span>{{ $booked->book->stars }} Rating</span>
														</p>
													</div>                                        
													<div class="two"></div>
												</div>
												<p>{{ $booked->book->title }}</p>
												<a href="#" onclick="pop()" class="btn btn-primary btn-block btn-sm">Confirm</a>
											</div>
										</div>
									</div>
								@endforeach
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="row pt-2" style="background-color: #f1f1f1;">
								<h4 class="col-sm-12 mb-3 py-3 bg-dark text-light">Taked Books</h4>
								<p class="{{ $borrowedBooks->count() > 0 ? 'd-none' : '' }} p-3">You have no borrowed books.</p>
								@foreach($borrowedBooks as $borrow)					
									<div class="col-sm-4 ftco-animate">
										<div class="destination mb-3 shadow-sm">
											<div 
												class="img img-3 d-flex justify-content-end align-items-end bg-zoom-in" 
												style="background-image: url({{ asset($borrow->book->image) }}); height: 100px">
													<span class="badge badge-dark rounded-0">
														{{ $borrow->from->format('d-m-Y') }} |
														{{ $borrow->till->format('d-m-Y') }}
													</span>
												</div>
											<div class="text p-3">
												<div class="d-flex">
													<div class="one">
														<h3>{{ $borrow->book->author }}</h3>
														<p class="rate">
															@foreach([0,1,2,3,4] as $n)
																@if ($n < ceil($borrow->book->stars/2))
																	<i class="icon-star"></i>
																@else
																	<i class="icon-star-o"></i>
																@endif
															@endforeach
															<span>{{ $borrow->book->stars }} Rating</span>
														</p>
													</div>                                        
													<div class="two"></div>
												</div>
												<p>{{ $borrow->book->title }}</p>
											</div>
										</div>
									</div>
								@endforeach
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="row pt-2" style="background-color: #d9d9d9;">
								<h4 class="col-sm-12 mb-3 py-3 bg-dark text-light">My Added Books</h4>
								<p class="{{ $myAddedBooks->count() > 0 ? 'd-none' : '' }} p-3">You have added books.</p>
								<div class="table-responsive p-2">
									<table class="table table-sm table-striped table-bordered">
										<thead class="bg-light">
											<tr>
												<th scope="col">&nbsp;</th>
												<th scope="col">Reference #</th>
												<th scope="col">Author</th>
												<th scope="col">Title</th>
												<th scope="col">Date</th>
												<th scope="col">&nbsp;</th>
											</tr>
										</thead>
										@foreach($myAddedBooks as $added)
										<tr>
											<td>
											<div
											style="background: url({{ asset($added->image) }}); background-size: cover; height: 50px; width: 50px"></div>
											</td>
											<td>
												<span class="badge badge-dark rounded-0">
													{{ $added->ref }}
												</span>
											</td>
											<td>{{ $added->author }}</td>
											<td>{{ $added->title }}</td>
											<td>{{ $added->created_at }}</td>
											<td><button class="btn btn-danger btn-sm"><span class="icon-times"></span></button></td>
										</tr>
										@endforeach
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div id="register-book"></div>
				</div>
			</div>
		</div>
	</section>
	@include('partials.footer')
@endsection

@section('script')
<script type="text/javascript">

	function pop() {
		Swal.fire({
			title: '<p class="text-primary">Enter your book ISBN.</p>',
			input: 'text',
			inputAttributes: {
				autocapitalize: 'off',
				placeholder: 'ISBN'
			},
			showCancelButton: true,
			confirmButtonText: 'Confirm',
			showLoaderOnConfirm: true,
			preConfirm: (val) => {
		    return axios.get()
		    	.then(res => {

		    	}).catch(err => {
		        	Swal.showValidationMessage(
		          		`Request failed: ${err}`
		        	);
		      	});
		  	},
		  	allowOutsideClick: () => !Swal.isLoading()
			}).then((result) => {
			  	if (result.value) {
			  		// Reload page
			  	}
			});
	}
</script>
@endsection