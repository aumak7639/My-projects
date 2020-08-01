<div id="myModal1" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="register-section">
                    <h4 class="modal-title">Login</h4>
                </div>
            </div>
            <div class="modal-body text-center">
                <form class="login-form" onsubmit="return loginUser();">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">User Name</label>
                        <span class="col-sm-1"> : </span>
                        <div class="col-sm-7">
                            <input class="form-control" id="user_name" placeholder="" type="text"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Password</label>
                        <span class="col-sm-1"> : </span>
                        <div class="col-sm-7">
                            <input class="form-control" id="password" placeholder="" type="password"/>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">SUBMIT</button>
                </form>
                <p>Don't have an account! <a href='#' data-toggle="modal" data-target="#myModal">Register Now</a></p>
            </div>
            <div class="modal-footer">
                <!--         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
            </div>
        </div>

    </div>
</div>