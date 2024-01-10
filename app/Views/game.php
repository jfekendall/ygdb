<main id="main-container">
    <div class="content" style="background:rgb(44, 52, 63);">
        <div class=" clearfix">
            <h1 class="h2 text-white push-5-t animated zoomIn"><?php echo $gamedata['game_1_title']; ?></h1>
        </div>
    </div>
    <div class="content content-boxed">
        <div class="row">
            <div class="col-sm-6 ">
                <div class="block">
                    <div class="block-header bg-gray-lighter">
                        <h3 class="block-title"><i class="fa fa-newspaper-o"></i> Vital Stats</h3>
                    </div>
                    <div class="block-content">
                        <table class="table table-striped">
                            <tr>
                                <th>
                                    Developer
                                </th>
                                <td>
                                    <?php
                                    for ($i = 1; $i <= 4; $i++) {
                                        if (isset($gamedata["game_developer_name_$i"])) {
                                            if ($i > 1) {
                                                echo "<br>";
                                            }
                                            echo $gamedata["game_developer_name_$i"];
                                        }
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Publisher
                                </th>
                                <td>
                                    <?php
                                    for ($i = 1; $i <= 4; $i++) {
                                        if (isset($gamedata["game_publisher_name_$i"])) {
                                            if ($i > 1) {
                                                echo "<br>";
                                            }
                                            echo $gamedata["game_publisher_name_$i"];
                                        }
                                    }
                                    ?>
                                </td>
                            </tr>

                            <?php
                            for ($i = 1; $i <= 4; $i++) {
                                if (isset($gamedata["game_market_name_$i"])) {
                                    if ($i > 1) {
                                        echo "<br>";
                                    }
                                    ?>
                            <tr>
                                <th>
                                    Release Date in <?php echo $gamedata["game_market_name_$i"]; ?>
                                </th>
                                <td>
                                    <?php echo date("F d, Y", strtotime($gamedata["game_{$i}_release_date"]));?>
                                </td>
                            </tr>
                                    <?php
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 ">
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
                        <h3 class="block-title"><i class="fa fa-user"></i> Your Stats</h3>
                    </div>
                    <div class="block-content">
TODO: This
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>