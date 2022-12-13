<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2b39d4f993.js" crossorigin="anonymous"></script>

    <style type="text/css">
      *{
        margin: 0;
        padding: 0;
      }
      body{
        background-color: #f5f5f5;
      }

      .btn1{
        border: none;
        outline: none;
        height: 50px;
        width: 100%;
        background: #1E90FF;
        color: white;
        border-radius: 4px;
        font-weight: bold; 
      }
      .btn1:hover{
        background: white;
        border: 1px solid;
        color: black;
      }
    </style>

    <title>Sansrce</title>
  </head>
  <body>
    

    <div class="container-fluid">
      <?php 
          if(isset($_GET['message'])){
              if($_GET['message'] == 1){
                echo "
                  <div class='alert alert-danger' role='alert'>
                      Email atau password anda salah
                    </div>
                  ";
            }
          }
       ?>
      <div class="text-center p-5">
        <div class="card p-5 position-absolute top-50 start-50 translate-middle" style="max-width: 480px;">
        <i class="fa-solid fa-screwdriver-wrench fa-2xl mb-3"></i>
        <h1>Login Administrator</h1>
        <span class="fs-4">Please Login</span>
          <form action="./commands/login-admin.php" method="POST" enctype="multipart/form-data">
            <div class="mb-1">
              <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" required autofocus>
            </div>
            <div class="mb-1">
              <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button name="login" class="btn1">Login</button>
          </form>
        </div>

      </div>

    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>