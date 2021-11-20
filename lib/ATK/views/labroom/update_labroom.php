<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Update Labroom Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

    <div class="container">
        <div class="row ">
            <div class="col">
                <br>
                <br> 
                <br> 
                <br>
                <br>
                <br>

                <div class="col-sm-9  p-3 ">
                    <img alt="" class="img-fluid" src="https://i.postimg.cc/9f4RvvNy/undraw-Updated-resume-re-q1or.png">
                </div>
            </div>
            <div class="col">
                <h1 class="mt-5">Update Labroom Page</h1><br>
                <form method="get" action="">
                    <div class="mb-3">
                        <label for="labroom_booking_ID" class="form-label">หมายเลขห้องแลป (Labroom ID)</label>
                        <input type="varchar" class="form-control" name="labroom_booking_ID" value="<?php echo $labroom_list->labroom_booking_ID; ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="labanalyst_ID" class="form-label">ชื่อผู้ใช้ห้องแลป (labanalyst_ID)</label>
                        <select name="labanalyst_ID">
                            <?php foreach ($lab_analyst_list as $LA) {
                                echo "<option value='$LA->labanalyst_ID'";
                                if ($labroom_list->labanalyst_ID == $LA->labanalyst_ID) {
                                    echo " selected='selected'";
                                }
                                echo ">$LA->labanalyst_Name</option>";
                            } ?>

                        </select><br>
                    </div>
                        <div class="mb-3">
                            <label for="sign_in_date" class="form-label">วันที่ลงชื่อเข้าใช้ (sign-in date)</label>
                            <input type="date" class="form-control" name="sign_in_date" value="<?php echo $labroom_list->sign_in_date; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="sign_in_time" class="form-label">เวลาที่ลงชื่อเข้าใช้ (sign-in time)</label>
                            <input type="time" class="form-control" name="sign_in_time" value="<?php echo $labroom_list->sign_in_time; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="sign_out_time" class="form-label">เวลาที่ลงชื่อออก (sign-out time)</label>
                            <input type="time" class="form-control" name="sign_out_time" value="<?php echo $labroom_list->sign_out_time; ?>">
                        </div>
                    

                    <input type="hidden" name="controller" value="labroom">
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