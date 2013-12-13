<?php include_once "header.php"; ?>

    <div class="row-fluid">

        <div class="col-md-12" style="padding: 0;">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <ul class="nav nav-pills">
                        <li class="active" id="adminPosts"><a style="height: 15px;"><b>Posts</b></a></li>
                        <li class="" id="adminDrafts"><a href="#"><b>Drafts</b></a></li>
                        <li class="pull-right" id="newPostClick"><a><b>+ New post</b></a></li>
                    </ul>
                </div>

                <div class="adminSubPage">
                    <div class="panel-body">



                        <?php for($i = 0; $i < 5; $i++){
                            echo "<div id='LatestPosts' class='row-fluid' data-postid=".$posts[$i]["post_id"].">
                                    <div class='panel panel-primary'>
                                        <div class='panel-heading'>
                                            <b>".$posts[$i]['post_title']."</b>
                                            <span class='badge pull-right'>2013-10-06</span>
                                            <span class='badge pull-right removePost' style='margin-right: 2px;'><b>remove</b></span>
                                            <a href='?a=editPost&postID=".$posts[$i]["post_id"]."'><span class='badge pull-right editPost' style='margin-right: 2px;'><b>edit</b></span></a>
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
                </div>

                <div class="adminSubPage">

                </div>

                <div class="adminSubPage">

                </div>

            </div>
        </div>

    </div>

<?php include_once "footer.php"; ?>