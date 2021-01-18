<?php 
            session_start();
            header('location:login.php');

            $con = mysqli_connect('localhost','root','');

            mysqli_select_db($con,'electronics');
            $name = $_POST['user'];
            // $pass = md5($_POST['password']);
            $pass = $_POST['password'];

            $s = "select * from usertable where name = '$name'";

            $result = mysqli_query($con,$s);

            $num = mysqli_num_rows($result);

            if($num == 1)
            {
                echo"username Already Taken";
            }
            else{
                $reg = "INSERT INTO usertable(name, password) values ('$name','$pass')";
                mysqli_query($con,$reg);
                echo "$name your registeration is sucessful";
            }
?>