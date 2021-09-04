<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/all.css" rel="stylesheet" type="text/css" />
    <!-- slick css for carousel -->
    <link href="css/slick-theme.css" rel="stylesheet" type="text/css" />
    <link href="css/slick.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap manual CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/responsive.css" rel="stylesheet" type="text/css" />
    <title>Rabbit Designers</title>


</head>

<body style="background-color:#eaeaea;">
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <!-- checkout page start -->
                <div id="smart-button-container">
                    <div style="text-align: center" class="input-group mb-3">
                    <label for="description" class="form-label">Description </label>
                    <input type="text" name="descriptionInput" id="description" maxlength="127" value="" class="form-control">
                </div>
                    <p id="descriptionError" style="visibility: hidden; color:red; text-align: center;">Please enter a description</p>

                <div style="text-align: center;" class="input-group mb-3">
                    <label for="amount" class="form-label">Amount </label>
                    <input name="amountInput" type="number" id="amount" value="" class="form-control" aria-describedby="basic-addon2">
                    <span id="basic-addon2" class="input-group-text"> USD</span>
                </div>
                    <p id="priceLabelError" style="visibility: hidden; color:red; text-align: center;">Please enter a price</p>
                    
                    <div id="invoiceidDiv" style="text-align: center; display: none;"><label for="invoiceid"> </label><input name="invoiceid" maxlength="127" type="text" id="invoiceid" value=""></div>
                    <p id="invoiceidError" style="visibility: hidden; color:red; text-align: center;">Please enter an Invoice ID</p>
                    <div style="text-align: center; margin-top: 0.625rem;" id="paypal-button-container"></div>
                </div>
                <script src="https://www.paypal.com/sdk/js?client-id=ARt4Vg4W_Euz9H8shYxOpgrILnVsbL_JQHg8fiosBIWgwtQ4BvyaaVv8ivvdQSpvfIe1MsUjqV-p3yZR&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
                <script>
                    function initPayPalButton() {
                        var description = document.querySelector('#smart-button-container #description');
                        var amount = document.querySelector('#smart-button-container #amount');
                        var descriptionError = document.querySelector('#smart-button-container #descriptionError');
                        var priceError = document.querySelector('#smart-button-container #priceLabelError');
                        var invoiceid = document.querySelector('#smart-button-container #invoiceid');
                        var invoiceidError = document.querySelector('#smart-button-container #invoiceidError');
                        var invoiceidDiv = document.querySelector('#smart-button-container #invoiceidDiv');

                        var elArr = [description, amount];

                        if (invoiceidDiv.firstChild.innerHTML.length > 1) {
                            invoiceidDiv.style.display = "block";
                        }

                        var purchase_units = [];
                        purchase_units[0] = {};
                        purchase_units[0].amount = {};

                        function validate(event) {
                            return event.value.length > 0;
                        }

                        paypal.Buttons({
                            style: {
                                color: 'gold',
                                shape: 'pill',
                                label: 'paypal',
                                layout: 'vertical',

                            },

                            onInit: function(data, actions) {
                                actions.disable();

                                if (invoiceidDiv.style.display === "block") {
                                    elArr.push(invoiceid);
                                }

                                elArr.forEach(function(item) {
                                    item.addEventListener('keyup', function(event) {
                                        var result = elArr.every(validate);
                                        if (result) {
                                            actions.enable();
                                        } else {
                                            actions.disable();
                                        }
                                    });
                                });
                            },

                            onClick: function() {
                                if (description.value.length < 1) {
                                    descriptionError.style.visibility = "visible";
                                } else {
                                    descriptionError.style.visibility = "hidden";
                                }

                                if (amount.value.length < 1) {
                                    priceError.style.visibility = "visible";
                                } else {
                                    priceError.style.visibility = "hidden";
                                }

                                if (invoiceid.value.length < 1 && invoiceidDiv.style.display === "block") {
                                    invoiceidError.style.visibility = "visible";
                                } else {
                                    invoiceidError.style.visibility = "hidden";
                                }

                                purchase_units[0].description = description.value;
                                purchase_units[0].amount.value = amount.value;

                                if (invoiceid.value !== '') {
                                    purchase_units[0].invoice_id = invoiceid.value;
                                }
                            },

                            createOrder: function(data, actions) {
                                return actions.order.create({
                                    purchase_units: purchase_units,
                                });
                            },

                            onApprove: function(data, actions) {
                                return actions.order.capture().then(function(details) {
                                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
                                });
                            },
                            onError: function(err) {
                                console.log(err);
                            }
                        }).render('#paypal-button-container');
                    }
                    initPayPalButton();
                </script>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <h5 class="text-success text-center">Go Back to <a href="index.php">Homepage</a></h5>
            </div>
        </div>
    </div>

    <!-- checkout page end -->

    <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="js/jquery-3.6.0.js" type="text/javascript"></script>
    <script src="js/slick.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery.waypoints.min.js"></script>
    <script type="text/javascript" src="js/jquery.counterup.min.js"></script>
    <script src="js/custom.js" type="text/javascript"></script>
</body>

</html>