<?php
//Header Data
$data = array(
    "page_title" => "Profile | Change Password"
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
            <h2>Change Password</h2>
            <form role="form" method="post">
                <div class="form-group">
                    <label for="form-current-password">Current Password</label>
                    <input type="password" name="current-password" class="form-control" id="form-current-password"
                           placeholder="Current Password" value="<?php echo set_value('current-password'); ?>" >
                </div>
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
                    <button type="submit" class="btn btn-default">Update</button>
                    <a href="/super-admin/" class="btn btn-default">Cancel</a>
                </div>
            </form>
        </div>
    </div>

<?php
//Include Footer
$this->load->view('super-admin/includes/footer');
?>