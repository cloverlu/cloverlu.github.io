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
$result = mysql_query("SELECT  * FROM `material` where  name0='$username' ");
$result2 = mysql_query("SELECT * FROM  `total` WHERE name='$username'");
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
      <li class="single-title">
      <?php 
	  $result3 = mysql_query("SELECT  * FROM `material` where  name0='$username' ");
	  $info3=Mysql_fetch_array($result3); 
	  echo $info3['name0'];
	  ?>
       </li>
      <li class="single-part"><?php echo $info3['part']; ?></li>
      <li class="single-orgin"><?php echo $info3['origin']; ?></li>
    </ul>
  </div>
  <div class="single-info">
    <table class="table table-striped table-single">
      <thead>
        <tr>
          <th class="one">部件心级</th>
          <th>华丽</th>
          <th>简约</th>
          <th>优雅</th>
          <th>活泼</th>
          <th>成熟</th>
          <th>可爱</th>
          <th>性感</th>
          <th>清纯</th>
          <th>清凉</th>
          <th>保暖</th>
          <th>便签1</th>
          <th>便签2</th>
        </tr>
      </thead>
       <?php 
 $info2=Mysql_fetch_array($result2); 
?>    
      
      
      <tbody>
        <tr>
          <th  ><?php echo $info2['level']; ?></th>
          <td ><?php echo $info2['magn']; ?></td>
          <td ><?php echo $info2['brief']; ?></td>
          <td ><?php echo $info2['grace']; ?></td>
          <td ><?php echo $info2['full']; ?></td>
          <td ><?php echo $info2['ripe']; ?></td>
          <td><?php echo $info2['lovely']; ?></td>
          <td ><?php echo $info2['sexy']; ?></td>
          <td ><?php echo $info2['pure']; ?></td>
          <td ><?php echo $info2['cool']; ?></td>
          <td ><?php echo $info2['warm']; ?></td>
          <td ><?php echo $info2['tag1']; ?></td>
          <td ><?php echo $info2['tag2']; ?></td>
        </tr>
       
      </tbody>
       
    </table>
  </div>
  <div class="single-table">
    <span class="single-remark">以该部件为基础的所有设计图:</span>
    <div class="single-design">
    <table class="table table-bordered table-mark">
      <thead>
        <tr>
          <th>套装名称</th>
          <th>图纸名称</th>
          <th>图纸部位</th>
          <th>图纸来源</th>
          <th>基础材料名称</th>
          <th>所需数量</th>
        </tr>
      </thead>
      
       <?php      
$num=mysql_num_rows($result);

for($i=1;$i<=$num;$i++)
{
 $info=Mysql_fetch_array($result); 
 

?>    
      <tbody>
        <tr>
          <th ><?php echo $info['suitname']; ?></th>
          <td ><?php echo $info['name']; ?></td>
          <td ><?php echo $info['part']; ?></td>
          <td ><?php echo $info['origin']; ?></td>
          <td ><?php echo $info['name0']; ?></td>
          <td ><?php echo $info['num']; ?></td>
        </tr>
       
      </tbody>
        <?php 
 }
  ?>
    </table>
    </div>
  </div>
</div>



<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>