<nav class="nav">
    <ul class="nav__list container">
        <li class="nav__item">
            <a href="all-lots.html">Доски и лыжи</a>
        </li>
        <li class="nav__item">
            <a href="all-lots.html">Крепления</a>
        </li>
        <li class="nav__item">
            <a href="all-lots.html">Ботинки</a>
        </li>
        <li class="nav__item">
            <a href="all-lots.html">Одежда</a>
        </li>
        <li class="nav__item">
            <a href="all-lots.html">Инструменты</a>
        </li>
        <li class="nav__item">
            <a href="all-lots.html">Разное</a>
        </li>
    </ul>
</nav>
<?php $class_name = isset($errors) && count($errors) ? 'form--invalid' : ''; ?>
<form class="form container <?= $class_name; ?>" action="../login.php" method="post"> <!-- form--invalid -->
    <h2>Вход</h2>
    <?php
        $class_name = '';
        $error_message = '';
        $value = isset($user['email']) ? $user['email'] : '';

        if (isset($errors['email'])) {
            $class_name = 'form__item--invalid';
            $error_message = $errors['email'];
        }
    ?>
    <div class="form__item <?= $class_name; ?>">
        <label for="email">E-mail*</label>
        <input id="email" type="text" name="email" placeholder="Введите e-mail" value='<?= $value; ?>' required>
        <span class="form__error"><?= $error_message; ?></span>
    </div>
    <?php
        $class_name = isset($errors['password']) ? 'form__item--invalid' : '';
        $error_message = isset($errors['password']) ? $errors['password'] : '';
    ?>
    <div class="form__item form__item--last <?= $class_name; ?>">
        <label for="password">Пароль*</label>
        <input id="password" type="password" name="password" placeholder="Введите пароль" required>
        <span class="form__error"><?= $error_message; ?></span>
    </div>
    <button type="submit" class="button">Войти</button>
</form>
