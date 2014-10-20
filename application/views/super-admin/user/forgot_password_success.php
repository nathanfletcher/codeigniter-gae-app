<?php
//Header Data
$data = array(
    "page_title" => "Reset Password - Instructions Sent"
);
//Include Header
$this->load->view('super-admin/includes/header', $data);
?>

    <div class="container  col-lg-6 col-lg-push-3 col-md-8 col-md-push-2 col-sm-10 col-sm-push-1">
        <h2>Reset Password</h2>
        <p>Reset Password instructions sent to your e-mail.</p>
    </div>

<?php
//Include Footer
$this->load->view('super-admin/includes/footer');
?>