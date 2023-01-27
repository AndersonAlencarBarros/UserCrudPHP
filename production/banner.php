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
                    <div class="x_title">
                        <h2>Banners</h2>
                        <div class="clearfix"></div>
                    </div>


                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <form class="form-label-left input_mask" action="handle_banner_upload.php" method="POST" novalidate>

                                    <div class="col-md-12 col-sm-12 form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-left" required="required" id="title" name="title" value="<?php echo $_SESSION['title'] ?? '' ?>" placeholder="Título" />
                                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>

                                        <?php
                                        if (isset($errors["title"])) {
                                        ?>
                                            <span class="text-danger">Campo obrigatório.</span>
                                        <?php
                                        }
                                        ?>
                                    </div>

                                    <div class="col-md-12 col-sm-12  form-group has-feedback">
                                        <input type="file" class="form-control has-feedback-left" id="phone" name="banner" value="<?php echo $_SESSION['banner'] ?? '' ?>" placeholder="Telefone" />
                                        <span class="fa fa-picture-o form-control-feedback left" aria-hidden="true"></span>

                                        <?php
                                        if (isset($errors["banner"])) {
                                        ?>
                                            <span class="text-danger">Selecione um arquivo.</span>
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
                            </div>
                        </div>
                    </div>
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