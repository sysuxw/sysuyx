<?php
    session_start();
    if (!isset($_SESSION['name'])) {
      echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
      echo "<script>alert('权限不足！');</script>";
      exit();
    }
    require_once('UserQuery.class.php');
    $user_query = new UserQuery($_SESSION['name']);
?>
<!DOCTYPE html>
<html lang="zh-CN" class="ua-windows ua-webkit">
  <head>
    <title>中山大学义卖平台</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap3.0.min.css">
    <link rel="stylesheet" href="../css/personalindex.css">
	<script src="../js/request.js" type="text/javascript"></script> 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
        <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="../img/图标list.png"/><b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">我的关注</a></li>
                <li class="divider"></li>
              <li><a href="#">电子产品</a></li>
              <li><a href="#">书籍杂志</a></li>
              <li><a href="#">日用物品</a></li>
              <li><a href="#">文具</a></li>
              <li><a href="#">其他</a></li>
            </ul>
          </li>
        </ul>
        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default"><img src="../img/图标search.png"/></button>
        </form>
          <a id="mainbrand"><img src="../img/brand.png" class="img-rounded"/></a>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="../img/图标添加.png" class="img-rounded"/><b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="../Things/PageCreateThing.php">上传义卖物品</a></li>
            </ul>
          </li>
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="../img/图标用户.png" class="img-rounded"/><b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="../Accounts/myThings.php">我的义卖物品</a></li>
              <li class="divider"></li>
              <li><a href="../Accounts/showUserInfo.php">个人信息</a></li>
              <li class="divider"></li>
              <li><a href="../Accounts/login.php">注销</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container">
      <div id="alert1"  class="alert alert-warning fade in">
        <button id='alert1' type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Welcome!</strong> Do not forget to check your mail box.
      </div>
      <h2></h2> 
      <div class="row">
        <div class="col-xs-3">
          <ul class="list-group" id="UserInfo">
            <a class="list-group-item">用户名:&nbsp;<?php echo $user_query->getUserName(); ?></a>
            <a class="list-group-item">性别:&nbsp;<?php echo $user_query->getUserGender(); ?></a>
            <a class="list-group-item">邮箱:&nbsp;<?php echo $user_query->getUserEmail(); ?></a>
            <a class="list-group-item">个人简介:&nbsp;<?php echo $user_query->getUserRemark(); ?></a>
            <a class="list-group-item" id="LogoBox"><img src="../img/yixian_LOGO.png" class="img-rounded" id="Logo"/></a>
          </ul>
        </div>
		<?php
			include_once('../Things/Things.class.php');
			$storePic = new SaeStorage();
			$things = new Things();
			if( $things->getThingsByUserId($user_query->getUserUserId()) )
			{
				while($things->getThingsNext())
				{
					$pic_url = $storePic->getUrl($things->getThingPicturePath(), $things->getThingPictureName());
					$thing_id = $things->getThingId();
		?>
		<div class="col-xs-3">
          <ul class="list-group" id="goodInfo">
              <li class="list-group-item" id="goodImgbox"><p style="text-align:center"><img src="<?php echo $pic_url?>" class="img-rounded" id="goodImg"/></p></li>
            <li class="list-group-item" id="goodCombox"><p id="goodCom"><?php echo $things->getThingInfo(); ?></p></li>
            <li class="list-group-item">
              <a href="#" onclick="request(<?php echo $thing_id;?>)" class="zan"><span class="request<?php echo $thing_id;?>">
			  <?php echo $things->getThingRequest();?></span><img src="../img/图标点赞.png" class="img-rounded"/></a>
              <a href="../Things/PageUpdateThing.php?thing_id=<?php echo $things->getThingId();?>" class="zan"><img src="../img/图标发信.png" class="img-rounded"/></a>
            </li>
          </ul>
        </div>
		<?php
				}
			}
		?>
      </div><!-- /.row -->
      <ul class="pager">
        <li><a href="#">Previous</a></li>
        <li><a href="#">Next</a></li>
      </ul>
    </div><!-- /.container -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>