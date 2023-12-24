<?php
require_once "../connect_mysql.php";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $userName = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm-password"];
    $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
    if (empty($email) &&  filter_var($email, FILTER_VALIDATE_EMAIL)) {
        setcookie("error", "Đăng ký không thành công!", time() + 1, "/", "", 0);
        $response = array("emailError" => "Email không hợp lệ");
        die (json_encode($response));
    }
    if(!preg_match($password_regex, $password) || empty($password))   {
        $response = array("passwordValidate" => "Mật khẩu không hợp lệ");
        die (json_encode($response));
    }
    if($password !== $confirmPassword) {
        setcookie("error", "Đăng ký không thành công!", time() + 1, "/", "", 0);
        $response = array("passwordConfirmError" => "Mật khẩu không khớp!!!");
        die (json_encode($response));
    }
        $pass = md5($password);
        $conn = mysqli_connect('localhost', 'root', '', 'qlbh') or die('Không thể kết nối!');
        mysqli_query($conn, "
					insert into users (user_name,password,email)
					values ('$userName','$pass','$email')
				");
        header("location:login.php");
        setcookie("user_name", $userName, time() + 1, "/", "", 0);
}
?>