<?php
//Header Data
$data = array(
    "page_title" => "Profile | Edit"
);
//Include Header
$this->load->view('super-admin/includes/header', $data);
?>

    <?php
        $this->load->view('includes/form-validation');
    ?>

    <div class="container row">
        <div class="container col-lg-4 col-lg-push-4 col-md-6 col-md-push-3 col-sm-8 col-sm-push-2">
            <h2>Edit Profile</h2>
            <form role="form" method="post">
                <div class="form-group">
                    <label for="form-name">Name</label>
                    <input type="text" name="name" class="form-control" id="form-name"
                           placeholder="Name" value="<?php echo (isset($method) && $method == "get" && isset($name)) ? $name : set_value('name'); ?>" >
                </div>
                <div class="form-group">
                    <label for="form-email">Email address</label>
                    <input type="text" name="email" class="form-control" id="form-email"
                           placeholder="Email" value="<?php echo (isset($method) && $method == "get" && isset($email)) ? $email : set_value('email'); ?>" >
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