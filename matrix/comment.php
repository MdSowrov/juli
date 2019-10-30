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
                                
                                <div class="table-responsive">
                                <?php
                                    $comments = $obj->getComments("comments", "*", "id");
                                    //$comments =$obj->getById("comments", "*", "id='$id'");
                                ?>
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php 
                                                foreach ($comments as $key=> $comment) {
                                                    extract($comment);
                                              ?>  
                                            <tr>
                                                
                                                <td><?=$key + 1;?></td>
                                                <td><?=$name;?></td>
                                                <td><?=$email;?></td>
                                                <td><?=$subject;?></td>
                                                <td><?=substr($message,0,125);?></td>
                                                <td><?=$status;?></td>
                                                
                                                <td>
                                                    <a href="comment.php?approve=<?=$comment['id'];?>"><span class="btn btn-info">Approved</span></a>
                                                                                                  
                                                </td>

                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Subject</th>
                                                <th>Message</th>
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
        </div>
    </div>
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
        $('#zero_config').DataTable();
    </script>






</body>

</html>


<?php 

if(isset($_REQUEST['approve'])){
    $cdelid = $_REQUEST['approve'];
    $delete = $obj->Update("comments","status='1'", "id='$cdelid'");
    if($delete == true){  ?>
    <!-- $msg = "Insert Menu"; -->
     <script type="text/javascript">
                swal({
          title: "Comments Successfully!",
          text: "You clicked the button!",
          icon: "success",
        });
                
  </script>
        <?php
        header("location:article.php");
        }else{  ?>
          <!--   //$msg = "Insert Menu fail"; -->
        <script type="text/javascript">
                swal({
          title: "Comments Failed!",
          text: "You clicked the button!",
          icon: "warning",
        });
                
        </script>
        <?php
        }

}


?>