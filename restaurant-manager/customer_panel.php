<!DOCTYPE html>
<html lang="en">
<head>

<title>PANEL</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="styles/index.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<?php
  //Gets user name for welcome screen
  require_once 'controller/dbcon.php';
  $myDBCON = new DBCON("127.0.0.1","restoran","root","");
  $myDBCON->connect();
  $result=$myDBCON->selectDB("SELECT name FROM Customer WHERE idCustomer='".$_GET['id']."'");
  $name=$result[0]['name'];

  $pizzas=$myDBCON->selectDB("SELECT idItem, name, itemDescription, price FROM Item WHERE idItemType=1");
  $pastas=$myDBCON->selectDB("SELECT idItem, name, itemDescription, price FROM Item WHERE idItemType=2");
  $meats=$myDBCON->selectDB("SELECT idItem, name, itemDescription, price FROM Item WHERE idItemType=3");
  $desserts=$myDBCON->selectDB("SELECT idItem, name, itemDescription, price FROM Item WHERE idItemType=4");
  $drinks=$myDBCON->selectDB("SELECT idItem, name, itemDescription, price FROM Item WHERE idItemType=5");
?>

</head>
<body>
<!-- Navigation bar -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">DORSIA</a>
    </div>   
      <!-- Welcome message -->
      <ul class="nav navbar-nav navbar-right">
        <li><a style="cursor:default; font-size:15px;"><span class="glyphicon glyphicon-user"> <?echo $name; ?></span></a></li>
      </ul>
  </div>
</nav>
<div class="col-sm-12">
<div class="container-fluid">
  <div class="jumbotron" style="background-image: url(pictures/welcome.png); background-size:cover; color:white;">
    <h1>Welcome <?echo $name.".";?></h1>      
    <p style="text-align:right;">
      <span class="glyphicon glyphicon-time" aria-hidden="true" style="color:white; font-size:25px;"></span>
        Monday-Sunday 8AM-10PM
    </p>
  </div>      
</div>
</div>

<div class="container">
  <div class="col-sm-6">
    <!-- Trigger the modal Order -->
    <button type="button" class="btn btn-primary btn-xlarge btn-block" data-toggle="modal" data-target="#myModalOrder">
      <span class="glyphicon glyphicon-cutlery"></span> Order
    </button>
  </div>
  <div class="col-sm-6">
    <!-- Trigger the modal Reserve -->
    <button type="button" class="btn btn-danger btn-xlarge btn-block" data-toggle="modal" data-target="#myModalReserve">
      <span class="glyphicon glyphicon-pencil"></span> Reserve
    </button>
  </div>
</div>

