<?php require APPROOT . '/views/inc/header.php'; ?>

<div>
    <p>Telepített szoftverek lekérése egy gépen: </p>
    <form method="POST">
        <input type="number" name="gepid" placeholder="Gép azonosító">
        <button type="submit">Küldés</button>
    </form>
    <hr>
    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') : ?>
        <?php if ($data['computers']): ?>
        <ul>
            <li>Azonosító: <?=$data['computers'][0]->gepid?></li>
            <li>Típus: <?=$data['computers'][0]->tipus?></li>
            <li>Hely: <?=$data['computers'][0]->hely?></li>
            <li>IP Cím: <?=$data['computers'][0]->ipcim?></li>
        </ul>
        <hr>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Név</th>
                        <th>Kategória</th>
                        <th>Verzió</th>
                    </tr>
                    </thead>
                    <?php  foreach($data['computers'] as $row): ?>
                        <tr>
                            <td><?=$row->nev?></td>
                            <td><?=$row->kategoria?></td>
                            <td><?=$row->verzio?></td>
                        </tr>
                    <?php endforeach;?>
                </table>
            </div>

        <?php else: ?>
        <div>Nincs ilyen azonosítójú számítógép</div>
        <hr>
        <?php endif;?>
    <?php endif;?>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
