<?php
//Header Data
$data = array(
    "page_title" => "Login"
);
//Include Header
$this->load->view('super-admin/includes/header', $data);
?>

    <?php
        $errors = validation_errors_array();
        if(count($errors) > 0 || (isset($custom_errors) and count($custom_errors) > 0) ) {
    ?>
        <ul class="list-group">
            <?php foreach($errors as $error) { ?>
                <li class="list-group-item list-group-item-danger"><?php echo $error; ?></li>
            <?php } ?>

            <?php
                if(isset($custom_errors)) {
                    foreach($custom_errors as $error) {
            ?>
                <li class="list-group-item list-group-item-danger"><?php echo $error; ?></li>
            <?php
                    }
                }
            ?>
        </ul>
    <?php } ?>

    <div class="container row">
        <div class="container col-lg-4 col-lg-push-4 col-md-6 col-md-push-3 col-sm-8 col-sm-push-2">
            <h2>Login</h2>
            <form role="form" method="post">
                <div class="form-group">
                    <label for="form-email">Email address</label>
                    <input type="text" name="email" class="form-control" id="form-email"
                           placeholder="Email" value="<?php echo set_value('email'); ?>" >
                </div>
                <div class="form-group">
                    <label for="form-password">Password</label>
                    <input type="password" name="password" class="form-control" id="form-password"
                           placeholder="Password" value="<?php echo set_value('password'); ?>" >
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
                <p>Forgot password? <a href="/super-admin/user/forgot_password">Retrieve password</a>.</p>
            </form>
        </div>
    </div>

<?php
//Include Footer
$this->load->view('super-admin/includes/footer');
?>