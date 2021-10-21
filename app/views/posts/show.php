<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>/posts" class="btn btn-light">
    <i class="fa fa-arrow-left"></i> Vissza</a>
<h1 class="mt-3"><?php echo $data['post']->title; ?></h1>
<div class="bg-secondary text-white p-2 mb-5">
  Írta: <?php echo $data['user']->name; ?> | Dátum: <?php echo $data['post']->created_at; ?>
</div>
<p><?php echo $data['post']->body; ?></p>

<?php if(isLoggedIn()) : ?>
    <div id="comments-section">
        <h5>Vélemények:</h5>
        <hr>
    <?php if(count($data['comments'])) : ?>
        <?php foreach($data['comments'] as $comment) : ?>
            <section>
                <p class="comment-writer">
                    <?php echo $comment->userName; ?> | Ekkor: <?php echo $comment->created_at; ?>
                </p>
                <p class="comment-content"><?php echo $comment->comment; ?></p>

            </section>
        <?php endforeach; ?>
        <?php else: ?>
    <p class="comment-no-comment">Egyelőre senki nem írt véleményt a hírhez</p>
    <?php endif; ?>
        </div>
  <hr>

    <?php if($data['ownPost']) : ?>
        <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>" class="btn btn-dark">Szerkeszt</a>
        <form class="pull-right" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" method="post">
    <input type="submit" value="Töröl" class="btn btn-danger">
  </form>
    <?php endif; ?>
<?php endif; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>