<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="./CSS/bootstrap.css">
    <style>
        .log-in{
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        .bordure{
            border-radius: 6em;
        }
        .blue{
          background: linear-gradient(to right, #5a97c3,#98bdd8,#c5daed,#ebfbff,white);
        }
        .blue-btn{
          background: #cdf5fe;
        }
        .black{
          background-color: black;
        }
        .shadow{
          box-shadow: 0px 0px 100px 5px black;
        }
        .triangle {
          width: 0;
          height: 0;
          border-top: 100vh solid transparent;
          border-left: 100vh solid white;
          border-bottom: 0vh solid transparent; /* Couleur et hauteur du triangle */
          }
        .h{
          height: 100vh;
        }
        .admin{
          background: url('./asset/admin.png') no-repeat;
          background-size: contain;
          background-position: center;
        }
        .logo{
          background: url('./asset/logo.png') no-repeat;
          background-size: contain;
          background-position: start;
        }
        .btn-hover{
          border: 1px solid black;
        }
        .btn-hover:hover{
          transition: all 1s ease-in-out;
          scale: 1.1;
          box-shadow: 3px 2px 10px #A6A6A7;

        }
    </style>
</head>
<body>
  <div class="d-flex h">
    <div class="col-6 blue">
      <div class="col-3 h-25">
        <div class="ms-5 logo col-5 h-50"></div>
      </div>
      <div class="h-75 d-flex justify-content-center">
        <div class="h-50 col-12 admin"></div>
      </div>
    </div>
    <div class="col-6">
      <div class="h-100 d-flex justify-content-center align-items-center">
        <div class="col-11 h-75 mt-5 pt-3 shadow bordure">
          <div class="mt-5"></div>
          <h1 class="text-center log-in">Admin Login</h1>
          <br><br>
          <div class="d-flex justify-content-center">
            <form class="col-11" action="check-in.php" method="post">
              <div>
                <label class="fw-bold" for="id">ID</label><br><br>
                <input type="text" class="border-0 border-bottom col-11" id="id" name="identifiant" placeholder="Mettez ici votre identifiant." >
              </div>
              <br><br>
              <div>
                <label class="fw-bold" for="pass">Mots de passe</label><br><br>
                <input type="password" class="border-0 border-bottom col-11" id="pass" name="password" placeholder="Mettez ici votre mots de pass." >
              </div>
              <br><br><br><br>
              <div class="d-flex justify-content-center">
                <button class="btn-hover col-4 blue fw-bold py-3 bordure" type="submit">connexion</button>
              </div>
            </form>
          </div>
          <?php 
          session_start();
            if(isset($_SESSION["alerte"])){
            $Alerte = $_SESSION["alerte"];
            echo "</br>";
            echo '<h5 class="text-center py-3 text-danger">'. $Alerte .'<h5/>';
          };
          session_destroy();
        ?>
        </div>
      </div>
    </div>
  </div>
</body>
</html>