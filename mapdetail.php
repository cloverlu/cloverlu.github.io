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
$con = mysql_connect("127.0.0.1","root","12345");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("nikki", $con);
mysql_query("set names utf8");
$username=$_GET["username"];
$result = mysql_query("SELECT  * FROM `material` where  name='$username' ");
$result2 = mysql_query("SELECT * FROM  `specific` WHERE name='$username'");
if(!$result)
    die("SQL: {$sql}<br>Error:".mysql_error());

?>
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


<div class="single-detail">
  <div class="single-top">
    <ul>
      <li class="map-title"><?php echo $username; ?></li>
      <li class="map-part">所属套装：<span class="tag1">
      <?php 
	  $result3 = mysql_query("SELECT  * FROM `material` where  name='$username'  ");
	  $info3=Mysql_fetch_array($result3);
	  echo $info3['suitname']; 
	  ?>
      </span></li>
      <li class="map-orgin">部位：<span class="tag1"><?php echo $info3['part']?></span></li>
      <li class="map-price">图纸来源/图纸星币：<span class="tag1"><?php 
	  $result4 = mysql_query("SELECT  * FROM `mapstar` where  name='$username' ");
	   $info4=Mysql_fetch_array($result4);
	   echo $info4['mapstar']
	  ?></span></li>
    </ul>
  </div>
  <div class="single-info">
    <table class="table table-striped table-single">
      <thead>
        <tr>
          <th >直接材料</th>
          <th >数量</th>
          <th >是否染色</th>
          <th >染色前名称</th>
          <th >是否进化</th>
          <th >三级材料</th>
          <th >二级材料</th>
          <th >是否进化、染色</th>
          <th>2级升3级数量</th>
          <th >基础材料</th>
          <th>来源</th>
          <th >基础材料数量</th>
         
      </thead>
      <?php      
$num=mysql_num_rows($result);
$num2=mysql_num_rows($result2);
for($i=1;$i<=$num;$i++)
{
 $info=Mysql_fetch_array($result); 
 $info2=Mysql_fetch_array($result2); 

?>    
      <tbody>
        <tr>
          <th ><?php echo $info['name1']?></th>
          <td ><?php echo $info['namenum1']?></td>
          <td ><?php echo $info2['dyeyn']?></td>
          <td ><?php echo $info2['fromname']?></td>
          <td ><?php echo $info2['evolveyn']?></td>
          <td ><?php echo $info2['name3']?></td>
          <td><?php echo $info2['name2']?></td>
          <td ><?php echo $info2['dyeyn2']?></td>
          <td ><?php echo $info2['num23']?></td>
          <td ><?php echo $info2['name1']?></td>
          <td ><?php echo $info2['fromname1']?></td>
          <td ><?php echo $info['num']?></td>
          
        </tr>
       
       
      </tbody>
       <?php 
 }
  ?>
    </table>
  </div>
  <div class="single-info2">
   <div class="illustrate">
      <span class="ill-img"><img src="images/miao.png" width="54" height="60" alt=""/></span>
      <span class="ill-title">各直接部件所需消耗统计</span>
    </div>
      <table class="table table-bordered table-single">
      <thead>
        <tr>
          <th rowspan="2">直接材料名称</th>
          <th colspan="4">材料汇总</th>
          <th colspan="4">染料汇总</th>
        </tr>
        <tr>
          
          <th >金币</th>
          <th >钻石</th>
          <th >水晶鞋</th>
           <th >联盟币</th>
          <th >名称</th>
          <th >数量</th>
          <th >星币</th>
          <th >联盟币</th>
        </tr>
         
      </thead>
      <?php 
	$result = mysql_query("SELECT  * FROM `material` where  name='$username' ");
$num=mysql_num_rows($result);
$num2=mysql_num_rows($result2);
for($i=1;$i<=$num;$i++)
{
 $info=Mysql_fetch_array($result); 
 $info2=Mysql_fetch_array($result2); 

?>    
      <tbody>
        <tr>
          <td><?php echo $info['name1']?></td>
          <td><?php echo $info['money']?></td>
          <td ><?php echo $info['stone']?></td>
          <td ><?php echo $info['shoes']?></td>
          <td ><?php echo $info['union']?></td>
          <td ><?php echo $info['fuelname']?></td>
          <td ><?php echo $info['fuelnum']?></td>
          <td ><?php echo $info['fuelstar']?></td>
          <td ><?php echo $info['fuelunion']?></td>
          
        </tr>
       
       
      </tbody>
       <?php 
 }
  ?>
    </table>
  </div>
  
</div>



<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>