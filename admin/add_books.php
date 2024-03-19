<?php
include "includes/header.php";
include "includes/functions.php";

$AuthorsList  = getAllAuthors($conn);
$CategoryList = getAllCategories($conn);

?>
<div class="container" style="margin-top:200px;">
    <section style="padding:0px;">
        <div class="dash-bar">
            Add Books
        </div>
        <div class="col-md-6">
            <div class="row">
                <form name="add_book" id="add_book" method="post">
                    <input type="hidden" id="action" name="action" value="add_book">
                    <div class="form-group">
                        <label for="addBookTitle">Book Title</label>
                        <input type="text" class="form-control" id="addBookTitle" name="addBookTitle" placeholder="Enter book title.">
                    </div>
                    <div class="form-group">
                        <label for="addBookAuthor">Book Author</label>
                        <select class="form-control" id="addBookAuthor" name="addBookAuthor">
                            <option value="0">Select Author.</option>

                            <?php
                                foreach ($AuthorsList as $value) {
                                    echo "<option value='".$value["id"]."#".$value['firstname']." ".$value['lastname']."' >".$value['firstname'] ." ". $value['lastname']."</option>";
                                  }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="addBookCategory">Book Category</label>
                        <select class="form-control" id="addBookCategory" name="addBookCategory">
                            <option value="0">Select Category.</option>
                            <?php
                                foreach ($CategoryList as $value) {
                                    echo "<option value='".$value["id"]."#".$value['category_name']."' >".$value['category_display_name'] ."</option>";
                                  }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="addBookCopies">Total Book Copies</label>
                        <input type="text" class="form-control" id="addBookCopies" name="addBookCopies" placeholder="Enter total book copies.">
                    </div>
                    <div class="form-group">
                        <label for="addBookImage">Book Image</label>
                        <input type="file" class="form-control-file" id="addBookImage" accept="image/*" name="addBookImage">
                    </div>
                    <button type="button" id="bt_add_books" class="btn btn-primary">Add Book</button>

                </form>
            </div>
        </div>
        <div class="col-md-6">
            <img id="bookPreviewImage"  src="../img/default-image.jpg" alt="..." class="img-thumbnail">

        </div>
        
    </section>
</div>
<script type="text/javascript" src="../assets/js/jquery-1.12.4.min.js"></script>

<script>


$(document).ready(function() { 
     
    addBookImage.onchange = evt => {
        const [file] = addBookImage.files
        if (file) {
            bookPreviewImage.src = URL.createObjectURL(file)
        }
    }

     
});
</script>
<?php
include "includes/footer.php";
?>