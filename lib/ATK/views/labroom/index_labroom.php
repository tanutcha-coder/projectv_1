<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Labroom Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300&display=swap" rel="stylesheet">
    <style type="text/css">
        body {
            font-family: 'Kanit', sans-serif;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1 class="mt-5">Labroom booking Page    <span><a href="?controller=labforbooking&action=index" class="btn text-white fw-bold" style="background-image: linear-gradient(to right,rgba(48, 207, 208), rgba(51, 8, 103));" >ดูห้องแล็บทั้งหมด</a><br></span></h1>

        <br>

        <nav class="navbar navbar-dark" style="background-color: #ffffff;">
            <div class="container-fluid">
                <a class="navbar-brand"></a>
                <form method="get" action="" class="d-flex">
                    <input class="form-control me-2" type="text" name="key" placeholder="Search" aria-label="Search">
                    <input type="hidden" name="controller" value="labroom" />
                    <button class="btn btn-primary" type="submit" name="action" value="search">
                        Search
                    </button>
                </form>
            </div>
        </nav>

        <table id="labroomtable" class="table table-striped align=center ">


            <thead class="text-dark" style="background-image: linear-gradient(to right,rgba(250, 112, 154, 0.5), rgba(254, 225, 64, 0.5));">

                <th>Labroom ID</th>
                <th>labanalyst_ID</th>
                <th>labanalyst Name</th>
                <th>วันที่ลงชื่อเข้าใช้</th>
                <th>เวลาที่ลงชื่อเข้าใช้</th>
                <th>เวลาที่ลงชื่อออก</th>
                <th>Edit</th>
                <th>Delete</th>


            </thead>

            <tbody>
                <?php


                foreach ($labroom_list as $q) {

                ?>
                    
                    
                    <tr>

                        <td><?php echo $q->labroom_booking_ID ?></td>
                        <td><?php echo $q->labanalyst_ID ?></td>
                        <td><?php echo $q->labanalyst_Name ?></td>
                        <td ><?php echo $q->sign_in_date ?></td>
                        <td><?php echo $q->sign_in_time ?></td>
                        <td><?php echo $q->sign_out_time ?></td>
                        <td><a href="?controller=labroom&action=update_labroom&labroom_booking_ID=<?php echo $q->labroom_booking_ID ?>" class="btn btn-primary">Edit</td>
                        <td><a href="?controller=labroom&action=delete_labroom&labroom_booking_ID=<?php echo $q->labroom_booking_ID ?>" class="btn btn-danger">Delete</td>
                    </tr>

                <?php

                }
                ?>

            </tbody>
        </table>
        <a href="?controller=labroom&action=newlabroom" class="w-100 btn  btn-lg " style="background-image: linear-gradient(to right,rgba(67, 233, 123, 0.5), rgba(56, 249, 215, 0.5));">Add new labroom booking</a></button>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

<footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Database Management sec 701 Group 1 Part4</a></li>
    </ul>
    <p class="text-center text-muted">© 2021 Computer Engineering</p>
</footer>