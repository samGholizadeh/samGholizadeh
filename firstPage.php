<?php include_once "header.php"; ?>

    <div class="jumbotron" style="padding: 10px; margin-bottom: 7px;">
        <img src="img/newYork.jpg" style="max-height: 100%; max-width: 100%; border-radius: 5px;">
    </div>

    <div id="test"></div>

    <div class="row-fluid upperBloggSamples" style="margin-bottom: 1px; padding-right: 0px; padding-left: 0px;">
        <?php for($i = 0; $i < 3; $i++){
            /*if($i == 0) $style = "style='margin-left: -10px;'";
            else if($i == 2) $style = "style='margin-right: -5px;'";
            else $style = "";*/
            echo "<div class='col-md-4' style='margin: 0px; padding: 0px;'>
                    <div class='panel panel-primary' style='margin: 3px; height: 230px;'>
                         <div class='panel-heading'>
                             <b>".$posts[$i]['post_title']."</b>
                            <span class='badge pull-right'>2013-10-07</span>
                            <span class='badge pull-right'>
                                <span class='glyphicon glyphicon-comment'></span>
                            </span>
                         </div>
                         <div class='panel-body'>
                             ".substr($posts[$i]['post'], 0, 450)."
                            <br>
                             <span class='pull-right'>
                                <a href='?a=blogg&postid=".$posts[$i]['post_id']."'>
                                    <b>Go to post...</b>
                                </a>
                             </span>
                         </div>
                     </div>
                  </div>";
        }?>
    </div>

    <div class="row-fluid upperBloggSamples" style="padding-right: 0px; padding-left: 0px;">
        <?php for($i = 3; $i < 6; $i++){
            echo "<div class='col-md-4' style='margin: 0px; padding: 0px;'>
                    <div class='panel panel-primary' style='margin: 3px;'>
                     <div class='panel-heading'>
                     <b>".$posts[$i]['post_title']."</b>
                        <span class='badge pull-right'>2013-10-07</span>
                        <span class='badge pull-right'>
                            <span class='glyphicon glyphicon-comment'></span>
                        </span>
                     </div>
                     <div class='panel-body'>
                         ".substr($posts[$i]['post'], 0, 450)."
                         <br>
                         <span class='pull-right'>
                            <a href='?a=blogg&postid=".$posts[$i]['post_id']."'>
                                <b>Go to post...</b>
                            </a>
                         </span>
                       </div>
                    </div>
                </div>";
        }?>
    </div>

<?php include_once "footer.php"; ?>