<?php include_once "header.php"; ?>


    <div class="panel panel-primary" id="newPostTextArea" data-postid="<?php echo $_SESSION["editPost"]["post_id"];?>">
        <div class="panel-heading" style="height: 30px; padding: 2px;">
            <button><b>B</b></button>
        </div>
        <div class="panel-body">
            <form action="?a=updatePost" method="post">
                <input type="hidden" name="post_id" value="<?php echo $_SESSION["editPost"]["post_id"]; ?>">
                <input type="text" name="post_title" id="postTitle" class="form-control" placeholder="Title" maxlength="80" style="margin-bottom: 5px;"
                    value="<?php echo $_SESSION["editPost"]["post_title"]; ?>">
                <textarea name="post" class="form-control"><?php echo $_SESSION["editPost"]["post"]; ?></textarea>
                <button type="submit" class="btn-primary pull-right" style="margin-top: 2px;"><b>Save edit</b></button>
            </form>


        </div>
     </div>

<?php include_once "footer.php"; ?>