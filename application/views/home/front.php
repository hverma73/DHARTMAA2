<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/front.css" type="text/css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css">
    <title>Dharti Maa</title>
</head>

<body style="background-image: url('<?php echo base_url() ?>assets/image/2.jpg');background-size:cover;">
    <span class="row">
        <center><a href="<?php echo base_url() ?>home/dharti"><img src="http://192.168.0.12:8085/dhartimaa/Templates/images/logo-teal.png"></a></center>
    </span>
    <span class="row">
        <p class="p" style="font-size:28px;">The key to a greener planet is in your hands.</p>
    </span>
    <div class="container" style="margin-left:28vw;text-align: center;margin-top:3vh;">
        <div class="row">
            <div class="col-md-3">
                <div class="container_1" style="background: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRSCGD2xG9GiD8HOTQio148dvqpMFZMry1EZ1IZ-Ty5zQZhE7F0jg') no-repeat;background-size: cover;">
                    <p style="margin-top:7vh;font-size:22px;"><a href="javascript:void(0)" style="color: white;text-decoration:none;">Krushi Darshan</a></p>
                </div>
            </div>&nbsp;&nbsp;
            <div class="col-md-3">
                <div class="container_1" style="background: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTDCoetNd-E68g-vQxuKMJWgl83wt15pfVWLMgyKgrcZf-G5pRi') no-repeat;background-size: cover;">
                    <a href="<?php echo base_url() ?>home/buy" style="text-decoration:none;">
                        <p style="margin-top:7vh;font-size:22px;color:white;">Buy Plants</p>
                    </a>
                </div>
            </div>&nbsp;&nbsp;
            <div class="col-md-3">
                <div class="container_1" style="background: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRvvr9GpsUlQhJbpprO8aQ4ly85muXXdyweR-_Os9TrT5RPe1tioQ') no-repeat;background-size: cover;">
                    <p style="margin-top:7vh;font-size:22px;"><a href="javascript:void(0)" style="color: white;text-decoration:none;">Dharti Mitra</a></p>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top:2vh;">
            <div class="col-md-3">
                <div class="container_1" style="background: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR0BkMWIL0gOoTUKW4LrX5l1ffGjvedEgXp9giESUmJ2UwVLYGm') no-repeat;background-size: cover;">
                    <p style="margin-top:7vh;font-size:22px;"><a href="javascript:void(0)" style="color: white;text-decoration:none;">Donate Plant</a></p>
                </div>
            </div>&nbsp;&nbsp;
            <div class="col-md-3">
                <div class="container_1" style="background: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4nIdXPdqyyYWZ8Htu5tOGZXK5uSbXi2vfjWVucwhqPFKPeT3F1w') no-repeat;background-size: cover;">
                    <p id="bounce_1" style="margin-top:7vh;font-size:22px;"><a href="javascript:void(0)" style="text-decoration:none;color: white;">Design your Garden</a></p>
                </div>
            </div>&nbsp;&nbsp;
            <div class="col-md-3">
                <div class="container_1" style="background: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSft56j9ub9EFWJp-1hSLmxRZ0qc_45CBob73VfT0YWdD86tCd7BA') no-repeat;background-size: cover;">
                    <p style="margin-top:7vh;font-size:22px;"><a href="javascript:void(0)" style="color: white;text-decoration:none;">Others</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    $(document).ready(function() {
        $('.container_1').hover(function() {
            $('#bounce_1').effect("bounce", {
                times: 3
            }, 300);
        })
    })
</script>