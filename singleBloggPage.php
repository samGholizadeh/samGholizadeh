<?php include_once "header.php"; ?>

    <div class="row-fluid">
        <div class="col-md-9" style='padding: 0px;'>

            <div id='' class='row-fluid'>
                    <div class='panel panel-primary'>
                        <div class='panel-heading'>
                            <b> <?php echo $post["post_title"]; ?></b>
                            <span class='badge pull-right'>2013-10-06</span>
                            <span class='badge pull-right' id="newComment" style="margin-right: 3px;">
                                <b>Comment </b>
                            </span>
                        </div>

                        <div class='panel-body'>
                            <?php echo $post["post"]; ?>
                        </div>
                    </div>
            </div>

                <div class="row-fluid" style="margin-top: -10px;">
                    <div class="panel panel-primary newCommentTextArea" id="newCommentTextArea" style="margin: 2px;">
                        <div class="panel-heading">
                            <button class="btn-small"><b>B</b></button>
                            <button id="publishComment" class="btn-primary pull-right" data-postid="<?php echo $post['post_id']; ?>"
                            <b>Publish</b>
                            </button>
                        </div>
                        <div class="panel-body">
                            <textarea placeholder="New Comment" class="form-control" row="10"></textarea>
                        </div>
                    </div>
                    <h4 style="margin-top: 5px;"><b>Comments</b></h4>
                    <ul class="media-list" id="commentField"">
                        <?php foreach($comments as $key => $comment){ ?>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <li class="media" data-commentid="<?php echo $comment["comment_id"]; ?>">
                                        <a class="pull-left" href="#">
                                            <img class="media-object img-rounded" src="http://placehold.it/60x60" alt="avatar" style="margin-right: 3px;">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">
                                                <span class="badge cursor delete pull-right">Delete</span>
                                                <span class="badge cursor reply pull-right" style="margin-right:2px;">Reply</span>
                                            </h4>
                                            <p><b><?php echo $comment["author"]; ?>: </b><?php echo $comment["comment"]; ?></p>

                                           <div class="media">
                                               <a class="pull-left" href="#">
                                                   <img class="media-object img-rounded" src="http://placehold.it/60x60" alt="avatar">
                                               </a>
                                               <div class="media-body">
                                                   <h6 class="media-heading">Nested media heading</h6>
                                                   asdfsdf
                                               </div>
                                           </div>
                                       </div>
                                     </li>
                                </div>
                            </div>
                        <?php }?>
                    </ul>
                </div>
        </div>
        <div class="col-md-3" style="padding-right: 0px;">
            <div class="row-fluid borderTemp" style="padding: 3px;">
                <h6><b>Senaste inlägg</b></h6>
                <?php for($i = 0; $i < 10; $i++){
                    echo "<a href='#'>link " .$i. "</a><br>";
                }?>
            </div>
        </div>
    </div>

<?php include_once "footer.php"; ?>