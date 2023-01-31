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
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Usuários</h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <div id="datatable-fixed-header_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap no-footer">

                                        <table id="users-datatable" class="display" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Nome Completo</th>
                                                    <th>E-mail</th>
                                                    <th>Telefone</th>
                                                </tr>
                                            </thead>
                                        </table>



                                    </div>
                                </div>
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


    <script type='text/javascript'>
        $(document).ready(function() {
            $('#users-datatable').DataTable({
                ajax: {
                    url: 'handle_datatable.php',
                    method: "POST",
                    dataSrc: ""
                },

                processing: true,
                responsive: true,

                columns: [{
                        data: 'Nome Completo'
                    },
                    {
                        data: 'Telefone'
                    },
                    {
                        data: 'Email'
                    }
                ]
            });
        });
    </script>
</body>

</html>