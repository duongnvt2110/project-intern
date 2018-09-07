<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
	 <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
	<script type="text/javascript">
		$(document).ready(function(){
		for(let i=0;i<2;i++){
		  $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          $.ajax({
            type:"get",
            url:'crawl-esty',
            data:{search:i},
            dataType:"text",
            success:function(data){
            	$('body').html(data);
              console.log('text');
            	console.log('success');
            },
            error:function(){
              console.log('error');
            }
          });
		}
		});

	</script>
</body>
</html>