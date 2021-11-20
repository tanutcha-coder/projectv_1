<?php
if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
} else {
    $controller = 'pages';
    $action = 'home';
}
?>
<html>
    <div class="container" > 
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <h3 class="fw-bolder">RT-PCR Testing</h3>
            </a>
           
            <ul class="nav nav-pills" >
                <li class="nav-item "><a href="?controller=pages&action=home" class="btn btn-outline-primary me-2 fw-bold" aria-current="page">Home</a></li>
                <li class="nav-item"><a href="?controller=rtpcrtesting&action=index" class="btn btn-outline-primary me-2 fw-bold">RT-PCR Result</a></li>
                <li class="nav-item"><a href="?controller=labroom&action=index" class="btn btn-outline-primary me-2 fw-bold">Labroom</a></li>
                <li class="nav-item"><a href="?controller=labanalyst&action=index" class="btn btn-outline-primary me-2 fw-bold">Laboratory Analyst</a></li>
                <li class="nav-item "><a href="http://158.108.207.4/db21/db21_050/" class="btn btn-outline-primary me-2 fw-bold" aria-current="page">หน้าหลัก Group 1</a></li>                

            </ul>
            <div class="col-md text-end">
                <button type="button" class="btn btn-outline-danger me-2">STAY SAFE</button>
                <button type="button" class="btn btn-danger">STAY HOME</button>
            </div>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        </header>
    </div>

<body>
    <?php require_once("routes.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>

</html>