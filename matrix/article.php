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
                                <h5 class="card-title"><a class="btn btn-info" href="add_art.php">Add Article</a></h5>
                                <div class="table-responsive">
                                <?php
                                    $articles =$obj->getAll("articles", "art_id, cat_id, title, content, path, status");
                                ?>
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Category</th>
                                                <th>Title</th>
                                                <th>Content</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php 
                                                foreach ($articles as $key=> $article) {
                                                    extract($article);
                                              ?>  
                                            <tr>
                                                
                                                <td><?=$key + 1;?></td>
                                                <td>
                                                    <?php
                                                        $art_id=$article['cat_id'];
                                                        extract($obj->getById("categories", "*", "cat_id=$art_id"));
                                                        echo $name;
                                                    ?>
                                                </td>
                                                <td><?=$title;?></td>
                                                <td><?=substr($content,0,125);?></td>
                                                <td><img src="<?=$path;?>" width='50' height='50' alt="image"></td>
                                                <td><?=$article['status'];?></td>
                                                
                                                <td>
                                                    <a href="edit_art.php?id=<?=$article['art_id']?>"><span class="mdi mdi-checkbox-marked" style="font-size:30px;"></span></a>
                                                    <a href="article.php?delid=<?=$article['art_id']?>"><span class="mdi mdi-close-box"style="font-size:30px;"></span></a>                                              
                                                </td>

                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>SL</th>
                                                <th>Category</th>
                                                <th>Title</th>
                                                <th>Content</th>
                                                <th>Image</th>
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
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>

</body>

</html>
<?php 
if (isset($_REQUEST['delid'])) {
    $delid = $_REQUEST['delid'];
    $imageUpload = $obj->getById("articles", "*", "art_id=$delid");
    unlink($imageUpload['path']); 

}

?>
<?php 

if(isset($_REQUEST['delid'])){
    $cdelid = $_REQUEST['delid'];
    $delete = $obj->Delete("articles", "art_id=$cdelid");
    if($delete == true){  ?>
    <!-- $msg = "Insert Menu"; -->
     <script type="text/javascript">
                swal({
          title: "Article Deleted Successfully!",
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
          title: "Article Deleted Failed!",
          text: "You clicked the button!",
          icon: "warning",
        });
                
        </script>
        <?php
        }

}


?>