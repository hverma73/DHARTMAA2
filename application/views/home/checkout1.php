<?php include 'header.php' ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title> Checkout </title>
    <style>
        body {
            font-family: Arial;
        }

        * {
            box-sizing: border-box;
        }

        form.example input[type=text] {
            padding: 10px;
            font-size: 17px;
            border: 1px solid grey;
            float: left;
            width: 80%;
            background: #f1f1f1;
        }

        form.example button {
            float: left;
            width: 20%;
            padding: 10px;
            background: #2196F3;
            color: white;
            font-size: 17px;
            border: 1px solid grey;
            border-left: none;
            cursor: pointer;
        }

        form.example button:hover {
            background: #0b7dda;
        }

        form.example::after {
            content: "";
            clear: both;
            display: table;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-7" style="margin-top:2vh;">
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color:#3a9b2d;">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse1" style="text-decoration:none;">LOGIN & SIGNUP</a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="col-md-6">
                                    <?php echo form_open(""); ?>
                                    <form>
                                        <div class="form-group">
                                            <label style="font-size: 16px;">Email/Mobile No.</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="" class="form-control" style="border-bottom: 0;border-top:0;border-block-color: black;">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-outline;" style="border-radius: 0px;"> Continue </button>
                                        </div>
                                    </form>
                                    <?php echo form_close(); ?>
                                </div>
                                <div class="col-md-6">
                                    <h3 style="color:#666666;padding-bottom: 6px;"> Advantages of our secure login </h3>
                                    <blockquote>
                                        <p>Easily Track Orders, Hassle free Returns</p>
                                    </blockquote>
                                    <blockquote>
                                        <p>Get Relevant Alerts and Recommendation</p>
                                    </blockquote>
                                    <blockquote>
                                        <p>Wishlist, Reviews, Ratings and more.</p>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse2" style="text-decoration:none;">DELIVERY ADDRESS</a>
                            </h4>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse">
                            <div class="panel-body">
                                <form action="#">
                                    <input type="radio" name="" value="Add New Address"> Add New Address<br>
                                </form>
                                <form class="form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Name</label><br>
                                            <input type="text" name="" placeholder=""><br>
                                            <label>Alternate Phone no.(Optional)</label><br>
                                            <input type="text" name="" placeholder="">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Mobile No.</label><br>
                                            <input type="text" name="" placeholder=""><br>
                                            <label>Locality</label><br>
                                            <input type="text" name="" placeholder="">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse3" style="text-decoration:none;">ORDER SUMMARY</a>
                            </h4>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse">
                            <div class="panel-body">

                                <table cellspacing="1" style="width:100%;border-color:black;" border="1" class="table">

                                    <tr>
                                        <th style="width:25%;text-align:center;background-color:#3a9b2d;color:white;">Quantity</th>
                                        <th style="text-align:center;width:20%;background-color:#3a9b2d;color:white;">Product Name</th>
                                        <th style="text-align:center;width:20%;background-color:#3a9b2d;color:white;">Price</th>
                                        <th style="text-align:center;width:20%;background-color:#3a9b2d;color:white;">Sub-Total</th>
                                        <th style="text-align:center;width:20%;background-color:#3a9b2d;color:white;">Action</th>
                                    </tr>

                                    <?php $i = 1; ?>

                                    <?php foreach ($this->cart->contents() as $items) : ?>

                                        <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>

                                        <tr>
                                            <td style="text-align:center"><?php echo $items['qty']; ?></td>
                                            <td style="text-align:center">
                                                <?php echo $items['name']; ?>
                                            </td>
                                            <td style="text-align:center"><?php echo $this->cart->format_number($items['price']); ?></td>
                                            <td style="text-align:center">₹<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                                            <td style="text-align:center;"><button type="button" onclick="remove('<?php echo $items['rowid'] ?>')" style="background-color:orange;" class="btn placeholder-button button_red"><span class="glyphicon glyphicon-trash" style="color:white;"></span></button></td>
                                        </tr>

                                        <?php $i++; ?>

                                    <?php endforeach; ?>


                                </table>

                                <form style="margin-left: 7vw;">
                                    <label>Order confirmation email will be sent to</label>&nbsp;&nbsp;&nbsp;
                                    <input type="email" name="" placeholder="">&nbsp;&nbsp;&nbsp;
                                    <a href="#" class="btn btn-warning" style="border-radius:0px;background-color: orange;text-decoration:none;">Continue</a>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse4" style="text-decoration:none;">PAYMENT OPTIONS</a>
                            </h4>
                        </div>
                        <div id="collapse4" class="panel-collapse collapse">
                            <div class="panel-body">
                                <form action="#">
                                    <input type="radio" name="" value="cod"> COD&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="" value="Credit Card/Debit Card"> Credit Card/Debit Card
                                    <div class="form-group">
                                        <button class="btn" id="order" style="background-color:orange;color:white;float:right;" href="<?php echo base_url() ?>home/order"> Order Place </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<?php include 'footer.php' ?>
<script>
    $(document).ready(function() {
        $('#order').click(function() {
            swal("Order Placed");
        })
    })
</script>