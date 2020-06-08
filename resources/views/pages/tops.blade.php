@extends('layouts.index')

@section('content')
	<div class="container header-tops">
		<h2>ÁO THUN</h2>
	</div>

	<div class="container">
		<div class="col-md-5 left">
			<h2 class="text-center">DANH MỤC</h2>
			<hr>
			<br>
			<div class="timsptheogia">
				<h4>Giá sản phẩm</h4>
				<input type="checkbox" name="timtheogia" class="timtheogia" value="5"> <span class="text1">Giá dưới 400 000đ</span><br>
				<input type="checkbox" name="timtheogia" class="timtheogia" value="6"> <span class="text1">400 000 - 700 000đ</span><br>
				<input type="checkbox" name="timtheogia" class="timtheogia" value="7"> <span class="text1">700 000 - 1 000 000đ</span><br>
				<input type="checkbox" name="timtheogia" class="timtheogia" value="8"> <span class="text1">Giá trên 1 000 000đ</span><br>
			</div>
			<div class="timsptheoloai">
				<h4>Loại</h4>
				<input type="checkbox" name="timtheoloai" class="timtheoloai">Áo thun
				<input type="checkbox" name="timtheoloai" class="timtheoloai">Phụ kiện
			</div>
		</div>
		<div class="col-md-7 right padding-top-35">
			<span><strong>Xếp theo: </strong></span>
			<input type="radio" name="sort" class="sort" value="1"> Tên A-Z
			<input type="radio" name="sort" class="sort" value="2"> Tên Z-A
			<input type="radio" name="sort" class="sort" value="3"> Giá thấp đến cao
			<input type="radio" name="sort" class="sort" value="4"> Giá cao đến thấp
			<br><hr><br>

			<!-- các sản phẩm -->
				<section class="products-view">
					@foreach($sanpham as $sp)
						<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
		 
						<div class="product-card">
							<a class="product-url" href="/painmadehustlers-t-shirt-den-cam" title="#PAINMADEHUSTLERS T-Shirt Đen/Cam"></a>
							
							
							
							<div class="product-card__inner">
								<div class="product-card__image lazyload">
									<img src="images/sanpham/{{$sp->hinh}}" class="product-card-image-front img-responsive center-block" alt="#PAINMADEHUSTLERS T-Shirt Đen/Cam" />
									
									<img src="images/pmh-front-orange.jpg" class="product-card-image-back img-responsive center-block" alt="#PAINMADEHUSTLERS T-Shirt Đen/Cam" />
									
								</div>
								<h4 class="product-single__series">{{$sp->loaisanpham->tenloaisanpham}}</h4>
								<h3 class="product-card__title">#{{$sp->tensanpham}}</h3>
								<div class="product-price">
									
									
									<strong>{{$sp->gia}}₫</strong>
									
									
								</div>
							</div>
							<form action="/cart/add" method="post" enctype="multipart/form-data" class="hidden-md variants form-nut-grid form-ajaxtocart" data-id="product-actions-15710311">
								<div class="product-card__actions">
									
									
									<input class="hidden" type="hidden" name="variantId" value="27381674" />
									<a class="button ajax_addtocart quickview_data" id="{{$sp->id}}" href="tops/{{$sp->tenkhongdau}}" title="Tùy chọn">Tùy chọn</a>
									
									
								</div>
							</form> 
						</div>			
					</div>
					<!-- sanpham 1 -->
					@endforeach
				</section>

				<section class="products-view-by-price">
					
				</section>
			<!-- các sản phẩm -->
		</div>
	</div>
@endsection

@section('script')
<!--Có khai báo dòng script này để sử dụng jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        // $(document).ready(function(){
        //     $('.sort').click(function(){
        //     	var radioValue = $("input[name='sort']:checked").val();
        //     	$.get('tops/'+radioValue, function(data){
        //     		$('.products-view').html(data);
        //     	});
        //     });

        //     $('.timtheogia').click(function(){
        //     	$.each($("input[name='timtheogia']:checked"), function(){
        //     		$('.products-view-by-price').html('');
        //     		$.get('tops/'+$(this).val(), function(data){
        //     		$('.products-view').html('');
        //     		$('.products-view-by-price').append(data);
        //     	});
        //     	});
            	
        //     });
        // });

        $(document).ready(function(){
        	//phục vụ chức năng filter sản phẩm theo tên, theo giá
        		var action = "fetch_data";
        		var radioValue = 0;
        		
        		var checkboxValue = [];
        		checkboxValue = 0;
        		$('.sort').click(function(){
        			radioValue = $("input[name='sort']:checked").val();
        			// for(var i = 0; i < $('.sort').length; i++)
        			// {
        			// 	if($('.sort')[i].val() == radioValue)
        			// 	{
        			// 		$('.sort')[i].css("color","green");
        			// 	}
        			// }
        			//alert(radioValue);
        			$.ajax({
        			url:"tops",
        			method:"get",
        			data:{
        				action:action,
        				radioValue:radioValue,
        				checkboxValue:checkboxValue
        			},
        			success:function(data){
        				$('.products-view').html(data);
        				
        			}
        		});
        		});
        		$('.timtheogia').click(function(){
        			checkboxValue = get_filter('timtheogia');
        			//alert(checkboxValue);
        			$.ajax({
        			url:"tops",
        			method:"get",
        			data:{
        				action:action,
        				radioValue:radioValue,
        				checkboxValue:checkboxValue
        			},
        			success:function(data){
        				$('.products-view').html(data);
        				
        			}
        		});
        		});
        		
        			
        		
        	function get_filter(class_name)
        	{
        		var filter = [];
        		$('.'+class_name+':checked').each(function(){
        			filter.push($(this).val());
        		});
        		return filter;
        	}
        	
        });
    </script>
@endsection