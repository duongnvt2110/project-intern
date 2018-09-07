@extends('dashboard')
@section('content')
@if(Session::has('admin'))
{{Session::get('admin')}}
<div class="page-content-wrapper">
	<!-- BEGIN CONTENT BODY -->
	<div class="page-content">
		<div class='event-main'>
			<div class='container'>
				@foreach($event as $event_result)
				<div class='tablelistevent'>
					<div class='item-responsive'>
						<div class='col-sm-4 col-md-4 col-xs-12'>
							<div class='details fornt flipcontainer text-center'>
								<div class='flipper'>
									<div class='preview justify-content-between' style="background-image: url('https://spyamz.s3.us-west-1.amazonaws.com/spyamz-images/katy-perry-host-mtv-video-music-awards-2017-620x360.jpg')">
										<div class='name-event'>{{$event_result['eventName']}}</div>
										<div class='action-event justify-content-between align-items-center' >
											<div class='time'>
												<span class='icon'></span>
												<span class='time-span'>Một Ngày</span>
											</div>
											<div class='area'>
												{{-- <span class='icon'></span> --}}
												<span class='label-area'>US</span>
											</div>
											<div class='text'>Chi tiết</div>
											<div class='viewmore'>View More</div>
										</div>

									</div>
								</div>
							</div>
						</div>
						<div class='col-sm-8 col-md-8 col-xs-12'>
							<ul class='listitemwarper'>
								@foreach($product as $value)
								@if($value['eventId']==$event_result['eventId'])
								<li class="col-sm-3">
									<div class="top">
										<div class="buttonfarvorite">
											<i class="far fa-heart"></i>
											<span>Lưu</span>
										</div>
										<div class="thumbail">	
											<a id="myBtn">
												<img class="img-responsive" src='./source/img/1.JPG'>
											</a>
										</div>
										<div class="price">
											<span>$13.3</span>
										</div>
									</div>
									<div class="bottom">
										<div class="rank name-tag">
											<div class="btn-arrow">  	
												<span><i class="fas fa-arrow-right"></i></span>
											</div>
											<span class="rank-current">{{$value['rank']}}</span>
											<div class="rate">
												<span class="before">
													+1,1
												</span>
											</div>
										</div>
										<div class="name-tag">
											<a class="Name">{{$value['name']}}</a>
										</div>
										<div class="asin name-tag">
											<span class="title">ASIN:</span>
											<span class="value">
												<span>{{$value['asin']}}</span>
												<a ><i class="fa fa-amazon"></i></a>
											</span>
										</div>
										<div class="updated name-tag">
											<span class="upadate">7 ngày trước</span>
										</div>
									</div>
								</li>
								@endif
								@endforeach
							</ul>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@else
{{redirect('admin')}}
@endif
@endsection