<?php
include"connect.php";
$error=0;
$msg="";

if($_REQUEST['emp_name']!="")
{
  $emp_name=$_REQUEST['emp_name'];
}
else{
  $error+=1;
  $msg .="Emp_name needed<br>";
}

if($_REQUEST['emp_email']!="")
{
  $emp_email=$_REQUEST['emp_email'];
}
else{
  $error+=1;
  $msg .="Emp_email needed<br>";
}

if($_REQUEST['emp_position']!="")
{
  $emp_position=$_REQUEST['emp_position'];
}
else{
  $error+=1;
  $msg .="emp_position needed";
}

if($_REQUEST['emp_role']!="")
{
  $emp_role=$_REQUEST['emp_role'];
}
else{
  $error+=1;
  $msg .="emp_role needed";
}

if($_REQUEST['emp_dept']!="")
{
  $emp_dept=$_REQUEST['emp_dept'];
}
else{
  $error+=1;
  $msg .="emp_dept needed";
}

if($_REQUEST['emp_pass']!="")
{
  $emp_pass=$_REQUEST['emp_pass'];
}
else{
  $error+=1;
  $msg .="emp_pass needed";
}



$create_time=date('Y-m-d H:i:s');

if($error==0){
  $sql = "INSERT INTO employs (emp_name,emp_email,emp_position,emp_role,emp_dept,emp_pass,create_time)VALUES ('$emp_name', '$emp_email','$emp_position','$emp_role','$emp_dept','$emp_pass','$create_time')";
  if (mysql_query($sql)){
    //session_start();
    $emp_id=mysql_insert_id();
    echo json_encode(array("response"=>array("emp_id"=>$emp_id,"emp_email"=>$emp_email,"password"=>$emp_pass,"message"=>"Successfully Send")));
  }else{
    echo json_encode(array("response"=>array("message"=>"Failed")));
  }
}else{
  echo json_encode(array("response"=>array("message"=>$msg)));
}
?>
