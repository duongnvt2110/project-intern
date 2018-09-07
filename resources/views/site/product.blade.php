@extends('dashboard')
@section('content')
@if(Session::has('admin'))
<!-- END SIDEBAR -->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
  <!-- BEGIN CONTENT BODY -->
  <div class="page-content">
    <!-- BEGIN PAGE HEADER-->
    <!-- BEGIN THEME PANEL -->
    <!-- END THEME PANEL -->
    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">
      <ul class="page-breadcrumb">
        <li>
          <a href="index.html">Home</a>
          <i class="fa fa-circle"></i>
        </li>
        <li>
          <span>Product</span>
        </li>
      </ul>
      <!-- Stat action -->
      <!-- end start action -->
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <div class="page-title">
     {{--  <div class='container'>
      <div class='row'> --}}

        <div class='itemsearchheader'>
          <div class='container'>
            <div class='row'>
              <div class='top'>
                <div class="searchcontrol col-sm-5">
                  {!! Form::open(['class'=>'form-search','style'=>'display:flex;'])!!}
                  {{-- <form class='form-search' style="display:flex;"> --}}
                    <div class='row'>
                      <div class='selectwarpper col-sm-4'>
                        <select class='search-type form-control' name='search-type'>
                          <option value="all_words">Chứa tất cả các từ</option>
                          <option value="at_least_one">Có ít nhất 1 từ</option>
                          <option value="same_order">Các từ đúng thứ tự</option>
                          <option value="match_pharse">Đúng chính xác</option>
                        </select>
                      </div>
                      <div class='searchterm col-sm-4'>
                        <input data-lpignore="true" class="form-control" type="text" name="search-term" id="search-term" placeholder="ASIN hoặc từ khóa..." value="">
                      </div>
                      <div class='excluedkeyword col-sm-4'>
                        <input class="input form-control" type="text" data-lpignore="true" name="excluded-word" id="excluded-word" placeholder="Từ khóa loại trừ" value="">
                      </div>
                    </div>
                    {!! Form::Close()!!}  
                  </div>
                  <div class="filtercontrol col-sm-7">
                    <div class='row'>
                      <div class='filterrank col-sm-2 '>
                        {!! Form::open(['class'=>'filter-rank-form','style'=>'display:flex;'])!!}
                        <div class='filter-rank'>
                          <a class="content" id="filter-rank" data-tonggle='filter-rank' tabindex="1">Filter Rank</a>      
                        </div>
                        <div class="filterankeditor"></div>
                      </div>
                      <div class='filterprice col-sm-2 '>
                        <div class='filter-price'>
                         <a class="content" id="filter-price" data-tonggle='filter-price' tabindex="1">Filter Price</a>
                       </div>
                     </div>
                     <div class='filtertime col-sm-2'>
                      <div class='filter-time'>
                        <a class="content" id="filter-time" data-tonggle='filter-time' tabindex="1" data-content='<div id="popover-content">
                          <div class="auto col-sm-6">
                            <form class="text-form">
                              <input type="text" class="form-control" value="1">
                              <span class="text-auto">Ngày trước</span>
                            </form>
                            <button type="button" class="btn btn-trend btn-default">Tất Cả</button>
                            <button type="button" class="btn btn-trend btn-default">Tuần trước</button>
                            <button type="button" class="btn btn-trend btn-default">Tháng trước</button>
                          </div>
                          <div class="custom col-sm-6">
                            <form role="form" method="post">
                              <div class="btn-group">
                                <div class="form-group">
                                  <label>Start time?</label>
                                  <div class="input-group date" >
                                    <input type="text" id="datetimepicker1" class="form-control" placeholder="Start Date time " />
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label>End time?</label>
                                  <div class="input-group date" >
                                    <input type="text" id="datetimepicker2" class="form-control" placeholder="End Date time" />
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                          <div class="portlet-body util-btn-margin-bottom-5">
                           <div class="clearfix">
                            <button type="button" class="btn btn-default form-control">Save</button>
                          </div>
                        </div>'>Filter Time</a>                            
                      </div>
                      <div class="Filtertimeeditor"></div>
                    </div>
                    {!! Form::Close()!!}
                    <div class='filterbrand col-sm-2'>
                      <select class='filter-brand form-control' name='search-type'>
                        <option value="offical">Offical</option>
                        <option value="unoffical">Unoffical</option>
                        <option value="all">All Brands</option>
                      </select>
                    </div>
                    <div class='filterstatus col-sm-2'>
                      <select class='search-type form-control'  name='search-type'>
                        <option value="live">Sống</option>
                        <option value="die">Chết</option>
                        <option value="all">Tất cả</option>
                      </select>
                    </div>
                    <div class='filtertype col-sm-2'>
                      {!! Form::open(['class'=>'filter-type-form'])!!}
                      <select class='search-type form-control' id='filterType' name='search-type'>
                        <option  @if(Session::get('option')=='all')
                        selected
                        @endif value="all">All</option>
                        <option @if(Session::get('option')=='feedback')
                        selected
                        @endif
                        value="feedback">Feedback</option>
                        <option @if(Session::get('option')=='favorited')
                        selected
                        @endif
                        value="favorited">Favorited</option>
                        {{-- <option value="all">Tất cả</option> --}}
                      </select>
                    {{-- <select class='search-type form-control' name='search-type'>
                     <optgroup label="clothing">
                      <option value="all">Tất cả kiểu áo</option>
                      <option value="standard">Standard T-Shirt</option>
                      <option value="premium">Premium T-Shirt</option>
                      <option value="longsleeve">Long Sleeve T-Shirt</option>
                      <option value="hoodie">Pullover Hoodie</option>
                      <option value="sweatshirt">Sweatshirt</option>
                    </optgroup>
                    <optgroup label="popsockets">
                      <option value="popsockets">Popsockets</option>
                    </optgroup> --}}
                  {!! Form::Close()!!}
                </div>
              </div>
            </div>
          </div>
          <div class='bottom '>
            <div class='wrapper'>

              <div class='sortcontrol'>
                <div class='row'>
                  <label class='title-sort col-sm-1 col-xs-12'>Sắp sếp theo:</label>
                  <div class="btn-group col-sm-10 col-xs-12">
                    <button type="button" class="btn btn-trend btn-default button-export" style="display: none">Export CSV</button>
                  {{--   <button type="button" class="btn btn-trend btn-default">Xu Thế</button>
                    <button type="button" class="btn btn-bestsel btn-default">Bán Tốt Nhất</button>
                    <button type="button" class="btn btn-suddenincrease btn-default">Tăng Đột Biến</button>
                    <button type="button " class="btn btn-created btn-default">Ngày Đăng</button>
                    <button type="button" class="btn btn-relative btn-default">Liên Quan</button> --}}
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="content-item">
      <div class='tablelistitem'>
          <div class='listitemwarper'> 
            {{-- content product --}}
            @yield('content-product')
            {{-- contentproduct --}}
        </div>
      </div>
    </div>
{{--   </div>
  </div> --}}
