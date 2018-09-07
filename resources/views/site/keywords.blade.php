@extends('dashboard')
@section('content')
<div class="page-content-wrapper">
	<div class="page-content">
		<div class='keyword-page'>
			<div class='container'>
				<div class='keywordfiltering '>
					{!! Form::Open(['class'=>'form-search','style'=>'display:flex;'])!!}
					<div class='row'>
						<div class='searchterm col-sm-3'>
							<input data-lpignore="true" class="form-control-search" type="text" name="search-term" id="search-term" placeholder="ASIN hoặc từ khóa..." value=""> 
						</div>
						<div class='time col-sm-3' >
							<div id="time-keyword" data-tonggle='tonggle-time' >
								<div class="form-group">
									<div class="input-group date" >
										<input  type="text" id="timekeyword" class="form-control" placeholder="Start Date time of event" /> 
									</div>
								</div>
							</div>
						</div>
						{{-- <div class='keywordfiltering col-sm-6'> --}}
							<div class='label col-sm-2 col-xs-12'><a>Xếp Hạng</a> </div>
							<div class='btn-sort col-sm-4 col-xs-12'>
								<button class='btn blue btn-outline button-tradeMark '>100.000</button>
								<button class='btn blue btn-outline button-tradeMark'>200.000</button>
								<button class='btn blue btn-outline button-tradeMark '>300.000</button>
								<button class='btn blue btn-outline button-tradeMark '>500.000</button>
							</div>
						{{-- </div> --}}
					</div>
					{!! Form::Close()!!}
				</div>
				<div class='keywordResult'>
					<div class='container'>
						<div class='wrapper'>
							<div class='OrderColumn '>
								<div class='Header'>#</div>
								<div class='Body'>
									<div class='index'>1</div>
									<div class='index'>2</div>
									<div class='index'>3</div>
									<div class='index'>4</div>
									<div class='index'>5</div>
									<div class='index'>6</div>
									<div class='index'>7</div>
									<div class='index'>8</div>
									<div class='index'>9</div>
									<div class='index'>10</div>
								</div>
							</div>
							{{-- keyword 4 words --}}
							<div class='keywordCollum col-sm-3 col-xs-12'>
								<div class='Header'>
									<span class='text'>Bốn từ</span>
									<span class='number'>Số lượng</span>
								</div>
								<div class='Body'>
									<div class='item'>
										<span class="text">
											first day to school
										</span>
										<span class='number'>
											<span>72</span>
										</span>
									</div>
									<div class='item'>
										<span class="text">
											first day to school
										</span>
										<span class='number'>
											<span>72</span>
										</span>
									</div>
									<div class='item'>
										<span class="text">
											first day to school
										</span>
										<span class='number'>
											<span>72</span>
										</span>
									</div>
									<div class='item'>
										<span class="text">
											first day to school
										</span>
										<span class='number'>
											<span>72</span>
										</span>
									</div>
									<div class='item'>
										<span class="text">
											first day to school
										</span>
										<span class='number'>
											<span>72</span>
										</span>
									</div>
									<div class='item'>
										<span class="text">
											first day to school
										</span>
										<span class='number'>
											<span>72</span>
										</span>
									</div>
									<div class='item'>
										<span class="text">
											first day to school
										</span>
										<span class='number'>
											<span>72</span>
										</span>
									</div>
									<div class='item'>
										<span class="text">
											first day to school
										</span>
										<span class='number'>
											<span>72</span>
										</span>
									</div>
									<div class='item'>
										<span class="text">
											first day to school
										</span>
										<span class='number'>
											<span>72</span>
										</span>
									</div>
									<div class='item'>
										<span class="text">
											first day to school
										</span>
										<span class='number'>
											<span>72</span>
										</span>
									</div>
								</div>
							</div>
							{{-- keyword 4 words --}}
							{{-- keyword 3 words --}}
							<div class='keywordCollum col-sm-3 col-xs-12'>
								<div class='Header'>
									<span class='text'>Ba từ</span>
									<span class='number'>Số lượng</span>
								</div>
								<div class='Body'>
									<div class='item'>
										<span class="text">
											first day to school
										</span>
										<span class='number'>
											<span>72</span>
										</span>
									</div>
									<div class='item'>
										<span class="text">
											first day to school
										</span>
										<span class='number'>
											<span>72</span>
										</span>
									</div>
									<div class='item'>
										<span class="text">
											first day to school
										</span>
										<span class='number'>
											<span>72</span>
										</span>
									</div>
									<div class='item'>
										<span class="text">
											first day to school
										</span>
										<span class='number'>
											<span>72</span>
										</span>
									</div>
									<div class='item'>
										<span class="text">
											first day to school
										</span>
										<span class='number'>
											<span>72</span>
										</span>
									</div>
									<div class='item'>
										<span class="text">
											first day to school
										</span>
										<span class='number'>
											<span>72</span>
										</span>
									</div>
									<div class='item'>
										<span class="text">
											first day to school
										</span>
										<span class='number'>
											<span>72</span>
										</span>
									</div>
									<div class='item'>
										<span class="text">
											first day to school
										</span>
										<span class='number'>
											<span>72</span>
										</span>
									</div>
									<div class='item'>
										<span class="text">
											first day to school
										</span>
										<span class='number'>
											<span>72</span>
										</span>
									</div>
									<div class='item'>
										<span class="text">
											first day to school
										</span>
										<span class='number'>
											<span>72</span>
										</span>
									</div>
								</div>
							</div>
							{{-- end key owrd --}}
							{{-- keyword 2 words --}}
							<div class='keywordCollum col-sm-3 col-xs-12'>
								<div class='Header'>
									<span class='text'>Hai từ</span>
									<span class='number'>Số lượng</span>
								</div>
								<div class='Body'>
									<div class='item'>
										<span class="text">
											first day to school
										</span>
										<span class='number'>
											<span>72</span>
										</span>
									</div>
									<div class='item'>
										<span class="text">
											first day to school
										</span>
										<span class='number'>
											<span>72</span>
										</span>
									</div>
									<div class='item'>
										<span class="text">
											first day to school
										</span>
										<span class='number'>
											<span>72</span>
										</span>
									</div>
									<div class='item'>
										<span class="text">
											first day to school
										</span>
										<span class='number'>
											<span>72</span>
										</span>
									</div>
									<div class='item'>
										<span class="text">
											first day to school
										</span>
										<span class='number'>
											<span>72</span>
										</span>
									</div>
									<div class='item'>
										<span class="text">
											first day to school
										</span>
										<span class='number'>
											<span>72</span>
										</span>
									</div>
									<div class='item'>
										<span class="text">
											first day to school
										</span>
										<span class='number'>
											<span>72</span>
										</span>
									</div>
									<div class='item'>
										<span class="text">
											first day to school
										</span>
										<span class='number'>
											<span>72</span>
										</span>
									</div>
									<div class='item'>
										<span class="text">
											first day to school
										</span>
										<span class='number'>
											<span>72</span>
										</span>
									</div>
									<div class='item'>
										<span class="text">
											first day to school
										</span>
										<span class='number'>
											<span>72</span>
										</span>
									</div>
								</div>
							</div>
							{{-- 2 words --}}
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
@endsection