@extends('dashboard')
@section('content')
<div class="page-content-wrapper">
	<!-- BEGIN CONTENT BODY -->
	<div class="page-content">
		<div class='event-main'>
			<div class='container'>
				<div class='trade-mark'>
					<div class="searchcontrol col-sm-4 col-md-4 col-xs-12">
						{!! Form::Open(['class'=>'form-search','style'=>'display:flex;'])!!}
						<div class='searchterm'>
							<input data-lpignore="true" class="form-control" type="text" name="search-term" id="search-term" placeholder="ASIN hoặc từ khóa..." value="">
						</div>    
						{!! Form::Close() !!}                        
					</div>
					{{-- <div class='response-sortControl'> --}}
						<div class='label col-sm-1 col-xs-12'><a>Sắp Xếp Theo:</a> </div>
						<div class='btn-sort col-sm-1 col-xs-12'>
							<button class='btn blue btn-outline button-tradeMark  '>Thời gian</button>
							<button class='btn blue btn-outline button-tradeMark '>Cảnh Báo</button>
						</div>
						{{-- <div class=' btn-sort col-sm-1 col-xs-12'></div> --}}


					{{-- 	</div> --}}

				</div>
			</div>
			<div class='content-tradeMark'>
			</div>
		</div>
	</div>
</div>
</div>
@endsection