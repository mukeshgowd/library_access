<?php
include "includes/header.php";
?>
        <!-- Start: Cart Section -->
        <div id="content" class="site-content" style="margin:100px 0 100px 0;">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="signin-main">
                        <div class="container">
                            <div class="woocommerce">
                                <div class="woocommerce-login">
                                    <div class="company-info signin-register">
                                        <div class="col-md-5 col-md-offset-1 border-dark-left">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="company-detail bg-dark margin-left">
                                                        <div class="signin-head">
                                                            <h2>Sign in</h2>
                                                            <span class="underline left"></span>
                                                        </div>
                                                        <form class="login" name="login" id="login" method="post">
                                                            <input type="hidden" name="action" value="login">

                                                            <p class="form-row form-row-first input-required">
                                                                <label>
                                                                    <span class="first-letter">Email or Username</span>  
                                                                    <span class="second-letter">*</span>
                                                                </label>
                                                                <input type="text"  id="username" name="username" class="input-text">
                                                             </p>
                                                            <p class="form-row form-row-last input-required">
                                                                <label>
                                                                    <span class="first-letter">Pin</span>  
                                                                    <span class="second-letter">*</span>
                                                                </label>
                                                                <input type="password" id="password" name="password" class="input-text">
                                                            </p>
                                                            <div class="clear"></div>
                                                            <input type="button"  id="bt_login" value="Login" class="button btn btn-default">
                                                            <div class="clear" style="height:150px;"></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 border-dark new-user">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="company-detail new-account bg-light margin-right">
                                                        <div class="new-user-head">
                                                            <h2>Create New Account</h2>
                                                            <span class="underline left"></span>
                                                            <p></p>
                                                        </div>
                                                        <form class="login" name="register" id="register" method="post">
                                                            <input type="hidden" name="action" value="register">
                                                            <p class="form-row form-row-first input-required">
                                                                <label>
                                                                    <span class="first-letter">Username</span>  
                                                                    <span class="second-letter">*</span>
                                                                </label>
                                                                <input type="text" id="regusername" name="regusername" class="input-text">
                                                            </p>
                                                            <p class="form-row form-row-first input-required">
                                                                <label>
                                                                    <span class="first-letter">Email</span>  
                                                                    <span class="second-letter">*</span>
                                                                </label>
                                                                <input type="email" id="regemail" name="regemail" class="input-text">
                                                            </p>
                                                            <p class="form-row input-required">
                                                                <label>
                                                                    <span class="first-letter">Password</span>  
                                                                    <span class="second-letter">*</span>
                                                                </label>
                                                                <input type="password" id="regpassword" name="regpassword" class="input-text">
                                                                
                                                            </p>   
                                                            <p class="form-row input-required">
                                                                <label>
                                                                    <span class="first-letter">Confirm Password</span>  
                                                                    <span class="second-letter">*</span>
                                                                </label>
                                                                <input type="password" id="cpassword" class="input-text">
                                                            </p>                                                                                   
                                                            <div class="clear"></div>
                                                            <input type="button" id="bt_register" value="register" class="button btn btn-default">
                                                            <div class="clear"></div>
                                                        </form> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <!-- End: Cart Section -->

<?php
include "includes/footer.php";
?>