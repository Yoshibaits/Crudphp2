<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="./style.css">
    </head>
  <body class="overflow-hidden d-flex justify-content-center align-items-center">
    <div class="container my-5 d-flex justify-content-center align-items-center">
        <form action="login.php" method="post" class="mb-auto mx-auto">
            <h4 class="text-center">Login</h4>

            <?php
            if (isset($_GET['error'])) {
            ?>
                <p class="error"><?php 
                  echo $_GET['error'];
                ?>  </p>
            
            <?php
            }
            ?>
            <div class="mb-3 mt-3">
              <label for="" class="form-label">Username</label>
              <input type="text" class="form-control" name="username" id="username" placeholder="Username" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary mt-4">Login</button>
          </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>