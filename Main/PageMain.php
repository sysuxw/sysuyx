<html>
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>中山大学义卖平台</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap3.0.min.css">
    <link rel="stylesheet" href="../css/main.css">

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
              <li><a href="../Main/PageMain.php">首页</a></li>
              <li class="divider"></li>
              <li><a href="#">我的关注</a></li>
              <li class="divider"></li>
              <li><a href="PageType.php?type=电子产品">电子产品</a></li>
              <li><a href="PageType.php?type=书籍杂志">书籍杂志</a></li>
              <li><a href="PageType.php?type=日用物品">日用物品</a></li>
              <li><a href="PageType.php?type=文具">文具</a></li>
              <li><a href="PageType.php?type=其他">其他</a></li>
            </ul>
          </li>
        </ul>
		
        <form class="navbar-form navbar-left" role="search" name="search_form "method="post" action="PageSearch.php">
          <div class="form-group">
            <input name="search_value" type="text" class="form-control" placeholder="Search">
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
              <li><a href="../Accounts/logout.php">注销</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container">
      <div id="alert1"  class="alert alert-warning fade in">
        <button id='alert1' type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Psst.</strong> Do not forget to confirm your email! Just read the the message we sent to you.
      </div>
      <h3>Want to see more Pins you love in your feed?<strong>Follow interesting boards.</strong> </h3> 
      <div class="row">
        <div class="col-xs-3">
          <ul class="list-group" id="goodInfo">
            <a href="#" class="list-group-item"><img src="../img/find.png" class="img-rounded"/></a>
            <a href="#" class="list-group-item"><img src="../img/invite.png" class="img-rounded"/></a>
            <a href="../Main/PageMain.php" class="list-group-item"><img src="../img/yixian_LOGO.png" class="img-rounded"/></a>
          </ul>
        </div>
		<?php
			include_once('../Things/Things.class.php');
			$storePic = new SaeStorage();
			$things = new Things();
			if($things->getAllThings())
			{
				while($things->getThingsNext())
				{
					$pic_url = $storePic->getUrl($things->getThingPicturePath(), $things->getThingPictureName());
		?>
		<div class="col-xs-3">
          <ul class="list-group" id="goodInfo">
              <li class="list-group-item" id="goodImgbox"><p style="text-align:center"><img src="<?php echo $pic_url?>" class="img-rounded" id="goodImg"/></p></li>
            <li class="list-group-item" id="goodCombox"><p id="goodCom"><?php echo $things->getThingInfo(); ?></p></li>
            <li class="list-group-item">
              <a href="#" class="zan"><img src="../img/图标点赞.png" class="img-rounded"/></a>
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