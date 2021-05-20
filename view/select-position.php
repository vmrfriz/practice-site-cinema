<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Бронирование мест на фильм <?=$this->movie->name ?></title>

    <link rel="stylesheet" href="/css/select-position.css">
</head>
<body>
    <h2 class="text-center">Выбор мест</h2>
    <div class="hall-container">

        <div class="hall-screen">[экран] <?=$this->movie->name ?></div>

        <div class="hall-seats-container">
        <?php for ($i = 1; $i < 10; $i++): ?>
            <div class="hall-row" data-row="<?=$i ?>">
                <div class="hall-seats-group">

                <?php for ($s = 1; $s <= 30; $s++): ?>
                    <?php $disabled = isset($this->reservations[$i]) && in_array($s, $this->reservations[$i]); ?>
                    <div class="hall-seat<?=$disabled ? ' reserved' : '' ?>" data-seat="<?=$s ?>"><?=$s ?></div>

                    <?php if ($s == 15): ?>
                    </div><div class="hall-seats-group">
                    <?php endif; ?>
                <?php endfor; ?>

                </div>

                <div class="hall-sears-row-number"><?=$i ?> ряд</div>
            </div>
        <?php endfor; ?>
        </div>

    </div>


    <h2 class="text-center">Бронирование мест</h2>

    <div class="order-container">
        <p>Выбраны следующие места:</p>
        <ul id="positions"></ul>
        <form action="/order/<?=$this->movie->id ?>" method="POST">
            <input type="hidden" id="order" name="order" value="">
            <p>Ваш телефон: <input type="tel" name="phone" class="phone" value="" maxlength="13" placeholder="+380951234567" required="required">
            </p>
            <button type="submit" id="reserve-btn" class="btn" disabled="disabled">Забронировать</button>
        </form>
    </div>

    <script src="/js/select-position.js"></script>
</body>
</html>