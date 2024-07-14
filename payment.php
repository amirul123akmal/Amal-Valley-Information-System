<?php require_once ('./header.php'); ?>

<body>
    <?php require_once ('./sidebar.php'); ?>
    <!--
    TO DO
    GET INFORMATION OF BENEFICIARIES FROM THE DATABASE
    PUT IT INTO A FORM     
    REQUIRED INFORMATION:
    1. email - done
    2. amount need to pay  done
    3. name - done
    4. phone num - done
     

    MAKE THE PAYMENT
    
    -->

    <div class="row form-area mt-3">
        <div class="input-group mb-3">
            <span class="input-group-text">@</span>
            <input type="text" class="form-control" placeholder="Username" id="username">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
            <input type="email" class="form-control" placeholder="Email" id="email">
        </div>
        <div class="col-sm mb-3">
            <div class="input-group">
                <span class="input-group-text">+60</span>
                <input type="text" class="form-control" placeholder="Phone Number" id="phone">
            </div>
        </div>
        <div class="col-sm mb-3">
            <div class="input-group">
                <span class="input-group-text">RM</span>
                <input readonly type="text" class="form-control" id="price" value="123.62"> <!-- the value only for testing, delete after done change -->
            </div>
        </div>
        <div>
            <input type="submit" class="btn btn-primary" onclick="send()" value="Make Payment">
        </div>
    </div>
</body>
<script src="./js/payment.min.js"></script>
<?php require_once ('./footer.php'); ?>