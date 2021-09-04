<?php
if(isset($_POST['submit'])){

    require_once 'smtp/PHPMailerAutoload.php';
    $mail=new PHPMailer;
	$mail->isSMTP();
	$mail->Host="smtp.gmail.com";
	$mail->Port=587;
	$mail->SMTPSecure="tls";
	// $mail->SMTPDebug = 3;
	$mail->SMTPAuth=true;
	$mail->Username="rabbit.designerss@gmail.com";
	$mail->Password="r!abbit33221";
    $mail->SetFrom($_POST['email'],$_POST['first-name']);
	$mail->addAddress('rabbit.designerss@gmail.com');
	$mail->IsHTML(true);
	$mail->Charset = 'UTF-8';
	$mail->Subject="From Rabbitdesigners.com";
	$mail->Body="<table><tr><td>First Name</td><td>".$_POST['first-name']."</td></tr><tr><td>Last Name</td><td>".$_POST['last-name']."</td></tr><tr><td>Phone Number</td><td>".$_POST['phone-number']."</td></tr><tr><td>Email</td><td>".$_POST['email']."</td></tr><tr><td>Company Name</td><td>".$_POST['company-name']."</td></tr><tr><td>Service</td><td>".$_POST['service-you-want']."</td></tr></table>";
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
    ));
    if($mail->send()){
		header("Location: checkout.php");
	}else{
		echo "Error occur";
	}
};
?>

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

<body>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="w-100 text-center" id="exampleModalLabel">Please fill the form</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- bill and order section -->
                    <section class="billl">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form ">
                                    <!-- form area -->
                                    <form method="post">
                                        <div class="form-group">
                                            <label for="validationTextarea">What type of service you want?</label>
                                            <textarea class="form-control" id="validationTextarea" placeholder="Please describe shortly, What type of service you want?" name="service-you-want" required></textarea>
                                            <small id="lastname" class="form-text text-muted"></small>
                                        </div>

                                        <div class="form-group">
                                            <label for="firstName">First Name</label>
                                            <input type="text" name="first-name" class="form-control" id="firstName" aria-describedby="firstname">
                                            <small id="firstname" class="form-text text-muted"></small>
                                        </div>

                                        <div class="form-group">
                                            <label for="lastName">Last Name</label>
                                            <input type="text" name="last-name" class="form-control" id="lastName" aria-describedby="lastname">
                                            <small id="lastname" class="form-text text-muted"></small>
                                        </div>


                                        <div class="form-group">
                                            <label for="companyName">Company Name (optional)</label>
                                            <input type="text" name="company-name" class="form-control" id="companyName" aria-describedby="companyname">
                                            <small id="companyname" class="form-text text-muted"></small>
                                        </div>


                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" name="phone-number" class="form-control" id="phone" aria-describedby="phone">
                                            <small id="phone" class="form-text text-muted"></small>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            <small id="emailHelp" class="form-text text-muted"></small>
                                        </div>
                                        <div class="form-check py-4">
                                            <input class="form-check-input" type="checkbox" value="" id="terms">
                                            <label class="form-check-label" for="terms">
                                                I have read and agree to the website <a href="terms-and-condition.php">Terms and Conditions</a>
                                            </label>
                                        </div>
                                        <!-- <a href="checkout.php" class="btn btn-warning custom-btn w-100">Next</a> -->
                                        <button name="submit" type="submit" class="btn btn-warning custom-btn w-100">Next</button>
                                    </form>
                                    <!-- form area -->
                                </div>
                            </div>
                        </div>
                </div>
                </section>
                <!-- bill and order section -->

            </div>
        </div>
    </div>
    </div>







    <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="js/jquery-3.6.0.js" type="text/javascript"></script>
    <script src="js/slick.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery.waypoints.min.js"></script>
    <script type="text/javascript" src="js/jquery.counterup.min.js"></script>
    <script src="js/custom.js" type="text/javascript"></script>
</body>

</html>