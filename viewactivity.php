<?php require_once './header.php'; ?>
<link rel="stylesheet" href="./css/viewactivity.css">

<body>
    <?php require_once "./sidebar.php"; ?>

    <hr>
    <div class="row d-flex justify-content-center">
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Activity Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Status</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Edit Activity</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12">
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
                        <div class="input-group mb-3">
                            <label class="input-group-text">Status</label>
                            <select class="form-select" id="status">
                                <option value="Not Yet">Not Yet</option>
                                <option value="On Going">On Going</option>
                                <option value="Done">Done</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="saveNewData()">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
<script src="./js/viewactivity.js"></script>
<?php require_once "./footer.php"; ?>