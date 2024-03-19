<?php
include "includes/header.php";
include "includes/functions.php";


$CategoryList = getAllCategories($conn);
$BookList     = getAllBooks($conn,$UserID);
$TimeSlotList = getTimeSlots($conn);


?>
        
        <!-- Start: Slider Section -->
        <div data-ride="carousel" class="carousel slide" id="home-v1-header-carousel">
            <!-- Carousel slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <figure class="custom-banner-figure">
                        <img style="border-radius: 25px;" src="assets/images/header-slider/banner_1.jpg" />
                    </figure>
                    
                </div>
                <div class="item">
                    <figure class="custom-banner-figure">
                        <img style="border-radius: 25px;" src="assets/images/header-slider/home-v2/header-slide.jpg" />
                    </figure>
                    
                </div>
                <div class="item">
                    <figure class="custom-banner-figure">
                        <img style="border-radius: 25px;" src="assets/images/header-slider/home-v2/header-slide.jpg" />
                    </figure>
                   
                </div>
            </div>
            <!-- Indicators -->
            <!-- <ol class="carousel-indicators">
                <li data-target="#home-v1-header-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#home-v1-header-carousel" data-slide-to="1"></li>
                <li data-target="#home-v1-header-carousel" data-slide-to="2"></li>
            </ol> -->
        </div>
        <!-- End: Slider Section -->

        <!-- Start: Search Section -->
        <!-- <section class="search-filters">
            <div class="container">
                <div class="filter-box">
                    <h3>What are you looking for at the library?</h3>
                    <form action="http://libraria.demo.presstigers.com/index.html" method="get">
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label class="sr-only" for="keywords">Search by Keyword</label>
                                <input class="form-control" placeholder="Search by Keyword" id="keywords" name="keywords" type="text">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <select name="catalog" id="catalog" class="form-control">
                                    <option>Search the Catalog</option>
                                    <option>Catalog 01</option>
                                    <option>Catalog 02</option>
                                    <option>Catalog 03</option>
                                    <option>Catalog 04</option>
                                    <option>Catalog 05</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <select name="category" id="category" class="form-control">
                                    <option>All Categories</option>
                                    <option>Category 01</option>
                                    <option>Category 02</option>
                                    <option>Category 03</option>
                                    <option>Category 04</option>
                                    <option>Category 05</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <div class="form-group">
                                <input class="form-control" type="submit" value="Search">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section> -->
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
        <section class="category-filter section-padding">
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
                        <ul class="category-list">
                            <?php
                                foreach ($BookList as $value) {
                                    $iconClass = "";
                                    $iconAction = "add";
                                    $reserveOption = "";

                                    if($value["favourite"] == "Y")
                                    {
                                        $iconClass = "book-icon-color";
                                        $iconAction = "remove";
                                    }
                                    $bt_action = checkBookCopies($conn, $value["id"]);

                                    if(!checkReservedBooks($conn, $UserID, $value["id"]))
                                    {

                                        $reserveOption = ' <li><a href="#" class="bookdetails" data-title="'.$value["book_title"].'"  data-image="'.$value["book_image"].'" data-bookid="'.$value["id"].'" data-action="'.$bt_action.'" data-author="'.$value["book_author"].'"  data-uid="'.$UserID.'" data-toggle="blog-tags" data-placement="top" title="Reserve Book"><i class="fa fa-plus-square"></i></a></li>';   
                                    }

                                    echo '<li class="category-item '.$value["book_category"].'" style="display: inline-block;height: 400px;">
                                    <figure>
                                        <img src="'.$value["book_image"].'" alt="New Releaase" />
                                        <figcaption class="bg-yellow">
                                            <div class="info-block" style="padding-top: 20px;">
                                                <h4>'.$value["book_title"].'</h4>
                                                <span class="author">'.$value["book_author"].'</span>
                                                <ol style="padding-top:60px;text-align: center;" >
                                                   '.$reserveOption.'
                                                    <li>
                                                        <a href="#" class="favourite_book '.$iconClass.'" data-uid="'.$UserID.'" data-bookid="'.$value["id"].'" data-action="'.$iconAction.'" data-toggle="blog-tags" data-placement="top" title="Add to favorites">
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

    


      

    

<?php
include "includes/footer.php";
?>