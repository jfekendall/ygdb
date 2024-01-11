<main id="main-container">
    <div class="content bg-image" style="background: url('<?php echo base_url() . $system_info['system_banner'] ?>') #a0a0a0; background-size: cover;background-position: center;">
        <div class="push-50-t push-15 clearfix">
            <h1 class="h2 text-white push-5-t animated zoomIn"><?php echo $system ?></h1>
            <?php if (!empty($system_info['system_debut'])) { ?>
                <h2 class='h5 text-white-op animated zoomIn'><?php echo $system_info['system_debut'] . " - " . $system_info['system_end'] ?></h2>
            <?php } ?>
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
                        <h3 class="block-title"><i class="fa fa-newspaper-o"></i> Your Collection</h3>
                    </div>
                    <div class="block-content">

                        <table class='table table-bordered table-striped js-dataTable-full'>
                            <thead>	
                                <tr>
                                    <th>Have</th>
                                    <th>Title</th>
                                    <th class='text-center'>Market</th>
                                    <th class='text-center'>Release Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $rownum = 1;
                                foreach ($allGames AS $game) {
                                    ?>
                                    <tr>
                                        <td>
                                            <input type='checkbox' name='<?php echo $rownum ?>' value='<?php echo $game['uuid'] ?>' <?php echo ($game['have'] ? 'checked' : ''); ?> class="has">
                                        </td>
                                        <td><?php echo anchor("game/{$game['uuid']}",  $game['game_1_title']);?></td>
                                        <td><?php echo $game['market_1'] ?></td>
                                        <?php if (date('d', strtotime($game['game_1_release_date'])) != '1') { ?>
                                            <td><?php echo date('F d, Y', strtotime($game['game_1_release_date'])) ?></td>
                                        <?php } else { ?>
                                            <td><?php echo date('F Y', strtotime($game['game_1_release_date'])) ?></td>
                                        <?php } ?>
                                    </tr>	
                                    <?php
                                    $rownum++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
