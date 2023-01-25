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
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="dataTables_length" id="datatable-fixed-header_length"><label>Show <select name="datatable-fixed-header_length" aria-controls="datatable-fixed-header" class="form-control input-sm">
                                                            <option value="10">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select> entries</label></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div id="datatable-fixed-header_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="datatable-fixed-header"></label></div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="datatable-fixed-header" class="table table-striped table-bordered dataTable no-footer" style="width: 100%;" role="grid" aria-describedby="datatable-fixed-header_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 81px;">#</th>
                                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 81px;">Nome</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 126px;">E-mail</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 58px;">Telefone</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 58px;"></th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php
                                                        require "database.php";
                                                        $users = GetAllUsers();

                                                        while ($row = $users->fetch_assoc()) :
                                                            $id = $row['id'];
                                                            $name = $row['NAME'];
                                                            $email = $row['email'];
                                                            $phone = $row['phone'];

                                                            echo "
                                                                <tr  role='row' class='odd'>
                                                                    <th scope='row'>$id</th>
                                                                    <td class='sorting_1'>$name</td>
                                                                    <td>$email</td>
                                                                    <td>$phone</td>
                                                                 "
                                                        ?>
                                                            <td class='d-flex justify-content-center m-0'>
                                                                <form name="edit_user" action="edit_user.php" method="GET">
                                                                    <input type="hidden" name="user_id" value="<?php echo $id; ?>" />
                                                                    <button type='submit' name="user_id" value="<?php echo $id; ?>" class='btn btn-light mr-0 ml-0'>
                                                                        Editar
                                                                    </button>
                                                                </form>
                                                                <form name="delete_user" action="delete_user.php" method="POST">
                                                                    <input type="hidden" name="user_id" value="<?php echo $id; ?>" />
                                                                    <button type='submit' name="user_id" value="<?php echo $id; ?>" class='btn btn-light mr-0 ml-0'>
                                                                        Excluir
                                                                    </button>
                                                                </form>
                                                            </td>
                                                            </tr>
                                                        <?php

                                                        endwhile;
                                                        ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-5">
                                                <div class="dataTables_info" id="datatable-fixed-header_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="dataTables_paginate paging_simple_numbers" id="datatable-fixed-header_paginate">
                                                    <ul class="pagination">
                                                        <li class="paginate_button previous disabled" id="datatable-fixed-header_previous"><a href="#" aria-controls="datatable-fixed-header" data-dt-idx="0" tabindex="0">Previous</a></li>
                                                        <li class="paginate_button active"><a href="#" aria-controls="datatable-fixed-header" data-dt-idx="1" tabindex="0">1</a></li>
                                                        <li class="paginate_button "><a href="#" aria-controls="datatable-fixed-header" data-dt-idx="2" tabindex="0">2</a></li>
                                                        <li class="paginate_button "><a href="#" aria-controls="datatable-fixed-header" data-dt-idx="3" tabindex="0">3</a></li>
                                                        <li class="paginate_button "><a href="#" aria-controls="datatable-fixed-header" data-dt-idx="4" tabindex="0">4</a></li>
                                                        <li class="paginate_button "><a href="#" aria-controls="datatable-fixed-header" data-dt-idx="5" tabindex="0">5</a></li>
                                                        <li class="paginate_button "><a href="#" aria-controls="datatable-fixed-header" data-dt-idx="6" tabindex="0">6</a></li>
                                                        <li class="paginate_button next" id="datatable-fixed-header_next"><a href="#" aria-controls="datatable-fixed-header" data-dt-idx="7" tabindex="0">Next</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
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
</body>

</html>