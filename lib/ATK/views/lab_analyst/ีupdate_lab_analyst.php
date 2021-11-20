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
                <h1 class="mt-5">Update Analyst Page</h1><br>
                <form method="get" action="">
                    <div class="mb-3">
                        <label for="labanalyst_ID" class="form-label">labanalyst ID </label>
                        <input type="varchar" class="form-control" name="labanalyst_ID" value="<?php echo $labana_list->labanalyst_ID; ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="labanalyst_Name" class="form-label">ชื่อ (labanalyst Name)</label>
                        <input type="varchar" class="form-control" name="labanalyst_Name" value="<?php echo $labana_list->labanalyst_Name; ?>" >

                    </div>
                        <div class="mb-3">
                            <label for="labanalyst_Lname" class="form-label">นามสกุล (labanalyst Lastname)</label>
                            <input type="varchar" class="form-control" name="labanalyst_Lname" value="<?php echo $labana_list->labanalyst_Lname; ?>" >                        
                        </div>
                        <div class="mb-3">
                            <label for="Address" class="form-label">ที่อยู่</label>
                            <input type="text" class="form-control" name="Address" value="<?php echo $labana_list->Address; ?>">
                        </div>
                    

                    <input type="hidden" name="controller" value="labanalyst">
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