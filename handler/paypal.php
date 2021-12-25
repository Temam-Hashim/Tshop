
<?php
    session_start();
    require_once "../includes/head.php";
 ?>
 <!DOCTYPE html>
 <html lang="">
     <head>
         <meta charset="utf-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <title>Title Page</title>

         <!-- Bootstrap CSS -->
         <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
     </head>

<style>
        #paypal-button-container{
        margin:20px;
        padding:12px;
        border-radius:12px;
        text-align:center;

    }

</style>

<body>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



    <!-- Set up a container element for the button -->
    <div class="row">
        <div class="col-md-3"></div>

        <div id="paypal-button-container" class="col-md-6 text-center">
        <div class="alert alert-info"><span><h4 class="text-primary">payable amount</h4><input readonly type="text" class="btn btn-md btn-block" value="$<?php echo $_SESSION['total']; ?>"></span></div>
        </div>

        <div class="col-md-3"></div>

    </div>


    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=AfB9yEBD5MEZeziaQO5biMofhHTyuAq2X6GyzDQIaXtDH71kz5l39vxZhLPArOhvpGWMNJvqgJJYJ1NH&currency=USD"></script>

    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?php echo $_SESSION['total']; ?>'
                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
                });
            }


        }).render('#paypal-button-container');
    </script>

    
</body>

</html>
