<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>

<form action="index.php?action=updateComment&amp;id=<?= $comment['id'] ?>" method="post">
            <div>
                <label for="author">Auteur</label><br />
                <input type="text" id="author" name="author" value="<?= $comment['author'] ?>"/>
            </div>
            <div>
                <label for="comment">Commentaire</label><br />
                <textarea id="comment" name="comment" ><?= $comment['comment'] ?></textarea>
            </div>
            <div>
                <input id="post_id" name="post_id" type="hidden" value="<?= $comment['post_id'] ?>"/>
                <input type="submit" />
            </div>
        </form>

<?php $content = ob_get_clean(); ?>

<?php require('view\frontend\template.php'); ?>