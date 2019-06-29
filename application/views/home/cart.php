<?php include 'header.php' ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <title> Cart </title>
    <style>
        h2 {
            border-bottom: 2.2px solid orange;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
        }

        td:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>

    <!--<div class="container" style="margin-bottom: 4vh;">
        <h2>Shopping Cart</h2>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Products</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Unit Price</th>
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    
                </tr>
                <tr>
                    <td colspan="6" style="text-align: right;">Total</td>
                    <td colspan="2"></td>
                </tr>

            </tbody>
        </table>
        <a href="#" class="btn btn-warning" style="border-radius:0px;">Continue Shopping</a>
        <a href="#" class="btn btn-warning" style="border-radius:0px;float: right;background-color: orange;">Proceed to Checkout</a>
    </div>-->
    <div class="container">
        <h1>Shopping Cart</h1>

        <div class="shopping-cart">

            <table style="width:100%;border-color:#ddd;" border="1px solid" class="table">

                <tr>
                    <th style="width:20%;text-align:center;">Quantity</th>
                    <th style="text-align:center;width:20%;">Product Name</th>
                    <th style="text-align:center;width:20%;">Product Price</th>
                    <th style="text-align:center;width:20%;">Sub-Total</th>
                    <th style="text-align:center;width:20%;">Action</th>
                </tr>

                <?php $i = 1; ?>

                <?php foreach ($this->cart->contents() as $items) : ?>

                    <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>

                    <tr>
                        <td>
                            <!-- <button type="button" id="minus" onclick="update('<?php echo $i; ?>','<?php echo $items['rowid'] ?>')" class="btn placeholder-button button_red">-</button>
                                                                                                    <input type="text" style="width:1.5vw;" value="<?php echo $items['qty']; ?>" id="qty_<?php echo $i; ?>">
                                                                                                    <button type="button" id="plus" onclick="update('<?php echo $i; ?>','<?php echo $items['rowid'] ?>')" class="btn placeholder-button button_red">+</button> -->
                            <div class="input-group" style="width:8vw;margin-left:1.5vw;">
                                <span class="input-group-btn">
                                    <button type="button" id="minus" class="quantity-left-minus btn btn-danger btn-number" onclick="update('<?php echo $i; ?>','<?php echo $items['rowid'] ?>','minus')" data-type="minus" data-field="">
                                        <span class="glyphicon glyphicon-minus"></span>
                                    </button>
                                </span>
                                <input type="text" name="quantity" class="form-control input-number" style="text-align:center;" value="<?php echo $items['qty']; ?>" id="qty_<?php echo $i; ?>" min="1" max="100">
                                <span class="input-group-btn">
                                    <button type="button" id="plus" onclick="update('<?php echo $i; ?>','<?php echo $items['rowid'] ?>','plus')" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </button>
                                </span>
                            </div>
                        </td>
                        <!-- <td><?php echo form_input(array('name' => $i . '[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '1')); ?><button type="button" id="plus" onclick="update('<?php echo $items['id'] ?>','<?php echo $items['rowid'] ?>')" class="btn placeholder-button button_red">+</button></td> -->
                        <td style="text-align:center;">
                            <?php echo $items['name']; ?>
                        </td>

                        <td style="text-align:center;">₹<?php echo $this->cart->format_number($items['price']); ?></td>
                        <td style="text-align:center;">₹<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                        <td style="text-align:center;"><button type="button" onclick="remove('<?php echo $items['rowid'] ?>')" style="background-color:orange;" class="btn placeholder-button button_red"><span class="glyphicon glyphicon-trash" style="color:white;"></span></button></td>
                    </tr>

                    <?php $i++; ?>

                <?php endforeach; ?>

                <tr>
                    <td colspan="3"> </td>
                    <td class="right"><strong>Total</strong></td>
                    <td class="right">₹<?php echo $this->cart->format_number($this->cart->total()); ?></td>
                </tr>

            </table>

            <a href="<?php echo base_url() ?>home/product" class="btn btn-warning" style="border-radius:0px;margin-bottom:2vh;">Continue Shopping</a>
            <a href="<?php echo base_url() ?>home/checkout" class="btn btn-warning checkout" style="border-radius:0px;margin-bottom:2vh;;float: right;background-color: orange;">Proceed to Checkout</a>

        </div>
    </div>

</body>

</html>
<?php include 'footer.php' ?>
<script>
    function update(i, rowid, status) {
        var qty = $("#qty_" + i).val();
        if (status == 'plus') {
            qty++;
        } else {
            qty--;
        }
        if (qty == 0) {
            remove(rowid);
        } else {
            $.ajax({
                type: "POST",
                cache: false,
                url: "<?php echo base_url() ?>home/update",
                data: {
                    rowid: rowid,
                    qty: qty
                },
                success: function(response) {
                    location.reload();
                }
            })
        }
    }

    function remove(rowid) {
        debugger;
        $.ajax({
            type: "POST",
            cache: false,
            url: "<?php echo base_url() ?>home/remove",
            data: {
                rowid: rowid
            },
            success: function(response) {
                debugger;
                location.reload();
            }
        })
    }
</script>