<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link rel="stylesheet" type="text/css" href="index.css">
  <script src="https://kit.fontawesome.com/97d27865aa.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
  <div>
    <form action="connectlogin.php" method="post" class="row g-3 needs-validation" novalidate>
      <div class="col-md-6">
        <label for="inputEmail41" class="form-label">Email</label>
        <input type="email" class="form-control" id="Email4" name="email" required>
        <div class="invalid-feedback">
          Please enter a valid email address.
        </div>
      </div>
      

       <div class="col-md-6">
        <label for="inputPassword41" class="form-label">Password</label>
        <input type="password" class="form-control" id="Password4" name="password" required>
        <div class="invalid-feedback">
          Please enter your password.
        </div>
      </div>
     
      
      <div class="col-12">
        <button type="submit" class="btn btn-primary">login</button>
      </div>
     
    </form>
  </div>
</body>
</html>