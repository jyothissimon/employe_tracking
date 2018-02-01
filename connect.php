<?php
date_default_timezone_set('Asia/Kolkata');

$link = mysql_connect('localhost', '', '')
    or die('Could not connect: ' . mysql_error());
echo 'Connected successfully';
mysql_select_db('test_emp',$link) or die('Could not select database');

?>
