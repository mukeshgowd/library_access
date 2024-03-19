<?php
include "includes/header.php";
?>
<div class="container" style="margin-top:200px;">
    <section style="padding:0px;">
        <div class="dash-bar">
            Add Author
        </div>
        <div class="col-md-6">
            <div class="row">
                <form name="add_author" id="add_author" method="post">
                    <input type="hidden" id="action" name="action" value="add_author">
                    <div class="form-group">
                        <label for="addAuthorFirstName">Author First Name</label>
                        <input type="text" class="form-control" id="addAuthorFirstName" name="addAuthorFirstName" placeholder="Enter author first name.">
                    </div>
                    <div class="form-group">
                        <label for="addAuthorLastName">Author Last Name</label>
                        <input type="text" class="form-control" id="addAuthorLastName" name="addAuthorLastName" placeholder="Enter author last name.">
                    </div>
                    <div class="form-group">
                        <label for="addAuthorImage">Author Image</label>
                        <input type="file" class="form-control-file" id="addAuthorImage" accept="image/*" name="addAuthorImage">
                    </div>
                    <button type="button" id="bt_add_author" class="btn btn-primary">Add Author</button>

                </form>
            </div>
        </div>
        <div class="col-md-6">
            <img id="AuthorCroppedImage" style="height:175px;" src="../img/default-image.jpg" alt="..." class="img-thumbnail">
        </div>
        
    </section>
    
    
</div>
<div class="container" style="margin-top:20px;">

    <section style="padding:0px;">
        <div class="dash-bar">
            Add Book Category / Genere
        </div>
        <div class="col-md-6">
            <div class="row">
                <form name="add_category" id="add_category" method="post">
                    <input type="hidden" id="action" name="action" value="add_category">
                    <div class="form-group">
                        <label for="addAuthorFirstName">Book Category</label>
                        <input type="text" class="form-control" id="addBookCategory" name="addBookCategory" placeholder="Enter Book Category.">
                    </div>
                    <button type="button" id="bt_add_category" class="btn btn-primary">Add Category</button>

                </form>
            </div>
        </div>
        <div class="col-md-6">
        </div>
        
    </section>

</div>

<div class="modal fade" id="authorImageCrop" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="authorImageCropTitle">Crop Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding:0px;height:500px;">
        <img id="AuthorPreviewImage"  src="" class="img-thumbnail">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="bt_cropImage">Crop</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="../assets/js/jquery-1.12.4.min.js"></script>

<script>
$(document).ready(function() 
{ 
     
    addAuthorImage.onchange = evt => {
        const [file] = addAuthorImage.files
        if (file) 
        {
            var button = document.getElementById('bt_cropImage');
            var result = document.getElementById('AuthorCroppedImage');
            AuthorPreviewImage.src = URL.createObjectURL(file)
            var cropBoxData;
            var canvasData;
            var cropper;

            $('#authorImageCrop').modal('toggle')

            $('#authorImageCrop').on('shown.bs.modal', function () {
                cropper = new Cropper(AuthorPreviewImage, {
                autoCropArea: 1,
                aspectRatio: 1,
                viewMode: 3,
                ready: function () {
                    cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
                }
                });
            }).on('hidden.bs.modal', function () {
                cropBoxData = cropper.getCropBoxData();
                canvasData = cropper.getCanvasData();
                cropper.destroy();
            });

            button.onclick = function () {
                var croppedCanvas;
                var roundedCanvas;
                var roundedImage;

                croppedCanvas = cropper.getCroppedCanvas();

                roundedCanvas = getRoundedCanvas(croppedCanvas);

                result.src = roundedCanvas.toDataURL()
     
                $('#authorImageCrop').modal('toggle')

            };

        }
    }
     
});
</script>
<?php
include "includes/footer.php";
?>