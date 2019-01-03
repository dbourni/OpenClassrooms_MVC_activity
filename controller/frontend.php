<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts()
{
    $postManager = new \dbourni\blog2\model\PostManager();
    $posts = $postManager->getPosts();

    require('view\frontend\listPostsView.php');
}

function post()
{
    $postManager = new \dbourni\blog2\model\PostManager();
    $commentManager = new \dbourni\blog2\model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view\frontend\postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new \dbourni\blog2\model\CommentManager();
    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function modifyComment($commentId)
{
    $commentManager = new \dbourni\blog2\model\CommentManager();

    $comment = $commentManager->getComment($_GET['id']);

    require('view\frontend\commentView.php');
}

function updateComment($commentId, $author, $comment, $post_id)
{
    $commentManager = new \dbourni\blog2\model\CommentManager();
    $affectedLines = $commentManager->updateComment($author, $comment, $commentId);

    if ($affectedLines === false) {
        throw new Exception('Impossible de modifier le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $post_id);
    }
}