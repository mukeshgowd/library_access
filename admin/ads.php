<?php
include "includes/header.php";
?>

<div class="container" style="margin-top:200px;">
<div class="form-group">
    <label for="addBookImage">Book Image</label>
    <input type="file" class="form-control-file" id="addBookImage" accept="image/*" name="addBookImage">
</div>
<button type="button" id="bt_add_books" class="btn btn-primary">Add Book</button>

<div class="col-md-6">
    <img id="bookPreviewImage"  src="../img/default-image.jpg" alt="..." class="img-thumbnail">

</div>

</div>




<?php
include "includes/footer.php";
?>