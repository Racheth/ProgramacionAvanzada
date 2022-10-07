<?php
include_once "app/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Panel</title>
</head>

<body>

  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <form method="POST" action="app/AutController.php" class="form">
                <div class="mb-md-5 mt-md-4 pb-5">

                  <h2 class="fw-bold mb-2 text-uppercase">Login</h2>

                  <div class="form-outline form-white mb-4">
                    <input name="email" type="email" class="form-control form-control-lg" />
                    <label class="form-label" for="typeEmailX">correo electronico</label>
                  </div>

                  <div class="form-outline form-white mb-4">
                    <input name="password" type="password" class="form-control form-control-lg" />
                    <label class="form-label" for="typePasswordX">Password</label>
                  </div>

                  <button type="submit" class="btn btn-outline-light btn-lg px-5">Acceder</button>

                  <input type="hidden" value="access"  name="action"> 
                  <input type="hidden" value="<?= $_SESSION['super_token'] ?>"  name="super_token"> 


                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


</body>

</html>