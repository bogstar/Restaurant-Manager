<!DOCTYPE html>
<html lang="en">
<head>

<title>DORSIA</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="styles/index.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

</head>

<body>
<!-- Navigation bar and signup/signin options -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
        <!-- Header Dorsia -->
        <div class="navbar-header">
          <a class="navbar-brand" href="">DORSIA</a>
        </div>   
    	  <!-- Links to subpages -->
      	<ul class="nav navbar-nav">
          <li><a href="menu.php">Menu</a></li>
        	<li><a href="tables.php">Tables</a></li>
        	<li><a href="about.php">About</a></li>
          <li><a style="cursor:pointer;" data-toggle="modal" data-target="#myModalModerator">Moderator</a></li>
          <!-- Moderator validation -->
          <li>
              <a style="cursor:default; font-size:20px;">
                <?
                  if(isset($_GET['moderator']))
                  {
                      if ($_GET['moderator']=='false') {
                        echo "<span style='color:red;' class='glyphicon glyphicon-remove'></span>";
                      }
                  }
                ?>
              </a>
          </li>
      	</ul>
      	<!-- Right nav bar -->
      	<ul class="nav navbar-nav navbar-right">
          <!-- SignUp form and validator -->
          <li>
          <a style="cursor:default; font-size:20px;">
            <?
              if(isset($_GET['signup']))
              {
                  if ($_GET['signup']=='false') {
                    echo "<span style='color:red;' class='glyphicon glyphicon-remove'></span>";
                  }
                  elseif ($_GET['signup']=='true') {
                    echo "<span style='color:green;' class='glyphicon glyphicon-ok'></span>";
                  }
              }
            ?>
          </a>
          </li>
        	  <li class="dropdown">
              <a href="" class="dropdown-toggle" data-toggle="dropdown">Sign Up <b class="caret"></b></a>
                <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
                    <div class="row">
                      <div class="col-md-12">
                          <form class="form" role="form" method="post" action="signup.php" accept-charset="UTF-8" id="signup-nav">
                            <div class="form-group">                           
                                  <input type="text" class="form-control" id="InputName" name="userName" placeholder="Your name" required>
                            </div>
                            <div class="form-group">                               
                                  <input type="text" class="form-control" id="InputSurname" name="userSurname" placeholder="Your surname" required>
                            </div>
                            <div class="form-group">                                  
                                  <input type="email" class="form-control" id="InputEmail" name="userEmail" placeholder="Email address" required>
                            </div>
                            <div class="form-group">                                  
                                  <input type="password" class="form-control" id="InputPassword" name="userPassword" placeholder="Password" required>
                            </div>
                            <div class="form-group">                                  
                                  <input type="text" class="form-control" id="InputAddress" name="userAddress" placeholder="Your address" required>
                            </div>
                            <div class="form-group">                                  
                                  <input type="text" class="form-control" id="InputNumber" name="userNumber" placeholder="Mobile number" required>
                            </div>
                            <div class="form-group">
                                  <button type="submit" class="btn btn-success btn-block">Sign Up</button>
                            </div>
                          </form>
                      </div>
                    </div>
                </ul>
            </li>
            <!-- SignIp form and validator -->
            <li>
              <a style="cursor:default; font-size:20px;">
                <?
                  if(isset($_GET['signin']))
                  {
                      if ($_GET['signin']=='false') {
                        echo "<span style='color:red;' class='glyphicon glyphicon-remove'></span>";
                      }
                  }
                ?>
              </a>
            </li>
        	  <li class="dropdown">
            	<a href="" class="dropdown-toggle" data-toggle="dropdown">Sign In <b class="caret"></b></a>
                <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
                    <div class="row">
	                    <div class="col-md-12">
	                        <form class="form" role="form" method="post" action="signin.php" accept-charset="UTF-8" id="login-nav">
	        	   	           <div class="form-group">	                                
	                                <input type="email" class="form-control" id="InputEmail" name="userEmail" placeholder="Email address" required>
	                           </div>
	                           <div class="form-group">	                               
	                                <input type="password" class="form-control" id="InputPassword" name="userPassword" placeholder="Password" required>
	                           </div>
	                           <div class="form-group">
	                                <button type="submit" class="btn btn-success btn-block">Sign In</button>
	                           </div>
	                        </form>
	            	      </div>
                    </div>
                </ul>
            </li>
        </ul>
  </div>
</nav>

<div class="container">
  	<br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel" >
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
	        <img src="pictures/restaurant.png" alt="Restaurant" width="460" height="345">
	        <div class="carousel-caption">
	        	<h1>Dorsia</h1>
	        	<p>Serving high quality food.</p>
	      	</div>
    	</div>

      <div class="item">
	        <img src="pictures/table-reservation.png" alt="Table" width="460" height="345">
	        <div class="carousel-caption">
	        	<h1>Reservation</h1>
	        	<p>Reserve table at Dorsia.</p>
	      	</div>
      </div>
    
      <div class="item">
	        <img src="pictures/food-order.png" alt="Order" width="460" height="345">
	        <div class="carousel-caption">
	        	<h1>Order</h1>
	        	<p>Order our high quality food for home.</p>
	    </div>

		</div>
	</div>
</div>

<!-- Modal Moderator -->
<div id="myModalModerator" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Moderator LogIn</h4>
      </div>
      <div class="modal-body">
        <form class="form" role="form" method="post" action="moderator_login.php" accept-charset="UTF-8" id="login-nav-moderator">
          <div class="form-group">                                 
            <input type="text" class="form-control" id="InputUsername" name="moderatorUsername" placeholder="Username" required>
          </div>
          <div class="form-group">                                
            <input type="password" class="form-control" id="InputPassword" name="moderatorPassword" placeholder="Password" required>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success btn-block">Log In</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>