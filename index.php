<?php require_once "header.php"; ?>
<link rel="stylesheet" href="./css/index.css">

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7 long">
                <img src="./img/amalvalley.svg" class="image mx-auto d-block mb-3">
                <p class="para text-center"><b>Join us in making a significant impant on our community</b></p>
            </div>
            <div class="col-md-5 short">
                <h1 class="mb-5 text-center">AMAL VALLEY INFORMATION SYSTEM</h1>
                <form>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="username" placeholder="Username / E-Mail" autocomplete="username">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="password" placeholder="Password" autocomplete="userpassword">
                    </div>
                    <input onclick="send()" type="button" class="btn btn-primary w-10" value="LOG IN" onclick="location.href='volunteers'">
                </form>
                <p class="mt-3">Don't have an account? <a href="register">Register here</a></p>
            </div>
        </div>
    </div>
</body>
<script src="./js/index.min.js"></script>
<?php require_once "./footer.php"; ?>
</html>