<?php 
include('header.php');
?>
       
<?php 
include('sidebar.php');
?>



        <div class="page-wrapper">
          
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><a class="btn btn-info" href="addmenu.php">Add Menu</a></h5>
                                <div class="table-responsive">
                                    <?php
                                        $menus =$obj->getAll("menus", "menu_id as Id, name, content, status");
                                    ?>
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Content</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php 
                                                foreach ($menus as $key=> $menu) {
                                                    extract($menu);
                                              ?>  
                                            <tr>
                                                
                                                <td><?=$key + 1;?></td>
                                                <td><?=$Id;?></td>
                                                <td><?=$name;?></td>
                                                <td><?=substr($content,0,125);?></td>
                                                <td><?=$status;?></td>
                                                
                                                <td>
                                                    <a href="editmenu.php?id=<?=$menu['Id']?>"><span class="mdi mdi-checkbox-marked" style="font-size:30px;"></span></a>
                                                    <a href="menu.php?delid=<?=$menu['Id']?>"><span class="mdi mdi-close-box"style="font-size:30px;"></span></a>                                              
                                                </td>

                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>SL</th>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Content</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.13.0/dist/sweetalert2.all.min.js"></script> -->
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>

</body>

</html>

<?php 

if(isset($_REQUEST['delid'])){
    $cdelid = $_REQUEST['delid'];
    $delete = $obj->Delete("menus", "menu_id=$cdelid");
    if($delete == true){  ?>
    <!-- $msg = "Insert Menu"; -->
     <script type="text/javascript">
                swal({
          title: "Menu Deleted Successfully!",
          text: "You clicked the button!",
          icon: "success",
        });
                
  </script>
        <?php
        header("location:munes.php");
        }else{  ?>
          <!--   //$msg = "Insert Menu fail"; -->
        <script type="text/javascript">
                swal({
          title: "Menu Deleted Failed!",
          text: "You clicked the button!",
          icon: "warning",
        });
                
        </script>
        <?php
        }

}


?>