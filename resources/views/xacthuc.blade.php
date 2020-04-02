<p>Bạn có muốn xác thực thông tin đăng ký</p>
<form method="post" action="xacthuc">
	{{csrf_field()}}
	<input type="radio" name="xacthucbutton" value="1">Yes<br>
	<input type="radio" name="xacthucbutton" value="0">No<br>
	<input type="submit" name="submitbtn">
</form>