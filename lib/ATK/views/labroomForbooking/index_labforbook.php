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

        <h1 class="mt-5">Labroom  Page   </h1>

        <br>

        <nav class="navbar navbar-dark" style="background-color: #ffffff;">
            <div class="container-fluid">
                <a class="navbar-brand"></a>
                <form method="get" action="" class="d-flex">
                    <input class="form-control me-2" type="text" name="key" placeholder="Search" aria-label="Search">
                    <input type="hidden" name="controller" value="labforbooking" />
                    <button class="btn btn-primary" type="submit" name="action" value="search">
                        Search
                    </button>
                </form>
            </div>
        </nav>

        <table id="labroomtable" class="table table-striped align=center ">


            <thead class="text-dark" style="background-image: linear-gradient(to right,rgba(250, 112, 154, 0.5), rgba(254, 225, 64, 0.5));">

                <th>Labroom ID</th>
                <th>Labroom Name</th>
                <th>สถานะการใช้งานห้อง</th>
                <th>Edit</th>
                <th>Delete</th>


            </thead>

            <tbody>
                <?php


                foreach ($labforbook_list as $q) {

                ?>
                    
                    
                    <tr>
                        <td><?php echo $q->labroom_ID ?></td>
                        <td><?php echo $q->labName ?></td>
                        <td><?php echo $q->Status ?></td>

                        <td><a href="?controller=labforbooking&action=update_labforbooking&labroom_ID=<?php echo $q->labroom_ID ?>" class="btn btn-primary">Edit</td>
                        <td><a href="?controller=labforbooking&action=delete_labforbooking&labroom_ID=<?php echo $q->labroom_ID ?>" class="btn btn-danger">Delete</td>
                    </tr>

                <?php

                }
                ?>

            </tbody>
        </table>
        <a href="?controller=labforbooking&action=newlabforbooking" class="w-100 btn  btn-lg " style="background-image: linear-gradient(to right,rgba(67, 233, 123, 0.5), rgba(56, 249, 215, 0.5));">Add new labforbooking booking</a></button>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

<footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Database Management sec 701 Group 1 Part4</a></li>
    </ul>
    <p class="text-center text-muted">© 2021 Computer Engineering</p>
</footer>