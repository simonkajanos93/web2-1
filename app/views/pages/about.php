<?php require APPROOT . '/views/inc/header.php'; ?>
<main role="main" class="container">
    <div class="row">
        <div class="col-md-8 pages-main">
            <h1><?php echo $data['title']; ?></h1>
            <p><?php echo $data['description']; ?></p>
        </div>
        <?php require APPROOT . '/views/inc/aside.php'; ?>
    </div>

</main>


<?php require APPROOT . '/views/inc/footer.php'; ?>
