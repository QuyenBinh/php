
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
    <form id = "loginForm" method="POST">
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
        <button type="button" class="login-btn" name ="login" id = "login" onclick="submitForm()">Sign in</button>
        <div class="links">
            <a href="#">Forgot password?</a>
            <a href="#">Do not have an account?</a>
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
                        document.getElementById("passwordConfirmError").style.display = 'hidden';
                    }
                }
            })
            .catch(error => {
                location.href = " ../index.php"
            });
    }
</script>

<script>
    particlesJS("particles-js", {
        particles: {
            number: {
                value: 300,
                density: {
                    enable: true,
                    value_area: 800,
                },
            },
            color: {
                value: "#fff",
            },
            shape: {
                type: "circle",
                stroke: {
                    width: 0,
                    color: "#000000",
                },
                polygon: {
                    nb_sides: 5,
                },
            },
            opacity: {
                value: 1,
                random: false,
                anim: {
                    enable: false,
                    speed: 1,
                    opacity_min: 0.1,
                    sync: false,
                },
            },
            size: {
                value: 3,
                random: true,
                anim: {
                    enable: false,
                },
            },
            line_linked: {
                enable: false,
            },
            move: {
                enable: true,
                speed: 2,
                direction: "bottom",
                random: false,
                straight: false,
                out_mode: "out",
                bounce: false,
                attract: {
                    enable: false,
                    rotateX: 600,
                    rotateY: 1200,
                },
            },
        },
        retina_detect: true,
    });

</script>