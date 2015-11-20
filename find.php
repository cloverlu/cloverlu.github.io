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
<div class="nav navbar-inverse navbar-fixed-top" role="navigation" id="nav-menu">
    <div class="container">
      <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-responsive-collapse">
         <span class="sr-only">Toggle Navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </button>
      <a class="navbar-brand">Miracle Nikki3</a>
      </div>
   <div class="collapse navbar-collapse navbar-responsive-collapse">
    	<ul class="nav navbar-nav">
      		<li class="active"><a href="##">查询页</a></li>
      		
	 	</ul>
  </div>
 </div>
 <div class="icon_logo"><img src="images/icon.png" width="80" height="80"  alt=""/></div>
</div>

<div class="detail">
  <div class="illustrate">
    <span class="ill-img"><img src="images/miao.png" width="54" height="60" alt=""/></span>
    <span class="ill-title">大喵模糊搜索出来的结果～具体请点击吧～</span>
  </div>
  <div class="find-tab">
   <form id="form1" name="form1" method="post">
    <table class="table table-bordered table-hover table-detail" >
    <thead>
        <tr>
          <th>序号</th>
          <th>名称</th>
          <th>部位</th>
          <th>来源</th>
        </tr>
      </thead>
<?php 
$con = mysql_connect("127.0.0.1","root","12345");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("nikki", $con);
mysql_query("set names utf8");
$keywordmain=$_POST['keywordmain'];
$type=$_POST['type'];

 if(isset($_POST['submit'])&&$keywordmain&&$type)
{
	$result = mysql_query("SELECT * FROM `material` where $type like '%$keywordmain%' group by $type");
	
	$num=mysql_num_rows($result);
	
   for($i=1;$i<=$num;$i++)
  {	$find=mysql_fetch_array($result);
?>      
    
      <tbody>
        <tr>
          <th ><?php echo $i; ?></th>
          <td ><?php
		  if($type=='suitname')
	{
	
	echo " <a href='suitdetail.php?username=$find[suitname]'> $find[suitname]</a>";
	 }
	 else if($type=='name0')
	 {
	 
	 echo " <a href='singledetail.php?username=$find[name0]'> $find[name0]</a>";
 
	 }
	 else
	 {
		 echo " <a href='mapdetail.php?username=$find[name]'> $find[name]</a>";
	 }
		   ?></td>
          <td >
          <?php
		  if($type=='suitname')
	{
	
	 echo "/";
	 }
	 else if($type=='name0')
	 {
	 
	 echo $find['part'];
 
	 }
	 else
	 {
		 echo $find['part'];
	 }
		   ?>
          </td>
          <td >
          <?php
		  if($type=='suitname')
	{
	
	 echo "/";
	 }
	 else if($type=='name0')
	 {
	
	 echo $find['origin'];
 
	 }
	 else
	 {
		 echo $find['origin'];
	 }
		   ?>
          </td>
          
        </tr>
      </tbody>
     <?php 
 }
  ?>
<?php
 }

 ?>
    
    
    </table>
    </form>
  </div>
</div>

<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>