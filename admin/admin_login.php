<?php
session_start();
require_once "partials/head.php";
require_once "partials/function.php";



?>
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4" style="margin:12px;">
             <div class="box box-info"></div>
            <div class="box-header with-border text-center">
              <h3 class="box-title text-primary">Admin Login</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php
                Login();
                if(isset($_GET['warning'])){
                    echo $_GET['warning'];
                }

            ?>
            <form class="form-horizontal" action="" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right" name="login">Login</button>
              </div>
              <!-- /.box-footer -->
            </form>
    </div>
    <div class="col-sm-4"></div>
</div>