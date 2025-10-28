<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <!--=============== REMIXICONS ===============-->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content=""  />
        <meta name="author" content="" />
        <title>Login - THE NEW AVENUE</title>
        <!-- Favicon-->
        <link type="image/png" sizes="96x96" rel="icon" href="img/icons8-shop-96.png">
        <!-- Komponen CSS Bootstrap 4 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

        <!-- Komponen FontAwesome -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

        <!-- Komponen Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="assets/css/styles.css" rel="stylesheet" />
        <style>
            /*=============== GOOGLE FONTS ===============*/
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap");
        /*=============== VARIABLES CSS ===============*/
        :root {
        /*========== Colors ==========*/
        /*Color mode HSL(hue, saturation, lightness)*/
        --white-color: hsl(0, 0%, 100%);
        --black-color: hsl(0, 0%, 0%);
        /*========== Font and typography ==========*/
        /*.5rem = 8px | 1rem = 16px ...*/
        --body-font: "Poppins", sans-serif;
        --h1-font-size: 1.75rem;
        --normal-font-size: 1rem;
        --small-font-size: .813rem;
        /*========== Font weight ==========*/
        --font-medium: 500;
        }

        /*=============== BASE ===============*/
        * {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
        }

        body,
        input,
        button {
        font-size: var(--normal-font-size);
        font-family: var(--body-font);
        overflow: hidden;
        }

        body {
        color: var(--white-color);
        }

        input,
        button {
        border: none;
        outline: none;
        }

        a {
        text-decoration: none;
        }

        img {
        max-width: 100%;
        height: auto;
        }

        /*=============== LOGIN ===============*/
        .login {
        position: relative;
        height: 100vh;
        display: grid;
        align-items: center;
        }
        .login__img {
        position: absolute;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        }
        .login__form {
        position: relative;
        background-color: hsla(0, 0%, 10%, 0.1);
        border: 2px solid var(--white-color);
        margin-inline: 1.5rem;
        padding: 2.5rem 1.5rem;
        border-radius: 1rem;
        backdrop-filter: blur(8px);
        }
        .login__title {
        text-align: center;
        font-size: var(--h1-font-size);
        font-weight: var(--font-medium);
        margin-bottom: 2rem;
        }
        .login__content, .login__box {
        display: grid;
        }
        .login__content {
        row-gap: 1.75rem;
        margin-bottom: 1.5rem;
        }
        .login__box {
        grid-template-columns: max-content 1fr;
        align-items: center;
        column-gap: 0.75rem;
        border-bottom: 2px solid var(--white-color);
        }
        .login__icon, .login__eye {
        font-size: 1.25rem;
        }
        .login__input {
        width: 100%;
        padding-block: 0.8rem;
        background: none;
        color: var(--white-color);
        position: relative;
        z-index: 1;
        }
        .login__box-input {
        position: relative;
        }
        .login__label {
        position: absolute;
        left: 0;
        top: 13px;
        font-weight: var(--font-medium);
        transition: top 0.3s, font-size 0.3s;
        }
        .login__eye {
        position: absolute;
        right: 0;
        top: 18px;
        z-index: 10;
        cursor: pointer;
        }
        .login__box:nth-child(2) input {
        padding-right: 1.8rem;
        }
        .login__check, .login__check-group {
        display: flex;
        align-items: center;
        justify-content: space-between;
        }
        .login__check {
        margin-bottom: 1.5rem;
        }
        .login__check-label, .login__forgot, .login__register {
        font-size: var(--small-font-size);
        }
        .login__check-group {
        column-gap: 0.5rem;
        }
        .login__check-input {
        width: 16px;
        height: 16px;
        }
        .login__forgot {
        color: var(--white-color);
        }
        .login__forgot:hover {
        text-decoration: underline;
        }
        .login__button {
        width: 100%;
        padding: 1rem;
        border-radius: 0.5rem;
        background-color: var(--white-color);
        font-weight: var(--font-medium);
        cursor: pointer;
        margin-bottom: 2rem;
        }
        .login__register {
        text-align: center;
        }
        .login__register a {
        color: var(--white-color);
        font-weight: var(--font-medium);
        }
        .login__register a:hover {
        text-decoration: underline;
        }

        /* Input focus move up label */
        .login__input:focus + .login__label {
        top: -12px;
        font-size: var(--small-font-size);
        }

        /* Input focus sticky top label */
        .login__input:not(:placeholder-shown).login__input:not(:focus) + .login__label {
        top: -12px;
        font-size: var(--small-font-size);
        }

        /*=============== BREAKPOINTS ===============*/
        /* For medium devices */
        @media screen and (min-width: 576px) {
        .login {
            justify-content: center;
        }
        .login__form {
            width: 432px;
            padding: 4rem 3rem 3.5rem;
            border-radius: 1.5rem;
        }
        .login__title {
            font-size: 2rem;
        }
        }
        </style>
    </head>
    <body>
            <!-- untuk memasukkan data -->
            <div class="login">
            <img src="img/bg9.jpg" alt="login image" class="login__img">
                <form class="login__form" action="<?= base_url('halmasuk/autentifikasi'); ?>" method="POST" enctype="multipart/form-data">
                        <br>
                        <h1 class="login__title">Halaman Login</h1>
                        <div class="login__content">
                            <div class="login__box">
                                <i class="ri-user-3-line login__icon"></i>

                                <div class="login__box-input">
                                    <input type="text" class="login__input" 
                                    placeholder=" " name="inputan_nama_pengguna" required autofocus autocomplete="off">
                                    <label for="" class="login__label">Username</label>
                                </div>
                            </div>

                            <div class="login__box">
                                <i class="ri-lock-2-line login__icon"></i>

                                <div class="login__box-input">
                                    <input type="password" class="login__input" id="login-pass"
                                    placeholder=" " name="inputan_pw_pengguna" required>
                                    <label for="" class="login__label">Password</label>
                                    <i class="ri-eye-off-line login__eye" id="login-eye"></i>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="login__button" name="btnLogin">Sign In</button>
                        
                        <p class="login__register">
                           Batal, <a href="<?= base_url('home'); ?>">Back</a>
                        </p>
                    </form>
                </div>
      <script>
        window.addEventListener('DOMContentLoaded', event => {

        // Toggle the side navigation
        const sidebarToggle = document.body.querySelector('#sidebarToggle');
        if (sidebarToggle) {
            // Uncomment Below to persist sidebar toggle between refreshes
            // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
            //     document.body.classList.toggle('sb-sidenav-toggled');
            // }
            sidebarToggle.addEventListener('click', event => {
                event.preventDefault();
                document.body.classList.toggle('sb-sidenav-toggled');
                localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
            });
        }

        });
      /*=============== SHOW HIDDEN - PASSWORD ===============*/
        const showHiddenPass = (loginPass, loginEye) =>{
        const input = document.getElementById(loginPass),
                iconEye = document.getElementById(loginEye)

        iconEye.addEventListener('click', () =>{
            // Change password to text
            if(input.type === 'password'){
                // Switch to text
                input.type = 'text'

                // Icon change
                iconEye.classList.add('ri-eye-line')
                iconEye.classList.remove('ri-eye-off-line')
            } else{
                // Change to password
                input.type = 'password'

                // Icon change
                iconEye.classList.remove('ri-eye-line')
                iconEye.classList.add('ri-eye-off-line')
            }
        })
        }

        showHiddenPass('login-pass','login-eye')
        </script>
    </body>
</html>