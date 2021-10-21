<?php if(isLoggedIn()) : ?>
    <span>Bejelentkezett:
        <?php echo $_SESSION['user_last_name'] . ' ' . $_SESSION['user_first_name']; ?>
        <span class="text-blue">(<?php echo $_SESSION['user_name']?>)</span>
    </span>
    <a class="btn ml-2 btn-sm btn-outline-secondary" href="<?php echo URLROOT; ?>/users/logout">Kijelentkezés</a>
<?php else : ?>
    <a class="btn btn-sm btn-outline-secondary" href="<?php echo URLROOT; ?>/users/register">Regisztráció</a>
    <a class="btn btn-sm btn-outline-secondary ml-2" href="<?php echo URLROOT; ?>/users/login">Bejelentkezés</a>
<?php endif; ?>
