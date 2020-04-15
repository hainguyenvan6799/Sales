<!DOCTYPE html>
<html>
<head>
	<title>Modal testing</title>
	<style type="text/css">
		#mybtn
		{
			width: 200px;
			height: 30px;
			background-color: white;
			color: red;
			text-align: center;
			padding: 5px;

		}
		#mybtn:hover{
			background-color: green;
			color: white;
		}
		.modal
		{
			display: none;
			position: fixed;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			overflow: auto;
			background-color: rgb(0, 0, 0);
			background-color: rgba(0,0,0.4);
		}
		.modal-content
		{
			background-color: #fefefe;
			margin: 15% auto;
			padding: 20px;
			border: 1px solid #888;
			width: 80%;

		}
		.close{
			color: #aaa;
			float: right;
			font-size: 28px;
			font-weight: bold;
		}
	</style>
</head>
<body>
	<button id="mybtn">Open Modal</button>
	<div id="myModal" class="modal">

		<!-- modal content -->
		<div class="modal-content">
			<span class="close">&times;</span>
			<p>Some text in the modal</p>
		</div>
	</div>
</body>
<script type="text/javascript">
	var btn = document.getElementById("mybtn");
	var modal = document.getElementById("myModal");
	var closebtn = document.getElementsByClassName("close")[0];

	btn.onclick = function(){
		modal.style.display = "block";
	}
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
</html>