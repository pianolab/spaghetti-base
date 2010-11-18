<?php
if ($message = Session::flash('system.alert')):
    if (is_array($message)):
?>
    <div id="alert-message">
        <?php
        foreach ($message as $msg):
            echo $msg . "<br />\n";
        endforeach;
        ?>
    </div>
<?php else: ?>
    <div id="alert-message"><?php echo $message; ?></div>
<?php
    endif;
endif;
?>