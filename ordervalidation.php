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
                echo "$name Your order is Placed";
                
                 
            
?>