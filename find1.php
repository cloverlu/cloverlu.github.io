<?php
ob_start();
session_start();
date_default_timezone_set(PRC);
?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Nikki3衣柜查询</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

<body>
<?php
header("content-Type: text/html; charset=utf-8");
$con = mysql_connect("127.0.0.1","root","12345");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_query("set names utf8");
mysql_select_db("nikki", $con);

$keywordmain=$_POST['keywordmain'];
$type=$_POST['type'];
if(isset($_POST['submit'])&&$keywordmain&&$type)
{
	
$result = mysql_query("SELECT * FROM material where $type like '%$keywordmain%'");
$num=mysql_num_rows($result);
   for($i=1;$i<=$num;$i++)
  {	$info=mysql_fetch_array($result);
?>      
<?php 
 }
  ?>
  
 <tr>
      <td align="center"><?php echo($begin+$i);  ?></td>
      <td align="center"><?php echo  $info['suitname']?></td>
      <td align="center"><?php echo  $info['name']?></td>
      <td align="center"><?php echo  $info['name0']?></td>
      <td align="center"><?php echo  $info['part']?></td>
      <td align="center"><?php echo  $info['origin']?></td>
      <td align="center"><?php echo  $info['num']?></td>
      
    </tr>
  
  <?php
 }

 ?>



<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>