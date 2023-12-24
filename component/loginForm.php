<?php
require_once '../domain/Users.php';
$conn = new PDO("mysql:host=localhost;dbname=qlbh", "root", "");
if($_SERVER["REQUEST_METHOD"] == "POST")  {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
//    echo ($password);
    $stmt = $conn->prepare("select u.id, u.user_name, u.email , r.role_id as 'role_id' from users u inner join users_roles r on u.id = r. user_id where u.email = :email and u.password = :password ");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $conditions = array(
        'email' => $email,
        'password' => $password
    );
    $stmt->execute($conditions);
    $result = $stmt->fetch();
    if(empty($result))    {
        setcookie("error", "Đăng nhập không thành công!!!");
        $response = array("message" => "Tài khoản hoặc mật khẩu không đúng!!!");
        die (json_encode($response));
    }
    $user = $result;
    session_start();
    $_SESSION['loged'] = true;
    $_SESSION['role'] = $user->role_id;
    setcookie("username", $user->user_name, time() - 3600, "/");
    $_SESSION['username'] = $user->user_name;
    $response = array("message" => $user->role_id);
    echo (json_encode($response));
    if($user->role_id == 2) {
        header("location:../index.php");
    }
    if($user->role_id == 1) {
        header("location:admin.php");
    }
}
?>