</div>
</div>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
{{-- Modal --}}
<!-- Modal -->
<!-- Modal -->
{{-- <div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-lg   ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class='row'>
          <div class='bodyleft col-sm-5'>
            <div class='leftwrapper '>
              <div class='buttonfarvorite'>
                <i class="far fa-heart"></i>
                <span>Lưu</span>
              </div>
              <div class='thumbail'>
                <a id="myBtn">
                  <img class='img-responsive' src='../public/source/img/1.jpg'>
                </a>
              </div>
            </div>
          </div>
          <div class='bodyright col-sm-7'>
            <div class='bodywrapperright'>
              <div class='title'><a href="javascript;">T-Shirt</a></div>
              <div class='listed list-rank'>
                <span>Xếp Hạng:</span>
                1.232.131                
              </div>
              <div class='listed list-asin'>
                <span>Asin:</span>
                AFDSFSDF
                <a ><i class="fa fa-amazon"></i></a>
              </div>
              <div class='listed list-brand'>
               <span>Brand:</span>
               <a>safsdfasdf</a>
             </div>
             <div class='listed list-features'>
              <span class='Features'>Features:</span>
              <ul>
                <li>TEXT</li>
                <li>TEXT</li>
                <li>TEXT</li>
                <li>TEXT</li>
                <li>TEXT</li>
              </ul>
            </div>
            <div class='listed list-price'>
              <span>Giá:</span>
              $12.4
            </div>
            <div class='listed list-created'>
             <span>Ngày Đăng:</span>
             20/7/2018
           </div>  
           <div class='listed list-updated'>
            <span>Cập nhật Lúc:</span>
            7 giờ trước
          </div>  
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <div class='group-btn'>
      <button type="button" class="btn btn-default" data-dismiss="modal">Tuần trước</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Tháng trước</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Tất cả</button>
    </div>
    <div class="portlet-body">
      <div class="tab-content">
        <div class="tab-pane active" id="portlet_ecommerce_tab_1">
          <div id="statistics_1" class="chart"> </div>
        </div>
      </div>
    </div>
  </div>

</div>
</div> --}}
{{-- End Modal --}}
<!-- END QUICK SIDEBAR -->
</div>
@else
{{redirect()->route('admin') }}
@endif
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
@endsection




