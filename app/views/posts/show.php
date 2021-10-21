<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('comments_message'); ?>
    <a href="<?php echo URLROOT; ?>/posts" class="btn btn-light">
        <i class="fa fa-arrow-left"></i> Vissza</a>
    <div class="news-header">
        <h1><?php echo $data['post']->title; ?></h1>
        <?php if ($data['ownPost']) : ?>
            <div>
                <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>"
                   class="btn btn-dark mr-1">Szerkeszt
                </a>
                <form class="pull-right" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>"
                      method="post">
                    <input type="submit" value="Töröl" class="btn btn-danger">
                </form>
            </div>

        <?php endif; ?>
    </div>

    <div class="bg-secondary text-white p-2 mb-5">
        Írta: <?php echo $data['user']->name; ?> | Dátum: <?php echo $data['post']->created_at; ?>
    </div>
    <p><?php echo $data['post']->body; ?></p>

<?php if (isLoggedIn()) : ?>
    <div id="comments-section">
        <h5>Vélemények:</h5>
        <hr>
        <?php if (count($data['comments'])) : ?>
            <?php foreach ($data['comments'] as $comment) : ?>
                <section>
                    <p class="comment-writer">
                        <?php echo $comment->userName; ?> | Ekkor: <?php echo $comment->created_at; ?>
                    </p>
                    <p class="comment-content"><?php echo $comment->comment; ?></p>

                </section>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="comment-no-comment">Legyél te az első aki véleményt ír!</p>
        <?php endif; ?>
        <hr>
    </div>
    <div id="comments-write-comment">
        <form action="<?php echo URLROOT; ?>/posts/comment/<?php echo $data['post']->id; ?>"
              method="post">
            <div class="form-group">
                <label for="comment">Új vélemény: <sup>*</sup></label>
                <textarea name="comment" class="form-control form-control-lg"></textarea>
            </div>
            <input type="submit" value="Küldés" class="btn btn-primary">
        </form>
    </div>
    <hr>
<?php endif; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>