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
 <form id="form1" name="form1" method="post" action="">
            <table class="table table-bordered table-hover " id="table1" width="100%" cellspacing="0" cellpadding="0">
                <tr align="center" bgcolor="#3E3695" style="color:#FFFFFF;height:25px;">
                    <th rowspan="2">1-1</th>
                    <th rowspan="2">1-2</th>
                    <th rowspan="2">1-3</th>
                    <th colspan="3">1-4</th>
                    <th colspan="4">1-5</th>
                </tr>
                
                <tr align="center" bgcolor="#3E3695" style="color:#FFFFFF;height:30px;">
                    <th>1-4-1-1</th>
                    <th>1-4-1-2</th>
                    <th>1-4-2-1</th>
                    <th>1-5-2-1</th>
                    <th>1-6-2-1</th>
                    <th>1-7-2-1</th>
                    <th>1-8-2-1</th>
                </tr>
                 </tr>
                <tr>
                    <th>1-1</th>
                    <th >1-2</th>
                    <td >1-3</td>
                    <td >1-4</td>
                    <td >1-5</td>
                    <td >1-3</td>
                    <td >1-4</td>
                    <td >1-5</td>
                    <td >1-3</td>
                    <td >1-4</td>
                    
                </tr>
               
            </table>
        </form>
 
 <script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>