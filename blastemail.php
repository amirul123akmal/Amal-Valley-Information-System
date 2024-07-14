<?php require_once ("./header.php"); ?>

<body>
    <?php require_once ("./sidebar.php"); ?>
    <div class="row">
        <div class="col table-responsive text-center">
            <table class="table">
                <thead>
                    <th class="col">#</th>
                    <th class="col">Email</th>
                    <th class="col">Name</th>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div class="col">
            <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0"
                aria-valuemax="100">
                <div class="progress-bar" style="width: 0%" id="theprogress"></div>
            </div>
            <div class="row mt-3">
                <input type="button" class="btn btn-primary mb-2" value="Send Email" onclick="start(0)">
                <p><b>Sending Email: </b><span class="emailname"></span></p>
                <p><b>Sending Count: </b><span class="emailcount"></span></p>
            </div>
        </div>
    </div>
</body>
<script src="./js/blastemail.min.js"></script>
<?php require_once ("./footer.php"); ?>