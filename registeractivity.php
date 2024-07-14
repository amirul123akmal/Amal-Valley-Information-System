<?php require_once ("./header.php"); ?>
<link rel="stylesheet" href="./css/registeractivity.css">

<body>
    <?php require_once ("./sidebar.php"); ?>
            <hr class="mb-5">
            <div class="row mx-auto pt-3">
                <div class="col-12 col-md-7">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-alphabet-uppercase"></i></span>
                        <input type="text" class="form-control" placeholder="Activity Name" id="activityname">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-calendar-check" id="bi"></i></span>
                        <input type="text" id="place" class="form-control" placeholder="Place of Activity">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-calendar-check" id="bi"></i></span>
                        <input type="date" id="date" class="form-control" placeholder="Date of Activity">
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Time Start</span>
                                <input type="time" id="timestart" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm mb-3">
                            <div class="input-group">
                                <span class="input-group-text">Time End</span>
                                <input type="time" id="timeend" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary" onclick="send();" value="Register New Activity">
                    </div>
                </div>
                <div class="col-12 col-md-1 mb-3 mt-3"></div>
                <div class="col-12 col-md-4">
                    <p class="h2 text-center">Activity Thumbnail</p>
                    <div class="box-display mx-auto">
                        <img src="./img/placeholder.png" class="image-preview mx-auto pt-3 d-block" id="image-preview">
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <input type="file" class="btn btn-primary" id="imagefile">
                        <a href="#" class="btn btn-primary ms-2 btn-sm" onclick="preview()"><span class="bi bi-card-image fs-3" data-bs-toggle="tooltip" data-bs-title="Preview Image"></span></a>
                    </div>
                    <p class="text-center"><span class="text-danger">*</span>Image will be convert to dimension of 200 x 200</p>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="./js/registeractivity.min.js"></script>
<?php require_once ("./footer.php"); ?>