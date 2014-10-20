<?php
//Header Data
$data = array(
    "page_title" => "Login"
);
//Include Header
$this->load->view('super-admin/includes/header', $data);
?>

    <div class="container row">
        <div class="container col-lg-4 col-lg-push-4 col-md-6 col-md-push-3 col-sm-8 col-sm-push-2">
            <h2>Welcome</h2>
            <p>Welcome to Super Admin Section.</p>
        </div>
    </div>

<?php
//Include Footer
$this->load->view('super-admin/includes/footer');
?>