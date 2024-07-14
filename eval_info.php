<?php require_once "./header.php"; ?>

<body>
    <style>
        input[type=file] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;

            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
    <?php require_once "./sidebar.php"; ?>
    <div class="text-center fw-bold fs-1 mt-3">
        YOU NEED TO EVALUATE YOUR INFORMATION FIRST
    </div>
    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-xl-3">
            <div class="row">
                <label for="sendFile" class="text-center"><b>Any Support Document</b></label>
                <input type="file" class="mt-3" id="sendFile" accept="application/pdf">
                <input type="file" class="mt-3" id="sendFile" accept="application/pdf">
                <input type="file" class="mt-3" id="sendFile" accept="application/pdf">
            </div>
            <div class="row mt-3">
                <input type="button" class="btn btn-primary mb-3" value="Send Document" onclick="sendDoc()">
            </div>
        </div>
        <div id="thumbnails"></div>
    </div>
</body>
<script src="./js/eval_info.min.js"></script>
<?php require_once './footer.php' ?>