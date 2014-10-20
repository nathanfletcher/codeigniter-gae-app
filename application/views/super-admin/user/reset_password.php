<?php
//Header Data
$data = array(
    "page_title" => "Reset Password"
);
//Include Header
$this->load->view('super-admin/includes/header', $data);
?>

    <?php
        $this->load->view('includes/form-validation');
    ?>

    <div class="container row">
        <div class="container col-lg-4 col-lg-push-4 col-md-6 col-md-push-3 col-sm-8 col-sm-push-2">
            <h2>Reset Password</h2>
            <form role="form" method="post">
                <div class="form-group">
                    <label for="form-new-password">New Password</label>
                    <input type="password" name="new-password" class="form-control" id="form-new-password"
                           placeholder="New Password" value="<?php echo set_value('new-password'); ?>" >
                </div>
                <div class="form-group">
                    <label for="form-retype-new-password">Retype New Password</label>
                    <input type="password" name="retype-new-password" class="form-control" id="form-retype-new-password"
                           placeholder="Retype New Password" value="<?php echo set_value('retype-new-password'); ?>" >
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
                <p>Remember password? <a href="/super-admin/user/login">Login here</a>.</p>
            </form>
        </div>
    </div>

<?php
//Include Footer
$this->load->view('super-admin/includes/footer');
?>