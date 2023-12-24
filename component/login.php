
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../libs/css/login.css">
</head>
<body>
<div id="particles-js" class="snow"></div>
<main>
    <div class="left-side">
        <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/64ef8d9a-9202-4543-b838-82f4c7c91ccf" alt="" />
    </div>
    <form id = "loginForm" method="POST" action="loginForm.php">
        <div class="btn-group">
            <button class="btn">
                <img class="logo" src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/d1c98974-c62d-4071-8bd2-ab859fc5f4e9" alt="" />
                <span>Sign in with Google</span>
            </button>
            <button class="btn">
                <img class="logo" src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/59c1561b-8152-4d05-b617-0680a7629a0e" alt="" />
                <span>Sign in with Apple</span>
            </button>
        </div>

        <div class="or">OR</div>

        <label for="email">Email</label>
        <input type="text" placeholder="Enter Email" name="email" required />

        <label for="password">Password</label>
        <input
                type="password"
                placeholder="Enter Password"
                name="password"
                required />
        <span id = "message" style="color: red"></span>
        <button type="submit" class="login-btn" name ="login" id = "login" onclick="">Sign in</button>
        <div class="links">
            <a href="#">Forgot password?</a>
            <a href="register.php">Do not have an account?</a>
        </div>
    </form>
</main>
</body>
</html>
<script>
    function submitForm() {
        var formData = new FormData(document.getElementById("loginForm"));

        fetch("loginForm.php", {
            method: "POST",
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if(data) {
                    console.log(data)
                    if (data.message) {
                        console.log("1")
                        document.getElementById("message").innerHTML = data.message;
                    } else {
                        document.getElementById("message").hidden = true;
                    }
                } else {
                    console.log("chuyen trang");
                    // location.href = "../index.php?page=index"
                }
            })
            .catch(error => {
                console.log("chuyen trang");
                // location.href = "../index.php?page=index"
            });
    }
</script>
