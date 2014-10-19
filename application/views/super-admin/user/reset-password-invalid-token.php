<?php
//Header Data
$data = array(
    "page_title" => "Reset Password - Invalid Token"
);
//Include Header
$this->load->view('super-admin/includes/header', $data);
?>

    <div class="container  col-lg-6 col-lg-push-3 col-md-8 col-md-push-2 col-sm-10 col-sm-push-1">
        <h2>Invalid Token</h2>
        <p>Please use the URL provided in your email to reset your password.</p>
    </div>

<?php
//Include Footer
$this->load->view('super-admin/includes/footer');
?>