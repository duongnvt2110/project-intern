<!DOCTYPE html>
<html>
<head>
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

			retrieveCollection();

			function retrieveCollection(){
				var url='https://gameroomshop.com/';
				$.get('https://gameroomshop.com/collections.json',async function(data){
					// data['collections'].length
					// console.log(data);
					for (var i = 0; i < 10; i++) {
						// await wait(3000);
						console.log(i);
						await crawlShopify(data['collections'][i].handle);

					}
					
				},'JSON');	
			};

			async function crawlShopify(category){
				await $.get('https://gameroomshop.com/collections/'+category+'/count.json', async function(count){
		 		 	// await wait(3000);
		 		 	await $.get('https://gameroomshop.com/collections/'+category+'/products.json?limit='
		 		 		+count['collection'].products_count,async function(data){	
		 		 			console.log('category'+category);
		 		 			console.log('Amount of product:'+count['collection'].products_count);
							// await wait(3000);
							for(let i=0;i<count['collection'].products_count;i++)
							{
								// await wait(3000);
								// console.log(data['products'][i].handle);
								var url='https://gameroomshop.com/collections/'+category+'/products/'+data['products'][i].handle+'.json';
								// console.log(url);
								// console.log(data.statusText);
								await myCallback(url,category);
							}		
						});	
		 		 });
				
				
			};


			async function myCallback(response,category) {
				var url = response;

				  // Do whatever you need with result variable
				  
				await $.get(url,async function(data,status){

						 // $.get(''https://gameroomshop.comcollections/billiards/products/valley-panther-black-cat-pool-table-coin-op.json', async function(data){
						 	var data_add = {
						 		"handle":data['product'].handle,
						 		"title":data['product'].title,
						 		"body_html":data['product'].body_html,
						 		"type":data['product'].product_type,
						 		"vendor":data['product'].vendor,
						 		"tags":data['product'].tags,
						 		"options":data['product'].options,
						 		"variant_prices":data['product'].variants[0].price,
						 		"variant_compare_prices":data['product'].variants[0].compare_at_price,
						 		"variant_shipping":data['product'].variants[0].requires_shipping,
						 		"variant_taxable":data['product'].variants[0].taxable,
						 		"images":data['product'].images,
						 		"id":data['product'].id,
						 		"variants":data['product'].variants,
						 		"file_name":category
						 	}
						 	console.log(url);
						 	console.log(status);
						 	console.log(data_add);
						 	await crawlData(data_add);
						 });
				}
				var i=0;
				function crawlData(data_add)
				{
					return new Promise(r=>$.post('data-gameroom',data_add, function(data,status){
						i=i+1;
						console.log(data_add['handle']);
						// console.log(data);
						console.log(status+' import');
						console.log(i);
					}));
				}
				function wait(ms){
					return new Promise(r=>setTimeout(function(){console.log('delay');},ms));
				}
			});	
		</script>
	</body>
	</html>