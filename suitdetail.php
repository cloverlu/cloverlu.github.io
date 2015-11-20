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
      		<li class="active"><a href="##">首页</a></li>
      		
	 	</ul>
  </div>
 </div>
 <div class="icon_logo"><img src="images/icon.png" width="80" height="80"  alt=""/></div>
</div>
  <?php
$con = mysql_connect("127.0.0.1","root","12345");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("nikki", $con);
mysql_query("set names utf8");
$username=$_GET["username"];
$result = mysql_query("SELECT  * FROM `material` where  suitname='$username' group by name ");
$result2 = mysql_query("SELECT * FROM `material` left join `suit` ON (material.identifier = suit.identifier) WHERE material.suitname='$username' group by material.name ");
if(!$result)
    die("SQL: {$sql}<br>Error:".mysql_error());
$_SESSION['suitname']=$info['suitname'];

?>
<div class="detail">
  <div class="detail-name">
    <span class="name1"><?php echo $username?></span>
    <span class="achieve">
    <?php
	$result3 = mysql_query("SELECT  * FROM `suit` where  suitname='$username' group by name ");
	$info3=Mysql_fetch_array($result3);
	echo $info3['achieve'];
	?>
    </span>
  </div>
  <div class="detail-table">
    <table  class="table table-bordered table-hover table-detail">
      <thead>
        <tr>
          <th rowspan="2">序号</th>
          <th rowspan="2">套装部件名称</th>
          <th rowspan="2">编号</th>
          <th rowspan="2">分类</th>
          <th rowspan="2">部位</th>
          <th rowspan="2">获取途径与描述</th>
          <th rowspan="2">图纸星币</th>
          <th colspan="3">材料汇总</th>
          <th colspan="4">染料汇总</th>
        </tr>
        <tr>
          <th >金币</th>
          <th >钻石</th>
          <th >水晶鞋</th>
          <th >名称</th>
          <th >数量</th>
          <th >星币</th>
          <th >联盟币</th>
        </tr>
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
          <th ><?php echo $i; ?></th>
          <th ><?php echo "<a href='fresh1.php?username1=$info[name]'  target='openhere'>$info[name] </a>"?></th>
          <td ><?php echo $info['identifier0']?></td>
          <td ><?php echo $info2['assortment']?></td>
          <td ><?php echo $info['part']?></td>
          <td ><?php echo $info2['origin']?></td>
          <td ><?php echo $info['designmap']?></td>
          <td><?php echo $info['money']?></td>
          <td ><?php echo $info['stone']?></td>
          <td ><?php echo $info['shoes']?></td>
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
  <div class="detail-table2">
    <div class="illustrate">
      <span class="ill-img"><img src="images/miao.png" width="54" height="60" alt=""/></span>
      <span class="ill-title">点击套装部件名称，出来具体信息</span>
    </div>
    <div class="fresh1">
    <iframe src="fresh1.php" width="1193px" height="200px" frameborder="0" name="openhere" scrolling="no"> </iframe>
    </div>
    <div class="detail-table3">
      <div class="illustrate2">
      <span class="ill-img2"><img src="images/miao.png" width="54" height="60" alt=""/></span>
      <span class="ill-title2">套装基础材料信息（需要设计图的）</span>
    </div>
      <div class="detail-third">
        <iframe src="fresh2.php" width="1193px" height="200px" frameborder="0" name="openhere2" scrolling="no"> </iframe>
      </div>
    </div>
  </div>
</div>

<script language="javascript">

</script>
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>