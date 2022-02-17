USE yeticave;

INSERT INTO categories SET name='Доски и лыжи', created_at=NOW(), updated_at=NOW();
INSERT INTO categories SET name='Крепления', created_at=NOW(), updated_at=NOW();
INSERT INTO categories SET name='Ботинки', created_at=NOW(), updated_at=NOW();
INSERT INTO categories SET name='Одежда', created_at=NOW(), updated_at=NOW();
INSERT INTO categories SET name='Инструменты', created_at=NOW(), updated_at=NOW();
INSERT INTO categories SET name='Разное', created_at=NOW(), updated_at=NOW();

INSERT INTO users SET email='ignat.v@gmail.com', name='Игнат', password='$2y$10$OqvsKHQwr0Wk6FMZDoHo1uHoXd4UdxJG/5UDtUiie00XaxMHrW8ka', avatar='img/user.jpg', created_at=NOW(), updated_at=NOW();
INSERT INTO users SET email='kitty_93@li.ru', name='Леночка', password='$2y$10$bWtSjUhwgggtxrnJ7rxmIe63ABubHQs0AS0hgnOo41IEdMHkYoSVa', avatar='img/user.jpg', created_at=NOW(), updated_at=NOW();
INSERT INTO users SET email='warrior07@mail.ru', name='Руслан', password='$2y$10$2OxpEH7narYpkOT1H5cApezuzh10tZEEQ2axgFOaKW.55LxIJBgWW', avatar='img/user.jpg', created_at=NOW(), updated_at=NOW();

INSERT INTO lots SET owner_id='1', category_id='1', name='2014 Rossignol District Snowboard', price='10999', image='img/lot-1.jpg', description='2014 Rossignol District Snowboard', is_opened='1', created_at=NOW(), updated_at=NOW();
INSERT INTO lots SET owner_id='2', category_id='1', name='DC Ply Mens 2016/2017 Snowboard', price='159999', image='img/lot-2.jpg', description='DC Ply Mens 2016/2017 Snowboard', is_opened='1', created_at=NOW(), updated_at=NOW();
INSERT INTO lots SET owner_id='3', category_id='2', name='Крепления Union Contact Pro 2015 года размер L/XL', price='8000', image='img/lot-3.jpg', description='Крепления Union Contact Pro 2015 года размер L/XL', is_opened='1', created_at=NOW(), updated_at=NOW();
INSERT INTO lots SET owner_id='1', category_id='3', name='Ботинки для сноуборда DC Mutiny Charocal', price='10999', image='img/lot-4.jpg', description='Ботинки для сноуборда DC Mutiny Charocal', is_opened='1', created_at=NOW(), updated_at=NOW();
INSERT INTO lots SET owner_id='2', category_id='4', name='Куртка для сноуборда DC Mutiny Charocal', price='7500', image='img/lot-5.jpg', description='Куртка для сноуборда DC Mutiny Charocal', is_opened='1', created_at=NOW(), updated_at=NOW();
INSERT INTO lots SET owner_id='3', category_id='6', name='Маска Oakley Canopy', price='5400', image='img/lot-6.jpg', description='Маска Oakley Canopy', is_opened='1', created_at=NOW(), updated_at=NOW();

INSERT INTO bets SET owner_id='2', lot_id='1', price='11500', created_at=NOW(), updated_at=NOW();
INSERT INTO bets SET owner_id='3', lot_id='1', price='11999', created_at=NOW(), updated_at=NOW();
INSERT INTO bets SET owner_id='1', lot_id='3', price='8100', created_at=NOW(), updated_at=NOW();
INSERT INTO bets SET owner_id='2', lot_id='3', price='8300', created_at=NOW(), updated_at=NOW();
