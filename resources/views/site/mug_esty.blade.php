@extends('site.product')
@section('content-product')
<div class='row items-row'>
  @foreach($estyProduct as $value)

  <div class="items-list col-sm-3 col-md-3 col-xs-12">
    <div class='cover'>
      
      <div class="top">
        <div class="buttonfarvorite">
          <i class="far fa-heart"></i>
          <span>Lưu</span>
        </div>
        <div class="thumbail">
          <a id="myBtn">
            <img class="img-responsive" style="width: 250px;height: 250px;" src="{{json_decode($value['url_img'])[0]}}">
          </a>
        </div>
        <div class="price">
          <span>$ {{$value['prices']}}</span>
        </div>
      </div>
      <div class='export-csv name-tag'>
         <input type="checkbox" class="export-csv" value="{{$value['id']}}">Export CSV<br>
      </div>
      <div class="bottom">
              {{-- <div class="rank name-tag">
                <div class="btn-arrow">   
                  <span><i class="fas fa-arrow-right"></i></span>
                </div>
                <span class="rank-current">'.$value['rank'].'</span>
                <div class="rate">
                  <span class="before">
                   {{$value['feedback']}}
                  </span>
                </div>
              </div> --}}
              <div class="name-tag">
                <a class="feedback">FeedBack: {{$value['feedback']}} reviews</a>
              </div>
              <div class="name-tag">
                <a class="favorited">Favorited by: {{$value['favorited']}} people</a>
              </div>
              <div class="name-tag">
                <a class="Name" target="_blank" 
                @if($value['is_export']==true)
                      style='color: red';
                @endif
                href="{{$value['url_product']}}">{{$value['title']}}</a>
              </div>
              <div class="asin name-tag">
                <span class="title">Seller Name: </span>
                <span class="value">
                  <span>{{$value['seller_name']}}</span>
                  {{--  <a ><i class="fa fa-amazon"></i></a> --}}
                </span>
              </div>
              <div class="updated name-tag">
                <span class="update">Data Crawled: {{$value['date_crawled']}}</span>
              </div>
            </div>
          </div>
        </div>

        @endforeach
      </div>
      <div class="ChangePage">
        <ul>
          {{ $estyProduct->links() }}
        </ul>
      </div>
      @endsection