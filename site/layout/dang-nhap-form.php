<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .user-forgot,
        .user-register {
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background-color: #fff;
            z-index: 99999;
            transform: scaleX(0);
            transform-origin: right;
            transition: all 300ms ease;
            box-shadow: 0 0 20px rgba(48, 46, 77, 0.15);
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .user-forgot.active,
        .user-register.active {
            transform: scaleX(1);
        }

        .forgot-close-icon,
        .register-close-icon {
            position: absolute;
            top: 0;
            left: 0;
            padding: 20px;
            font-size: 24px;
            cursor: pointer;
            transition: all 200ms ease;
        }

        .forgot-close-icon:hover,
        .register-close-icon:hover {
            transform: scale(1.3);
        }
    </style>
</head>

<body>
    <form class="login-form" action="../tai-khoan/dang-nhap.php" method="post">
        <div>
            <div>Tên đăng nhập</div>
            <input name="ma_kh" value="<?= $ma_kh ?>">
        </div>
        <div>
            <div>Mật khẩu</div>
            <input name="mat_khau" type="password" value="<?= $mat_khau ?>">
        </div>
        <div>
            <input name="ghi_nho" type="checkbox" checked> Ghi nhớ tài khoản?
        </div>
        <div class="form-group">
            <button name="btn_login">Đăng nhập</button>
        </div>
        <div>
            <li><a class="forgot" href="../tai-khoan/quen-mk-form.php">Forgot password</a></li>
            <li><a class="register" href="../tai-khoan/dang-ky.php">Register</a></li>
        </div>
    </form>
    <div class="user-forgot">
        <div class="forgot-close-icon">
            <i class="fa-solid fa-close"></i>
        </div>
        <form class="forgot-form" action="quen-mk.php" method="post">
            <div>
                <label>Username</label>
                <input name="ma_kh">
            </div>
            <div>
                <label>Email</label>
                <input name="email">
            </div>
            <div>
                <button name="btn_forgot">Find Password</button>
            </div>
        </form>
    </div>
    <div class="user-register">
        <div class="register-close-icon">
            <i class="fa-solid fa-close"></i>
        </div>
        <form class="register-form" action="dang-ky.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Username</label>
                <input name="ma_kh">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input name="mat_khau" type="password">
            </div>
            <div class="form-group">
                <label for="">Confirm Password</label>
                <input name="mat_khau2" type="password">
            </div>
            <div class="form-group">
                <label for="">Name</label>
                <input name="ho_ten">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input name="email">
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input name="up_hinh" type="file">
            </div>
            <div class="form-group">
                <button name="btn_register">Register</button>
            </div>
            <input name="kich_hoat" value="0" type="hidden">
            <input name="vai_tro" value="0" type="hidden">
        </form>
    </div>
    <script>
        const forgotLink = document.querySelector('.forgot'),
            registerLink = document.querySelector('.register'),
            register = document.querySelector('.user-register'),
            forgotContainer = document.querySelector('.user-forgot'),
            registerCloseIcon = document.querySelector('.register-close-icon'),
            forgotCloseIcon = document.querySelector('.forgot-close-icon')
        forgotLink.onclick = (e) => {
            e.preventDefault()
            forgotContainer.classList.add('active')
        }
        registerLink.onclick = (e) => {
            e.preventDefault()
            register.classList.add('active')
        }
        registerCloseIcon.onclick = (e) => {
            register.classList.remove('active')
        }
        forgotCloseIcon.onclick = (e) => {
            forgotContainer.classList.remove('active')
        }
        const forgotForm = document.querySelector('.forgot-form'),
            forgotBtn = document.querySelector('.forgot-form button')
        forgotForm.onsubmit = (e) => {
            e.preventDefault()
        }
        forgotBtn.onclick = () => {
            const xhr = new XMLHttpRequest(); // create new XML Object
            xhr.open("POST", "../tai-khoan/quen-mk.php?btn_forgot", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status == 200) {
                        let data = xhr.response;
                        alert(data)
                    }
                }
            };
            let formData = new FormData(forgotForm); //create new formData
            xhr.send(formData); //send formData to PHP
        }
        const registerForm = document.querySelector('.register-form'),
            registerBtn = document.querySelector('.register-form button')
        registerForm.onsubmit = (e) => {
            e.preventDefault()
        }
        registerBtn.onclick = () => {
            const xhr = new XMLHttpRequest(); // create new XML Object
            xhr.open("POST", "../tai-khoan/dang-ky.php?btn_register", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status == 200) {
                        let data = xhr.response;
                        alert(data)
                    }
                }
            };
            let formData = new FormData(registerForm); //create new formData
            xhr.send(formData); //send formData to PHP
        }
    </script>
</body>

</html>