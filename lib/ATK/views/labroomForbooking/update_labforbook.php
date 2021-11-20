<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Update RT-PCR Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

    <div class="container">
        <div class="row ">
            <div class="col">
                <br><br> <br> <br> <br><br>

                <div class="col-sm-9  p-3 ">
                    <img alt="" class="img-fluid" src="https://i.postimg.cc/02NDsr2c/health-solution.png">
                </div>
            </div>
            <div class="col">
                <h1 class="mt-5">Update Labroom Page</h1><br>
                <form method="get" action="">
                    <div class="mb-3">
                        <label for="labroom_ID" class="form-label">หมายเลขห้องแล็บ (Labroom ID)</label>
                        <input type="text" class="form-control" name="labroom_ID" value="<?php echo $labforbook_list->labroom_ID; ?>" readonly />
                    </div>
                    <div class="mb-3">
                        <label for="labName" class="form-label">ชื่อห้องแล็บ</label>
                        <input type="varchar" class="form-control" name="labName" value="<?php echo $labforbook_list->labName; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="Status" class="form-label">สถานะห้อง</label>


                        <?php
                        if ($labforbook_list->Status == 'พร้อมใช้งาน') {
                        ?>

                            <button type="button" class="btn btn-outline-primary me-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Status" value="พร้อมใช้งาน" id="R" checked>
                                    <label class="form-check-label" for="Status">
                                        พร้อมใช้งาน
                                    </label>
                            </button>
                            <button type="button" class="btn btn-outline-primary">

                                <input class="form-check-input" type="radio" name="Status" value="ไม่พร้อมใช้งาน" id="NR">
                                <label class="form-check-label" for="Status">
                                    ไม่พร้อมใช้งาน
                                </label>
                            </button>

                        <?php
                        } else {
                        ?>
                            <button type="button" class="btn btn-outline-primary me-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Status" value="พร้อมใช้งาน" id="R">
                                    <label class="form-check-label" for="Status">
                                        พร้อมใช้งาน
                                    </label>
                            </button>
                            <button type="button" class="btn btn-outline-primary">

                                <input class="form-check-input" type="radio" name="Status" value="ไม่พร้อมใช้งาน" id="NR" checked >
                                <label class="form-check-label" for="Status" >
                                    ไม่พร้อมใช้งาน
                                </label>
                            </button>
                        <?php
                        }
                        ?>
                    </div>



                    <input type="hidden" name="controller" value="labforbooking">
                    <div class="d-grid gap-3">
                        <button type="submit" class="w-100 btn btn-success btn-lg" name="action" value="update">Update</button>
                        <button type="submit" class="w-100 btn btn-danger btn-lg" name="action" value="index">Back</button>

                    </div>

                </form>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
<footer class="py-10 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Database Management sec 701 Group 1 Part 4</a></li>
    </ul>
    <p class="text-center text-muted">© 2021 Computer Engineering</p>
</footer>