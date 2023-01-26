<?php
session_start();

if (isset($_SESSION["data"]["errors"]))
  $errors = $_SESSION["data"]["errors"];

if (isset($_SESSION["data"]["message"]))
  $message = $_SESSION["data"]["message"];

?>

<!DOCTYPE html>
<html lang="pt-br">

<?php
require "head.php"
?>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <?php
      require "sidebar.php"
      ?>

      <!-- top navigation -->
      <?php
      require "navbar.php"
      ?>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col d-flex justify-content-center" role="main">
        <div class="x_panel col-md-6" style="max-height: 400px;">

          <!-- Cadastro do Usuário -->
          <div class="x_title">
            <h2>Faça o cadastro do Usuário</h2>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <form class="form-label-left input_mask" action="handle_create.php" method="POST" novalidate>

              <div class="col-md-12 col-sm-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left" required="required" id="name" name="name" placeholder="Nome Completo" />
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>

                <?php
                if (isset($errors["name"])) {
                ?>
                  <span class="name-error text-danger">Insira um Nome.</span>
                <?php
                }
                ?>
              </div>

              <div class="col-md-12 col-sm-12  form-group has-feedback">
                <input type="email" class="form-control has-feedback-left" id="email" name="email" placeholder="Email">
                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>


                <?php
                if (isset($errors["email"])) {
                ?>
                  <span class="email-error text-danger">Insira um Email.</span>
                <?php
                }
                ?>
              </div>

              <div class="col-md-12 col-sm-12  form-group has-feedback">
                <input type="tel" class="form-control has-feedback-left" id="phone" name="phone" placeholder="Telefone" />
                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>

                <?php
                if (isset($errors["phone"])) {
                ?> 
                  <span class="phone-error text-danger">Insira um Telefone.</span>
                <?php
                }
                ?>

              </div>

              <div class="form-group row d-flex justify-content-center">
                <div class="col-xs-6 col-sm-6 col-md-12">
                  <button id="submit" type="submit" class="btn btn-success btn-block mt-5">Enviar</button>
                </div>
              </div>
            </form>

            <?php

            if (isset($_SESSION["data"]["success"])) {
              $success = $_SESSION["data"]["success"];

              if ($success) {
            ?>

                <div class="alert alert-success" role="alert">
                  <?php echo "Usuário cadastrado." ?>
                </div>

              <?php
              } else {
              ?>

                <div class="alert alert-danger" role="alert">
                  echo "Ops...Algum problema aconteceu :("
                </div>

            <?php
              }
            }

            session_destroy();
            ?>
          </div>
        </div>

      </div>
    </div>
    <!-- /page content -->

    <!-- footer content -->
    <?php
    require "footer.php"
    ?>
    <!-- /footer content -->
  </div>
  </div>


  <?php
  require "scripts.php"
  ?>
</body>

</html>