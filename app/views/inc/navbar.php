<div class="container">
<header class="blog-header py-3">
    <div class="row flex-wrap justify-content-between align-items-center">
        <div class="col-12 col-md-3 text-center">
            <a class="blog-header-logo text-dark" href="#">
                <h3><?php echo SITENAME; ?></h3>
            </a>
        </div>
        <div class="col-12 col-md-4 text-center">
        </div>
        <div id="logged-in-user" class="col-12 col-md-5 d-flex justify-content-end align-items-center">
            <?php require APPROOT . '/views/inc/nav_user_details.php'; ?>
        </div>
    </div>
</header>
<div class="nav-scroller py-1 mb-5">
    <nav id="page-main-nav" class="nav d-flex justify-content-between mw-30">
        <a class="p-2 text-muted" href="<?php echo URLROOT; ?>">Főoldal</a>
        <a class="p-2 text-muted" href="<?php echo URLROOT; ?>/posts">Hírek</a>
        <a class="p-2 text-muted" href="<?php echo URLROOT; ?>/pages/mnb">MNB</a>
        <a class="p-2 text-muted"href="<?php echo URLROOT; ?>/inventories">SOAP</a>
    </nav>
</div>