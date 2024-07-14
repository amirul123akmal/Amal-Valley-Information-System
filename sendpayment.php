<?php require ("./header.php"); ?>

<body>
    <?php require ("./sidebar.php"); ?>
    <div class="row mt-3">
        <div class="col-12 col-xl-3">
            <div class="row">
                <label for="sendFile"><b>Send Payment Proof</b></label>
                <input type="file" class="mt-3" id="sendFile">
                <a href="#" class="mt-2 mb-2" onclick="preview()">Preview</a>
            </div>
            <div class="row">
                <input type="button" class="btn btn-primary mb-3" value="Send Document" onclick="sendDoc()">
            </div>
        </div>
        <div class="col-12 col-xl-9">
            <iframe src="./document/template.pdf" id="iframe-pdf" width="100%" height="800px"></iframe>
        </div>
    </div>
</body>
<script src="./js/sendpayment.min.js"></script>
<?php require_once ('./footer.php') ?>