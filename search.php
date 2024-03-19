<?php
include "includes/header.php";
include "includes/functions.php";

require_once('includes/db.php');

$db = new DB();
$BookList = $db->viewData();

$CategoryList = getAllCategories($conn);
// $BookList     = getAllBooks($conn);


?>
        

        <!-- Start: Search Section -->
        <section class="search-filters" style="margin-top: 200px;background-color:#000;">
            <div class="container">
                <div class="filter-box">
                    <h3>What are you looking for at the library?</h3>
                    <form action="http://libraria.demo.presstigers.com/index.html" method="get">
                        <div class="col-md-12 col-sm-6">
                            <div class="form-group">
                                <label class="sr-only" for="keywords">Search by Keyword</label>
                                <input class="form-control" placeholder="Search by Keyword" id="keywords" name="keywords"  oninput="search(this.value)" type="text">
                            </div>
                        </div>
                     
                    </form>
                </div>
            </div>
        </section>
        <!-- End: Search Section -->

        <!-- Start: Features -->
        <!-- <section class="features">
            <div class="container">
                <ul>
                    <li class="yellow-hover">
                        <div class="feature-box">
                            <i class="yellow"></i>
                            <h3>Books</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id, convallis iaculis eros.</p>
                            <a class="yellow" href="#">
                                View Selection <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </li>
                    <li class="light-green-hover">
                        <div class="feature-box">
                            <i class="light-green"></i>
                            <h3>eBooks</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id, convallis iaculis eros.</p>
                            <a class="light-green" href="#">
                                View Selection <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </li>
                    <li class="blue-hover">
                        <div class="feature-box">
                            <i class="blue"></i>
                            <h3>DVDs</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id, convallis iaculis eros.</p>
                            <a class="blue" href="#">
                                View Selection <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </li>
                    <li class="red-hover">
                        <div class="feature-box">
                            <i class="red"></i>
                            <h3>Magazines</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id, convallis iaculis eros.</p>
                            <a class="red" href="#">
                                View Selection <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </li>
                    <li class="violet-hover">
                        <div class="feature-box">
                            <i class="violet"></i>
                            <h3>Audio</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id, convallis iaculis eros.</p>
                            <a class="violet" href="#">
                                View Selection <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </li>
                    <li class="green-hover">
                        <div class="feature-box">
                            <i class="green"></i>
                            <h3>eAudio</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id, convallis iaculis eros.</p>
                            <a class="green" href="#">
                                View Selection <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </section> -->
        <!-- End: Features -->

        <!-- Start: Category Filter -->
        <section class="category-filter section-padding" style="margin-top: 20px;">
            <div class="container">
                <div class="row">
                    <div class="filter-buttons">
                        <div class="filter btn" data-filter="all">All Books</div>
                        <?php
                            foreach ($CategoryList as $value) {
                                echo "<div class='filter btn' data-filter='.".$value['category_name']."'>".$value['category_display_name']."</div>";
                            }
                        ?>
                    </div>
                    <div id="category-filter">
                        <ul class="category-list" id="search-results">
                            <?php
                                foreach ($BookList as $value) {
                                    echo '<li class="category-item '.$value["book_category_name"].'" style="display: inline-block;height: 400px;">
                                    <figure>
                                        <img src="'.$value["book_image"].'" alt="New Releaase" />
                                        <figcaption class="bg-yellow">
                                            <div class="info-block" style="padding-top: 20px;">
                                                <h4>'.$value["book_title"].'</h4>
                                                <span class="author">'.$value["book_author_name"].'</span>
                                                <ol style="padding-top:60px;text-align: center;" >
                                                    <li>
                                                        <a href="#" class="bookdetails" data-image="'.$value["book_image"].'" data-bookid="'.$value["id"].'" data-toggle=s"blog-tags" data-placement="top" title="View Details">
                                                            <i class="fa  fa-eye"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-toggle="blog-tags" data-placement="top" title="Reserve Book">
                                                            <i class="fa fa-plus-square"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-toggle="blog-tags" data-placement="top" title="Add to favorites">
                                                            <i class="fa fa-heart"></i>
                                                        </a>
                                                    </li>
                                                </ol>
                                            </div>
                                        </figcaption>
                                    </figure>
                                    </li>';
                                }
                            ?>
                        
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Start: Category Filter -->

        <div class="modal fade" id="BookPop" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document" style="width:80%;">
                <div class="modal-content">
                <div class="modal-body">
                    <div class="detailed-box" style="margin-bottom:0px;">
                        <div class="col-xs-12 col-sm-5 col-md-3">
                            <div class="post-thumbnail">
                                <img id="bookpopup_image" style="height: 430px;width: 296px;" src="" alt="Book Image">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-7 col-md-6">
                            <div class="post-center-content">
                                <h2>The Great Gatsby</h2>
                                <p><strong>Author:</strong> F. Scott Fitzgerald</p>
                                <p><strong>ISBN:</strong> 9781581573268, 9780062419385</p>
                                <p><strong>Rating:</strong> </p>
                                <p><strong>Edition:</strong> First edition</p>
                                <p><strong>Publisher:</strong> New York : Shaye Areheart Books, c2008</p>
                                <p><strong>Length:</strong> 518 pages.</p>
                                <p><strong>Format:</strong> DVD</p>
                                <p><strong>Language Note:</strong> Icelandic dialogue; English subtitles.</p>
                                <p><strong>Genre :</strong> Feature films, Fiction films, Drama</p>
                                <p><strong>Topics:</strong> Friendship, Bullies, Pranks, School</p>
                                <div class="actions">
                                    <ul>
                                        <li>
                                            <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="" data-original-title="Add To Cart">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="" data-original-title="Like">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="" data-original-title="Mail">
                                                <i class="fa fa-envelope"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="" data-original-title="Search">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="" data-original-title="Print">
                                                <i class="fa fa-print"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="" data-original-title="Print">
                                                <i class="fa fa-share-alt"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-3 ">
                            <div class="post-right-content">
                                <h4>Available now</h4>
                                <p><strong>Total Copies:</strong> 01</p>
                                <p><strong>Available:</strong> 019780062419385</p>
                                <p><strong>Holds:</strong>  01</p>
                                <p><strong>On the shelves now at:</strong> Lawrence Public Library</p>
                                <p><strong>Call #:</strong> 747 STRUTT C</p>
                                <a href="#." class="available-location">Availability by Location <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                <a href="#." class="btn btn-dark-gray">Place a Hold</a> 
                                <a href="#." class="btn btn-dark-gray">View sample</a> 
                                <a href="#." class="btn btn-dark-gray">Find Similar Titles</a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
        </div>

    

<?php
include "includes/footer.php";
?>