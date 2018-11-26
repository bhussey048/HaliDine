<?php include('includes/header.php'); ?>



<?php

$sql = "SELECT * FROM Menu";

$result = mysqli_query($conn, $sql);

$Location = $_GET['RestID'];

$Tax;

switch ($Location) {
  case 1000:
    $Tax = 1.15;
    break;
  case 2000:
    $Tax = 1.15;
    break;
  case 3000:
    $Tax = 1.15;
    break;
  case 4000:
    $Tax = 1.13;
    break;
  case 5000:
    $Tax = 1.14975;
    break;
}

echo "<h3>MENU</h3>";
echo "<br />";

while($row = mysqli_fetch_array($result))
  {

  $MenuID = $row['Menu_id'];
  $MenuName = $row['Menu_name'];
  $MenuDiet = $row['Menu_diet'];
  $MenuPrice = $row['Menu_price'];

  echo $MenuName . " " . $MenuDiet . " " . $MenuPrice . " " . "<form action=includes/addToOrder.php?Menu_id=$MenuID&RestID=$Location method=post>Quantity: <input type=number min=0 name=quantity>  <button class=btn btn-lg btn-primary btn-block type=submit name=addToOrder>Add to Order</button></form>";
  echo "<br />";
  }

  //mysqli_close($conn);

 ?>

<?php

if ($_SESSION['username'] == 'attender') {

echo "
  <p class=lead>
    <a href=menu.php class=btn btn-lg btn-secondary>Employee Number</a>
    <div class=btn-group>
      <button type=button class=btn btn-secondary dropdown-toggle data-toggle=dropdown aria-haspopup=true aria-expanded=false>
        Select Location
      </button>

      <div class=dropdown-menu>";

          $sql = "SELECT Employee_id FROM Employment WHERE Rest_id = $Location";

          $result = mysqli_query($conn, $sql);

          while($row = mysqli_fetch_array($result)) {

            $EmpID = $row['Employee_id'];

            echo  "<a class=dropdown-item name=location method=post >$EmpID</a>";
            echo  "<div class=dropdown-divider></div>";

          }
echo "
      </div>
    </div>
  </p>
  <br />";

  echo "
    <p class=lead>
      <a href=menu.php class=btn btn-lg btn-secondary>Table Number</a>
      <div class=btn-group>
        <button type=button class=btn btn-secondary dropdown-toggle data-toggle=dropdown aria-haspopup=true aria-expanded=false>
          Select Location
        </button>

        <div class=dropdown-menu>";

            $sql = "SELECT Table_id FROM RTable WHERE Rest_id = $Location";

            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_array($result)) {

              $TableNum = $row['Table_id'];

              echo  "<a class=dropdown-item name=location method=post>$TableNum</a>";
              echo  "<div class=dropdown-divider></div>";

            }
  echo "
        </div>
      </div>
    </p>";
}

 ?>

 <?php

 echo "<h3>My Order</h3>";
 echo "<br />";

 //need this following query to be able to delete items from menu
 $result = mysqli_query($conn, "SELECT * FROM Menu join Sale_Item on Menu.Menu_id = Sale_Item.Menu_id");
 //$result = mysqli_query($conn, "SELECT * from Menu inner join Sale_Item on Menu.Menu_id = Sale_Item.Menu_id inner join Sale on Sale_Item.Sale_id = Sale.Sale_id WHERE Sale_Item.Sale_id = (SELECT Sale_id FROM Sale ORDER BY Sale_id DESC LIMIT 1)");

 while($row = mysqli_fetch_array($result))

   {

   $MenuID = $row['Menu_id'];
   $MenuName = $row['Menu_name'];
   $MenuDiet = $row['Menu_diet'];
   $MenuPrice = $row['Menu_price'];
   $Sale_Item_ID = $row['Sale_id'];
   $Quantity = $row['Quantity'];


   echo $MenuName . " " . $MenuDiet . " " . $Quantity . " " . $MenuPrice . " " . "<form action=includes/updateOrder.php?Menu_id=$MenuID&Sale_item=$Sale_Item_ID&RestID=$Location method=post> Quantity: <input type=number min=0 name=quantity value=$Quantity> <button class=btn btn-lg btn-primary btn-block type=submit name=updateOrder>Update</button>
   <button class=btn btn-lg btn-primary btn-block type=submit name=deleteFromOrder>Delete</button></form>";
   $subtotal += $MenuPrice*$Quantity;
   echo "<br />";

   }

   mysqli_close($conn);

   echo "Subtotal: " . $subtotal * 1;
   echo "<br />";
   $total = $subtotal * $Tax;
   echo "Tax: " . ($total-$subtotal);
   echo "<br />";
   echo "Total: " . $total;

   if($_SESSION['username'] == 'attender')  {

     echo "<form action=includes/checkout.php?RestID=$Location&EmpID=$EmpID&TableNum=$TableNum&Total=$total method=post><button class=btn btn-lg btn-primary btn-block type=submit name=checkout>Checkout</button></form>";

   } else {

     echo "<form action=includes/checkout.php?RestID=$Location&Total=$total method=post><button class=btn btn-lg btn-primary btn-block type=submit name=checkout>Checkout</button></form>";

   }
  ?>

<?php include('includes/footer.php'); ?>
