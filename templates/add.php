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
<form class="form form--add-lot container <?= $class_name; ?>" action="../add.php" method="post">
    <h2>Добавление лота</h2>
    <div class="form__container-two">
        <?php
            $class_name = '';
            $error_message = '';
            $value = isset($lot['lot-name']) ? $lot['lot-name'] : '';

            if (isset($errors['lot-name'])) {
                $class_name = 'form__item--invalid';
                $error_message = $errors['lot-name'];
            }
        ?>
        <div class="form__item <?= $class_name; ?>">
            <label for="lot-name">Наименование</label>
            <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота" value="<?= $value; ?>" required>
            <span class="form__error"><?= $error_message; ?></span>
        </div>
        <?php
            $class_name = '';
            $error_message = '';
            $selected = isset($lot['category']) ? $lot['category'] : 'Выберите категорию';
            $categories_options = ['Выберите категорию', 'Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'];

            if (isset($errors['category'])) {
                $class_name = 'form__item--invalid';
                $error_message = $errors['category'];
            }
        ?>
        <div class="form__item <?= $class_name; ?>">
            <label for="category">Категория</label>
            <select id="category" name="category" value="<?= $value; ?>" required>
                <?php foreach ($categories_options as $option): ?>
                    <?php if ($option == $selected): ?>
                        <option selected="selected"><?= $option; ?></option>
                    <?php else: ?>
                        <option><?= $option; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
            <span class="form__error"><?= $error_message; ?></span>
        </div>
    </div>
    <?php
        $class_name = '';
        $error_message = '';
        $value = isset($lot['message']) ? $lot['message'] : '';

        if (isset($errors['message'])) {
            $class_name = 'form__item--invalid';
            $error_message = $errors['message'];
        }
    ?>
    <div class="form__item form__item--wide <?= $class_name; ?>">
        <label for="message">Описание</label>
        <textarea id="message" name="message" placeholder="Напишите описание лота" required><?= $value; ?></textarea>
        <span class="form__error"><?= $error_message; ?></span>
    </div>
    <div class="form__item form__item--file"> <!-- form__item--uploaded -->
        <label>Изображение</label>
        <div class="preview">
            <button class="preview__remove" type="button">x</button>
            <div class="preview__img">
                <img src="img/avatar.jpg" width="113" height="113" alt="Изображение лота">
            </div>
        </div>
        <div class="form__input-file">
            <input class="visually-hidden" type="file" id="photo2" name="photo" value="">
            <label for="photo2">
                <span>+ Добавить</span>
            </label>
        </div>
    </div>
    <div class="form__container-three">
        <?php
            $class_name = '';
            $error_message = '';
            $value = isset($lot['lot-rate']) ? $lot['lot-rate'] : '';

            if (isset($errors['lot-rate'])) {
                $class_name = 'form__item--invalid';
                $error_message = $errors['lot-rate'];
            }
        ?>
        <div class="form__item form__item--small <?= $class_name; ?>">
            <label for="lot-rate">Начальная цена</label>
            <input id="lot-rate" type="number" name="lot-rate" placeholder="0" value="<?= $value; ?>" required>
            <span class="form__error"><?= $error_message; ?></span>
        </div>
        <?php
            $class_name = '';
            $error_message = '';
            $value = isset($lot['lot-step']) ? $lot['lot-step'] : '';

            if (isset($errors['lot-step'])) {
                $class_name = 'form__item--invalid';
                $error_message = $errors['lot-step'];
            }
        ?>
        <div class="form__item form__item--small <?= $class_name; ?>">
            <label for="lot-step">Шаг ставки</label>
            <input id="lot-step" type="number" name="lot-step" placeholder="0" value="<?= $value; ?>" required>
            <span class="form__error"><?= $error_message; ?></span>
        </div>
        <?php
            $class_name = '';
            $error_message = '';
            $value = isset($lot['lot-date']) ? $lot['lot-date'] : '';

            if (isset($errors['lot-date'])) {
                $class_name = 'form__item--invalid';
                $error_message = $errors['lot-date'];
            }
        ?>
        <div class="form__item <?= $class_name; ?>">
            <label for="lot-date">Дата окончания торгов</label>
            <input class="form__input-date" id="lot-date" type="date" name="lot-date" value="<?= $value; ?>" required>
            <span class="form__error"><?= $error_message; ?></span>
        </div>
    </div>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <button type="submit" class="button">Добавить лот</button>
</form>
