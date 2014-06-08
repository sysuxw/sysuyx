<?php # login.php
    $lifeTime = 24 * 3600; 
    session_set_cookie_params($lifeTime); 
    session_start(); 
    $page_title = '中大义仙——登陆';
    include('../Global/header.html');

    if (isset($_POST['submit'])) {
        require_once('../DbConnect/MysqlConnect.class.php');
        $DB = MysqlConnect::getInstance();
        //定义常量，辅助加密 md5
        define(ALL_PS, "SysUyX");

        $name = mysql_escape_string(str_replace(" ", "", $_POST['name'])); //清除空格
        $password = md5($_POST['password'] . ALL_PS); // 先加密

        // 数据库检测
        $sql = "SELECT * FROM User WHERE `name` = '$name' AND `password` = '$password'";
        $query = mysql_query($sql);
        $row = mysql_fetch_array($query);

        if ($row) { //登陆成功
            $_SESSION['name'] = $name;
            $_SESSION['user_id'] = $row['user_id'];
            //$_SESSION['pwd_md5'] = md5($name . $password);  // 对session再加密
            //echo "'$_SESSION[user_id]'\n$_SESSION[pwd_md5]";

            echo "<script>window.location= 'http://sysuyx.sinaapp.com/Main/PageMain.php';</script>";
        } else {
            echo "<div class='alert alert-danger'>
                    <a class='close' data-dismiss='alert'>×</a>
                    <strong>登录失败!</strong>用户名或密码错误.
                  </div>";
            session_destroy();
        }
        mysql_close();
    }
?>

    <div class="container">
        <form class="form-signin" role="form" action="login.php" method="post">
            <h2 class="form-signin-heading">中大义仙</h2>
            <input name="name" type="text" class="form-control" placeholder="用户名" required autofocus>
            <input name="password" type="password" class="form-control" placeholder="密码" required>
            <label class="checkbox">
            <input type="checkbox" value="remember-me"> 记住我
            </label>
            <p class="form-actions">
                <input type="submit" name='submit' value="登录" class="btn btn-primary">
                <a href="#"><input type="button" value="忘记密码" class="btn btn-danger"></a>
                <a href="signin.html"><input type="button" value="新用户？" class="btn btn-success"></a>
            </p>
        </form>

    </div>

<?php include('../Global/footer.html'); ?>