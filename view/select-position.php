<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Бронювання місць на фільм <?=$this->movie->name ?></title>

    <link rel="stylesheet" href="/css/select-position.css">
</head>
<body>
    <h2 class="text-center">Бронювання квитків</h2>
    <div class="hall-container">

        <form action="/order/<?=$this->session->id ?>" id="reservation" method="POST">
            <input type="hidden" id="order" name="order" value="">
            <p>Фільм: <?=$this->movie->name ?></p>
            <p>
                Сеанс:
                <select name="session_id" id="session_id">
                <?php foreach ($this->sessions as $session): ?>
                    <option value="<?=$session->id ?>" <?=($session == $this->current_session ? 'selected="selected"' : '')?>><?=date('d.m.Y H:i', $session->started_at) ?></option>
                <?php endforeach; ?>
                </select>
            </p>
            <div>
                Місця:
                <ul id="positions" class="session-ul"></ul>
            </div>
            <p>Ваш телефон: <input type="tel" name="phone" class="phone" value="" maxlength="13" placeholder="+380951234567" required="required">
        </form>

        <div class="hall-screen">[екран]</div>

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

    <div class="order-container">
        <button type="submit" form="reservation" id="reserve-btn" class="btn" disabled="disabled">Забронювати</button>
    </div>

    <script src="/js/select-position.js"></script>
</body>
</html>