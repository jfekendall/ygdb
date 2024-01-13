
<main id="main-container">
    <div class="content bg-image" style="background: #a0a0a0;">
        <div class="push-50-t push-15 clearfix">
            <div class="push-15-r pull-left animated fadeIn">
                <img class="img-avatar img-avatar-thumb" src="<?php echo $profile['profile_pic']; ?>" alt="">
            </div>
            <h1 class="h2 text-white push-5-t animated zoomIn"><?php echo $username ?></h1>
            <h2 class="h5 text-white-op animated zoomIn"><?php echo $profile['profile_tagline'] ?></h2>
        </div>
    </div>
    <div class="content bg-white border-b">
        <div class="row items-push text-uppercase">
            <div class="col-xs-6 col-sm-3 text-center">
                <div class="font-w700 text-gray-darker animated fadeIn"><?php echo lang('Dashboard.systems'); ?></div>
                <a class="h2 font-w300 text-primary animated flipInX" href="javascript:void(0)"><?php echo sizeof($yourSystems); ?></a>
            </div>
            <div class="col-xs-6 col-sm-3 text-center">
                <div class="font-w700 text-gray-darker animated fadeIn"><?php echo lang('Dashboard.games'); ?></div>
                <a class="h2 font-w300 text-primary animated flipInX" href="javascript:void(0)"><?php echo $howmany; ?></a>
            </div>
            <div class="col-xs-6 col-sm-3 text-center">
                <div class="font-w700 text-gray-darker animated fadeIn"><?php echo lang('Dashboard.export'); ?></div>
                <?php echo anchor("csvexport", "<i class='fa fa-cloud-download'></i>", "class='h2 font-w300 text-primary animated flipInX'"); ?>

            </div>
        </div>
    </div>
    <div class="content content-boxed">
        <div class="row">
            <div class="col-sm-12 ">
                <!-- Timeline -->
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
                        <h3 class="block-title"><i class="si si-game-controller"></i> <?php echo lang('Dashboard.your_collection'); ?></h3>
                    </div>
                    <div class="block-content">
                        <?php
                        if (sizeof($collections) > 0) {
                            foreach (array_keys($collections) AS $collection) {
                                ?>
                                <h2>
                                    <?php echo $collection; ?> 
                                    <?php echo anchor("csvexport/$collection", "<i class='fa fa-cloud-download pull-right'></i>", "title='Download system collection to CSV'"); ?>
                                    <?php echo anchor("collection/manage/$collection", "<i class='fa fa-edit pull-right'></i>", "title='Manage Collection'"); ?>
                                </h2>
                                <table class='table table-striped js-dataTable-full'>
                                    <thead>
                                        <tr>	
                                            <th>#</th>
                                            <th><?php echo lang('General.title'); ?></th>
                                            <th class='text-center'><?php echo lang('PersonalStats.status'); ?></th>
                                            <th class='text-center'><?php echo lang('PersonalStats.physical_media'); ?></th>
                                            <th class='text-center'><?php echo lang('PersonalStats.with_case'); ?></th>
                                            <th class='text-center'><?php echo lang('PersonalStats.in_wrap'); ?></th>
                                            <th class='text-center'><?php echo lang('PersonalStats.with_manual'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $rownum = 1;

                                        foreach (array_keys($collections[$collection]) AS $gamename) {
                                            echo "<tr>
                                                <td>$rownum</td>
                                                <td>" . anchor("game/{$collections[$collection][$gamename]['uuid']}", $gamename) . "</td>
                                                <td class='text-center'>
                                                    <select name='{$collections[$collection][$gamename]['uuid']}_status' class='stat'>";
                                            foreach ($statuses AS $v) {
                                                echo "<option "
                                                . "value='{$v['id']}' "
                                                . ($collections[$collection][$gamename]['status'] == $v['id'] ? 'selected' : '') . ""
                                                . ">" . lang("GameStatus.{$v['status_name']}") . "</option>";
                                            }
                                            echo "</select>
                                                </td>";

                                            foreach ($collections[$collection][$gamename]['stats'] AS $name => $stat) {

                                                echo "<td class='text-center'><input name='{$collections[$collection][$gamename]['uuid']}_$name' type='checkbox'" . ($stat ? 'checked' : '') . " class='stat'></td>";
                                            }
                                            echo "</tr>";
                                            $rownum++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <?php
                            }
                        } else {
                            echo "<h2>Time to start a new collection</h2>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
