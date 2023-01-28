<?php
session_start();

if (isset($_SESSION["message"])) {
    $message = $_SESSION["message"];
}

if (isset($_SESSION["success"])) {
    $success = $_SESSION["success"];
}

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
            <div class="right_col" role="main">
                <div class="x_panel col-md-8 m-2" style="max-height: 250px;">
                    <div class="x_title">
                        <h2>Cadastro de Banners</h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <form class="form-label-left input_mask" action="handle_banner_upload.php" method="POST" enctype="multipart/form-data" novalidate>
                                    <div class="col-md-12 col-sm-12 form-group has-feedback">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                                        <input type="file" class="form-control has-feedback-left" id="banner" name="banner" placeholder="Selecione um arquivo." required />
                                        <span class="fa fa-picture-o form-control-feedback left" aria-hidden="true"></span>
                                    </div>

                                    <span class="text-danger"><?php echo $message ?? '';  ?></span>
                                    <span class="text-success mt-3"><?php echo $success ?? '';  ?></span>

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

                <div class="x_panel">
                    <h2>Lista de Banners</h2>

                    <div class="container">
                        <div class="row">


                            <?php
                            require "banner_database.php";
                            $banners = GetAllBanners();

                            while ($row = $banners->fetch_assoc()) :
                                $id = $row['id'];
                                $name = $row['name'];
                            ?>
                                <div class="col-md-3">
                                    <img src="../img/<?php echo $name ?>" class=" rounded mb-3 img-fluid rounded img-thumbnail" />

                                    <form 
                                    class="text-center"
                                    name="delete_banner" action="handle_banner_delete.php" method="POST">
                                        <input type="hidden" name="banner_id" value="<?php echo $id; ?>" />
                                        <button type='submit' name="banner_id" value="<?php echo $id; ?>" class='btn btn-danger mx-1'>
                                            Excluir
                                        </button>
                                    </form>
                                </div>


                            <?php
                            endwhile;
                            ?>
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