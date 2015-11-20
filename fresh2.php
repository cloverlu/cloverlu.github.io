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
$username2=$_GET["username2"];
$result = mysql_query("SELECT  * FROM `material` where  name='$username2'  ");
$result2 = mysql_query("SELECT * FROM `material` left join `mapstar` ON (material.identifier = mapstar.identifier) WHERE material.name='$username2'  ");
$result3= mysql_query("SELECT * FROM  `specific` WHERE name='$username2' ");
if(!$result)
    die("SQL: {$sql}<br>Error:".mysql_error());

?>

 <table class="table table-bordered table-detail2">
       <thead>
        <tr>
          <th>基础材料名称</th>
          <th>直接材料</th>
          <th>是否染色</th>
          <th>是否进化</th>
          <th>三级材料</th>
          <th>二级材料</th>
          <th>一级材料</th>
          <th>一级材料来源</th>
          <th>一级材料数量</th>
          <th>金币</th>
          <th>钻石</th>
          <th>水晶鞋</th>
          <th>染料名称</th>
          <th>染料数量</th>
        </tr>
      </thead>
     <?php      
$num=mysql_num_rows($result);
$num2=mysql_num_rows($result2);
$num3=mysql_num_rows($result3);
for($i=1;$i<=$num;$i++)
{
 $info=Mysql_fetch_array($result); 
  $info2=Mysql_fetch_array($result2); 
   $info3=Mysql_fetch_array($result3); 
?>
      <tbody>
        <tr>
          <th ><?php echo $info['name'] ?></th>
          <td ><?php echo $info['name1'] ?></td>
          <td ><?php echo $info3['dyeyn'] ?></td>
          <td ><?php echo $info3['evolveyn'] ?></td>
          <td ><?php echo $info['name3'] ?></td>
          <td ><?php echo $info['name2'] ?></td>
          <td ><?php echo $info['name0'] ?></td>
          <td ><?php echo $info['origin'] ?></td>
          <td><?php echo $info['num'] ?></td>
          <td><?php echo $info['money'] ?></td>
          <td><?php echo $info['stone'] ?></td>
          <td><?php echo $info['shoes'] ?></td>
          <td><?php echo $info['fuelname'] ?></td>
          <td><?php echo $info['fuelnum'] ?></td>
        </tr>
       
      </tbody>
      
      
 <?php 
 }
  ?>
    </table>



</body>
</html>