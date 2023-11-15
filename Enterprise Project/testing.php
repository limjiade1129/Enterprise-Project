<?php
require 'config.php';
$userid = $_SESSION['userid'];

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Payment System</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<style>
		.zoom:hover
		{
  -ms-transform: scale(1.2);
  -webkit-transform: scale(1.2); 
  transform: scale(1.2); 
		}
		body{
			background-color: #1d1c21;
		}
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Montserrat', sans-serif
}

body {

    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color:aliceblue;
    padding: 30px 10px
}
.card {
    max-width: 500px;
    margin: auto;
    color: black;
    border-radius: 20 px
}
p {
    margin: 0px
}
.container .h8 {
    font-size: 30px;
    font-weight: bold;
    text-align: center
}

.btn.btn-primary {
    width: 100%;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 15px;

}


.text {
    font-size: 14px;
    font-weight: 600
}


		
	</style>
</head>

<body>
	<div class="container p-0">
		<form class="contact-form row" method="post" action="">
			
			<div class="card px-4">
				<p class="h8 py-3">Payment Details</p>
				<div class="row gx-3">
					<div class="col-12">
						<div class="d-flex flex-column">
							<p class="text mb-1">Person Name</p><input name = "card_holder" class="form-control mb-3" type="text" placeholder="Card Holder Name" required>
						</div>
					</div>
					<div class="col-12">
						<div class="d-flex flex-column">
							<p class="text mb-1">Card Number</p> <input name = "card_number" class="form-control mb-3" type="text" placeholder="1234 5678 435678" required>
						</div>
					</div>
					<div class="col-6">
						<div class="d-flex flex-column">
							<p class="text mb-1">Expiry</p> <input name = "expiry" class="form-control mb-3" type="text" placeholder="MM/YYYY" required>
						</div>
					</div>
					<div class="col-6">
						<div class="d-flex flex-column">
							<p class="text mb-1">CVV/CVC</p> <input name = "cvv_cvc" class="form-control mb-3 pt-2 " type="password" placeholder="***" required>
						</div>
					</div>

					<div class="order-summary">
    				<p class="h8 py-3">Order Summary</p>

    				<table class="table">
        			<thead>
            		<tr>
						<th scope="col">Class Name</th>
						<th scope="col">Quantity</th>
						<th scope="col">Price</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$grandTotal= 0;
					$order_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE userid='$userid'");
					while ($order_item = mysqli_fetch_assoc($order_query)) {
						$grandTotal += $order_item['price'] * $order_item['quantity'];
						?>
						<tr>
							<td><?php echo $order_item['name']; ?></td>
							<td><?php echo $order_item['quantity']; ?></td>
							<td><?php echo 'RM ' . number_format($order_item['price'] * $order_item['quantity']); ?></td>
						</tr>
					<?php
					}
					?>
				</tbody>
			</table>
			<hr>
</div>
            <div class="col-12 ">
                <button type="submit" class="btn btn-primary mb-3 text-center justify-content-center">
					<span>Grand Total - RM <?php echo number_format($grandTotal, 2); ?></span>
                    <span class="fas fa-arrow-right"></span>
                </button>
				<a href="cart.php" class="btn btn-primary text-center justify-content-center">
        			<span>Close</span>
        			<span class="fas fa-times"></span>
   				 </a>
            </div>
			

        </form>
    </div>
</body>
</html>
