<?php
    session_start();
    $page_title = '中大义仙 —— 个人信息';
    include('../Global/header.html');
    if (!isset($_SESSION['name'])) {
      echo "<script>alert('权限不足！');</script>";
      exit();
    }
    require_once('UserQuery.class.php');
    $user_query = new UserQuery($_SESSION['name']);
?>
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
        <a style="padding-left: 16%; padding-top: 5%"><img src="../img/brand.png" class="img-rounded"/></a>
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
  <div class="container" style="margin-top:50px">
     <form action="" method="get" class="well" style="width:440px;margin:0px auto;">

     <h3 style="width:220px;margin:0px auto;">用户信息</h3>
     <form class="bs-docs-example form-horizontal">
          <div class="control-group" style="width:220px;margin:0px auto;">
              <label for="showName" class="control-label">用户名</label>
              <div class="controls">
                <th id="showName"><?php echo "{$user_query->getUserName()}"; ?></th>
              </div>
            </div>
            <div class="control-group" style="width:220px;margin:0px auto;">
              <label for="showGender" class="control-label">性别</label>
              <div class="controls">
                <th id="showGender">
                    <?php
                        $gender = $user_query->getUserGender();
                        if ($gender == 0) echo "女";
                        elseif ($gender == 1) echo "男";
                    ?>
                </th>
              </div>
            </div>
            <div class="control-group" style="width:220px;margin:0px auto;">
              <label for="showEmail" class="control-label">邮箱</label>
              <div class="controls">
                <th id="showEmail"><?php echo "{$user_query->getUserEmail()}"; ?></th>
              </div>
            </div>
            <div class="control-group" style="width:220px;margin:0px auto;">
              <label for="showPhoneNum" class="control-label">电话号码</label>
              <div class="controls">
                <th id="showPhoneNum"><?php echo "{$user_query->getUserPhone()}"; ?></th>
              </div>
            </div>
            <div class="control-group" style="width:220px;margin:0px auto;">
              <label for="showAdd" class="control-label">地址</label>
              <div class="controls">
                <th id="showAdd"><?php echo "{$user_query->getUserAddress()}"; ?></th>
              </div>
            </div>
            <div class="control-group" style="width:220px;margin:0px auto;">
              <label for="showAdd" class="control-label">个人简介</label>
              <div class="controls">
                <textarea id="showAdd"><?php echo "{$user_query->getUserRemark()}"; ?></textarea>
              </div>
            </div>
            <div class="control-group" style="width:220px;margin:0px auto;">
              <div class="controls">
                <button class="btn" type="button" onclick="location='changeUserInfo.php'">修 改</button>
              </div>
            </div>
     </form>
  </div>
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
<?php include('../Global/footer.html'); ?>