<html lang="zh-CN" class="ua-windows ua-webkit">
<html>
  <head>
    <title>中山大学义卖平台</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap3.0.min.css">
    <link rel="stylesheet" href="../css/upload.css">

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
              <li><a href="../Main/PageType.php?type=电子产品">电子产品</a></li>
              <li><a href="../Main/PageType.php?type=书籍杂志">书籍杂志</a></li>
              <li><a href="../Main/PageType.php?type=日用物品">日用物品</a></li>
              <li><a href="../Main/PageType.php?type=文具">文具</a></li>
              <li><a href="../Main/PageType.php?type=其他">其他</a></li>
            </ul>
          </li>
        </ul>
		
        <form class="navbar-form navbar-left" role="search" name="search_form "method="post" action="../Main/PageSearch.php">
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
              <li><a href="#">上传义卖物品</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="../img/图标用户.png" class="img-rounded"/><b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">我的义卖物品</a></li>
              <li class="divider"></li>
              <li><a href="#">我的关注</a></li>
              <li><a href="#">我的粉丝</a></li>
              <li><a href="#">我的好友</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container">
      <div id="alert1"  class="alert alert-warning fade in">
        <button id='alert1' type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>请上传图片并填写简介。</strong>
      </div> 
      <h3></h3>
    </div><!-- /.container -->
	<form name="create_thing_form" method="post" action="CreateThing.php" enctype="multipart/form-data">
	<div class="container">
		<div class="col-xs-4">
		</div>
		<div class="col-xs-4">
		  <div class="form-group">
			<label for="TextInput">物品名称</label>
			<input name="name" type="text" id="GoodName" class="form-control">
		  </div>
		</div>
	  </div><!-- /.container -->
	  <div class="container">
		<h3></h3>
		<div class="col-xs-4"></div>
		<div class="col-xs-4">
		  <div class="form-group">
			<label for="Select">物品类别</label>
			<select name="type" id="SelectGoodType" class="form-control">
			  <option> </option>
			  <option>电子产品</option>
			  <option>书籍杂志</option>
			  <option>日用物品</option>
			  <option>文具</option>
			  <option>其他</option>
			</select>
		  </div>
		</div>  
	  </div><!-- /.container -->
	  <div class="container">
		<div class="col-xs-4"></div>
		<div class="col-xs-4">
		  <h3></h3>
		  <label>物品简介</label>
		  <textarea name="info" class="form-control" rows="3"></textarea>
		</div>
	  </div><!-- /.container -->
	  <div class="container">
		<h3></h3>
		<div class="col-xs-4"></div>
		<div class="col-xs-4">
		  <div class="form-group">
			<label for="uploadpic">上传图片</label>
			<input name="picture" type="file" value="浏览" />
			<input type="hidden" name="max_picture_size" value="2000000" /> 
			<p class="help-block">请上传jpg、jpeg、png格式的图片，图片最大为2M</p>
		  </div>
		</div>
	  </div><!-- /.container -->
	  <div class="container">
		<div class="col-xs-4"></div>
		<div class="col-xs-4">
		  <div class="checkbox">
			<label>
			  <input type="checkbox"> 匿名发布
			</label>
		  </div>
		  <input type="submit" name="submit" value="Submit" class="btn btn-primary" />
		</div>
		</div><!-- /.container -->
	 </form>
    <!--</div><!-- /.container -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>