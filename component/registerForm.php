<?php
require_once "../connect_mysql.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm-password"];
    $password_regex = "/^(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
    if (empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        setcookie("error", "Đăng ký không thành công!", time() + 1, "/", "", 0);
        $response = array("emailError" => "Email không hợp lệ");
        die (json_encode($response));
    }
    if (!preg_match($password_regex, $password) || empty($password)) {
        $response = array("passwordValidate" => "Mật khẩu không hợp lệ");
        die (json_encode($response));
    }
    if ($password !== $confirmPassword) {
        setcookie("error", "Đăng ký không thành công!", time() + 1, "/", "", 0);
        $response = array("passwordConfirmError" => "Mật khẩu không khớp!!!");
        die (json_encode($response));
    }
    $conn = new PDO("mysql:host=localhost;dbname=qlbh", "root", "");
    try {
        $query = $conn->prepare("select * from users u where u.email = :email");
        $query->setFetchMode(PDO::FETCH_OBJ);
        $conditions = array(
            'email' => $email,
        );
        $query->execute($conditions);
        if (!empty($query->fetch())) {
            $response = array("emailDuplicate" => "Email đã được sử dụng!!!!");
            die (json_encode($response));
        }
        $pass = md5($password);
        // save user
        $stmt = $conn->prepare('INSERT INTO users (user_name, password, email) values (?, ?, ?)');
        $stmt->bindParam(1, $userName);
        $stmt->bindParam(2, $pass);
        $stmt->bindParam(3, $email);
        $stmt->execute();
        $query = $conn->prepare("select * from users u where u.email = :email");
        $query->setFetchMode(PDO::FETCH_OBJ);
        $conditions = array(
            'email' => $email,
        );
        $query->execute($conditions);
        // save role
        $role = 2;
        $roles = $conn->prepare('INSERT INTO users_roles (user_id, role_id) values (?, ?)');
        $roles->bindParam(1, $query->fetch()->id);
        $roles->bindParam(2, $role);
        $roles->execute();
        setcookie("user_name", $userName, time() + 1, "/", "", 0);
        header("location:login.php?page=login");
    } catch (Exception $e) {
//        $conn->rollback();
        $response = array("emailDuplicate" => "Đăng ký tài khoản thất bại!!!");
        die (json_encode($response));
    }
}
?>