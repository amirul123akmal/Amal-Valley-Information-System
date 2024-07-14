<?php require_once "./header.php"; ?>
<link rel="stylesheet" href="./css/admin.css">

<body>
    <?php require_once "./sidebar.php"; ?>

    <div class="d-flex justify-content-between align-items-center mt-3">
        <div class="d-flex align-items-center">
            <span class="bi bi-speedometer2 ms-4 mt-2 mb-0 topicon"></span>
            <p class="fw-bold fs-3 mb-0 ms-3">Admin Dashboard</p>
        </div>
        <div class="d-flex mb-0 me-5">
            <button class="btn export" type="button">Export</button>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="row information mx-auto">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-header fw-bold fs-5">
                        beneficiaries
                    </div>
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <p class="fw-bold fs-1" id="past-activity">100</p>
                    </div>
                    <div class="card-footer d-flex justify-content-end" onclick="location.href='./viewinformation?=beneficiairies'">
                        <span>More Info</span>
                        <span class="bi bi-caret-right-fill fs-4 iconright"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-header fw-bold fs-5">
                        Volunteers
                    </div>
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <p class="fw-bold fs-1" id="users">100</p>
                    </div>
                    <div class="card-footer d-flex justify-content-end" onclick="location.href='./viewinformation?=volunteers'">
                        <span>More Info</span>
                        <span class="bi bi-caret-right-fill fs-4 iconright"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-header fw-bold fs-5">
                        Activity
                    </div>
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <p class="fw-bold fs-1" id="activity">100</p>
                    </div>
                    <div class="card-footer d-flex justify-content-end" onclick="location.href='./viewactivity'">
                        <span>More Info</span>
                        <span class="bi bi-caret-right-fill fs-4 iconright"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<?php require_once "./footer.php"; ?>
<script src="./js/admin.min.js"></script>