<section class="ftco-section">
	<div class="container">
		<div class="row mt-lg-5">
			<div class="col-lg-3 sidebar order-md-last ftco-animate">
				<div class="sidebar-wrap ftco-animate">
					<h3 class="heading mb-4 text-center">Top comments</h3>
					<div id="book-comments"></div>
				</div>
			</div>
			<div class="col-lg-9">
				<div class="row">
					<div class="col-sm col-md-6 col-lg-4 ftco-animate">
						<div class="destination">
							<div 
								class="img img-2 d-flex justify-content-center align-items-center" 
								style="background-image: url({{ asset($book->image) }})"></div>
							<div class="text p-3">
								<div class="d-flex">
									<div class="one">
										<h3>{{ $book->author }}</h3>
										<p class="rate">
											@foreach([0,1,2,3,4] as $n)
												@if ($n < ceil($book->stars/2))
													<i class="icon-star"></i>
												@else
													<i class="icon-star-o"></i>
												@endif
											@endforeach
											<span>{{ $book->stars }} Rating</span>
										</p>
									</div>                                        
									<div class="two"></div>
								</div>
								<p>{{ $book->title }}</p><hr />
								<p class="bottom-area d-flex">
									<span><i class="icon-folder-o"></i> {{ $book->category }}</span> 
									<span class="ml-auto">
									</span>
								</p>
							</div>
							@if (!$book->booked)                         
							<div class="alert alert-success">
								<span class="icon icon-check"></span> Book available.
							</div>
							@else
							<div class="alert alert-warning">
								<span class="icon icon-warning"></span> Book not available.
							</div>
							@endif 
						</div>
					</div>
					<div class="col-sm col-md-6 col-lg-8 ftco-animate">                       
						
						@if ($book->bookings()->whereDate('from', '>=', today())->exists())
							<h3 class="heading mb-4">Bookings details</h3>
							@if(!Auth::check())
							<div class="alert alert-danger">
								Please <b>Login OR Register</b> to access details about this book!
							</div>

							<a href="/login" class="btn btn-primary py-2 px-4" style="border-radius: 2px">Login</a>
							<a href="/register" class="btn btn-outline border-warning py-2 px-4" style="border-radius: 2px;">Register</a>
							@else
							<div class="table-responsive-md">
								<table class="table table-sm table-borderless table-striped">
									<thead>
										<tr style="background-color: #666; color: #fff">
											<th scope="col">Taken by</th>
											<th scope="col">Cohort</th>
											<th scope="col">Return Date</th>
											<th scope="col">&nbsp;</th>
										</tr>
									</thead>
									@foreach($book->bookings as $bookings)
									<tr data-toggle="popover" title="Department" data-placement="top" 
										data-content="{{ $bookings->user->department }}">
										<td scope="row">{{ $bookings->user->fullname }}</td>
										<td>
											{{ $bookings->user->cohort }}
										</td>
										<td>
											<span class="badge badge-light">
												{{ $bookings->from->format('d-m-Y') }} -
												{{ $bookings->till->format('d-m-Y') }}
											</span>
										</td>
										<td>
											@if ($bookings->availability)
												<span class="badge badge-success">Taken</span>
											@else
												<span class="badge badge-warning">Booked</span>
											@endif
										</td>
									</tr>
									@endforeach
								</table>
							</div>
							<div id="booking">
								
							</div>
							@endif
						@else
							<h3 class="heading mb-4">Borrow book</h3>
							<div id="borrow-book-expanded"></div>
						@endif
					</div>
				</div>          
			</div>
		</div>
		<StoreBooksPagenation pages={this.state.pages} onPagenate={this.onPagenate} />
	</div>
</section>

@section('script')
<script type="text/javascript">
	window.isbn = '{{ $book->isbn }}';
</script>
@endsection