<!-- Modal Order -->
<div id="myModalOrder" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Order</h3>
      </div>
      <div class="modal-body">
        <!-- Form menu in tables -->
        <div class="container-fluid" style="color:black;">
          <form role="form" method="post" action="order.php">
          <div class="col-sm-12">    
              <table class="table">
              <h2>Pizza</h2>
              <thead>
                <tr>
                  <th></th>
                  <th>Name</th>
                  <th></th>
                  <th>Price</th>
                </tr>
              </thead>
              <tbody>                
                <?php
                for ($i=0; $i < sizeof($pizzas) ; $i++) 
                { 
                    
                    echo "<tr>";
                    echo '<td><input type="checkbox" name="pizza'.$i.'" value="'.$pizzas[$i]['idItem'].'"/></td>';
                    echo "<td><i>".$pizzas[$i]['name']."</i></td>";
                    echo "<td>".$pizzas[$i]['itemDescription']."</td>";
                    echo "<td>".$pizzas[$i]['price']."€"."</td>";
                    echo "</tr>";
                    
                }
                ?>
              </tbody>
              </table>
          </div>
          <div class="col-sm-12">    
              <table class="table">
              <h2>Pasta</h2>
              <thead>
                <tr>
                  <th></th>
                  <th>Name</th>
                  <th></th>
                  <th>Price</th>
                </tr>
              </thead>
              <tbody>
                <?php
                for ($i=0; $i < sizeof($pastas) ; $i++) 
                { 
                    
                    echo "<tr>";
                    echo '<td><input type="checkbox" name="pasta'.$i.'" value="'.$pastas[$i]['idItem'].'"/></td>';
                    echo "<td><i>".$pastas[$i]['name']."</i></td>";
                    echo "<td>".$pastas[$i]['itemDescription']."</td>";
                    echo "<td>".$pastas[$i]['price']."€"."</td>";
                    echo "</tr>";
                    
                }
                ?>
              </tbody>
              </table>
          </div>
          <div class="col-sm-12">    
              <table class="table">
              <h2>Meat</h2>
              <thead>
                <tr>
                  <th></th>
                  <th>Name</th>
                  <th></th>
                  <th>Price</th>
                </tr>
              </thead>
              <tbody>
                <?php
                for ($i=0; $i < sizeof($meats) ; $i++) 
                { 
                    
                    echo "<tr>";
                    echo '<td><input type="checkbox" name="meat'.$i.'" value="'.$meats[$i]['idItem'].'"/></td>';
                    echo "<td><i>".$meats[$i]['name']."</i></td>";
                    echo "<td>".$meats[$i]['itemDescription']."</td>";
                    echo "<td>".$meats[$i]['price']."€"."</td>";
                    echo "</tr>";
                    
                }
                ?>
              </tbody>
              </table>
          </div>
          <div class="col-sm-12">    
              <table class="table">
              <h2>Dessert</h2>
              <thead>
                <tr>
                  <th></th>
                  <th>Name</th>
                  <th></th>
                  <th>Price</th>
                </tr>
              </thead>
              <tbody>
                <?php
                for ($i=0; $i < sizeof($desserts) ; $i++) 
                { 
                    
                    echo "<tr>";
                    echo '<td><input type="checkbox" name="dessert'.$i.'" value="'.$desserts[$i]['idItem'].'"/></td>';
                    echo "<td><i>".$desserts[$i]['name']."</i></td>";
                    echo "<td>".$desserts[$i]['itemDescription']."</td>";
                    echo "<td>".$desserts[$i]['price']."€"."</td>";
                    echo "</tr>";
                    
                }
                ?>
              </tbody>
              </table>
          </div>
          <div class="col-sm-12">    
              <table class="table">
              <h2>Drink</h2>
              <thead>
                <tr>
                  <th></th>
                  <th>Name</th>
                  <th></th>
                  <th>Price</th>
                </tr>
              </thead>
              <tbody>
                <?php
                for ($i=0; $i < sizeof($drinks) ; $i++) 
                { 
                    
                    echo "<tr>";
                    echo '<td><input type="checkbox" name="drink'.$i.'" value="'.$drinks[$i]['idItem'].'"/></td>';
                    echo "<td><i>".$drinks[$i]['name']."</i></td>";
                    echo "<td>".$drinks[$i]['itemDescription']."</td>";
                    echo "<td>".$drinks[$i]['price']."€"."</td>";
                    echo "</tr>";
                    
                }
                ?>
              </tbody>
              </table>
          </div>
              <input type="hidden" name="customerid" value="<?echo $_GET['id'];?>">
              <button type="submit" class="btn btn-primary btn-lg btn-block">Order</button>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Reserve -->
<div id="myModalReserve" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Reserve</h3>
      </div>
        <div class="modal-body">
        <!-- Form menu in tables -->
        <div class="container-fluid" style="color:black;">
          <form class="form" role="form" method="post" action="reservation.php">
              <div class="form-group col-lg-12">
                <label>How many people:</label>
                <input type="number" style="width:100%;" name="personCount" min="2" max="6" required>
              </div>
              <div class="form-group col-lg-12">
                <label>What date:</label>
                <input type="date"  style="width:100%;" name="date" min="<?echo date("Y-m-d");?>" max="<?echo date('Y-m-d', strtotime(date('Y-m-d') . ' + 7 day'));?>" required>
              </div>
               <div class="form-group col-lg-12">
                <label>What time:</label>
                <input type=time style="width:100%;" min="08:00:00" max="22:00:00" step="3600" name="time" required>
              </div>
              <div class="form-group col-lg-12">
                <label>Indoor</label>
                <input type="radio"  name="position" value="1" required>
              </div>
              <div class="form-group col-lg-12">
                <label>Outdoor</label>
                <input type="radio"  name="position" value="2" required>
              </div>
              <input type="hidden" name="customerid" value="<?echo $_GET['id'];?>">
              <button type="submit" class="btn btn-danger btn-lg pull-right btn-block">Reserve</button>
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