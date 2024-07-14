<?php require_once './header.php'; ?>
<link rel="stylesheet" href="./css/viewactivity.min.css">

<body>
    <?php require_once './sidebar.php'; ?>
    <hr>
    <div class="row d-flex justify-content-center pt-3 table-responsive">
        <table class="table text-center table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Num Phone</th>
                    <th scope="col">State</th>
                    <th scope="col">Status</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
            </tbody>
        </table>
    </div>
    <!-- UPDATION MODAL -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalName">Edit User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <span class="input-group-text">@</span>
                                <input type="text" class="form-control" placeholder="Username" id="username">
                            </div>
                        </div>
                        <div class="col hilang" id="adminPassword">
                            <div class="input-group mb-3">
                                <span class="input-group-text" onclick="change();"><i class="bi bi-eye-slash pass" id="bi"></i></span>
                                <input type="Password" class="form-control" placeholder="Password" id="password">
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input required type="email" class="form-control" placeholder="Email" id="email">
                    </div>
                    <div class="row">
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
                                    <option value="Selangor">Selangor</option>
                                    <option value="Labuan">Labuan</option>
                                    <option value="Perlis">Perlis</option>
                                    <option value="Terengganu">Terengganu</option>
                                    <option value="Putrajaya">Putrajaya</option>
                                    <option value="Kuala Lumpur">Kuala Lumpur</option>
                                </select>
                            </div>
                        </div>
                        <div class="col" id="statusArea">
                            <div class="input-group mb-3">
                                <label class="input-group-text">Status</label>
                                <select class="form-select" id="status">
                                    <option value="Active">Active</option>
                                    <option value="Not Active">Not Active</option>
                                    <option value="Disable">Disabled</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <div class="input-group">
                            <span class="input-group-text">+60</span>
                            <input required type="text" class="form-control" placeholder="Phone Number" id="phone">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="saveNewData()" id="modalSaveData">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="./js/viewinformation.min.js"></script>
<?php require_once './footer.php'; ?>