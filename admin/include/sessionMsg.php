<script>
    jQuery(document).ready(function($) {
        <?php
        if (isset($_SESSION['msg'])) {
            ?>
            'use strict';
            var notify = $.notify({
                title: '<?=$_SESSION['msg']['title']?>',
                message: '<?=$_SESSION['msg']['text']?>'
            },
            {
                type: '<?= $_SESSION['msg']['type'] ?>',
                allow_dismiss: true,
                delay: 2000,
                showProgressbar: false,
                timer: 300
            });
            <?php
            unset($_SESSION['msg']);
        }
        ?>
    });
</script>