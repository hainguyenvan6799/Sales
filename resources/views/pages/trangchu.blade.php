@extends('layouts.index')

@section('content')
@include('pages.hot-products')
<h2 class="text-center">Sản phẩm mới</h2>
<hr>
<section class="awe-section-3">
		<div class="section_banner">
	<div class="container">
		<div class="row">

			@foreach($theloai as $tl)
			<div class="col-sm-4 col-xs-12 evo-margin">
				<div class="evo-banner">
					<img src="images/theloai/{{$tl->hinhdaidien}}" alt="Tops [ Áo thun ]" class="img-responsive center-block" />
					<div class="evo-banner-content">
						<h3>{{$tl->tentheloai}}</h3>
						<a href="https://iron-fever.vn/ao-thun" title="Xem thêm">Xem thêm</a>
					</div>
				</div>
			</div>
			@endforeach
			
			{{-- <div class="col-sm-4 col-xs-12 evo-margin">
				<div class="evo-banner">
					<img src="images/spm2.jpg" alt="Bottom [ Quần ]" class="img-responsive center-block" />
					<div class="evo-banner-content">
						<h3>Bottom [ Quần ]</h3>
						<a href="https://iron-fever.vn/quan" title="Xem thêm">Xem thêm</a>
					</div>
				</div>
			</div>
			
			<div class="col-sm-4 col-xs-12 evo-margin">
				<div class="evo-banner">
					<img src="images/spm3.jpg" alt="Phụ kiện" class="img-responsive center-block" />
					<div class="evo-banner-content">
						<h3>Phụ kiện</h3>
						<a href="https://iron-fever.vn/phu-kien" title="Xem thêm">Xem thêm</a>
					</div>
				</div>
			</div> --}}
			
		</div>
	</div>
</div>
</section>
@endsection

@section('script')
	<!-- js for hot-products -->
	<script type="text/javascript" src="js/hot-products.js"></script>
<!-- js for hot-products -->
@endsection