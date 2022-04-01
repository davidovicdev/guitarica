<div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon-close"></i></span>
                </button>

                <div class="form-box">
                    <div class="form-tab">
                        <ul class="nav nav-pills nav-fill nav-border-anim" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Log In</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="tab-content-5">
                            <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                <form action="#" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="login_email">Email *</label>
                                        <input type="text" class="form-control" id="login_email" name="login_email" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="login_password">Password *</label>
                                        <input type="password" class="form-control" id="login_password" name="login_password" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-footer">
                                        <button type="submit" id="login-button" class="btn btn-outline-primary-2">
                                            <span>LOG IN</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>
                                    </div>
                                   
                                        <ul id="login_error">                                        
                                        </ul>
                                   <!-- End .form-footer -->
                                </form>
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                <form action="#" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="register_first_name">First Name *</label>
                                        <input type="text" class="form-control" id="register_first_name" name="register_first_name" value="{{old("register_first_name")}}" required>
                                        <span class="text-danger" id="register_first_name_error"></span>
                                    </div><!-- End .form-group -->
                                    
                                    <div class="form-group">
                                        <label for="register_last_name">Last Name *</label>
                                        <input type="text" class="form-control" id="register_last_name" name="register_last_name" value="{{old("register_last_name")}}" required>
                                        <span class="text-danger" id="register_last_name_error"></span>
                                    </div><!-- End .form-group -->
                                    <div class="form-group">
                                        <label for="register_email">Email *</label>
                                        <input type="email" class="form-control" id="register_email" name="register_email" value="{{old("register_email")}}" required>
                                        <span class="text-danger" id="register_email_error"></span>
                                    </div><!-- End .form-group -->
                                    
                                    <div class="form-group">
                                        <label for="register_password">Password *</label>
                                        <input type="password" class="form-control" id="register_password" name="register_password" required>
                                        <span class="text-danger" id="register_password_error"></span>
                                    </div><!-- End .form-group -->
                                    <div class="form-group">
                                        <label for="register_confirm_password">Confirm Password *</label>
                                        <input type="password" class="form-control" id="register_confirm_password" name="register_confirm_password" required>
                                        <span class="text-danger" id="register_confirm_password_error"></span>
                                    </div><!-- End .form-group -->
                                    
                                    <div class="form-group">
                                        <label for="register_address">Address *</label>
                                        <input type="text" class="form-control" id="register_address" name="register_address" value="{{old("register_address")}}" required>
                                        <span class="text-danger" id="register_address_error"></span>
                                    </div><!-- End .form-group --><div class="form-group">
                                        <label for="register_phone">Phone *</label>
                                        <input type="text" class="form-control" id="register_phone" name="register_phone" value="{{old("register_phone")}}" required>
                                        <span class="text-danger" id="register_phone_error"></span>
                                    </div><!-- End .form-group -->                               
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2" id="register-button">
                                            <span>REGISTER</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>
                                    </div><!-- End .form-footer -->
                                </form>
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .form-tab -->
                </div><!-- End .form-box -->
            </div><!-- End .modal-body -->
        </div><!-- End .modal-content -->
    </div><!-- End .modal-dialog -->
</div>