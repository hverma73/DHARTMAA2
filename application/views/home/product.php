<?php include 'header.php' ?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <title> Products </title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/index.css">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <style>
        .slidecontainer {
            width: 20vw;
        }

        .slider {
            -webkit-appearance: none;
            width: 100%;
            height: 15px;
            border-radius: 5px;
            background: green;
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
        }

        .slider:hover {
            opacity: 1;
        }

        .slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: orange;
            cursor: pointer;
        }

        .slider::-moz-range-thumb {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: #4CAF50;
            cursor: pointer;
        }

        .btn_1 {
            border: none;
            outline: 0;
            margin-bottom: -1vh;
            color: black;
            background-color: white;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }

        h2 {
            border-bottom: 2.2px solid #BABABA;
        }

        *,
        *:after,
        *:before {
            box-sizing: border-box;
        }


        h1 {
            font-family: Merriweather, serif;
            margin: 0 0 50px;
            cursor: default;
        }

        #container_1 {
            width: 300px;
            margin: 0 auto;
        }
    </style>

</head>

<body>
    <div class="container-fluid">
        <div class="col-md-3">
            <h2 style="color: #666;padding-bottom:4px;border-bottom-color: orange;margin-bottom: 3vh;"> Types </h2>
            <?php foreach ($category_type as $key => $value) { ?>
                <form style="display: flex;margin-top: 1vh;">
                    <input type="checkbox" style="width: 2vw;">
                    <label style="font-size: 18px;font-weight:300;"><?php echo $value['category_type'] ?></label>
                </form>
            <?php } ?>
            <h2 style="color: #666;padding-bottom:4px;border-bottom-color: orange;margin-bottom: 3vh;"> Categories </h2>
            <?php foreach ($category as $key => $value) { ?>
                <form style="display: flex;">
                    <input type="checkbox" style="width: 2vw;" class="chkClass" value="<?php echo $value['id'] ?>">
                    <label style="font-size: 18px;font-weight:300;" class="chk"><?php echo $value['category_name'] ?></label>

                </form>
            <?php } ?>
            <form>
                <h2 style="color: #666;padding-bottom:4px;border-bottom-color: orange;margin-bottom: 3vh;"> Price </h2>
                <div class="slidecontainer">
                    <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
                </div>
            </form>
        </div>
        <div class="col-md-9">

            <div id="tbodyProduct">

            </div>



            <!-- <div class="row">
                <h2 style="color: #666;padding-bottom:4px;border-bottom-color: orange;margin-bottom: 3vh;"> Avenue trees </h2>
                <div class="col-md-3">
                    <section id="container_1" style="display: inline;">
                        <div style="width:10vw;" class="thumbnail" data-title="Rupesh Nursery" data-description=" Plant Height : 8 feet (+/- 20 %)">
                            <img src="http://192.168.0.12/DhartiMaaLive/PI_2.jpg" alt="Meat" width="300">
                        </div>
                    </section>
                </div>
                <div class="col-md-3">
                    <section id="container_1">
                        <div class="thumbnail" style="width:11.5vw;" data-title="Bacon" data-description="Bacon ipsum dolor amet filet mignon alcatra short ribs, sausage shoulder tail biltong rump chicken ground round ham hock porchetta tri-tip. Boudin bresaola andouille, leberkas pork ball tip turducken beef ribs">
                            <img src="http://192.168.0.12/DhartiMaaLive/PI_3.jpg" alt="Meat" width="300">
                        </div>
                    </section>
                </div>
            </div>
            <div class="row">
                <h2 style="color: #666;padding-bottom:4px;border-bottom-color: orange;margin-bottom: 3vh;"> Cactus </h2>
                <div class="col-md-3">
                    <section id="container_1">
                        <div class="thumbnail" style="width:10vw;" data-title="Bacon" data-description="Bacon ipsum dolor amet filet mignon alcatra short ribs, sausage shoulder tail biltong rump chicken ground round ham hock porchetta tri-tip. Boudin bresaola andouille, leberkas pork ball tip turducken beef ribs">
                            <img src="http://192.168.0.12/DhartiMaaLive/PI_4.jpg" alt="Meat" width="300">
                        </div>
                    </section>
                </div>
            </div>
            <div class="row" style="margin-bottom: 2vh;">
                <h2 style="color: #666;padding-bottom:4px;border-bottom-color: orange;margin-bottom: 3vh;"> Climbers & Creepers </h2>
                <div class="col-md-3">
                    <section id="container_1">
                        <div class="thumbnail" style="width:11.5vw;" data-title="Bacon" data-description="Bacon ipsum dolor amet filet mignon alcatra short ribs, sausage shoulder tail biltong rump chicken ground round ham hock porchetta tri-tip. Boudin bresaola andouille, leberkas pork ball tip turducken beef ribs">
                            <img src="http://192.168.0.12/DhartiMaaLive/PI_5.jpg" alt="Meat" width="300">
                        </div>
                    </section>
                </div>
                <div class="col-md-3">
                    <section id="container_1">
                        <div class="thumbnail" style="width:11.5vw;" data-title="Bacon" data-description="Bacon ipsum dolor amet filet mignon alcatra short ribs, sausage shoulder tail biltong rump chicken ground round ham hock porchetta tri-tip. Boudin bresaola andouille, leberkas pork ball tip turducken beef ribs">
                            <img src="http://192.168.0.12/DhartiMaaLive/PI_6.jpg" alt="Meat" width="300">
                        </div>
                    </section>
                </div>
            </div>
        </div> -->
        </div>
    </div>
