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
                    <img alt="" class="img-fluid" src="https://i.postimg.cc/9f4RvvNy/undraw-Updated-resume-re-q1or.png">
                </div>
            </div>
            <div class="col">
                <h1 class="mt-5">Update RT-PCR Page</h1><br>
                <form method="get" action="">
                    <div class="mb-3">
                        <label for="rtpcrtesting_ID" class="form-label">หมายเลขการตรวจRT-PCR (rtpcrtesting_ID)</label>
                        <input type="text" class="form-control" name="rtpcrtesting_ID" value="<?php echo $rtpcr_list->rtpcrtesting_ID; ?>" readonly />
                    </div>
                    <div class="mb-3">
                        <label for="rtpcr_datetime" class="form-label">วันที่ (Date)</label>
                        <input type="datetime" class="form-control" name="rtpcr_datetime" value="<?php echo $rtpcr_list->rtpcr_datetime; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="TestingID" class="form-label">หมายเลขID การตรวจATK (TestingID)</label>
                        <select name="TestingID">
                            <?php foreach ($ATK_list as $em) {
                                echo "<option value='$em->TestingID'";
                                if ($rtpcr_list->TestingID == $em->TestingID) {
                                    echo " selected='selected'";
                                }
                                echo ">$em->TestingID</option>";
                            } ?>

                        </select><br>
                        <div class="mb-3">
                            <label for="officer_ID" class="form-label">ชื่อพนักงานส่งสารคัดหลั่ง (officer Name)</label>
                            <select name="officer_ID">
                                <?php foreach ($officer_list as $cus) {
                                    echo "<option value='$cus->officer_ID'";
                                    if ($rtpcr_list->officer_ID == $cus->officer_ID) {
                                        echo " selected='selected'";
                                    }
                                    echo ">$cus->officer_N</option>";
                                } ?>
                            </select><br>
                        </div>
                        <div class="mb-3">
                            <label for="rtpcr_result" class="form-label">ผลการตรวจ RT-PCR</label>


                            <?php
                            if ($rtpcr_list->rtpcr_result == 'Positive') {
                            ?>

                                <button type="button" class="btn btn-outline-danger me-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rtpcr_result" id="PositiveN" value="Positive" checked>
                                        <label class="form-check-label" for="rtpcr_result">
                                            Positive
                                        </label>
                                </button>
                                <button type="button" class="btn btn-outline-success">

                                    <input class="form-check-input" type="radio" name="rtpcr_result" id="NegativeN" value="Negative">
                                    <label class="form-check-label" for="rtpcr_result">
                                        Negative
                                    </label>
                                </button>

                            <?php
                            } else {
                            ?>
                                <button type="button" class="btn btn-outline-danger me-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rtpcr_result" id="PositiveN" value="Positive">
                                        <label class="form-check-label" for="rtpcr_result">
                                            Positive
                                        </label>
                                </button>
                                <button type="button" class="btn btn-outline-success">

                                    <input class="form-check-input" type="radio" name="rtpcr_result" id="NegativeN" value="Negative" checked>
                                    <label class="form-check-label" for="rtpcr_result">
                                        Negative
                                    </label>
                                </button>
                            <?php
                            }
                            ?>





                        </div>

                    </div>
                    <div class="mb-3">
                        <label for="labroom_booking_ID" class="form-label">หมายเลขห้องแลปที่ตรวจ</label>
                        <select name="labroom_booking_ID">
                            <?php foreach ($labroom_list as $cus) {
                                echo "<option value='$cus->labroom_booking_ID'";
                                if ($rtpcr_list->labroom_booking_ID == $cus->labroom_booking_ID) {
                                    echo " selected='selected'";
                                }
                                echo ">$cus->labroom_booking_ID</option>";
                            } ?>
                        </select><br>
                    </div>

                    <input type="hidden" name="controller" value="rtpcrtesting">
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