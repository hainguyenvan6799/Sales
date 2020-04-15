<!DOCTYPE html>
<html>
<head>
	<base href="{{asset('')}}">
	<title></title>
	<link href="//bizweb.dktcdn.net/100/360/775/themes/729132/assets/bootstrap.scss.css?1584340063821" rel="stylesheet" type="text/css" />
	<link href="//bizweb.dktcdn.net/100/360/775/themes/729132/assets/plugin.scss.css?1584340063821" rel="stylesheet" type="text/css" />							
	<link href="//bizweb.dktcdn.net/100/360/775/themes/729132/assets/base.scss.css?1584340063821" rel="stylesheet" type="text/css" />	
	<link href="//bizweb.dktcdn.net/100/360/775/themes/729132/assets/evo-watch.scss.css?1584340063821" rel="stylesheet" type="text/css" />
	<link href="//bizweb.dktcdn.net/100/360/775/themes/729132/assets/index.scss.css?1584340063821" rel="stylesheet" type="text/css" />
	
	<!-- hot-products css -->
	<link rel="stylesheet" type="text/css" href="css/hot-products.css" />
	<!-- hot-products css -->

	<!-- css for tops.blade.php -->
	<link rel="stylesheet" type="text/css" href="css/tops-blade.css">
	<!-- css for tops.blade.php -->

	<!-- css for detail-product.blade.php -->
	<link rel="stylesheet" type="text/css" href="css/detail-product-blade.css">
	<!-- css for detail-product.blade.php -->

	<!-- khai baos jquery -->
	<script type="text/javascript" language="javascript" src="admin_layout/ckeditor/ckeditor.js" ></script>
</head>
<body style="height: 1500px;">
	
	@include('layouts.header')

	@yield('content')

</body>
	@yield('script')


</html>