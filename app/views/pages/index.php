<?php require APPROOT . '/views/inc/header.php'; ?>
<main role="main" class="container">
    <div class="row">
        <div class="col-md-8 pages-main">
            <h1><?php echo $data['title']; ?></h1>
            <p><?php echo $data['description']; ?></p>
            <p class="text-justify">
                Cégünk vállalja kis-, közép- és nagyvállalatok szoftvereinek telepítését <br>
                és azok menedzselését akár távoli hozzáféréssel. A 24 órás ügyeletnek köszönhetően <br>
                kollégánk felveszi Önnel a kapcsolatot a hiba bejelentését követően azonnal.
            </p>
            <img class="d-block mx-auto mt-5 mb-5" width="50%" src="<?php echo URLROOT; ?>/img/lagos-techie-IgUR1iX0mqM-unsplash.jpg" alt="">
            <p class="text-justify">
                A vírusvédelem sem okozhat gondot ha a Soft-Inventory Kft-t választja! <br>
                Központi szervereinkről a megjelenés időpontjában megkapja a védettséget <br>
                a legújabb fenyegetések ellen.
            </p>
            <img class="d-block mx-auto mt-5 mb-3" width="50%" src="<?php echo URLROOT; ?>/img/azamat-e-FP_N_InBPdg-unsplash.jpg" alt="">
        </div>
        <?php require APPROOT . '/views/inc/aside.php'; ?>
    </div>

</main>


<?php require APPROOT . '/views/inc/footer.php'; ?>
