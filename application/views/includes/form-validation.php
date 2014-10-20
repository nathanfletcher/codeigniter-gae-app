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
