<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css')?>">
  <script src="<?= base_url('assets/js/jquery.min.js')?>"></script>
  <script src="<?= base_url('assets/js/jquery-ui.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>
  <script src="<?= base_url('assets/js/script.js') ?>"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?= base_url('Ahome') ?>">Home</a></li><!-- changes to /home-->
        <li><a href="<?= base_url('View_stock') ?>">Stock Update</a></li>
        <li><a href="<?= base_url('View_food') ?>">Food Items</a></li>
        <li> <a href="<?= base_url('Approval') ?>">User Requests</a></li>
        <li><a href="<?= base_url('View_User') ?>">Teachers</a>/li>
        <li><a href="<?= base_url('Admin_Attendence') ?>">View Attendence</a>/li>
        <li><a href="<?= base_url('Admin_Ingredients') ?>">View Ingredients</a>/li>
        <li><a href="#"></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
              <li><a href="<?= base_url('Logout') ?>"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>    
      </ul>
    </div>
  </div>
</nav>
<?= $this->renderSection('content') ?>
<footer>footer</footer> 
  
</body>
</html>