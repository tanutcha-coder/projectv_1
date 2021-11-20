<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

        <div class="container">
            <main class="px-3">
                <h1 class="text-center">Are you sure to delete this colum</h1><br>
                <table id="QTtable" class="table table-bordered table-striped">

                    <thead>

                        <th>labanalyst ID</th>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th>ที่อยู่</th>

                    </thead>

                    <tbody>
                        <?php



                        ?>
                        <tr>

                            <td><?php echo $labana_list->labanalyst_ID ?></td>
                            <td><?php echo $labana_list->labanalyst_Name ?></td>
                            <td><?php echo $labana_list->labanalyst_Lname ?></td>
                            <td><?php echo $labana_list->Address ?></td>

                        </tr>
                        <?php

                        ?>

                    </tbody>
                </table>
                <br>
                <form method="get" action="">
                    <input type="hidden" name="controller" value="labanalyst" />
                    <input type="hidden" name="labanalyst_ID" value="<?php echo $labana_list->labanalyst_ID; ?>" />
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <button class="btn btn-lg btn-secondary  border-dark bg-dark " type="submit" name="action" value="index">Back</button>
                        <button class="btn btn-lg btn-secondary  border-danger bg-danger" type="submit" name="action" value="delete">Delete</button>
                    </div>
                </form>
            </main>
        </div>
        <footer class="mt-auto text-white-50">
            <p>Cover template for <a href="https://getbootstrap.com/" class="text-white">Bootstrap</a>, by <a href="https://twitter.com/mdo" class="text-white">@mdo</a>.</p>
        </footer>
    </div>

</body>