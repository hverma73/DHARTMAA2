<?php include 'header.php' ?>
<!DOCTYPE>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/index" type="text/css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title> Description </title>
</head>

<body>
    <span class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body" style="margin-top:2vh;margin-bottom:2vh;border:2px;border-color:black;">
                    <?php
                    if (!empty($item)) { {
                            ?>
                            <img style="margin-left: 18vw;width: 15vw;height: 33vh;" src="<?php echo $item[0]['image'] ?>">
                        <?php }
                }
                ?>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <span class="container">
                <?php
                if (!empty($item)) {
                    ?> <h2 style="margin-left:2.5vw;margin-top:-1vh;color:#666666;"> <?php echo $item[0]['item_name'] ?> </h2>
                <?php }
            ?>
                <table class="table table-bordered" style="width:35vw;margin-left:2vw;margin-top:0.5vh;color:#666666;border:4px">
                    <tr>
                        <th style="width:25%;">Item Name</th>
                        <th style="width:25%;">Price</th>
                        <th style="width:50%;">Description</th>
                    </tr>
                    <?php
                    if (!empty($item)) {

                        ?>
                        <tr>
                            <td><?php echo $item[0]['item_name'] ?></td>
                            <td style="color:#ff8000"><i class="fas fa-inr"></i><?php echo $item[0]['rate'] ?></td>
                            <td><?php echo $item[0]['description'] ?></td>
                        </tr>
                    <?php }
                ?>
                </table>
            </span>
        </div>
    </span>
</body>

</html>
<?php include 'footer.php' ?>