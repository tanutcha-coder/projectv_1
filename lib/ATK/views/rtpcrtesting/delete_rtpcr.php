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

                        <th>RT-PCR TestingID</th>
                        <th>ATK TestingID</th>
                        <th>LabroomID</th>
                        <th>ผลตรวจ ATK</th>
                        <th>ผลตรวจ RT-PCR</th>
                        <th>เจ้าหน้าที่ส่งสารคัดหลั่ง</th>
                        <th>วันเวลาที่ตรวจ</th>

                    </thead>

                    <tbody>
                        <?php



                        ?>
                        <tr>
                        
                            <td><?php echo $rtpcr_list->rtpcrtesting_ID ?></td>
                            <td><?php echo $rtpcr_list->TestingID ?></td>
                            <td><?php echo $rtpcr_list->labroom_booking_ID ?></td>
                            <td><?php echo $rtpcr_list->result ?></td>
                            <td><?php echo $rtpcr_list->rtpcr_result ?></td>
                            <td><?php echo $rtpcr_list->officer_N ?></td>
                            <td><?php echo $rtpcr_list->rtpcr_datetime ?></td>
                        
                        </tr>
                        <?php
                            
                        ?>

                    </tbody>
                </table>
                <br>
                <form method="get" action="">
                    <input type="hidden" name="controller" value="rtpcrtesting" />
                    <input type="hidden" name="rtpcrtesting_ID" value="<?php echo $rtpcr_list->rtpcrtesting_ID; ?>" />
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