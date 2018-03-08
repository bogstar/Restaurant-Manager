<!DOCTYPE html>
<html lang="en">
<head>

<title>MODERATOR PANEL</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="styles/index.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<?php
  //Gets user name for welcome screen
  $moderatorId=$_GET['id'];
  require_once 'controller/dbcon.php';
  $myDBCON = new DBCON("127.0.0.1","restoran","root","");
  $myDBCON->connect();
  $result=$myDBCON->selectDB("SELECT username FROM User WHERE idUser='".$moderatorId."'");
  $username=$result[0]['username'];
  $reservations=$myDBCON->selectDB("SELECT idCustomer,idFoodTable, personCount, reservationTime, reservationDate, surname, mobileNumber 
    FROM Reservation NATURAL JOIN Customer ORDER BY reservationDate DESC;");

  $items=$myDBCON->selectDB("SELECT idItem, ItemType.name AS type, Item.name AS name, itemDescription, price 
    FROM Item JOIN ItemType ON Item.idItemType=ItemType.idItemType;");

  $deliveryboys=$myDBCON->selectDB("SELECT idDeliveryBoy, Block.name AS block, DeliveryBoy.name AS name 
    FROM DeliveryBoy JOIN Block ON DeliveryBoy.idBlock=Block.idBlock");

  $tables=$myDBCON->selectDB("SELECT idFoodTable, capacity, positionName 
    FROM FoodTable NATURAL JOIN Position WHERE idFoodTable NOT IN (SELECT idFoodTable FROM Reservation);");

  $whoOrderedToday=$myDBCON->selectDB("SELECT DISTINCT idCustomer,orderDate 
    FROM FoodOrder WHERE orderDate IN (SELECT DISTINCT orderDate FROM FoodOrder WHERE orderDate>CURDATE()) ORDER BY orderDate DESC;");
?>

</head>
<body>

<!-- Navigation bar -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php" style="cursor:default;">MODERATOR PANEL</a>
    </div>   
      <!-- Welcome message -->
      <ul class="nav navbar-nav navbar-right">
        <li><a style="cursor:default; font-size:15px;"><span class="glyphicon glyphicon-user"> <?echo $username;?></span>
        </a></li>
      </ul>
  </div>
</nav>

<div class="container-fluid text-center">  
    <!-- Trigger the modalReservation with a button -->
    <button type="button" class="btn-xlarge btn-warning btn-lg" data-toggle="modal" data-target="#myModalReservation">RESERVATIONS</button>
  <hr>
  <div class="btn-group-vertical" role="group">
    <!-- Trigger the modalDeleteFood with a button -->
    <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModalDeleteFood">DELETE ITEM</button>
    <!-- Trigger the modalAddFood with a button -->
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalAddFood">ADD ITEM</button>
  </div>
  <div class="btn-group-vertical" role="group">
    <!-- Trigger the modalDeleteDeliveryBoy with a button -->
    <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModalDeleteDeliveryBoy">DELETE DELIVERYBOY</button>
    <!-- Trigger the modalAddDeliveryBoy with a button -->
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalAddDeliveryBoy">ADD DELIVERYBOY</button>
  </div>
  <div class="btn-group-vertical" role="group">
    <!-- Trigger the modalDeleteTable with a button -->
    <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModalDeleteTable">DELETE TABLE</button>
    <!-- Trigger the modalAddTable with a button -->
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalAddTable">ADD TABLE</button>
  </div>
  <hr>
    <!-- Trigger the modalTodayOrders with a button -->
    <button type="button" class="btn-xlarge btn-success btn-lg" data-toggle="modal" data-target="#myModalTodayOrders">TODAY ORDERS</button>
</div>

<!-- Modal Today Orders -->
<div id="myModalTodayOrders" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">DORSIA Order</h4>
      </div>
      <div class="modal-body">
        <table class="table borderless">
          <thead>
          <h2>Today We Had <?echo sizeof($whoOrderedToday);?> Orders</h2>
          <th>customerName</th>
          <th>deliveryAddress</th>
          <th>orderItems</th>
        </thead>
        <tbody>
        <?php
          for ($i=0; $i <sizeof($whoOrderedToday) ; $i++) 
          { 

            $idCustomer=$whoOrderedToday[$i]["idCustomer"];
            $date=$whoOrderedToday[$i]["orderDate"];

            $orderItems=$myDBCON->selectDB("SELECT name from Item 
              where idItem IN(select idItem from FoodOrder where orderDate='".$date."');");    

            $orderTotal=$myDBCON->selectDB("SELECT sum(price) as total from Item 
              where idItem IN (select idItem from FoodOrder where orderDate='".$date."')"); 

            $customerDetails=$myDBCON->selectDB("SELECT name,address,mobileNumber FROM Customer 
              WHERE idCustomer=".$idCustomer."");           

            echo "
            <tr>
              <td>".$customerDetails[0]['name']."</td>
              <td>".$customerDetails[0]['address']."</td>
              <td>
            ";         
            print_r($orderItems[0]['name']);
            echo "</td></tr>";
            for ($k=1; $k < sizeof($orderItems) ; $k++) 
            { 
              echo "<tr><td></td>";
              echo "<td></td>";
              echo "<td>".$orderItems[$k]['name']."</td></tr>";
            }
            echo "<tr><td></td><td></td><td><hr style='
            border: 0;
            height: 0;
            box-shadow: 0 0 1px 1px black;
            '></td></tr>";
            echo "<tr><td></td><td><h3><b>TOTAL:</b></h3></td><td><h3>".$orderTotal[0]['total']."€</h3></td></tr>";        
          }
        ?>
        </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Add Table -->
<div id="myModalAddTable" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Table</h4>
      </div>
      <div class="modal-body">
        <form role="form" action="moderator/add_table.php" method="post">
          <div class="form-group">
            <label>Capacity:</label>
            <input type="number" style="width:100%;" name="tableCapacity" min="2" max="6" required>
          </div>
          <div class="form-group">
            <label>Position:</label></br>
            <label class="radio-inline"><input type="radio" name="tablePosition" value="1" required>Indoor</label>
            <label class="radio-inline"><input type="radio" name="tablePosition" value="2" required>Outdoor</label>
          </div>
          <hr>
          <input type="hidden" name="moderatorid" value="<?echo $moderatorId;?>">
          <button type="submit" class="btn-lg btn-success">Add Table</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Add Delivery Boy -->
<div id="myModalAddDeliveryBoy" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add DeliveryBoy</h4>
      </div>
      <div class="modal-body">
        <form role="form" action="moderator/add_deliveryboy.php" method="post">
          <div class="form-group">
            <label>Name:</label>
            <input type="text" class="form-control" name="deliveryboyName" required>
          </div>
          <div class="form-group">
            <label>Delivery area:</label></br>
            <label class="radio-inline"><input type="radio" name="idBlock" value="1" required>South</label>
            <label class="radio-inline"><input type="radio" name="idBlock" value="2" required>East</label>
            <label class="radio-inline"><input type="radio" name="idBlock" value="3" required>West</label>
            <label class="radio-inline"><input type="radio" name="idBlock" value="4" required>North</label>
          </div>
          <hr>
          <input type="hidden" name="moderatorid" value="<?echo $moderatorId;?>">
          <button type="submit" class="btn-lg btn-success">Add DeliveryBoy</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Add Food -->
<div id="myModalAddFood" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Item</h4>
      </div>
      <div class="modal-body">
        <form role="form" action="moderator/add_item.php" method="post">
          <div class="form-group">
            <label>Name:</label>
            <input type="text" class="form-control" name="itemName" required>
          </div>
          <div class="form-group">
            <label>Brief description:</label>
            <input type="text" class="form-control" name="itemDescription" required>
          </div>
          <div class="form-group">
            <label>Price:</label>
            <input type="number" style="width:100%;" name="itemPrice" min="1" max="99" required>
          </div>
          <div class="form-group">
            <label>Type:</label></br>
            <label class="radio-inline"><input type="radio" name="itemType" value="1" required>Pizza</label>
            <label class="radio-inline"><input type="radio" name="itemType" value="2" required>Pasta</label>
            <label class="radio-inline"><input type="radio" name="itemType" value="3" required>Meat</label>
            <label class="radio-inline"><input type="radio" name="itemType" value="4" required>Dessert</label>
            <label class="radio-inline"><input type="radio" name="itemType" value="5" required>Drink</label>
          </div>
          <hr>
          <input type="hidden" name="moderatorid" value="<?echo $moderatorId;?>">
          <button type="submit" class="btn-lg btn-success">Add Item</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Table Delete -->
<div id="myModalDeleteTable" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Table</h4>
      </div>
      <div class="modal-body">
        <form role="form" method="post" action="moderator/delete_table.php">
          <div class="col-lg-12">    
              <table class="table">
              <h2>Tables</h2>
              <thead>
                <tr>
                  <th>Select</th>
                  <th>tableId</th>
                  <th>tableCapacity</th>
                  <th>tablePosition</th>
                </tr>
              </thead>
              <tbody>                
                <?php
                for ($i=0; $i < sizeof($tables) ; $i++) 
                { 
                    
                    echo "<tr>";
                    echo '<td><input type="checkbox" name="table'.$i.'" value="'.$tables[$i]['idFoodTable'].'"/></td>';
                    echo "<td>".$tables[$i]['idFoodTable']."</td>";
                    echo "<td>".$tables[$i]['capacity']."</td>";
                    echo "<td>".$tables[$i]['positionName']."</td>";
                    echo "</tr>";
                    
                }
                ?>
              </tbody>
              </table>
          </div>
          <input type="hidden" name="moderatorid" value="<?echo $moderatorId;?>">
          <button type="submit" class="btn btn-danger btn-lg btn-block">Delete</button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal DeliveryBoy Delete -->
<div id="myModalDeleteDeliveryBoy" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete DeliveryBoy</h4>
      </div>
      <div class="modal-body">
        <form role="form" method="post" action="moderator/delete_deliveryboy.php">
          <div class="col-lg-12">    
              <table class="table">
              <h2>DeliveryBoys</h2>
              <thead>
                <tr>
                  <th>Select</th>
                  <th>deliveryboyBlock</th>
                  <th>deliveryboyName</th>
                </tr>
              </thead>
              <tbody>                
                <?php
                for ($i=0; $i < sizeof($deliveryboys) ; $i++) 
                { 
                    
                    echo "<tr>";
                    echo '<td><input type="checkbox" name="deliveryboy'.$i.'" value="'.$deliveryboys[$i]['idDeliveryBoy'].'"/></td>';
                    echo "<td>".$deliveryboys[$i]['block']."</td>";
                    echo "<td>".$deliveryboys[$i]['name']."</td>";
                    echo "</tr>";
                    
                }
                ?>
              </tbody>
              </table>
          </div>
          <input type="hidden" name="moderatorid" value="<?echo $moderatorId;?>">
          <button type="submit" class="btn btn-danger btn-lg btn-block">Delete</button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Food Delete -->
<div id="myModalDeleteFood" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Item</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid" style="color:black;">
          <form role="form" method="post" action="moderator/delete_item.php">
          <div class="col-lg-12">    
              <table class="table">
              <h2>Items</h2>
              <thead>
                <tr>
                  <th>Select</th>
                  <th>itemType</th>
                  <th>itemName</th>
                  <th>itemDescription</th>
                  <th>itemPrice</th>
                </tr>
              </thead>
              <tbody>                
                <?php
                for ($i=0; $i < sizeof($items) ; $i++) 
                { 
                    
                    echo "<tr>";
                    echo '<td><input type="checkbox" name="items'.$i.'" value="'.$items[$i]['idItem'].'"/></td>';
                    echo "<td>".$items[$i]['type']."</td>";
                    echo "<td>".$items[$i]['name']."</td>";
                    echo "<td>".$items[$i]['itemDescription']."</td>";
                    echo "<td>".$items[$i]['price']."€</td>";
                    echo "</tr>";
                    
                }
                ?>
              </tbody>
              </table>
          </div>
          <input type="hidden" name="moderatorid" value="<?echo $moderatorId;?>">
          <button type="submit" class="btn btn-danger btn-lg btn-block">Delete</button>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Reservation Delete -->
<div id="myModalReservation" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">DORSIA Reservation</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid" style="color:black;">
          <form role="form" method="post" action="moderator/delete_reservation.php">
          <div class="col-lg-12">    
              <table class="table">
              <h2>Reservations</h2>
              <thead>
                <tr>
                  <th>Select</th>
                  <th>idTable</th>
                  <th>customerSurname</th>
                  <th>personCount</th>
                  <th>reservationTime</th>
                  <th>reservationDate</th>
                  <th>mobileNumber</th>
                </tr>
              </thead>
              <tbody>                
                <?php
                $z=",";
                for ($i=0; $i < sizeof($reservations) ; $i++) 
                { 
                    
                    echo "<tr>";

                    echo '<td><input type="checkbox" name="reservation'.$i.'" 
                    value="'.$reservations[$i]['idFoodTable'].$z.$reservations[$i]['idCustomer'].$z.
                    $reservations[$i]['personCount'].$z.$reservations[$i]['reservationTime'].$z.
                    $reservations[$i]['reservationDate'].'"/></td>';

                    echo "<td>".$reservations[$i]['idFoodTable']."</td>";
                    echo "<td>".$reservations[$i]['surname']."</td>";
                    echo "<td>".$reservations[$i]['personCount']."</td>";
                    echo "<td>".$reservations[$i]['reservationTime']."</td>";
                    echo "<td>".$reservations[$i]['reservationDate']."</td>";
                    echo "<td>".$reservations[$i]['mobileNumber']."</td>";
                    echo "</tr>";
                    
                }
                ?>
              </tbody>
              </table>
          </div>
          <input type="hidden" name="moderatorid" value="<?echo $moderatorId;?>">
          <button type="submit" class="btn btn-danger btn-lg btn-block">Cancel Reservation</button>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>