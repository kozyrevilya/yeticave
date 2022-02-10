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
        <?php $class_name = isset($errors['Наименование']) ? 'form__item--invalid' : ''; ?>
        <div class="form__item <?= $class_name; ?>">
            <label for="lot-name">Наименование</label>
            <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота" required>
            <span class="form__error">Введите наименование лота</span>
        </div>
        <?php $class_name = isset($errors['Категория']) ? 'form__item--invalid' : ''; ?>
        <div class="form__item <?= $class_name; ?>">
            <label for="category">Категория</label>
            <select id="category" name="category" required>
                <option>Выберите категорию</option>
                <option>Доски и лыжи</option>
                <option>Крепления</option>
                <option>Ботинки</option>
                <option>Одежда</option>
                <option>Инструменты</option>
                <option>Разное</option>
            </select>
            <span class="form__error">Выберите категорию</span>
        </div>
    </div>
    <?php $class_name = isset($errors['Описание']) ? 'form__item--invalid' : ''; ?>
    <div class="form__item form__item--wide <?= $class_name; ?>">
        <label for="message">Описание</label>
        <textarea id="message" name="message" placeholder="Напишите описание лота" required></textarea>
        <span class="form__error">Напишите описание лота</span>
    </div>
    <?php $class_name = isset($errors['Изображение']) ? 'form__item--invalid' : ''; ?>
    <div class="form__item form__item--file <?= $class_name; ?>"> <!-- form__item--uploaded -->
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
        <?php $class_name = isset($errors['Начальная цена']) ? 'form__item--invalid' : ''; ?>
        <div class="form__item form__item--small <?= $class_name; ?>">
            <label for="lot-rate">Начальная цена</label>
            <input id="lot-rate" type="number" name="lot-rate" placeholder="0" required>
            <span class="form__error">Введите начальную цену</span>
        </div>
        <?php $class_name = isset($errors['Шаг ставки']) ? 'form__item--invalid' : ''; ?>
        <div class="form__item form__item--small <?= $class_name; ?>">
            <label for="lot-step">Шаг ставки</label>
            <input id="lot-step" type="number" name="lot-step" placeholder="0" required>
            <span class="form__error">Введите шаг ставки</span>
        </div>
        <?php $class_name = isset($errors['Дата окончания торгов']) ? 'form__item--invalid' : ''; ?>
        <div class="form__item <?= $class_name; ?>">
            <label for="lot-date">Дата окончания торгов</label>
            <input class="form__input-date" id="lot-date" type="date" name="lot-date" required>
            <span class="form__error">Введите дату завершения торгов</span>
        </div>
    </div>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <button type="submit" class="button">Добавить лот</button>
</form>
