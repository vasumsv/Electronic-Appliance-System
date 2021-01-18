
<html>
    <head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Order Conformation</title>
    <head>
    <body>
    <?php 
            session_start();
            // header('location:home.php');

            $con = mysqli_connect('localhost','root','');

            mysqli_select_db($con,'electronics');
            $proname = $_POST['proname'];
            // $pass = md5($_POST['password']);
            $price = $_POST['price'];
            $name = $_POST['name'];
            $address = $_POST['address'];
            $pincode = $_POST['pincode'];
            $number = $_POST['number'];

                $reg = "INSERT INTO orders(product_name, price, name, address, pincode, phone) values ('$proname','$price','$name','$address','$pincode','$number')";
                mysqli_query($con,$reg);
                echo '<center><div class="popup">
                <h2></h2>
                <a class="close" href="#">×</a>
                <div class="content">
                <h3 style="color:red;">'.$name.'</h3><h3 style="color:green;"> Your Order has been placed.<i class="fa fa-check-circle" style="font-size:48px;color:green"></i></h3>
                 
                </div>
                </div>';
    
?>
 
    </body>
</html>