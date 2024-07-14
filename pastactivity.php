<?php require_once ("./header.php"); ?>

<body>
    <?php require_once ("./sidebar.php"); ?>
    <hr>
    <div class="table-responsive">
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
            <tbody class="table-group-divider">
            </tbody>
        </table>
    </div>
</body>
<script src="./js/pastactivity.min.js"></script>
<?php require_once ("./footer.php"); ?>