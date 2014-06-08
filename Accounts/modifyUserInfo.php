<?php
    session_start();
    require_once('UserQuery.class.php');
    require_once('../Global/function.php');
    $user_query = new UserQuery($_SESSION['name']);
    $page_title = '中大义仙 —— 个人信息修改';
    include('../Global/header.html');
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
    <form action="modifyUserInfo.action.php" method="post" class="well" style="width:440px;margin:0px auto;">
    <h3 style="width:220px;margin:0px auto;">用户信息</h3>
 	  <form class="bs-docs-example form-horizontal">
 	    <div class="control-group" style="width:220px;margin:0px auto;">
        <label for="inputName" class="control-label">用户名</label>
        <div class="controls">
          <input type="text" id="inputName" value='<?php echo "{$user_query->getUserName()}"; ?>'>
        </div>
      </div>
      <div class="control-group" style="width:220px;margin:0px auto;">
        <label for="showGender" class="control-label">性别</label>
        <div class="controls">
          <?php $gender = $user_query->getUserGender(); ?>
          <input id="gender" type="radio" name="gender" value="1" <?php if ($gender == 1) echo "checked='checked'"; ?>>汉子&nbsp;&nbsp;
          <input id="gender" type="radio" name="gender" value="0" <?php if ($gender == 0) echo "checked='checked'"; ?>>妹子
        </div>
      </div>
      <div class="control-group" style="width:220px;margin:0px auto;">
        <label for="inputEmail" class="control-label">邮箱</label>
        <div class="controls">
          <input type="text" id="inputEmail" value='<?php echo "{$user_query->getUserEmail()}"; ?>' />
        </div>
      </div>
      <div class="control-group" style="width:220px;margin:0px auto;">
        <label for="inputPhoneNum" class="control-label">电话号码</label>
        <div class="controls">
          <input type="text" id="inputPhoneNum"  value='<?php echo "{$user_query->getUserPhone()}"; ?>' />
        </div>
      </div>
      <div class="control-group" style="width:220px;margin:0px auto;">
        <label for="inputAdd" class="control-label">地址</label>
        <div class="controls">
          <input type="text" id="inputAdd"  value='<?php echo "{$user_query->getUserAddress()}"; ?>'>
        </div>
      </div>
      <div class="control-group" style="width:220px;margin:0px auto;">
        <label for="inputAdd" class="control-label">个人简介</label>
        <div class="controls">
          <textarea id="inputAdd"><?php echo "{$user_query->getUserRemark()}"; ?></textarea>
        </div>
      </div>

      <div class="control-group" style="width:220px;margin:5px auto;">
        <div class="controls">
          <button class="btn btn-success">确 定</button>
          <button class="btn" type="button">取 消</button>
        </div>
      </div>
    </form>
<?php include('../Global/footer.html'); ?>