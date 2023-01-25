<?php
session_start();
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
            <h2>Faça seu cadastro</h2>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <form class="form-label-left input_mask" action="form.php" method="POST">

              <div class="col-md-12 col-sm-12  form-group has-feedback">
                <input type="text" class="form-control has-feedback-left" id="name" name="name" placeholder="Nome Completo" />
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
              </div>

              <div class="col-md-12 col-sm-12  form-group has-feedback">
                <input type="email" class="form-control has-feedback-left" id="email" name="email" placeholder="Email">
                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
              </div>

              <div class="col-md-12 col-sm-12  form-group has-feedback">
                <input type="tel" class="form-control has-feedback-left" id="phone" name="phone" placeholder="Telefone" data-mdb-input-mask="+48 999-999-999" />
                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
              </div>

              <div class="form-group row d-flex justify-content-center">
                <div class="col-md-12 col-sm-12  offset-md-3 mt-3">
                  <button type="button" class="btn btn-primary">Cancel</button>
                  <button class="btn btn-primary" type="reset">Reset</button>
                  <button type="submit" class="btn btn-success">Submit</button>
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