</body>

</html>

<?php include 'footer.php' ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<script>
    function addToCart(id, item_name, rate, qty) {
        debugger;
        $.ajax({
            type: "POST",
            cache: false,
            url: "<?php echo base_url() ?>home/add",
            data: {
                id: id,
                item_name: item_name,
                rate: rate,
                qty: qty,
            },
            success: function(response) {
                debugger
                // swal("Item Added to your cart!");
                alert("Item Added to your cart!");
                $('#cartPop').html(JSON.parse(response));
            }
        })
    }

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

    function itemGetAll() {
        $("#tbodyProduct").empty();
        $.ajax({
            type: "POST",
            cache: false,
            url: "<?php echo base_url() ?>home/itemGetAll",
            success: function(response) {
                var tbody = $("#tbodyProduct");
                var html = "";
                if (response != 0) {
                    var jsonData = JSON.parse(response);
                    $.each(jsonData, function(index, object) {
                        html += '<div class = "row">';
                        html += '<h2 style = "color: #666;padding-bottom:4px;border-bottom-color: orange;margin-bottom: 3vh;" > ' + object.item_name + ' </h2>';
                        html += '<div class = "col-md-3">';
                        html += '<section id = "container_1"style = "width:10vw;">';
                        html += '<div class = "thumbnail" data - title = "' + object.image_name + '" data - description = " Plant height : 1.5 feet (+/- 20%)" >';
                        html += '<a href="<?php echo base_url() ?>home/description/' + object.id + '"><img src = "' + object.image + '" alt = "Meat" width = "275"></a>';
                        html += '<p><a class="btn_1 btn" href="javascript:void(0)" onclick="addToCart(\'' + object.id + '\',\'' + object.item_name + '\',\'' + object.rate + '\',1)">Add to Cart</a></p>';
                        html += '</div>';
                        html += '</section>';
                        html += '</div>';
                        html += '</div>';
                    });
                    $(tbody).append(html);
                };
            }
        })
    }
    $(document).ready(function() {
        itemGetAll();
        bindCart();
    })
    // $(document).ready(function() {
    //     itemGetAll();
    //     $('.chkClass').click(function() {
    //         $("#tbodyProduct").empty();
    //         var id = $(this).val();
    //         $.ajax({
    //             type: "POST",
    //             cache: false,
    //             url: "<?php echo base_url() ?>home/item",
    //             data: {
    //                 id: id
    //             },
    //             success: function(response) {
    //                 var tbody = $("#tbodyProduct");
    //                 var html = "";
    //                 if (response != 0) {
    //                     var jsonData = JSON.parse(response);
    //                     debugger
    //                     $.each(jsonData, function(index, object) {
    //                         debugger
    //                         html += '<div class = "row">';
    //                         html += '<h2 style = "color: #666;padding-bottom:4px;border-bottom-color: orange;margin-bottom: 3vh;" > ' + object.item_name + ' </h2>';
    //                         html += '<div class = "col-md-3">';
    //                         html += '<section id = "container_1"style = "width:10vw;">';
    //                         html += '<div class = "thumbnail" data - title = "' + object.image_name + '" data - description = " Plant height : 1.5 feet (+/- 20%)" >';
    //                         html += '<img src = "' + object.image + '" alt = "Meat" width = "300">';
    //                         html += '<p><a class="btn_1 btn" href="javascript:void(0)" onclick="addToCart(\'' + object.id + '\',\'' + object.item_name + '\',\'' + object.rate + '\',1)">Add to Cart</a></p>';
    //                         html += '</div>';
    //                         html += '</section>';
    //                         html += '</div>';
    //                         html += '</div>';
    //                     });
    //                     debugger;
    //                     $(tbody).append(html);

    //                 } else {
    //                     alert("No Product Found");
    //                 }
    //             }
    //         });
    //     });
    // });
    $(document).ready(function() {

        $('.add_cart').click(function() {
            var id = $(this).data("id");
            var item_name = $(this).data("item_name");
            var rate = $(this).data("rate");
            var qty = $('#' + id).val();
            if (qty != '' && qty > 0) {
                $.ajax({
                    url: "<?php echo base_url(); ?>home/add",
                    method: "POST",
                    data: {
                        id: product_id,
                        item_name: item_name,
                        rate: rate,
                        qty: qty
                    },
                    success: function(data) {
                        alert("Product Added into Cart");
                        $('#cart_details').html(data);
                        $('#' + product_id).val('');
                    }
                });
            } else {
                alert("Please Enter quantity");
            }
        });

        $('#cart_details').load("<?php echo base_url(); ?>home/load");

        $(document).on('click', '.remove_inventory', function() {
            var row_id = $(this).attr("id");
            if (confirm("Are you sure you want to remove this?")) {
                $.ajax({
                    url: "<?php echo base_url(); ?>home/remove",
                    method: "POST",
                    data: {
                        row_id: row_id
                    },
                    success: function(data) {
                        alert("Product removed from Cart");
                        $('#cart_details').html(data);
                    }
                });
            } else {
                return false;
            }
        });

        $(document).on('click', '#clear_cart', function() {
            if (confirm("Are you sure you want to clear cart?")) {
                $.ajax({
                    url: "<?php echo base_url(); ?>home/clear",
                    success: function(data) {
                        alert("Your cart has been clear...");
                        $('#cart_details').html(data);
                    }
                });
            } else {
                return false;
            }
        });

    });
    $(document).ready(function() {
        $('input[type="checkbox"]').click(function() {
            if ($(this).prop("checked") == true) {
                $("#tbodyProduct").empty();
                var id = $(this).val();
                debugger;
                $.ajax({
                    type: "POST",
                    cache: false,
                    url: "<?php echo base_url() ?>home/item",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        var tbody = $("#tbodyProduct");
                        var html = "";
                        if (response != 0) {
                            var jsonData = JSON.parse(response);
                            debugger
                            $.each(jsonData, function(index, object) {
                                debugger
                                html += '<div class = "row">';
                                html += '<h2 style = "color: #666;padding-bottom:4px;border-bottom-color: orange;margin-bottom: 3vh;" > ' + object.item_name + ' </h2>';
                                html += '<div class = "col-md-3">';
                                html += '<section id = "container_1"style = "width:10vw;">';
                                html += '<div class = "thumbnail" data - title = "' + object.image_name + '" data - description = " Plant height : 1.5 feet (+/- 20%)" >';
                                html += '<img src = "' + object.image + '" alt = "Meat" width = "300">';
                                html += '<p><a class="btn_1 btn" href="javascript:void(0)" onclick="addToCart(\'' + object.id + '\',\'' + object.item_name + '\',\'' + object.rate + '\',1)">Add to Cart</a></p>';
                                html += '</div>';
                                html += '</section>';
                                html += '</div>';
                                html += '</div>';
                            });
                            debugger;
                            $(tbody).append(html);

                        } else {
                            alert("No Product Found");
                        }
                    }
                });
            } else if ($(this).prop("checked") == false) {
                itemGetAll();
            }
        });
    });

</script>