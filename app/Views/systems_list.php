<main id="main-container">
    <div class="content bg-image" style="background: #a0a0a0;">
        <div class="push-50-t push-15 clearfix">
            <h1 class="h2 text-white push-5-t animated zoomIn"><?php echo (isset($system) ? $system : lang('General.pick_system')); ?></h1>
        </div>
    </div>
    <div class="content content-boxed">
        <div class="row">
            <div class="col-sm-12 ">
                <div class="block">
                    <div class="block-header bg-gray-lighter">
                        <ul class="block-options">
                            <li>
                                <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                            </li>
                            <li>
                                <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                            </li>
                        </ul>
                        <h3 class="block-title"><i class="fa fa-newspaper-o"></i> <?php echo lang('General.systems_available'); ?></h3>
                    </div>
                    <div class="block-content">
                        <?php
                        $rownum = 1;
                        foreach ($sys AS $s) {
                            echo "<h2>" . anchor("collection/manage/{$s['system_name']}", $s['system_name']) . "</h2><hr>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
