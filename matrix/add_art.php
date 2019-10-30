<?php 
include('header.php');
?>
       
<?php 
include('sidebar.php');
?>

    
        <div class="page-wrapper">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form class="form-horizontal" action="add_art.php" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    
                                    <h4 class="card-title">Add Article</h4>
                                    <?php 
                                        if(isset($msg)){
                                            echo $msg;
                                        }else{
                                            echo "";
                                        }
                                    ?>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 text-right control-label col-form-label">Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="name" name="title" placeholder="Aticle Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Content</label>
                                        <div class="col-sm-9">
                                            <textarea id="content" name="content" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 text-right control-label col-form-label">Category</label>
                                        <div class="col-sm-9">
                                            <select name="cat_id" id="select">
                                                <option value="">Pleas Select</option>
                                               <?php
                                                    $categories = $obj->getAll("categories","*");
                                                    foreach ($categories as $category) {
                                                        extract($category); ?>
                                                <option value="<?=$cat_id;?>"><?=$name;?></option>        
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 text-right control-label col-form-label">Image</label>
                                        <div class="col-sm-9">
                                            <input type="file"  id="file" name="file">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 text-right control-label col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <select name="status" id="select">
                                                <option value="">Pleas Select</option>
                                                <option value="1">Publish</option>
                                                <option value="0">Unpublish</option>
                                            </select>
                                        </div>
                                    </div>
                                       
                                </div>
                                <div class="border-top">
                                    <div class="card-body text-right"">
                                        <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
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

$permited=array('jpg','jpeg','png','gif');
$file_name=$_FILES['file']['name'];
$file_size=$_FILES['file']['size'];
$file_temp=$_FILES['file']['tmp_name'];

$div = explode('.', $file_name);
$file_ext = strtolower(end($div));
$unique_name = substr(md5(time()),0,10).'.'.$file_ext;
$upload_image = "uploads/".$unique_name;

if(empty($file_name)){ ?>
<script type="text/javascript"> swal("Choose Any Image!"); </script>
   
<?php
}elseif($file_size>1000000){ ?>

<script type="text/javascript"> swal("Image size Less than 1 kb !"); </script>
 
<?php
}elseif(in_array($file_ext, $permited)===false){
    $msg = "You can Upload only:-" .implode(',', $permited)."";
}else{

move_uploaded_file($file_temp, $upload_image);


$sowrov = $obj->Insert("articles", "title='$title', content='$content', cat_id='$cat_id', path='$upload_image', status='$status'");    
if($sowrov == true){  ?>
    <!-- $msg = "Insert Menu"; -->
    <script type="text/javascript">
        swal({
  title: "Article Insert Successfully!",
  text: "You clicked the button!",
  icon: "success",
});
        
    </script>
<?php
//header("location:munes.php");
}else{  ?>
  <!--   //$msg = "Insert Menu fail"; -->
<script type="text/javascript">
        swal({
  title: "Article Insert Failed!",
  text: "You clicked the button!",
  icon: "warning",
});
        
    </script>
<?php
}
}
}


?>