<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css')?>">
  <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/jquery-ui.min.js')?>"></script>
  <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
  <script src="<? base_url('assets/js/script.js')?>"></script>
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
        <li class="active"><a href="/">Home</a></li><!-- changes to /home-->
    
        <li><a href="<?= base_url('templates/register') ?>">Register</a></li>
        <li><a href="<?= base_url('templates/homeContact') ?>">contact</a></li>
        <li><a href="#"></a></li>
      
      </ul>
      <ul class="nav navbar-nav navbar-right">
        
              <li><a href="<?= base_url('templates/login')?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
<?= $this->renderSection('content') ?>
<img src="https://previews.123rf.com/images/drt7230/drt72301801/drt7230180100013/92636893-kindergarten-with-wall-painting-and-sofa.jpg" alt="">
<footer>footer</footer> 
  
</body>
</html>