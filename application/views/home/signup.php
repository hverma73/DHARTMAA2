<?php include 'header.php' ?>
<!DOCTYPE>
<html>

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <title> Sign Up </title>

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
    <div class="container">
        <div class="row" style="margin-top:2vh;margin-bottom:3vh;color:#666;">
            <?php echo form_open() ?>
            <div class="form-group">
                <p style="color:black;">
                    <?php echo $this->session->flashdata('alertMsg'); ?>
                </p>
            </div>
            <div class="form-group">
                <label>First Name</label>
                <input class="form-control" type="text" name="firstname" placeholder="">
                <?php echo form_error('firstname'); ?>
            </div>
            <div class="form-group">
                <label>last Name</label>
                <input class="form-control" type="text" name="lastname" placeholder="">
                <?php echo form_error('lastname'); ?>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="">
                <?php echo form_error('email'); ?>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="">
                <?php echo form_error('password'); ?>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="cpassword" placeholder="" class="form-control">
                <?php echo form_error('Conformpassword'); ?>
            </div>
            <div class="form-group">
                <label>Mobile Number</label>
                <input type="text" name="mobileNo" placeholder="" class="form-control">
                <?php echo form_error('mobileNo'); ?>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-outline-;" style="border-radius: 0px;"> Continue </button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>

</body>

</html>
<?php include 'footer.php' ?>