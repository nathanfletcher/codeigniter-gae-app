<?php
    function isNavActive($url) {
        $site = "/super-admin/";
        $active = ("/" . uri_string() == $site . $url) ? "active" : "";
        return $active;
    }
?>

<li class="
    dropdown
    <?php echo isNavActive("profile/edit"); ?>
    <?php echo isNavActive("profile/edit_success"); ?>
    <?php echo isNavActive("profile/change_password"); ?>
    <?php echo isNavActive("profile/change_password_success"); ?>
">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('super-admin_name'); ?> <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
        <li class="
            <?php echo isNavActive("profile/edit"); ?>
            <?php echo isNavActive("profile/edit_success"); ?>
        "><a href="/super-admin/profile/edit">Update Profile</a></li>
        <li class="
            <?php echo isNavActive("profile/change_password"); ?>
            <?php echo isNavActive("profile/change_password_success"); ?>
        "><a href="/super-admin/profile/change_password">Change Password</a></li>
        <li><a href='/super-admin/user/logout'>Logout</a></li>
    </ul>
</li>