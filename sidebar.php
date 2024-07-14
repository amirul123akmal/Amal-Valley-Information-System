<link rel="stylesheet" href="./css/sidebar.css">

<body>
    <div id="sidebartemp" class="text-center pt-2" data-bs-toggle="offcanvas" href="#sidebar">
        <i class="bi bi-list burger" data-bs-toggle="offcanvas" href="#sidebar"></i>
    </div>
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="true" tabindex="-1" id="sidebar">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Navigation Panel</h5>
            <i class="bi bi-list burger burger-open" data-bs-dismiss="offcanvas"></i>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column sidebar-content">

            </ul>
        </div>
        <p class="logout"><a onclick="logout()" href="#">Logout</a></p>
    </div>
</body>
<div class="mainbody pt-3">
    <div class="container">
        <div class="row">
            <div class="col">
                <b>Hi, <span class="usernameHeader">Amirul Aiman</span></b>
            </div>
            <div class="col">
                <div class="d-flex justify-content-end">
                    <input type="button" class="btn btn-primary hilang" id="addAdmin" value="Add Admin" data-bs-toggle="modal" data-bs-target="#updateModal">
                </div>
                <div class="d-flex justify-content-end hilang">
                    <a href="./registeractivity" class="btn new-activity hilang" type="button" id="newActivity">New
                        Activity</a>
                </div>
            </div>
        </div>
        <script src="./js/sidebar.min.js"></script>