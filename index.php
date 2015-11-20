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

 <?php
$conn=Mysql_connect("127.0.0.1","root","12345");
Mysql_select_db("nikki",$conn);
Mysql_query("SET CHARACTER SET gb2312");
?>

<div class="main">
  <div class="main-dio">
    <div class="main-name"><img src="images/title.png" width="300" height="60"  alt=""/></div>
    <div class="search">
      <div class="search-require">
        <span class="require-title">查询分类：</span>
        <p>
        
          <form id="form1" name="form1" method="post" action="find.php">
          <label >
            <input name="type" type="radio" id="type_0" value="suitname"  checked>
            套装名称</label>
          <label>
            <input name="type" type="radio" id="type_2" value="name" >
            设计图名称</label>
          <label>
          
            <input name="type" type="radio" id="type_1" value="name0" >
            部件名称</label>
        </p>
      </div>
      <div class="search-start">
        <label>
        <input type="text" class="search-kuang" placeholder="请输入套装名或者部件名，然后大喵一下吧～" name="keywordmain" id="keywordmain" >
        </label>
        <label>
      <input name="submit" type="submit"  id="submit" value="大喵一下" class="search-anniu" />
  </label>

  </form>
  
  
      </div>
    </div>
  </div>
</div>




<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>