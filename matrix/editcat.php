<?php 
include('header.php');
?>
       
<?php 
include('sidebar.php');
?>

<?php 

if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    if ($obj->getById("categories", "*", "cat_id=$id")!=false) {
        extract($obj->getById("categories", "*", "cat_id=$id"));
    }else{
        die("Invalid Request");
    }
}

?>


        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form class="form-horizontal" action="editcat.php" method="post">
                                <div class="card-body">
                                   
                                    <h4 class="card-title">Edit Category</h4>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 text-right control-label col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="name" name="name" 
                                            value="<?= @$name;?>" placeholder="Cat Name">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 text-right control-label col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <select name="status" id="select">
                                                <option value="">Pleas Select</option>
                                                <option value="publish"<?=@$status == 'publish'?'selected':""?>>Publish</option>
                                                <option value="unpublish"<?=@$status == 'unpublish'?'selected':""?>>Unpublish</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body text-right"">
                                         <input type="hidden" name="edit_id" value="<?=$id?>"/>   
                                        <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
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
    <!-- <script src="dist/js/sweetalert2.min.js"></script> -->
    <!--Custom JavaScript -->
    <script src="dist/js/tinymce/tinymce.min.js"></script>
    <script src="dist/js/custom.min.js"></script>
    <!-- This Page JS -->
    <script src="assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src="dist/js/pages/mask/mask.init.js"></script>
    <script src="assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
    <script src="assets/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
    <script src="assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
    <script src="assets/libs/jquery-minicolors/jquery.minicolors.min.js"></script>
    <script src="assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="assets/libs/quill/dist/quill.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    


    <!-- <script src="dist/js/jquery.tinymce.min.js"></script> -->


    <!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->
  <script>
      tinymce.init({
        selector: '#content'
      });
  </script>
    <script>
        //***********************************//
        // For select 2
        //***********************************//
        $(".select2").select2();

        /*colorpicker*/
        $('.demo').each(function() {
        //
        // Dear reader, it's actually very easy to initialize MiniColors. For example:
        //
        //  $(selector).minicolors();
        //
        // The way I've done it below is just for the demo, so don't get confused
        // by it. Also, data- attributes aren't supported at this time...they're
        // only used for this demo.
        //
        $(this).minicolors({
                control: $(this).attr('data-control') || 'hue',
                position: $(this).attr('data-position') || 'bottom left',

                change: function(value, opacity) {
                    if (!value) return;
                    if (opacity) value += ', ' + opacity;
                    if (typeof console === 'object') {
                        console.log(value);
                    }
                },
                theme: 'bootstrap'
            });

        });
        /*datwpicker*/
        jQuery('.mydatepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        var quill = new Quill('#editor', {
            theme: 'snow'
        });
    </script>
    
</body>

</html>

<?php 
if(isset($_REQUEST['submit'])){
    extract($_REQUEST);
$sowrov = $obj->Update("categories", "name='$name', status='$status'", "cat_id=$edit_id");    
if($sowrov == true){  ?>
    <script type="text/javascript">
        swal({
              title: "Category Update Successfully!",
              text: "You clicked the button!",
              icon: "success",
            });
        
    </script>

<?php
header("location:category.php");
}else{  ?>
<script type="text/javascript">
        swal({
              title: "Category Update Failed!",
              text: "You clicked the button!",
              icon: "warning",
            });
        
    </script>
<?php
}
 
}





?>