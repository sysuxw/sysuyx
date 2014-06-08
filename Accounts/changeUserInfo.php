<?php
  session_start();
  if (!isset($_SESSION['name'])) {
    echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
    echo "<script>alert('权限不足！');</script>";
    exit();
  }
  require_once('UserQuery.class.php');
  require_once('UserChange.class.php');
  $user_query = new UserQuery($_SESSION['name']);
  $user_change = new UserChange($_SESSION['name']);
  if (isset($_POST['name'])) {
    $user_change->setUserName($_POST['name']);
  }
  if (isset($_POST['email'])) {
    $user_change->setUserEmail($_POST['email']);
  }
  if (isset($_POST['phone'])) {
    $user_change->setUserPhone($_POST['phone']);
  }
  if (isset($_POST['address'])) {
    $user_change->setUserAddress($_POST['address']);
  }
  if (isset($_POST['remark'])) {
    $user_change->setUserRemark($_POST['remark']);
  }
  if (isset($_POST['gender'])) {
    $user_change->setUserGender($_POST['gender']);
  }
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
              <li><a href="../Accounts/logout.php">注销</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container" style="margin-top:50px">
      <form action="changeUserInfo.php" method="post" class="well bs-docs-example form-horizontal" style="width:440px;margin:0px auto;">
        <h3 style="width:220px;margin:0px auto;">用户信息</h3>
        <div class="control-group" style="width:220px;margin:0px auto;">
          <label for="showGender" class="control-label">性别</label>
          <div class="controls">
            <?php $gender = $user_query->getUserGender(); ?>
            <input id="gender" type="radio" name="gender" value="1" <?php if ($gender == 1) echo "checked='checked'"; ?>>汉子&nbsp;&nbsp;
            <input id="gender" type="radio" name="gender" value="0" <?php if ($gender == 0) echo "checked='checked'"; ?>>妹子
          </div>
        </div>
        <div class="control-group" style="width:220px;margin:0px auto;">
          <label for="inputPhoneNum" class="control-label">电话号码</label>
          <div class="controls">
            <input type="text" name='phone' id="inputPhoneNum"  value='<?php echo "{$user_query->getUserPhone()}"; ?>' />
          </div>
        </div>
        <div class="control-group" style="width:220px;margin:0px auto;">
          <label for="inputAdd" class="control-label">地址</label>
          <div class="controls">
            <input type="text" name='address' id="inputAdd"  value='<?php echo "{$user_query->getUserAddress()}"; ?>'>
          </div>
        </div>
        <div class="control-group" style="width:220px;margin:0px auto;">
          <label for="inputAdd" class="control-label">个人简介</label>
          <div class="controls">
            <textarea name='remark' id="inputAdd"><?php echo "{$user_query->getUserRemark()}"; ?></textarea>
          </div>
        </div>
        <div class="control-group" style="width:220px;margin:5px auto;">
          <div class="controls">
              <button class="btn btn-success" onclick="location='showUserInfo.php'">确 定</button>
            <button class="btn" type="button">取 消</button>
          </div>
        </div>
      </form>
    </div>
<?php include('../Global/footer.html'); ?>