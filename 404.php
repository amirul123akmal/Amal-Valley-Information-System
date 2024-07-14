<?php require_once './header.php'; ?>
<style>
    body {
        background-color: #00e0e0;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        font-family: Arial, sans-serif;
    }

    .error-container {
        text-align: center;
        background-color: black;
        border-radius: 16px;
        padding: 25px;
    }

    .error-title {
        font-size: 10rem;
        font-weight: bold;
    }

    .error-subtitle {
        font-size: 2rem;
        margin-bottom: 1rem;
    }

    .home-button {
        background-color: #00bbb2;
        border: none;
        color: white;
        padding: 0.5rem 1rem;
        text-transform: uppercase;
        font-weight: bold;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .home-button:hover {
        background-color: #009a99;
    }
</style>

<body>
    <div class="error-container">
        <div class="error-title">404</div>
        <div class="error-subtitle">Page Not Found</div>
        <a href="./" class="home-button btn">Go Home</a>
        <input action="action" onclick="window.history.go(-1);" type="submit" class="btn btn-warning text-white" value="Back" />
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>