           
        <div id="notification-panel" class="slide-out-panel">

            <header>Notifications</header>

            <section id="notification_box">
               
                <!-- <div class="notif_card">
                    <img src="./assets/images/avatar-mark-webber.webp" style="width: 50px;" alt="avatar" />
                    <div class="description">
                        <p class="user_activity">
                        <strong>Mark Webber</strong> reacted to your recent post
                        <b>My first tournament today!</b>
                        </p>
                        <p class="time">1m ago</p>
                    </div>
                </div> -->
            </section>
        </div>

        <div class="modal fade" id="BookPop" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document" style="width:50%;">
                <div class="modal-content">
                <div class="modal-body">
                    <div class="detailed-box" style="margin-bottom:0px;">
                        <div class="col-xs-12 col-sm-5 col-md-5">
                            <div class="post-thumbnail">
                                <img id="bookpopup_image" style="height: 430px;width: 296px;" src="" alt="Book Image">
                            </div>
                        </div>
                       
                        <div class="col-xs-12 col-sm-12 col-md-7 ">
                            <div class="post-right-content" style="padding:15px;height:430px;">
                                <div style="display:inline-block;">
                                    <h2 id="setBookName" style="color:#000000;" ></h2>
                                    <p id="setBookAuthor"></p>
                                </div>
                                <br>
                                <form name="ReserveBook" id="ReserveBook" method="post">
                                <input type="hidden" id="action" name="action" value="reserve_book">

                                <!-- <p><strong>Total Copies:</strong> 01</p>
                                <p><strong>Available Copies:</strong> 01</p> -->
                                    <select id="getSelectedSlot" name="getSelectedSlot" class="form-control" style="background-color: #000;">
                                        <option value='' >Select Time Slot</option>
                                        <?php
                                            foreach ($TimeSlotList as $value) {
                                                echo "<option value='".$value["id"]."' >".$value['from_time'] ." - ". $value['to_time']."</option>";
                                            }
                                        ?>
                                    </select>
                                    <input type="text" id="returndate" name="getSelectedPickupDate" class="form-control" placeholder="Select Pickup Date" style="border:0px;background: #000;color: #fff;margin-top:15px;" />
                                    <input type="hidden" id="getSelectedBID" name="getSelectedBID" value="">
                                    <input type="hidden" id="getSelectedUID" name="getSelectedUID" value="">
                                    <input type="hidden" id="getStatus" name="getStatus" value="">

                                </form>

                                <div style="position: absolute;bottom: 0px;right: 0px;width: 100%;" id="">
                                       
                                    <a href="#." id="bt_reserve_book" data-bid="" data-uid="" class="btn btn-dark-gray">Reserve Book</a> 
                                   
                                    <a href="#." id="bt_borrow_book" class="btn btn-dark-gray" >Borrow Book</a> 
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
        <!-- Start: Footer -->
        <footer class="site-footer">
            
            <div class="sub-footer">
                <div class="container">
                    <div class="row">
                        <div class="footer-text col-md-3">
                            <p><a target="_blank" href="index.php">Library Access</a></p>
                        </div>
                        <div class="col-md-9 pull-right">
                            <!-- <ul>
                                <li><a href="index-2.html">Home</a></li>
                                <li><a href="books-media-list-view.html">Books &amp; Media</a></li>
                                <li><a href="news-events-list-view.html">News &amp; Events</a></li>
                                <li><a href="#">Kids &amp; Teens</a></li>
                                <li><a href="services.html">Services</a></li>
                                <li><a href="#">Research</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End: Footer -->

      
        <!-- jQuery Latest Version 1.x -->
        <script type="text/javascript" src="assets/js/jquery-1.12.4.min.js"></script>
        
        <!-- jQuery UI -->
        <script type="text/javascript" src="assets/js/jquery-ui.min.js"></script>
        
        <!-- jQuery Easing -->
        <script type="text/javascript" src="assets/js/jquery.easing.1.3.js"></script>

        <!-- Bootstrap -->
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

        <!-- Mobile Menu -->
        <script type="text/javascript" src="assets/js/mmenu.min.js"></script>
        
        <!-- Harvey - State manager for media queries -->
        <script type="text/javascript" src="assets/js/harvey.min.js"></script>
        
        <!-- Waypoints - Load Elements on View -->
        <script type="text/javascript" src="assets/js/waypoints.min.js"></script>

        <!-- Facts Counter -->
        <script type="text/javascript" src="assets/js/facts.counter.min.js"></script>

        <!-- MixItUp - Category Filter -->
        <script type="text/javascript" src="assets/js/mixitup.min.js"></script>

        <!-- Owl Carousel -->
        <script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
        
        <!-- Accordion -->
        <script type="text/javascript" src="assets/js/accordion.min.js"></script>
        
        <!-- Responsive Tabs -->
        <script type="text/javascript" src="assets/js/responsive.tabs.min.js"></script>
        
        <!-- Responsive Table -->
        <script type="text/javascript" src="assets/js/responsive.table.min.js"></script>
        
        <!-- Masonry -->
        <script type="text/javascript" src="assets/js/masonry.min.js"></script>
        
        <!-- Carousel Swipe -->
        <script type="text/javascript" src="assets/js/carousel.swipe.min.js"></script>
        
        <!-- bxSlider -->
        <script type="text/javascript" src="assets/js/bxslider.min.js"></script>
        <script type="text/javascript" src="assets/js/td-message.js"></script>

        <!-- Custom Scripts -->
        <script type="text/javascript" src="assets/js/main.js"></script>
       
        <script type="text/javascript" src="assets/js/bootstrap-datepicker.js"></script>

        <script type="text/javascript" src="assets/js/toastify.js"></script>
        <script type="text/javascript" src="assets/js/jquery.timepicker.js"></script>
        <script type="text/javascript" src="assets/js/slide-out-panel.js"></script>
        <script type="text/javascript" src="assets/packages/datatables.js"></script>
<script type="text/javascript" src="assets/packages/dataTables.altEditor.free.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.js" ></script>
        <script type="text/javascript" src="assets/js/script.js"></script>
        
        <script>
            function pullNotifictions(view = '')
            {
                $.ajax({
                    url: "api/common.php",
                    type: "POST",
                    data: {
                        action: "pull_notification", 
                        view: view,
                    },
                
                    success: function(data) {
                        var details = JSON.parse(data);

                        if (details["status"] == "200") {
                            $('#notification_box').html(details["content"]);
                            $('#notification_count').html(details["count"]);

                        } else {
                                $.message({
                                    type: "error",
                                    text: details["message"],
                                    duration: 5000,
                                    positon: "top-center",
                                    showClose: true
                                });
                        }
                    },
                    error: function() {
                        alert("E4: Add Books Error.");
                        return false;
                    }
                });
            }

            $(document).ready(function(){
                
                setInterval(function(){ 
                    if(sessionStorage.getItem('user_login_status'))
                    {
                        pullNotifictions();
                    }
                }, 5000);
            });
        </script>
    </body>


</html>