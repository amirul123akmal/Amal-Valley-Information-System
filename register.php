<?php require_once "./header.php"; ?>
<link rel="stylesheet" href="./css/register.css">

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="text-center">
                <img src="./img/amalvalley.svg" alt="Amal Valley Icon" class="img-fluid" id="topimg">
                <p class="h1 mb-5">Amal Valley Information System</p>
            </div>
        </div>
        <div class="row form-area">
            <div class="input-group mb-3">
                <span class="input-group-text">@</span>
                <input type="text" class="form-control" placeholder="Username" id="username">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" onclick="change();"><i class="bi bi-eye-slash pass" id="bi"></i></span>
                <input required type="password" id="password" class="form-control" placeholder="Password" id="password">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input required type="email" class="form-control" placeholder="Email" id="email">
            </div>
            <div class="col">
                <div class="input-group mb-3">
                    <label class="input-group-text">State</label>
                    <select class="form-select" id="state">
                        <option value="Johor">Johor</option>
                        <option value="Kedah">Kedah</option>
                        <option value="Kelantan">Kelantan</option>
                        <option value="Sabah">Sabah</option>
                        <option value="Sarawak">Sarawak</option>
                        <option value="Melaka">Melaka</option>
                        <option value="Pahang">Pahang</option>
                        <option value="Negeri Sembilan">Negeri Sembilan</option>
                        <option value="Perak">Perak</option>
                        <option value="Pulau Pinang">Pulau Pinang</option>
                        <option selected value="Selangor">Selangor</option>
                        <option value="Labuan">Labuan</option>
                        <option value="Perlis">Perlis</option>
                        <option value="Terengganu">Terengganu</option>
                        <option value="Putrajaya">Putrajaya</option>
                        <option value="Kuala Lumpur">Kuala Lumpur</option>
                    </select>
                </div>
            </div>
            <div class="col-sm mb-3">
                <div class="input-group">
                    <span class="input-group-text">+60</span>
                    <input required type="text" class="form-control" placeholder="Phone Number" id="phone">
                </div>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text">Type of Registration</label>
                <select class="form-select" id="type">
                    <option value="volunteer" selected>Volunteer</option>
                    <option value="beneficiaries">Beneficiary</option>
                </select>
            </div>
            <div>
                <input type="submit" class="btn btn-primary" onclick="send();" value="REGISTER">
                <p class="mt-3">Already registered ? <a href="./">Login here</a></p>
            </div>
        </div>
    </div>
</body>
<script src="./js/register.min.js"></script>
<?php require_once "./footer.php"; ?>