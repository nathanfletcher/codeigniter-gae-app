<?php
    require_once(APPPATH . "views/email/includes/header.php");
?>

<?php
    //Do some process
    $message = str_replace("<p>", '<p style="Margin-top: 0;text-rendering: optimizeLegibility;font-family: sans-serif;color: #60666d;Margin-bottom: 24px;font-size: 15px;line-height: 24px">', $message);
    echo $message;
?>

<?php
    require_once(APPPATH . "views/email/includes/footer.php");
?>
