@extends('layouts.index');

@section('content')
	<div class="pattern" style="border: 1px solid gray; border-left: none; border-right: none; padding: 15px; font-size: 17px;">
		<a href="trangchu">Trang chủ</a> > <a href="aothun">Tops</a> > <a href="" style="color: red;">{{$sp->tensanpham}}</a>
	</div>
	<div class="container-all">
		<!-- Nội dung phía bên trái -->
		<div class="left-contents">
			<div class="myimage-slides">
				<div class="numbertext">1 / 3</div>
				<img src="images/test/quandai-side.jpg" style="width: 100%; cursor: pointer;" title="Click để xem" onclick="myFunction(this)">
			</div>

			<div class="myimage-slides">
				<div class="numbertext">2 / 3</div>
				<img src="images/test/75453615-491892238072075-3097576833881735168-n.jpg" style="width: 100%; cursor: pointer;" title="Click để xem" onclick="myFunction(this)">
			</div>

			<div class="myimage-slides">
				<div class="numbertext">3 / 3</div>
				<img src="images/test/cargopantsizechart.jpg" style="width: 100%;cursor: pointer;" title="Click để xem" onclick="myFunction(this)">
			</div>

			<!--Modal -->
			<div id="myModal" class="modal">

				<!-- modal content -->
				<div class="modal-content">
					<span class="close">&times;</span>
					<img src="" id="modal-image">
				</div>
			</div>

			<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
			<a class="next" onclick="plusSlides(1)">&#10095;</a>

			<div class="contain-slideshow">
			  <img src="images/test/quandai-side.jpg" class="dot" onclick="currentSlide(1);">
			  <img src="images/test/75453615-491892238072075-3097576833881735168-n.jpg" class="dot" onclick="currentSlide(2);">
			  <img src="images/test/cargopantsizechart.jpg" class="dot" onclick="currentSlide(3);">
			</div>
		</div>

		<!-- Nôi dung phía bên phải -->
		<div class="right-contents">
			<h2>{{$sp->tensanpham}}</h2>
			<br>
			<h5>{{$sp->gia}}đ</h5>
			<h3>Tình trạng:</h3>
			<h4>Kích thước: </h4>
			<div class="select-size">
				<input type="hidden" name="" value="{{$sp->id}}" class="id_sp">
				<input type="radio" name="size-products" value="s" class="size-products">S&nbsp;
				<input type="radio" name="size-products" value="m" class="size-products">M&nbsp;
				<input type="radio" name="size-products" value="l" class="size-products">L&nbsp;
				<input type="radio" name="size-products" value="xl" class="size-products">XL&nbsp;
			</div>
			<div class="kiemtrasoluong">

			</div>
			<div class="thanhtoan">
				<button type="button" value="{{$sp->gia}}" class="thanhtoanbtn">Mua ngay với giá {{$sp->gia}}đ</button>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script type="text/javascript">
		var slideindex = 1;
		showSlide(slideindex);
		function plusSlides(n) {
  			showSlide(slideindex += n);
		}

		function currentSlide(n) {
		  showSlide(slideindex = n);
		}

		function showSlide(n)
		{
			var i;
			var slides = document.getElementsByClassName("myimage-slides");
			var dots = document.getElementsByClassName("dot");

			if(n < 1)
			{
				slideindex = slides.length;
			}
			if(n > slides.length)
			{
				slideindex = 1;
			}

			for(i = 0; i < slides.length; i++)
			{
				slides[i].style.display = "none";
			}
			for (i = 0; i < dots.length; i++) {
      			dots[i].className = dots[i].className.replace(" active-dots", "");
  			}
			slides[slideindex-1].style.display = "block";
			dots[slideindex-1].className += " active-dots";
		}


		var modal = document.getElementById("myModal");
		var modal_image = document.getElementById("modal-image");
		function myFunction(imageTag){
			modal.style.display = "block";
			modal_image.src = imageTag.src;
		}
		var closebtn = document.getElementsByClassName("close")[0];
		closebtn.onclick = function(){
			modal.style.display = "none";
		}
		window.onclick = function(event){
			if(event.target == modal)
			{
				modal.style.display = "none";
			}
		}
	</script>

	<!--Khai báo để sử dụng jquery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	

	<script type="text/javascript">
		$(document).ready(function(){
			var sizevalue = "";
			var id_product = 0;
			$('.size-products').click(function(){
				sizevalue = $("input[name='size-products']:checked").val();
				id_product = $(".id_sp").val();
				$.get("kiemtrasoluong/"+id_product+"/"+sizevalue, function(data){
					$(".kiemtrasoluong").html(data);
				});
			});

			$(".thanhtoanbtn").click(function(){
				// alert($(this).val());
				$("#myModal").css("display", "block");
				$("#modal-image").removeAttr("src");

				id_product = $(".id_sp").val();

				$.get("giohang/"+id_product, function(data){
					$(".modal-content").append(data);
				});


			});

			function xoakhoigiohang(thisButton)
			{
				alert(thisButton.value);
			}
		});
	</script>
@endsection