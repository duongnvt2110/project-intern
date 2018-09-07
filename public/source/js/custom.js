$(document).ready(function(){
	$option={
    placement: 'bottom',
    title: 'Filter Rank',
    html: true,
    popout: false,
    singleton: false,
    content:
    `<div class="popover-filter">
    <div class="arrow"></div>
    <div class="popover-content text-center">   
    <div class='auto col-sm-6'>
    <button type="button" class="btn btn-trend btn-default">Tất Cả</button>
    <button type="button" class="btn btn-trend btn-default">Top 100.000</button>
    <button type="button" class="btn btn-trend btn-default">Top 200.000</button>
    <button type="button" class="btn btn-trend btn-default">Top 500.000</button>
    </div>
    <div class='custom col-sm-6'>       
    <div class="btn-group">
    <div class="form-group">
    <label>Từ</label>
    <div class="input-group ">
    <input type="number" class="prices_to form-control" name='prices_from' placeholder="number"> 
    </div>
    </div>

    <div class="form-group">
    <label>Đến</label>
    <div class="input-group ">
    <input type="number"  class="prices_from form-control" name='prices_to' placeholder="infinity" value='2000000'> 
    </div>
    </div>
    </div>
    <div class="portlet-body util-btn-margin-bottom-5">
    <div class="clearfix">
    <input type="button" class="btn btn-rank btn-default form-control" value='Search'>
    </div>
    </div>
    </div>
    </div>
    </div>`
  };
    // if($('body').click())
    // {
    //     $('body').popover('hidden');
    // }
    $('[data-tonggle="filter-rank"]').popover($option);

    
    $option={
      placement: 'bottom',
      title: 'Filter Prices',
      html: true,
      popout: false,
      singleton: false,
      content:
      `<div class="popover-filter">
      <div class="arrow">
      </div>
      <div class="popover-content text-center">      
      <div class="btn-group">
      <div class="form-group">
      <label>From</label>
      <div class="input-group ">
      <input type="number" class="form-control" placeholder="number">
      </div>
      </div>
      <div class="form-group">
      <label>To</label>
      <div class="input-group ">
      <input type="number"  class="form-control" placeholder="infinity" value='2000000'>
      </div>
      </div>
      </div>
      <div class="portlet-body util-btn-margin-bottom-5">
      <div class="clearfix">
      <button type="button" class="btn btn-default form-control">Save
      </button>
      </div>
      </div>
      </div>
      </div>`
    };
    $('[data-tonggle="filter-price"]').popover($option); 
    $option={
      placement: 'bottom',
      title: 'Filter Time',
      html: true,
      content:
      `<div id="popover-content">
      <form role="form" method="post">
      <div class="btn-group">
      <div class="form-group">
      <label>Start time?</label>
      <div class="input-group date" >
      <input type="text" id="datetimepicker1" class="form-control" placeholder="Start Date time of event" /> 
      </div>
      </div>
      <div class="form-group">
      <label>End time?</label>
      <div class="input-group date">
      <input type="text" id="datetimepicker2" class="form-control" placeholder="End Date time" />
      </div>
      </div>
      <div class="form-group">
      <button class="btn btn-primary btn-block">Search between dates</button>
      </div>
      </div>
      </form>
      </div>`
    };
    var showPopover = $.fn.popover.Constructor.prototype.show;
    $.fn.popover.Constructor.prototype.show = function () {
      showPopover.call(this);
      if (this.options.showCallback) {
        this.options.showCallback.call(this);
      } 
    }
    $('[data-tonggle="filter-time"]').popover({placement:'bottom',
      html: true,
      showCallback: function () {
        $('#datetimepicker1').datepicker();
        $('#datetimepicker2').datepicker();
      }
    });
    $('[data-tonggle="tonggle-time"]').popover({placement:'bottom',
      html: true,
      showCallback: function () {
        $('#timekeyword').datepicker();
      },
    });
    // hidden popover
    $('html').on('click', function(e) {
      if (typeof $(e.target).data('original-title') == 'undefined' &&
       !$(e.target).parents().is('.popover.in')) {
        $('[data-original-title]').popover('hide');
    }
  });

    $("#myBtn").click(function(){
      $("#myModal").modal();
    });   
    
      // Search term
      $("#search-term").keyup(function(){
        var txt=$(this).val();
        if(txt=='')
        {
          console.log('text');
        }
        else
        {
          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          $.ajax({
            type:"post",
            url:'search-term',
            data:{search:txt},
            dataType:"text",
            success:function(data){
              $(".listitemwarper").html(data);
            },
            error:function(){
              console.log('error');
            }
          });

        }
      });
   // Click search filter
   $(document).on('click','.btn-rank', function() {
    console.log('123');
    $('.popover').popover('hide');
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type:"post",
      url:'filter-rank',
      data:{to:$(".prices_to").val(),from:$(".prices_from").val()},
      dataType:"text",
      success:function(data){
        $(".listitemwarper").html(data);
      },
      error:function(){
        console.log('error');
      }
    });

  });
   // filter product

   $("#filterType").change(function()
   {
    console.log('click');
    var txt=$(this).val();
    var link =window.location.href; 
    var patt1 = /\w+-\w+/;
    var url = link.match(patt1);
    console.log(url[0]);
    if(txt=='')
    {
      $(".listitemwarper").css('display','block');
    }
    else
    { 
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        type:'get',
        url:url[0],
        data:{search:txt},
        dataType:"text",
        success:function(data){
        // window.location=url[0];
        $("body").html(data);
          // $(".ChangePage").html(data[1]);
          console.log('success');
        },
        async:false
      });
    }
  });
   // js export csv
   // show and hiiden button export

   $('input[type="checkbox"]').click(function(){
      if($(this).prop('checked')==true){
         $(".button-export").css('display','block');
      }else{
         var count= $('.export-csv:checked').length;
         console.log(count);
        if(count==0){
          $(".button-export").css('display','none');
        }
      }
   });

   // end show end hidden button export

   // excute export 
   $('.button-export').click(function(){
      console.log('abc');
      var id= JSON.stringify(getValueCheckBox());
      console.log(id);

         $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
         // 
        $.ajax({
        type:'get',
        url:'export-csv',
        data:{search:id},
        dataType:"text",
        success:function(data){
        console.log(data);
        window.location.href=data;
       
          // $(".ChangePage").html(data[1]);
          console.log('success');
        },
        async:false
      });

  });
   // end excute export

   // function get value checkbox
   function getValueCheckBox(){
     var exportArray = [];

     /* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
     $(".export-csv:checked").each(function() {
      exportArray.push($(this).val());
    });

     /* we join the array separated by the comma */
    var selected;
    selected = exportArray.join(',') ;
     // var id=exportArray.toString();
    return exportArray;
   }
   // end js export csv
 });