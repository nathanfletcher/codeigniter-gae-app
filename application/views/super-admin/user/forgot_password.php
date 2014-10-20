<?php
//Header Data
$data = array(
    "page_title" => "Login"
);
//Include Header
$this->load->view('super-admin/includes/header', $data);
?>

    <?php
        $this->load->view('includes/form-validation');
    ?>

    <div class="container row">
        <div class="container col-lg-4 col-lg-push-4 col-md-6 col-md-push-3 col-sm-8 col-sm-push-2">
            <h2>Retrieve password</h2>
            <form role="form" method="post">
                <div class="form-group">
                    <label for="form-email">Email address</label>
                    <input type="text" name="email" class="form-control" id="form-email"
                           placeholder="Email" value="<?php echo set_value('email'); ?>" >
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