<?php include 'header.php' ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Poppins:600" rel="stylesheet">

    <title> DHARTI MAA </title>

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

        h3 {
            border-bottom: 2.5px solid #FF8000;
        }

        h2 {
            border-bottom: 1.0px solid #BABABA;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6" style="margin-bottom:3vh;">
                <h3 style="color:#666666;padding-bottom: 6px;"> Customer Login </h3>
                <?php echo form_open() ?>
                <div class="form-group">
                    <p style="color:black;">
                        <?php echo $this->session->flashdata('alertMsg'); ?>
                    </p>
                </div>
                <div class="form-group">
                    <label style="font-size: 16px;">Email/Mobile No.</label>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="" name="email" class="form-control" style="border-bottom: 0;border-top:0;border-block-color: black;">
                    <?php echo form_error('email'); ?>
                </div>
                <div class="form-group">
                    <label style="font-size: 16px;">Password</label>
                </div>
                <div class="form-group">
                    <input type="password" placeholder="" name="password" class="form-control" style="border-bottom: 0;border-top:0;border-block-color: black;">
                    <?php echo form_error('password'); ?>
                </div>
                <div class="form-group">
                    <button class="btn pull-left" style="background-color:orange;color:white;">Submit</button>
                </div>
                <?php echo form_close() ?>
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
</body>

</html>
<?php include 'footer.php' ?>