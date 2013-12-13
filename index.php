<?php

    include_once "model/postModel.php";
    include_once "model/commentModel.php";
    include_once "model/userModel.php";

    if(session_id() == null){
        session_start();
    }

    if(isset($_GET['a'])){
        $action = $_GET['a'];
    } else if(isset($_POST['a'])){
        $action = $_POST['a'];
    } else {
        $action = "home";
    }

    switch($action){
        case "home":
            $posts = selectAllPost();
            include_once "firstPage.php";
            break;
        case "login":
            $email = htmlspecialchars($_POST["email"]);
            $password = htmlspecialchars($_POST["password"]);
            $user = login($email, $password);
            $data = array();
            if(!$user){
                $data["username"] = false;
            } else {
                $_SESSION["user_id"] = $user["user_id"];
                $_SESSION["username"] = $user["username"];
                $data["username"] = $user["username"];
            }
            echo json_encode($data);
            break;
        case "register":
            $email = htmlspecialchars($_POST["email"]);
            $username = htmlspecialchars($_POST["username"]);
            $password = htmlspecialchars($_POST["password"]);
            $_SESSION["userid"] = insertUser($email, $username, $password);
            $jsonArray = array("userid", $_SESSION["userid"]);
            echo json_encode($jsonArray);
            break;
        case "checkEmailAvail":
            $email = htmlspecialchars($_POST["email"]);
            $emailArray = array("email" => $email);
            echo json_encode($emailArray);
            break;
        case "admin":
            $posts = selectAllPost();
            include_once "adminPage.php";
            break;
        case "adminDraft":
            $drafts = selectAllDrafts();
            include_once "draftPage.php";
            break;
        case "blogg":
            if(isset($_GET['postid'])){
                $post = selectPost($_GET['postid']);
                $comments = getComments($_GET['postid']);
                include_once "singleBloggPage.php";
                break;
            }
            $posts = selectAllPost();
            include_once "bloggPage.php";
            break;
        case "publishPost":
            $postTitle = htmlspecialchars($_POST["title"]);
            $postText = htmlspecialchars($_POST["post"]);
            $test = publishPost($postText, $postTitle, 1);
            include_once "newPost.php";
            break;
        case "saveDraft":
            $draftTitle = htmlspecialchars($_POST["title"]);
            $draft = htmlspecialchars($_POST["draft"]);
            saveDraft($draft, $draftTitle);
            break;
        case "adminDraftPage":
            $drafts = selectAllDrafts();
            include_once "draftPage.php";
            break;
        case "postComment":
            $comment = htmlspecialchars($_POST['comment']);
            $postID = $_POST['postID'];
            insertComment($comment, $postID);
            include_once "newComment.php";
            break;
        case "editPost":
            $_SESSION["editPost"] = selectPost($_GET["postID"]);
            include_once "editPostPage.php";
            break;
        case "updatePost":
            updatePost($_POST["post_id"], $_POST["post"], $_POST["post_title"]);
            $post = $_POST;
            $comments = getComments($_POST["post_id"]);
            include_once "singleBloggPage.php";
            break;
        case "publishEdit":
            break;
        case "removePost":
            $test = removePost($_POST["postID"]);
            include_once "vardump.php";
            break;
        case "about":
            include_once "about.php";
            break;
        case "cv":
            include_once "cv.php";
            break;
        case "downloadcv":
            $filename = "CV.docx";
            if(file_exists($filename)){
                header("Content-Description: File Transfer");
                header("Content-Type: application/octet-stream");
                header("Content-Disposition: attachment; filename=".basename($filename));
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($filename));
                ob_clean();
                flush();
                readfile($filename);
                exit;
            }
            break;
        case "downloadContent":
            downloadFile($_GET["file"]);
            break;
        case "utb":
            if($_GET["utb"] == "java"){
                include_once "java.php";
            } else if($_GET["utb"] == "webbutv"){

            } else if($_GET["utb"] == "webbprg"){

            }
            break;
        case "logout":
            session_destroy();
            header("location:index.php");
            exit();
            break;
    }

    function downloadFile($filename){
        if(isset($_GET["file"])){
            header("Content-Description: File Transfer");
            header("Content-Type: application/octet-stream");
            header("Content-Disposition: attachment; filename=".basename($filename));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filename));
            ob_clean();
            flush();
            readfile($filename);
            exit;
        }
    }

?>