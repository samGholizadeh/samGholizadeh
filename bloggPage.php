<?php include_once 'header.php'; ?>

    <div class="row-fluid">
        <div class="col-md-9" style='padding: 0px;'>

        <?php for($i = 0; $i < 5; $i++){
            echo "<div id='LatestPosts' class='row-fluid'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        <b>".$posts[$i]['post_title']."</b>
                        <span class='badge pull-right'>2013-10-06</span>
                        <span class='badge pull-right' style='margin-right: 2px;'>
                        <b>".$posts[$i]['comments']."</b>
                         <span class='glyphicon glyphicon-comment'></span>
                        </span>
                    </div>

                    <div class='panel-body'>
                        ".substr($posts[$i]['post'], 0, 350)."
                        <br><span class='pull-right'><a href='?a=blogg&postid=".$posts[$i]['post_id']."'><b>Go to post...</b></a></span>
                    </div>
                </div>
            </div>";
        }?>

        </div>
        <div class="col-md-3" style="padding-right: 0px;">
            <div class="row-fluid borderTemp" style="padding: 3px; margin-bottom: 5px;">
                <h4><b>Lastest posts</b></h4>
                <?php for($i = 1; $i < 11; $i++){
                    echo "<a href='#'>link " .$i. "</a><br>";
                }?>
            </div>

            <div class="row-fluid borderTemp" style="padding: 3px; margin-bottom: 5px;">
                <h4><b>Most read last month</b></h4>
                <?php for($i = 0; $i < 11; $i++){
                    echo "<a href='#'>link " .$i. "</a><br>";
                }?>
            </div>

            <div class="row-fluid borderTemp" style="padding: 3px; margin-bottom: 5px;">
                <h4><b>Arkiv</b></h4>
                <?php for($i = 0; $i < 11; $i++){
                    echo "<a href='#'>link " .$i. "</a><br>";
                }?>
            </div>
        </div>
    </div>


<?php include_once 'footer.php'; ?>