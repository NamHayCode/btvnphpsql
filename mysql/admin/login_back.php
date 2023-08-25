<?php
    session_start();
    // error_reporting (E_ALL ^ E_DEPRECATED); 
    require_once('C:\Users\Acer\Documents\Zalo Received Files\baitap_session\mysql\model\connect.php');
    if (isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM admin WHERE username = '$username' AND password = ('$password')";
        $res = mysqli_query($conn,$sql);
        $rows = mysqli_num_rows($res);
        if ($rows > 0){
            $_SESSION['usernameAdmin'] = $username;
            while($row = mysqli_fetch_assoc($res)){
                $_SESSION['id-Admin'] = $row['id'];
            }
            header('Location: product-list.php');

        }
        else{
            $_SESSION['error'] = 'Tên đăng nhập hoặc mật khẩu không hợp lệ!';
            header('Location:./admin/login.php?error=wrong');
            die("");
           } exit();
    }
?>



    





