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
<form class="form container <?= $class_name; ?>" action="../sign-up.php" method="post" enctype="multipart/form-data"> <!-- form--invalid -->
    <h2>Регистрация нового аккаунта</h2>
    <?php
        $class_name = '';
        $error_message = '';
        $value = isset($form['email']) ? $form['email'] : '';

        if (isset($errors['email'])) {
            $class_name = 'form__item--invalid';
            $error_message = $errors['email'];
        }
    ?>
    <div class="form__item <?= $class_name; ?>"> <!-- form__item--invalid -->
        <label for="email">E-mail*</label>
        <input id="email" type="text" name="email" placeholder="Введите e-mail" value="<?= $value; ?>" required>
        <span class="form__error"><?= $error_message; ?></span>
    </div>
    <?php
        $class_name = isset($errors['password']) ? 'form__item--invalid' : '';
        $error_message = isset($errors['password']) ? $errors['password'] : '';
    ?>
    <div class="form__item <?= $class_name; ?>">
        <label for="password">Пароль*</label>
        <input id="password" type="text" name="password" placeholder="Введите пароль" required>
        <span class="form__error"><?= $error_message; ?></span>
    </div>
    <?php
        $class_name = '';
        $error_message = '';
        $value = isset($form['name']) ? $form['name'] : '';

        if (isset($errors['name'])) {
            $class_name = 'form__item--invalid';
            $error_message = $errors['name'];
        }
    ?>
    <div class="form__item <?= $class_name; ?>">
        <label for="name">Имя*</label>
        <input id="name" type="text" name="name" placeholder="Введите имя" value="<?= $value; ?>" required>
        <span class="form__error"><?= $error_message; ?></span>
    </div>
    <?php
        $class_name = '';
        $error_message = '';
        $value = isset($form['contacts']) ? $form['contacts'] : '';

        if (isset($errors['contacts'])) {
            $class_name = 'form__item--invalid';
            $error_message = $errors['contacts'];
        }
    ?>
    <div class="form__item <?= $class_name; ?>">
        <label for="contacts">Контактные данные*</label>
        <textarea id="contacts" name="contacts" placeholder="Напишите как с вами связаться" required><?= $value; ?></textarea>
        <span class="form__error"><?= $error_message; ?></span>
    </div>
    <?php
        $class_name = '';
        $error_message = '';

        if (isset($errors['avatar'])) {
            $class_name = 'form__item--invalid';
            $error_message = $errors['avatar'];
        }
    ?>
    <div class="form__item form__item--file form__item--last <?= $class_name; ?>">
        <label>Аватар</label>
        <div class="preview">
            <button class="preview__remove" type="button">x</button>
            <div class="preview__img">
                <img src="img/avatar.jpg" width="113" height="113" alt="Ваш аватар">
            </div>
        </div>
        <div class="form__input-file">
            <input class="visually-hidden" type="file" id="photo2" name="avatar" value="">
            <label for="photo2">
                <span>+ Добавить</span>
            </label>
            <span class="form__error"><?= $error_message; ?></span>
        </div>
    </div>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <button type="submit" class="button">Зарегистрироваться</button>
    <a class="text-link" href="../login.php">Уже есть аккаунт</a>
</form>
