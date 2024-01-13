    <script src="<?php echo base_url(); ?>/js/core/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/core/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/core/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/core/jquery.scrollLock.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/core/jquery.appear.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/core/jquery.countTo.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/core/jquery.placeholder.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/core/js.cookie.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/app.js"></script>

    <script src="<?php echo base_url(); ?>/js/plugins/jquery-vide/jquery.vide.min.js"></script>
    <script>
        jQuery(function () {
            // Init page helpers (Appear plugin)
            App.initHelpers('appear');
        });
    </script>

    <script src="<?php echo base_url(); ?>/js/plugins/datatables/jquery.dataTables.min.js"></script>

    <script src="<?php echo base_url(); ?>/js/pages/base_tables_datatables.js"></script>
    <script src="<?php echo base_url(); ?>/js/collection_management.js"></script>
    <?php
    if (session()->isAdmin) {
        ?>
        <script src="<?php echo base_url(); ?>/js/admin_functions.js"></script>        
        <?php
    }
    ?>
</body>
</html>
