<?php include 'header.php' ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Poppins:600" rel="stylesheet">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title> Checkout </title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8" style="border:1px solid #BABABA;padding:50px;margin-top:2vh;margin-bottom:2vh;margin-left:-5vw;">
                <?php echo form_open() ?>
                <div class="form-group">
                    <p style="color:black;">
                        <?php echo $this->session->flashdata('alertMsg'); ?>
                    </p>
                </div>
                <div class="form-group">
                    <label style="font-size:20px;">Customer Name</label>
                    <input class="form-control" type="text" name="customername" placeholder="">
                    <?php echo form_error('customername'); ?>
                </div>
                <div class="form-group">
                    <label style="font-size:20px;">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="">
                    <?php echo form_error('email'); ?>
                </div>
                <div class="form-group">
                    <label style="font-size:20px;">Address</label>
                    <input type="text" name="address" placeholder="" class="form-control">
                    <?php echo form_error('address'); ?>
                </div>
                <div class="form-group">
                    <label style="font-size:20px;">Mobile Number</label>
                    <input type="text" name="mobileNo" placeholder="" class="form-control">
                    <?php echo form_error('mobileNo'); ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-;" style="border-radius: 0px;"> Continue </button>
                    <a href="<?php echo base_url() ?>home/product" id="bt" class="btn btn-warning" style="float:right;border-radius:0px;margin-bottom:2vh;margin-left:3vw;"> Continue Shopping</a>
                </div>
                <?php echo form_close() ?>
            </div>
            <div class="col-md-4" style="border:1px solid #BABABA;margin-top:2vh;margin-bottom:2vh;margin-left:2vw;">
                <h3 class="cart-total-title" style="border-bottom:1px solid #BABABA">Your Order</h3>
                <div class="col-xs-8 clearfix table-col" style="padding: 8px;">
                    Item Net Amount
                </div>
                <div class="col-xs-4 clearfix text_red table-col ng-binding" style="padding: 6px; text-align: right;color:red;">
                    <i class="fa fa-inr text_red"></i><?php echo $this->cart->format_number($this->cart->total()); ?>
                </div>
                <div class="col-xs-8 clearfix table-col" style="padding: 8px;">
                    Delivery Charges (Incl. of Tax)
                </div>
                <div class="col-xs-4 clearfix text_red table-col ng-binding" style="padding: 6px; text-align: right;color:red;">
                    <i class="fa fa-inr text_red"></i>0
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php include 'footer.php' ?>
<script>
    $(document).ready(function() {
        $("#bt").click(function() {
            swal("Good job!", "You clicked the button!", "success");
        })
    })
</script>