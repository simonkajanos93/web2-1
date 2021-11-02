<?php require APPROOT . '/views/inc/header.php'; ?>
  <?php flash('post_message'); ?>
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="pb-3 mb-4 font-italic border-bottom">
                            Hírek
                        </h3>
                    </div>
                    <div class="col-md-4">
                        <?php if(isLoggedIn()): ?>
                        <a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-primary pull-right">
                            <i class="fa fa-pencil"></i> Új hír
                        </a>
                        <?php endif; ?>
                    </div>
                </div>

                <?php foreach($data['posts'] as $post) : ?>
                    <div class="blog-post">
                        <h2 class="blog-post-title"><?php echo $post->title; ?></h2>
                        <p class="blog-post-meta">
                            Írta: <?php echo $post->name; ?> | Dátum: <?php echo $post->postCreated; ?>
                        </p>
                        <p><?php echo substr($post->body, 0, 300); ?>...</p>
                        <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>" class="btn btn-dark">Tovább...</a>
                    </div>
                <?php endforeach; ?>

            </div><!-- /.blog-main -->

            <?php require APPROOT . '/views/inc/aside.php'; ?>

        </div><!-- /.row -->

    </main><!-- /.container -->


<?php require APPROOT . '/views/inc/footer.php'; ?>