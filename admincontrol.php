 
<html>
        <head>
            <title>Admin Control</title>
        </head>
    <body>

  <center>  <h1 style="color:red;">Order Details</h1>
    <?php   
 session_start();  
 $connect = mysqli_connect("localhost", "root", "", "electronics");
        $query = "SELECT * FROM orders";
        $products = mysqli_query($connect, $query);
        echo '<table id="customers"> <thead> <tr class="w3-green"><th>ID</th> <th>Product Name</th> <th>Price</th><th>Name</th><th>Address</th><th>Pincode</th><th>phone</th></tr></thead>';
        if ($products->num_rows > 0) {
            // output data of each row
            while($row = $products->fetch_assoc()) {
                $id = $row['id'];
                $product_name = $row['product_name'];
                $price = $row['price'];
                $name = $row['name'];
                $address = $row['address'];
                $pincode = $row['pincode'];
                $phone = $row['phone'];

                echo '<tr> <td>'. $row["id"]. '</td>  <td>'. $row["product_name"]. '</td><td>'. $row["price"]. '</td> <td>'. $row["name"]. '</td> <td>'. $row["address"]. '</td>   <td>'. $row["pincode"]. '</td> <td>'. $row["phone"]. '</td> </tr>';
            }
        } else {
            echo "";
        }
        echo'</table>';

         
   
?>

<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>

    </body>


</html>