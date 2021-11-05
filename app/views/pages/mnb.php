<?php require APPROOT . '/views/inc/header.php'; ?>

<div>
    <form method="POST" action="">
        <div class="form-group">
            <label for="exampleFormControlInput1">Dátum</label>
            <input type="date" id="" name="startdate"
                   value="<?php echo $data['date_value']; ?>"
                   min="2010-01-01" max="<?php echo date("Y-m-d"); ?>" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Árfolyam 1:</label>
            <select name="from" id="">
                <option <?php echo $data['curr_from'] == 'EUR' ? 'selected' : '' ?> value="EUR">EUR</option>
                <option <?php echo $data['curr_from'] == 'USD' ? 'selected' : '' ?> value="USD">USD</option>
                <option <?php echo $data['curr_from'] == 'HUF' ? 'selected' : '' ?> value="HUF">HUF</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect2">Árfolyam 2:</label>
            <select name="to" id="">
                <option <?php echo $data['curr_to'] == 'EUR' ? 'selected' : '' ?> value="EUR">EUR</option>
                <option <?php echo $data['curr_to'] == 'USD' ? 'selected' : '' ?> value="USD">USD</option>
                <option <?php echo $data['curr_to'] == 'HUF' ? 'selected' : '' ?> value="HUF">HUF</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Keres</button>
    </form>

    <?php if($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
    <div>
        Eredmény: <?php echo $data['price']; ?>
    </div>
    <?php endif; ?>


</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>

