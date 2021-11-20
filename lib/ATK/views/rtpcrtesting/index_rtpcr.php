<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300&display=swap" rel="stylesheet">
    <style type="text/css">
        body {
            font-family: 'Kanit', sans-serif;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1 class="mt-5">RT-PCR Testing <span><a href="?controller=rtpcrtesting&action=newRTPCR" class="btn text-dark" style="background-image: linear-gradient(to right,rgba(67, 233, 123, 0.5), rgba(56, 249, 215, 0.5));">Add+</a><br></span></h1>

        <nav class="navbar navbar-dark" style="background-color: #ffffff;">
            <div class="container-fluid">
                <a class="navbar-brand"></a>
                <form method="get" action="" class="d-flex">
                    <input class="form-control me-2" type="text" name="key" placeholder="Search" aria-label="Search">
                    <input type="hidden" name="controller" value="rtpcrtesting">
                    <button class="btn btn-primary" type="submit" name="action" value="search">
                        Search
                    </button>
                </form>
            </div>
        </nav>
        <table id="RTtable"  class="table table-striped align=center " style=" border-radius:30px;">

            <thead class="text-dark" style="background-image: linear-gradient(to right,rgba(250, 112, 154, 0.5), rgba(254, 225, 64, 0.5));">

                <th>RT-PCR TestingID</th>
                <th>ATK TestingID</th>
                <th>LabroomID</th>
                <th>ผลตรวจ ATK</th>
                <th>ผลตรวจ RT-PCR</th>
                <th>เจ้าหน้าที่ส่งสารคัดหลั่ง</th>
                <th>วันเวลาที่ตรวจ</th>
                <th>Edit</th>
                <th>Delete</th>


            </thead>
            <tbody>
                <?php


                foreach ($rtpcr_list as $q) {

                ?>
                    <tr>
                        <td><?php echo $q->rtpcrtesting_ID ?></td>
                        <td><?php echo $q->TestingID ?></td>
                        <td><?php echo $q->labroom_booking_ID ?></td>
                        <td><?php echo $q->result ?></td>
                        <td><?php echo $q->rtpcr_result ?></td>
                        <td><?php echo $q->officer_N ?></td>
                        <td><?php echo $q->rtpcr_datetime ?></td>


                        <td><a href="?controller=rtpcrtesting&action=update_rtpcr&rtpcrtesting_ID=<?php echo $q->rtpcrtesting_ID ?>" class="btn btn-primary">Edit</td>
                        <td><a href="?controller=rtpcrtesting&action=delete_rtpcr&rtpcrtesting_ID=<?php echo $q->rtpcrtesting_ID ?>" class="btn btn-danger">Delete</td>
                    </tr>
                <?php

                }
                ?>

            </tbody>

        </table>


        <br>
        <a href="?controller=rtpcrtesting&action=newRTPCR"  class="w-100 btn btn-lg" style="background-image: linear-gradient(to right,rgba(67, 233, 123, 0.5), rgba(56, 249, 215, 0.5));">Add new RT-PCR result</a></button>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

<footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Database Management sec 701 Group 1 Part4</a></li>
    </ul>
    <p class="text-center text-muted">© 2021 Computer Engineering</p>
</footer>