<!DOCTYPE>
<html>

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/index.css" type="text/css">

    <style>
        .dropdown-content a {
            color: black;
            /* padding: 12px 16px; */
            text-decoration: none;
            /* display: block; */
        }

        .dropbtn {
            background-color: #619D09;
            color: white;
            font-size: 16px;
            border: none;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #619D09;
        }

        a.nostyle:link {
            text-decoration: inherit;
            color: inherit;
            cursor: auto;
        }

        a.nostyle:visited {
            text-decoration: inherit;
            color: inherit;
            cursor: auto;
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-responsive" style="background-color:#619D09;color: white;font-size: 14px;">
        <ul class="nav navbar-nav" style="color:b">
            <li class="db_1" style="margin-top:2vh;font-size:15px;margin-left:1vw;"><i class="fa fa-phone" aria-hidden="true"></i> +91-9827098270 </li>
            <li class="db_1" style="margin-top:2vh;font-size:15px;"><span class="glyphicon glyphicon-envelope"></span> info@domain.com </li>
        </ul>
        <ul class="nav navbar-nav db" style="margin-right:2vw;">
            <!-- <li class="db_1" style="margin-top:-1.7vh;font-size:15px;"><a href="<?php echo base_url() ?>home/buy" style="color:white;background-color:#619D09;">Login</a></li>
            <li class="db_1" style="margin-top:-1.7vh;font-size:15px;"><a href="<?php echo base_url() ?>home/signup" style="color:white;background-color:#619D09;">SignUp</a></li> -->

            <!-- <?php
            if (($this->session->userdata("userData"))) {
                echo '<li class="db_1" style="margin-top:-1.7vh;font-size:15px;"><a href="<?php echo base_url() ?>home/logout" style="color:white;background-color:#619D09;">Logout</a></li>';
            } else {
                echo '<li class="db_1" style="margin-top:-1.7vh;font-size:15px;"><a href="<?php echo base_url() ?>home/buy" style="color:white;background-color:#619D09;">Login</a></li>';
                echo '<li class="db_1" style="margin-top:-1.7vh;font-size:15px;"><a href="<?php echo base_url() ?>home/signup" style="color:white;background-color:#619D09;">SignUp</a></li>';
            }
            ?> -->
            <?php if (($this->session->userdata("userData"))) {
                ?>
                <li class="db_1" style="margin-top:-1.7vh;font-size:15px;"><a href="<?php echo base_url() ?>home/logout" style="color:white;background-color:#619D09;">Logout</a></li>
                ?> <?php
            } else {
                ?>
                <li class="db_1" style="margin-top:-1.7vh;font-size:15px;"><a href="<?php echo base_url() ?>home/buy" style="color:white;background-color:#619D09;">Login</a></li>
                <li class="db_1" style="margin-top:-1.7vh;font-size:15px;"><a href="<?php echo base_url() ?>home/signup" style="color:white;background-color:#619D09;">SignUp</a></li>
            <?php } ?>
            <li class="db_1" style="font-size:15px;">Sell on Dharti Maa</li>
            <li style="margin-right:1.5vw;font-size:15px;">Download App</li>
            <li>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="background-color:#619D09;margin-top:-0.5vh;border:none;">Cart
                    </button>
                    <ul class="dropdown-menu" id="cartPop" style="margin-left:-16vw;padding:30px;margin-top:1vh;">
                        <?php /*
                        <table border="1" style="border-color:#ddd;" class="table table-responsive">
                            <thead>
                                <th style="width:33%;text-align:center;">Quantity</th>
                                <th style="text-align:center;width:33%;">Product Name</th>
                                <th style="text-align:center;width:33%;">Product Price</th>
                            </thead>
                            <tbody id="tbody">
                            <?php $i = 1; ?>
                        <?php foreach ($this->cart->contents() as $items) : ?>
                        <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>
                        <tr>
                            <td style="text-align:center"><?php echo $items['qty']; ?></td>
                            <td style="text-align:center;">
                                <?php echo $items['name']; ?>
                            </td>
                            <td style="text-align:center">₹<?php echo $this->cart->format_number($items['subtotal']); ?>
                            </td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="1"> </td>
                                <td class="right"><strong>Total</strong></td>
                                <td class="right"><?php echo $this->cart->format_number($this->cart->total()); ?>
                                </td>
                            </tr>
                        </tfoot>
                        </table>
                        <a href="<?php echo base_url() ?>home/cart" class="btn btn-warning" style="border-radius:0px;margin-bottom:2vh;margin-left:3vw;"> View Cart</a>
                        <a href="<?php echo base_url() ?>home/checkout" class="btn btn-warning checkout" style="border-radius:0px;margin-bottom:2vh;margin-right:1vw;float:right;background-color: orange;">Proceed to Checkout</a>
                        */ ?>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
    <span class="row" style="margin-bottom:2vh;">
        <div class="col-md-3" style="margin-left:15vw;">
            <a href="<?php echo base_url() ?>home/dharti"><img src="http://192.168.0.12:8085/dhartimaa/Templates/images/logo-teal.png" class="img-responsive"></a>
        </div>
        <!-- <div class="form-group-lg input-group input-group-lg">
            <input type="text" name="" placeholder="Search City..." class="box11" style="margin-left:-4vw;">


            <input type="text" name="" placeholder="Search Nursery..." class="box11" style="margin-left:2vw;">


            <input type="text" name="" placeholder="" class="box11" style="margin-left:2vw;">
            <span>
                <button type="submit" class="btn btn-input-group" style="margin-left: -4.2vw;margin-top: -0.5vh;background-color: orange;/* width: 2.5vw; */height: 4.2vh;"><i class="fa fa-search"></i></button>
            </span>
        </div> -->
        <div class="input-group">
            <input type="text" name="" placeholder="Search City..." class="box11" style="margin-left:-4vw;">
            <input type="text" name="" placeholder="Search Nursery..." class="box11" style="margin-left:2vw;">
            <input type="text" name="" placeholder="" class="box11" style="margin-left:2vw;">
            <span>
                <button type="submit" class="btn btn-input-group" style="margin-left: -4.2vw;margin-top: -0.5vh;background-color: orange;/* width: 2.5vw; */height: 4.2vh;"><i class="fa fa-search"></i></button>
            </span>
        </div>
    </span>
    <span class="row">
        <ul class="nav navbar-nav" style="background-color:#619D09;width: 100vw;color:white;height: 4vh;font-size: 16px;margin-top:2vh;">
            <li style="margin-left:18vw;margin-top: -0.5vh;padding:0;"><a href="<?php echo base_url() ?>home/dharti" style="color:white;">Home</a></li>
            <li style="margin-left:4vw;margin-top: 1vh;">Krishi Darshan</li>
            <li style="margin-left:4vw;margin-top: -0.5vh;"><a href="<?php echo base_url() ?>home/product" style="color:white;">Products</a></li>
            <li style="margin-left:4vw;margin-top: 1vh;">Dharti Mitra</li>
            <li style="margin-left:4vw;margin-top: 1vh;">Donate Plant</li>
            <li style="margin-left:4vw;margin-top: 1vh;">Design your Garden</li>
        </ul>
    </span>
</body>

</html>
<script>
    $(document).ready(function() {
        bindCart();
    })

    function bindCart() {
        debugger;
        $.ajax({
            type: "POST",
            cache: false,
            url: "<?php echo base_url() ?>home/bindCart",
            success: function(response) {
                debugger
                $('#cartPop').html(JSON.parse(response));
            }
        })
    }
</script>