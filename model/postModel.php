<?php

    include_once "database.php";

    function publishPost($post, $postTitle){
        global $db;
        $query = "INSERT INTO post(post, post_title) VALUES(:post, :post_title)";
        $PreparedStatement = $db->prepare($query);
        $PreparedStatement->bindValue(":post", $post);
        $PreparedStatement->bindValue(":post_title", $postTitle);
        $success = $PreparedStatement->execute();
        return $success;
    }

    function updatePost($postid, $post, $postTitle){
        global $db;
        $query = "UPDATE post SET post_title = :postTitle, post = :post WHERE post_id = :postid";
        $preparedStatement = $db->prepare($query);
        $preparedStatement->bindValue(":postid", $postid);
        $preparedStatement->bindValue(":post", $post);
        $preparedStatement->bindValue(":postTitle", $postTitle);
        $preparedStatement->execute();
    }

    function saveDraft($draft, $draftTitle){
        global $db;
        $query = "INSERT INTO draft(draft, draft_title) VALUES(:draft, :draft_title)";
        $PreparedStatement = $db->prepare($query);
        $PreparedStatement->bindValue(":draft", $draft);
        $PreparedStatement->bindValue(":draft_title", $draftTitle);
        $success = $PreparedStatement->execute();
        return $success;
    }

    function selectPost($post_id){
        global $db;
        $query = "SELECT * FROM post WHERE post_id = :post_id";
        $preparedStatement = $db->prepare($query);
        $preparedStatement->bindValue(":post_id", $post_id);
        $success = $preparedStatement->execute();
        if($success){
            return $preparedStatement->fetch();
        } else {
            return $success;
        }
    }

    function selectAllDrafts(){
        global $db;
        $query = "SELECT * FROM draft ORDER BY timestamp DESC LIMIT 0, 6";
        $preparedStatement = $db->prepare($query);
        if($preparedStatement->execute()){
            return $preparedStatement->fetchAll();
        } else
            return false;
    }

    function selectAllPost(){
        global $db;
        $query = "SELECT * FROM post ORDER BY timestamp DESC LIMIT 0,6";
        $preparedStatement = $db->prepare($query);
        $success = $preparedStatement->execute();
        if($success)
            return $preparedStatement->fetchAll();
        else
            return $success;
    }

    function removePost($postid){
        global $db;
        $query = "DELETE FROM post WHERE post_id = :postid";
        $preparedStatement = $db->prepare($query);
        $preparedStatement->bindValue(":postid", $postid);
        $success = $preparedStatement->execute();
        if(!$success){
            return $preparedStatement->errorInfo();
        } else {
            return $success;
        }
    }

?>