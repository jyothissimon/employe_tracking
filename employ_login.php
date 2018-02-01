<?php
include"connect.php";
$error = 0;
$msg = "";
if($_REQUEST['email']!=""){
	$emp_email = mysql_real_escape_string($_REQUEST['email']);
}else{
	$error+=1;
	$msg .= "email is required<br>";
}
if($_REQUEST['password']!=""){
	$password = mysql_real_escape_string($_REQUEST['password']);
}else{
	$error+=1;
	$msg .= "Password is required";
}
if($error==0){
	$sql="SELECT `emp_id`,`emp_email`,`emp_pass` FROM `employs` where `emp_email` = '$emp_email' AND `emp_pass` = '$password'";
	$res=mysql_query($sql);
	$row=mysql_fetch_array($res);
	if(!$row){
		echo json_encode(array("response"=>array("message"=>"Invalid email or password")));
	}else{
		if($row['emp_email']==$emp_email && $row['emp_pass']==$password){
			$login_time=date('Y-m-d H:i:s');
			$sql_update="UPDATE `employs` SET `login_time`='$login_time' WHERE `emp_id`='$row[emp_id]'";
			if(mysql_query($sql_update)){
			echo json_encode(array("response"=>array("emp_id"=>$row['emp_id'],"email"=>$row['emp_email'],"password"=>$row['emp_pass'],"login_time"=>$login_time,"message"=>"Successfully Send")));
		}
		else{
			echo json_encode(array("response"=>array("message"=>"update login time error")));
		}
		}else{
			echo json_encode(array("response"=>array("message"=>"Invalid email or password")));
		}
	}
}else{
	echo json_encode(array("message"=>$msg));
}
?>
