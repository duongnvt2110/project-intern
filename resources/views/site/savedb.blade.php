<!DOCTYPE html>
<html>
<head>
	<?php
	header_remove('Access-Control-Allow-Origin');
	header('Access-Control-Allow-Origin: *');
	?>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title></title>
	<script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
	<script
	src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
	integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
	crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<script type="text/javascript">
		
		$(document).ready(function(){

			$.get('https://www.gameroomshop.com/collections/billiards/products.json?limit=40',    function(data){	

				for(var i = 0; i < 40	; i++) {
					console.log('https://www.gameroomshop.com/collections/billiards/products/'+data['products'][i].handle+'.json');	


					 $.get('https://www.gameroomshop.com/collections/billiards/products/'+data['products'][i].handle+'.json', async function(data){

						
						var data_add = {
							"id":data['product'].id,
							// "sku":data['product'].variants[0].sku,
							"url":'https://www.gameroomshop.com/collections/billiards/products/'+data['product'].handle,
							"title":data['product'].title,
							"variants":data['product'].variants,
							"is_crawler":1,
							"tags":data['product'].tags,
							"handle":data['product'].handle,
							"img_src":data['product'].images[0].src,
							"images":data['product'].images,
							"options":data['product'].options,
							"product_type":data['product'].product_type,
							"body_html":data['product'].body_html,
							"vendor":data['product'].vendor,
							
							
							// "variant_prices":data['product'].variants[0].price,
							// "variant_compare_prices":data['product'].variants[0].compare_at_price,
							// "variant_shipping":data['product'].variants[0].requires_shipping,
							// "variant_taxable":data['product'].variants[0].taxable,
							
							
						}
						$.ajaxSetup({
								headers: {
									'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
								},
								async:false
							});
						await $.post('data-import',data_add,function(data){
							console.log(data);
						});
					},"json");
				}
			},"json");	

		});
	</script>
</body>
</html>