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
                                            <?php echo date("F d, Y", strtotime($gamedata["game_{$i}_release_date"])); ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            if (!empty($gamedata['game_box_text'])) {
                                ?>
                                <tr>
                                    <th colspan="2">From the Box</th>
                                </tr>
                                <tr>
                                    <td colspan="2"><?php echo $gamedata['game_box_text']; ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 ">
                <div class="block">
                    <div class="block-header bg-gray-lighter">
                        <h3 class="block-title"><i class="fa fa-user"></i> Your Stats</h3>
                    </div>
                    <div class="block-content">
                        <?php
                        if (empty($personalstats)) {
                            //add to collection to get started
                            ?>
                            <p><input type='checkbox' name='claim' value='<?php echo $gamedata['uuid'] ?>' class="has">
                                Add to your collection for personal stats</p>
                            <?php
                        } else {
                            ?>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        <?php
                                        $rownum = 1;
                                        $statuses = [
                                            '' => '',
                                            'N' => 'New',
                                            'B' => 'Beaten',
                                            'C' => 'Completed',
                                            'M' => 'Mastered',
                                        ];
                                        echo "<select name='{$gamedata['uuid']}_status' class='stat'>";
                                        foreach ($statuses AS $k => $v) {
                                            echo "<option value='$k' " . ($personalstats['status'] == $k ? 'selected' : '') . ">$v</option>";
                                        }
                                        echo "</select>";
                                        ?>
                                    </td>
                                </tr>
                                <?php
                                foreach ($personalstats AS $k => $v) {
                                    if (!in_array($k, ['with_case', 'in_wrap', 'with_manual'])) {
                                        continue;
                                    }
                                    echo "<tr>"
                                    . "<th>" . ucwords(str_replace('_', ' ', $k)) . "</th>"
                                    . "<td><input type='checkbox' class='stat' name='{$gamedata['uuid']}_$k' " . ($v ? 'checked' : '') . "></td>"
                                    . "</tr>";
                                }
                                ?>

                            </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>