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
                                <h5 class="card-title"><a class="btn btn-info" href="addcat.php">Add Category</a></h5>
                                <div class="table-responsive">
                                    <?php
                                        $categories =$obj->getAll("categories", "cat_id as Id, name, status");
                                    ?>
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead class="text-center">
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                              <?php 
                                                foreach ($categories as $key=> $category) {
                                                    extract($category);
                                              ?>  
                                            <tr>
                                                
                                                <td><?=$key + 1;?></td>
                                                <td><?=$name;?></td>
                                                <td><?=$status;?></td>
                                                
                                                <td>
                                                    <a href="editcat.php?id=<?=$category['Id']?>"><span class="mdi mdi-checkbox-marked" style="font-size:30px;"></span></a>
                                                    <a href="category.php?delid=<?=$category['Id']?>"><span class="mdi mdi-close-box"style="font-size:30px;"></span></a>                                              
                                                </td>

                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                        <tfoot class="text-center">
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
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
            </div>
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
    $delete = $obj->Delete("categories", "cat_id=$cdelid");
    if($delete == true){  ?>
     <script type="text/javascript">
                swal({
          title: "Category Deleted Successfully!",
          text: "You clicked the button!",
          icon: "success",
        });
                
  </script>
        <?php
        header("location:category.php");
        }else{  ?>
    <script type="text/javascript">
                swal({
                      title: "Category Deleted Failed!",
                      text: "You clicked the button!",
                      icon: "warning",
                    });  
     </script>
        <?php
        }

}


?>