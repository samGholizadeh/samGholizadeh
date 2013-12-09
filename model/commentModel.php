<?php

    include_once "database.php";

    function getComments($postID){
        global $db;
        $query = "SELECT * FROM comment WHERE post_id = :postid ORDER BY comment_id DESC";
        $preparedStatement = $db->prepare($query);
        $preparedStatement->bindValue(":postid", $postID);
        $success = $preparedStatement->execute();
        if($success)
            return $preparedStatement->fetchAll();
        else
            return success;
    }

    function insertComment($comment, $postID){
        global $db;
        $query = "INSERT INTO comment(post_id, comment, reply, author) VALUES(:postid, :comment, 0, 'Sal')";
        $PreparedStatement = $db->prepare($query);
        $PreparedStatement->bindValue(":postid", $postID);
        $PreparedStatement->bindValue(":comment", $comment);
        $success = $PreparedStatement->execute();
        if($success){
            incrementCommentCount($postID);
            return true;
        }
        else
            return false;
    }

    function deleteComment($commentID){
        global $db;
        $query = "DELETE * FROM comment WHERE comment_id = :comment_id";
        $preparedStatement = $db->prepare($query);
        $preparedStatement->bindValue(":comment_id", $commentID);
        $success = $preparedStatement->execute();
        if($success) return $success;
        else return $success;
    }

    function incrementCommentCount($postID){
        global $db;
        $query = "UPDATE post SET comments = comments + 1 WHERE post_id = :postid";
        $preparedStatement = $db->prepare($query);
        $preparedStatement->bindValue(":postid", $postID);
        $preparedStatement->execute();
    }

    function decrementCommentCount($postID){
        global $db;
        $query = "UPDATE post SET comments = comments + 1 WHERE post_id = :postid";
        $preparedStatement = $db->prepare($query);
        $preparedStatement->bindValue(":postid", $postID);
        $preparedStatement->execute();
    }
?>