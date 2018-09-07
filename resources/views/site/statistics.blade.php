@extends('dashboard')
@section('content')
<div class="page-content-wrapper">
	<!-- BEGIN CONTENT BODY -->
	<div class="page-content">
		<div class='statistics-main'>
			<div class='container'>
				<div class='statistics'>
					{{-- START Update --}}
					<div class='statisticsUpdate'>
						<div class="col-sm-2 col-xs-12">
							<a class="dashboard-stat dashboard-stat-v2 blue" href="#">
								<div class="visual">
									<i class="fa fa-comments"></i>
								</div>
								<div class="details">
									<div class="desc">Sống</div>
									<div class="number">
										<span data-counter="counterup" data-value="1349">500.001</span>
									</div>

								</div>
							</a>
						</div>
						<div class="col-sm-2 col-xs-12">
							<div class="dashboard-stat2 ">
								<div class="display">
									<div class="number">
										<small>Áo Bán Được</small>
										<h3 class="font-green-sharp">
											<span data-counter="counterup" data-value="7800">312.321</span>
											{{-- 	<small class="font-green-sharp">$</small> --}}
										</h3>
										
									</div>
									<div class="icon">
										<i class="icon-pie-chart"></i>
									</div>
								</div>
								<div class="progress-info">
									<div class="progress">
										<span style="width: 15.5%;" class="progress-bar progress-bar-success green-sharp">
											{{-- <span class="sr-only">76% progress</span>
										</span> --}}
									</div>
									{{-- <div class="status">
										<div class="status-title"> progress </div>
										<div class="status-number"> 76% </div>
									</div> --}}
								</div>
							</div>
						</div>
						<div class="col-sm-2 col-xs-12">
							<div class="dashboard-stat2 ">
								<div class="display">
									<div class="number">
										<small>Đã Cập Nhật</small>
										<h3 class="font-green-sharp">
											<span data-counter="counterup" data-value="7800">111.111</span>
											{{-- <small class="font-green-sharp">$</small> --}}
										</h3>
										
									</div>
									<div class="icon">
										<i class="icon-pie-chart"></i>
									</div>
								</div>
								<div class="progress-info">
									<div class="progress">
										<span style="width: 36%;" class="progress-bar progress-bar-success green-sharp">
									{{-- 		<span class="sr-only">76% progress</span>
								</span> --}}
							</div>
									{{-- <div class="status">
										<div class="status-title"> progress </div>
										<div class="status-number"> 76% </div>
									</div> --}}
								</div>
							</div>
						</div>
						<div class="col-sm-2 col-xs-12">
							<a class="dashboard-stat dashboard-stat-v2 yellow" href="#">
								<div class="visual">
									<i class="fa fa-comments"></i>
								</div>
								<div class="details">
									<div class="desc">Mới Lên Chợ </div>
									<div class="number">
										<span data-counter="counterup" data-value="1349">332</span>
									</div>

								</div>
							</a>
						</div>
						<div class="col-sm-2 col-xs-12">
							<a class="dashboard-stat dashboard-stat-v2 green" href="#">
								<div class="visual">
									<i class="fa fa-comments"></i>
								</div>
								<div class="details">
									<div class="desc"> Mới Thêm </div>
									<div class="number">
										<span data-counter="counterup" data-value="1349">123</span>
									</div>


								</div>
							</a>
						</div>
						<div class="col-sm-2 col-xs-12">
							<a class="dashboard-stat dashboard-stat-v2 red" href="#">
								<div class="visual">
									<i class="fa fa-comments"></i>
								</div>
								<div class="details">
									<div class="desc"> Đã Xóa </div>
									<div class="number">
										<span data-counter="counterup" data-value="1349">1349</span>
									</div>
								</div>
							</a>
						</div>
					</div>	
					{{-- end --}}
					{{-- start list product --}}
					<div class='ListFeaturedProduct'>
						<div class='row'>
							<div class='col-sm-4 col-xs-12'>
								<div class='tittle-header'>
									Sản Phẩm Ngẫu Nhiên
								</div>
								<div class='listItems'>
									<div class='content-statistics'>
										<div class='items-statistics'>
											<div class="thumbail">	
												<img class="img-responsive" src='./source/img/1.JPG'>
											</div>
											<div class="details">
												<div class="name-tag">
													<a class="Name">asdafasdf</a>
												</div>
												<div class="rank name-tag">	
													<span class="title">Rank:</span>
													<span class="rank-current">123123213</span>
												</div>
												<div class="asin name-tag">
													<span class="title">Brand:</span>
													<span class="value">
														<span>sdfsafadsfdsfa</span>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class='content-statistics'>
										<div class='items-statistics'>
											<div class="thumbail">	
												<img class="img-responsive" src='./source/img/1.JPG'>
											</div>
											<div class="details">
												<div class="name-tag">
													<a class="Name">asdafasdf</a>
												</div>
												<div class="rank name-tag">	
													<span class="title">Rank:</span>
													<span class="rank-current">123123213</span>
												</div>
												<div class="asin name-tag">
													<span class="title">Brand:</span>
													<span class="value">
														<span>sdfsafadsfdsfa</span>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class='content-statistics'>
										<div class='items-statistics'>
											<div class="thumbail">	
												<img class="img-responsive" src='./source/img/1.JPG'>
											</div>
											<div class="details">
												<div class="name-tag">
													<a class="Name">asdafasdf</a>
												</div>
												<div class="rank name-tag">	
													<span class="title">Rank:</span>
													<span class="rank-current">123123213</span>
												</div>
												<div class="asin name-tag">
													<span class="title">Brand:</span>
													<span class="value">
														<span>sdfsafadsfdsfa</span>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class='content-statistics'>
										<div class='items-statistics'>
											<div class="thumbail">	
												<img class="img-responsive" src='./source/img/1.JPG'>
											</div>
											<div class="details">
												<div class="name-tag">
													<a class="Name">asdafasdf</a>
												</div>
												<div class="rank name-tag">	
													<span class="title">Rank:</span>
													<span class="rank-current">123123213</span>
												</div>
												<div class="asin name-tag">
													<span class="title">Brand:</span>
													<span class="value">
														<span>sdfsafadsfdsfa</span>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								{{-- end listiem --}}
								<div class='more'>
									<a >Xem Thêm</a>
								</div>
							</div>
							{{-- suddendly --}}
							<div class='col-sm-4 col-xs-12'>
								<div class='tittle-header'>
									Sản Phẩm Bán Đột Biến 
								</div>
								<div class='listItems'>
									<div class='content-statistics'>
										<div class='items-statistics'>
											<div class="thumbail">	
												<img class="img-responsive" src='./source/img/1.JPG'>
											</div>
											<div class="details">
												<div class="name-tag">
													<a class="Name">asdafasdf</a>
												</div>
												<div class="rank name-tag">	
													<span class="title">Rank:</span>
													<span class="rank-current">123123213</span>
												</div>
												<div class="asin name-tag">
													<span class="title">Brand:</span>
													<span class="value">
														<span>sdfsafadsfdsfa</span>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class='content-statistics'>
										<div class='items-statistics'>
											<div class="thumbail">	
												<img class="img-responsive" src='./source/img/1.JPG'>
											</div>
											<div class="details">
												<div class="name-tag">
													<a class="Name">asdafasdf</a>
												</div>
												<div class="rank name-tag">	
													<span class="title">Rank:</span>
													<span class="rank-current">123123213</span>
												</div>
												<div class="asin name-tag">
													<span class="title">Brand:</span>
													<span class="value">
														<span>sdfsafadsfdsfa</span>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class='content-statistics'>
										<div class='items-statistics'>
											<div class="thumbail">	
												<img class="img-responsive" src='./source/img/1.JPG'>
											</div>
											<div class="details">
												<div class="name-tag">
													<a class="Name">asdafasdf</a>
												</div>
												<div class="rank name-tag">	
													<span class="title">Rank:</span>
													<span class="rank-current">123123213</span>
												</div>
												<div class="asin name-tag">
													<span class="title">Brand:</span>
													<span class="value">
														<span>sdfsafadsfdsfa</span>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class='content-statistics'>
										<div class='items-statistics'>
											<div class="thumbail">	
												<img class="img-responsive" src='./source/img/1.JPG'>
											</div>
											<div class="details">
												<div class="name-tag">
													<a class="Name">asdafasdf</a>
												</div>
												<div class="rank name-tag">	
													<span class="title">Rank:</span>
													<span class="rank-current">123123213</span>
												</div>
												<div class="asin name-tag">
													<span class="title">Brand:</span>
													<span class="value">
														<span>sdfsafadsfdsfa</span>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								{{-- end listiem --}}
								<div class='more'>
									<a >Xem Thêm</a>
								</div>
							</div>
							{{-- Suddenly --}}
							{{-- Best seller --}}
							<div class='col-sm-4 col-xs-12'>
								<div class='tittle-header'>
									Sản Phẩm Bán Chạy Nhất
								</div>
								<div class='listItems'>
									<div class='content-statistics'>
										<div class='items-statistics'>
											<div class="thumbail">	
												<img class="img-responsive" src='./source/img/1.JPG'>
											</div>
											<div class="details">
												<div class="name-tag">
													<a class="Name">asdafasdf</a>
												</div>
												<div class="rank name-tag">	
													<span class="title">Rank:</span>
													<span class="rank-current">123123213</span>
												</div>
												<div class="asin name-tag">
													<span class="title">Brand:</span>
													<span class="value">
														<span>sdfsafadsfdsfa</span>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class='content-statistics'>
										<div class='items-statistics'>
											<div class="thumbail">	
												<img class="img-responsive" src='./source/img/1.JPG'>
											</div>
											<div class="details">
												<div class="name-tag">
													<a class="Name">asdafasdf</a>
												</div>
												<div class="rank name-tag">	
													<span class="title">Rank:</span>
													<span class="rank-current">123123213</span>
												</div>
												<div class="asin name-tag">
													<span class="title">Brand:</span>
													<span class="value">
														<span>sdfsafadsfdsfa</span>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class='content-statistics'>
										<div class='items-statistics'>
											<div class="thumbail">	
												<img class="img-responsive" src='./source/img/1.JPG'>
											</div>
											<div class="details">
												<div class="name-tag">
													<a class="Name">asdafasdf</a>
												</div>
												<div class="rank name-tag">	
													<span class="title">Rank:</span>
													<span class="rank-current">123123213</span>
												</div>
												<div class="asin name-tag">
													<span class="title">Brand:</span>
													<span class="value">
														<span>sdfsafadsfdsfa</span>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class='content-statistics'>
										<div class='items-statistics'>
											<div class="thumbail">	
												<img class="img-responsive" src='./source/img/1.JPG'>
											</div>
											<div class="details">
												<div class="name-tag">
													<a class="Name">asdafasdf</a>
												</div>
												<div class="rank name-tag">	
													<span class="title">Rank:</span>
													<span class="rank-current">123123213</span>
												</div>
												<div class="asin name-tag">
													<span class="title">Brand:</span>
													<span class="value">
														<span>sdfsafadsfdsfa</span>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								{{-- end listiem --}}
								<div class='more'>
									<a >Xem Thêm</a>
								</div>
							</div>
							{{-- end best --}}
						</div>
					</div>
					{{-- end --}}
					{{-- Chart  --}}
					<div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <!-- BEGIN PORTLET-->
                             <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-share font-red-sunglo hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Revenue</span>
                                        <span class="caption-helper">monthly stats...</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a href="" class="btn dark btn-outline btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Filter Range
                                                <span class="fa fa-angle-down"> </span>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;"> Q1 2014
                                                        <span class="label label-sm label-default"> past </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Q2 2014
                                                        <span class="label label-sm label-default"> past </span>
                                                    </a>
                                                </li>
                                                <li class="active">
                                                    <a href="javascript:;"> Q3 2014
                                                        <span class="label label-sm label-success"> current </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Q4 2014
                                                        <span class="label label-sm label-warning"> upcoming </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="site_activities_loading">
                                        <img src="../assets/global/img/loading.gif" alt="loading" /> </div>
                                    <div id="site_activities_content" class="display-none">
                                        <div id="site_activities" style="height: 228px;"> </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PORTLET-->
                        </div>
                        {{-- pie chart --}}
                        <div class="col-sm-4 col-xs-12">
                            <div class="portlet light portlet-fit bordered">
                                {{-- <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-red"></i>
                                        <span class="caption-subject font-red sbold uppercase">Pie Chart 1</span>
                                    </div>
                                    <div class="actions">
                                        <input type="checkbox" class="make-switch" checked data-on-color="info" data-off-color="success" data-size="small"> </div>
                                </div> --}}
                                <div class="portlet-body">
                                    <div id="pie_chart" class="chart"> </div>
                                </div>
                            </div>
                        </div>
                        {{-- end pie chart --}}
					{{-- End Chart --}}
				</div>	
			</div>
		</div>
	</div>
</div>
@endsection