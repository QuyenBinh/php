<?php
require_once '../domain/Users.php';
$conn = new PDO("mysql:host=localhost;dbname=qlbh", "root", "");
if($_SERVER["REQUEST_METHOD"] == "POST")  {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $query = $conn->prepare("select * from users u where u.email = :email and u.password = :password");
    $query->setFetchMode(PDO::FETCH_CLASS, 'Users');
    $conditions = array(
        'email' => $email,
        'password' => $password
    );
    $result = $query->execute($conditions);
    $user = $result[0];
    if(empty($user))    {
        setcookie("error", "Đăng nhập không thành công!!!");
        $response = array("message" => "Tài khoản hoặc mật khẩu không đúng!!!");
        die (json_encode($response));
    }
    $_SESSION['loged'] = true;
    setcookie("user_name", $user->user_name, time() - 3600, "/");
    $_SESSION['user-name'] = $user->user_name;
}
?>