<?php
    $lifeTime = 24 * 3600; 
    session_set_cookie_params($lifeTime); 
    session_start(); 
    $page_title = '中大义仙——注册';
    include('../Global/header.html');

    if (isset($_POST['submit'])) {
        require_once('../DbConnect/MysqlConnect.class.php');
        $DB = MysqlConnect::getInstance();
        //定义常量，辅助加密 md5
        define(ALL_PS, "SysUyX");

        //接收用户的数据
        $name = mysql_escape_string($_POST['name']);
        $email = mysql_escape_string($_POST['email']);
        $phone = mysql_escape_string($_POST['telephone']);
        $address = mysql_escape_string($_POST['address']);
        $password = mysql_escape_string($_POST['password']);
        $gender = $_POST['gender']; 

            
        if ($name == '' || $email == '' || $phone == '' || $password == '') {
            echo "<div class='alert alert-danger'>
                    <a class='close' data-dismiss='alert'>×</a>
                    <strong>注册失败!</strong>请填写完整信息。
                </div>";
        } else {

            //密码 + 常量 进行 md5 加密
            $password = md5($_POST['password'] . ALL_PS);

            //检查用户名和邮箱是否可用
            $sql = "SELECT * FROM User WHERE `name` = '$name' OR `email` = '$email'";
            $query = mysql_query($sql);
            $us = is_array(mysql_fetch_array($query));
            if ($us) {
                echo "<div class='alert alert-danger'>
                        <a class='close' data-dismiss='alert'>×</a>
                        <strong>用户名或邮箱已被注册!</strong>
                    </div>";
            } else {
                $sql = "INSERT INTO User"
                     . "(`name`, `password`, `email`, `phone`, `address`, `gender`)"
                     . "VALUES ('$name', '$password', '$email', '$phone', '$address', '$gender')";
                $result = mysql_query($sql);
                if(!$result)
                {
                    die('数据写入错误: ' . mysql_error());
                }
                echo "<div class='alert alert-success'>
                        <a class='close' data-dismiss='alert'>×</a>
                        <strong>注册成功!</strong>正在跳转...
                      </div>";

                // 添加session
                $_SESSION['name'] = $name;
                $sql = "SELECT user_id FROM User WHERE `name` = '$name'";
                $query = mysql_query($sql);
                $row = mysql_fetch_array($query);
                $_SESSION['user_id'] = $row['user_id'];
                mysql_close();

                echo "<script>window.location= 'http://sysuyx.sinaapp.com/Main/PageMain.php';</script>";
            }
        }
    }
?> 
    <div class="container">
      <form class="form-signin" role="form" action="signin.php" method="post">
      
        <h2 class="form-signin-heading">中大义仙</h2>
        
        <label for="name">用户名:<p id='p_name'>*</p></label>
        <input id="name"name="name" type="text" class="form-control" placeholder="请输入用户名" onblur="checkName()"
            required autofocus value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>">

        <label for="email">邮箱:<p id='p_email'>*</p></label>
        <input id="email" name="email" type="email" class="form-control" placeholder="请输入用户邮箱" onblur="checkEmail()"
            required value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
        
        <label for="telephone">电话号码:<p>*</p></label>
        <input id="telephone" name="telephone" type="tel" class="form-control" placeholder="请输入短号，或长号"
            required value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>">

        <label for="address">地址:<p>*</p></label>
        <input id="address" name="address" type="text" class="form-control" placeholder="请输入地址"
            required value="<?php if(isset($_POST['address'])) echo $_POST['address']; ?>">
        
        <label for="password">密码:<p>*</p></label>
        <input id="password" name="password" type="password" class="form-control" placeholder="请输入密码" required>
        
        <label for="repassword">重复密码:<p>*</p></label>
        <input id="repassword" name="repassword" type="password" class="form-control" placeholder="请再次输入密码" required>
        
        <label for="gender">性别：</label>
        <input id="gender" type="radio" name="gender" value="1"
            <?php if(isset($_POST['gender']) && $_POST['gender'] == 1) echo "checked='checked'"; ?>>汉子&nbsp;&nbsp;
        <input id="gender" type="radio" name="gender" value="0"
            <?php if(isset($_POST['gender']) && $_POST['gender'] == 0) echo "checked='checked'"; ?>>妹子<br/><br/>

        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">注册</button>
        
      </form>
    </div>
    <script src="../js/Ajax.js"></script>
<?php include('../Global/footer.html'); ?>