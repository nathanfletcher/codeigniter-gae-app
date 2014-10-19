<?php
    $is_logged_in = $this->super_admin_auth->isLoggedIn();
?>

<?php
/*
 * Required Items
 * $page_title
 * $page_js
 * $page_css
 * $page_class
 * $page_id
 */
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->config->item('site_name'); ?> | Super Admin | <?php echo (isset($page_title) ? $page_title : ""); ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- JavaScript -->
        <script src="/static/vendor/jquery-2.1.1/jquery-2.1.1.min.js"></script>
        <script src="/static/vendor/lodash-2.4.1/lodash.min.js"></script>
        <script src="/static/vendor/bootstrap-3.2.0/js/bootstrap.min.js"></script>

        <?php
        //Page Specific JavaScript Files
        if(isset($page_js)) {
            foreach($page_js as $js_file) {
                ?>
                <script src="<?php echo $js_file; ?>"></script>
            <?php
            }
        }
        ?>

        <link rel="stylesheet" href="/static/vendor/bootstrap-3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="/static/vendor/bootstrap-3.2.0/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="/static/css/layout.css">

        <?php
        //Page Specific CSS Files
        if(isset($page_css)) {
            foreach($page_css as $css_file) {
                ?>
                <link rel="stylesheet" href="<?php echo $js_file; ?>">
            <?php
            }
        }
        ?>

    </head>
    <body class='super-admin-page <?php echo isset($page_class) ? $page_class : ""; ?>' id='<?php echo isset($page_id) ? $page_id : ""; ?>' >
        <div class="wrapper">
            <div class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo base_url(); ?>super-admin">
                            Super Admin
                        </a>
                    </div>
                    <?php if($is_logged_in) { ?>
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <?php $this->load->view('/super-admin/includes/nav'); ?>
                            </ul>
                        </div><!--/.nav-collapse -->
                    <?php } else { ?>
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href='/super-admin/user/login'>Login</a></li>
                            </ul>
                        </div>
                    <?php } ?>

                </div>
            </div>
            <div class="container">
