<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\theloai;
use App\loaisanpham;
use App\sanpham;
use Illuminate\Support\Facades\DB;

class ajaxController extends Controller
{
    //
    public function getLoaisanpham($idtheloai){
    	$loaisanpham = loaisanpham::where('id_theloai', $idtheloai)->get();
    	foreach($loaisanpham as $lsp)
    	{
    		echo '<option value="'.$lsp->id.'">'.$lsp->tenloaisanpham.'</option>';
    	}
    }
   	
    public function test(){
    	$loaisanpham = loaisanpham::find(1);
    	echo $loaisanpham->tenloaisanpham;
    }
    // public function filter_data(){
    // 		$gia = 0;
    // 		$range = "";
    // 		$checkboxValue = 0;
    // 		$sql = "SELECT * FROM sanpham";
    // 		$radioValue = $_GET['radioValue'];
    // 		$checkboxValue = $_GET['checkboxValue'];
    		
    		
    // 		for($i = 0; $i < count($checkboxValue); $i++)
    // 		{
    // 			switch ($checkboxValue[$i]) {
    // 			case '5':
    // 				$range1 = " gia < 400000"; 
    // 				break;
    // 			case '6':
    // 				$range1 = " gia between 400000 and 700000";
    // 				break;
    // 			case '7':
    // 				$range1 = " gia between 700000 and 1000000";
    // 				break;
    // 			case '8':
    // 				$range1 = " gia > 1000000";
    // 				break;
    // 			default:
    // 				# code...
    // 				$range1 = "";
    // 				break;
    // 		}
    			
    // 		}
    // 		switch ($radioValue) {
    // 			case '1':
    // 				$range2 = " ORDER BY tensanpham asc";
    // 				break;
    // 			case '2':
    // 				$range2 = " ORDER BY tensanpham desc";
    // 				break;
    // 			case '3':
    // 				$range2 = " ORDER BY gia asc";
    // 				break;
    // 			case '4':
    // 				$range2 = " ORDER BY gia desc";
    			
    // 			default:
    // 				$range2 = "";
    // 				break;
    // 		}
    // 		$sql = $sql . $range1 . $range2;
    // 		echo $sql;
    // }
    public function filter_data()
    {
    	// echo $_GET['radioValue'];
    	// echo '<br>';
    	// var_dump($_GET['checkboxValue']);
    	$sql = "";
    	$range1 = "";
    	$range2 = "";
    	//Truong hop 1
    	if($_GET['radioValue'] == 0)
    	{
    		$sql = "SELECT * FROM sanpham where";
    		//var_dump($_GET['checkboxValue']);
    		for($i = 0; $i < count($_GET['checkboxValue']); $i++)
    		{
    			if(($i+1)>1)
    			{
    				$sql = $sql . " or ";
    			}
    			switch ($_GET['checkboxValue'][$i]) {
    				case '5':
    					$range1 = " gia < 400000";
    					break;
    				case '6':
	    				$range1 = " gia between 400000 and 700000";
	    				break;
    				case '7':
	    				$range1 = " gia between 700000 and 1000000";
	    				break;
    				case '8':
	    				$range1 = " gia > 1000000";
	    				break;
    				
    				default:
    					# code...
    					break;
    			}
    			$sql = $sql . $range1;
    			
    			
    		}
    		echo '<br>';
    		//echo $_GET['radioValue']; // 0

    	}
    	//Truong hop 2
    	elseif($_GET['checkboxValue'][0] == 0)
    	{
    		$sql = "SELECT * FROM sanpham ORDER BY ";
    		//echo $_GET['radioValue'];
    		switch($_GET['radioValue'])
    		{
    			case '1':
    				$range2 = "tensanpham asc";
    				break;
    			case '2':
    				$range2 = "tensanpham desc";
    				break;
    			case '3':
    				$range2 = "gia asc";
    				break;
    			case '4':
    				$range2 = "gia desc";
    				break;
    		}
    		// echo '<br>';
    		// var_dump($_GET['checkboxValue']);
    		$sql = $sql . $range2;
    	}
    	else
    	{
 			// echo $_GET['radioValue'];
    // 		echo '<br>';
    // 		var_dump($_GET['checkboxValue']);
    // 		echo '<br>';
    		while(count($_GET['checkboxValue']) > 0 || $_GET['radioValue'] > 0)
    		{
    			$sql = "SELECT * FROM sanpham where";
    		//var_dump($_GET['checkboxValue']);
    		for($i = 0; $i < count($_GET['checkboxValue']); $i++)
    		{
    			if(($i+1)>1)
    			{
    				$sql = $sql . " or ";
    			}
    			switch ($_GET['checkboxValue'][$i]) 
    			{
    				case '5':
    					$range1 = " gia < 400000";
    					break;
    				case '6':
	    				$range1 = " gia between 400000 and 700000";
	    				break;
    				case '7':
	    				$range1 = " gia between 700000 and 1000000";
	    				break;
    				case '8':
	    				$range1 = " gia > 1000000";
	    				break;
    				
    				default:
    					# code...
    					break;
    			}
    			$sql = $sql . $range1;
    		}
    		switch($_GET['radioValue'])
    		{
    			case '1':
    				$range2 = " ORDER BY tensanpham asc";
    				break;
    			case '2':
    				$range2 = " ORDER BY tensanpham desc";
    				break;
    			case '3':
    				$range2 = " ORDER BY gia asc";
    				break;
    			case '4':
    				$range2 = " ORDER BY gia desc";
    				break;
    		}
    		$sql = $sql . $range2;
    		break;
    		}
    		
    	 	
    	 }
    	 // echo $sql;
    	$sanpham = DB::select($sql);
    	foreach($sanpham as $sp)
    	{
    		echo '<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">';
		 	$idloaisanpham = $sp->id_loaisanpham;
		 	$loaisanpham = loaisanpham::find($idloaisanpham);
						echo '<div class="product-card">
							<a class="product-url" href="/painmadehustlers-t-shirt-den-cam" title="#PAINMADEHUSTLERS T-Shirt Đen/Cam"></a>
							
							
							
							<div class="product-card__inner">
								<div class="product-card__image lazyload">
									<img src="images/sanpham/'.$sp->hinh.'" class="product-card-image-front img-responsive center-block" alt="#PAINMADEHUSTLERS T-Shirt Đen/Cam" />
									
									<img src="images/pmh-front-orange.jpg" class="product-card-image-back img-responsive center-block" alt="#PAINMADEHUSTLERS T-Shirt Đen/Cam" />
									
								</div>
								<h4 class="product-single__series">'.$loaisanpham->tenloaisanpham.'</h4>
								<h3 class="product-card__title">#'.$sp->tensanpham.'</h3>
								<div class="product-price">
									
									
									<strong>'.$sp->gia.'₫</strong>
									
									
								</div>
							</div>
							<form action="/cart/add" method="post" enctype="multipart/form-data" class="hidden-md variants form-nut-grid form-ajaxtocart" data-id="product-actions-15710311">
								<div class="product-card__actions">
									
									
									<input class="hidden" type="hidden" name="variantId" value="27381674" />
									<a class="button ajax_addtocart" href="/painmadehustlers-t-shirt-den-cam" title="Tùy chọn">Tùy chọn</a>
									
									
								</div>
							</form> 
						</div>			
					</div>
					<!-- sanpham 1 -->';
    	}
	}
}
