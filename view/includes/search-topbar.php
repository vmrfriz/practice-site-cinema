<div class="topbar-filter">
    <p>Шукати <span><?=number_format($this->movies_count, 0, '.', ' ') ?> <?=($this->movies_count <= 1 ? 'movie' : 'movies') ?></span> всього</p>

    <div class="pagination2">

    <span>Сторінка <?=$this->current_page ?> of <?=$this->pages_count ?>:</span>

    <?php if ($this->current_page > 1): ?>
        <?php
            $params = $_GET;
            $params['page'] = $this->current_page - 1;
        ?>
        <a href="/movies/?<?=http_build_query($params) ?>"><i class="ion-arrow-left-b"></i></a>
    <?php endif; ?>

    <?php for ($page = 1; $page <= $this->pages_count; $page++): ?>
    <?php if ($page != 1 && $page != $this->pages_count && ($page > $this->current_page + 4 || $page < $this->current_page - 4)) continue; ?>
    <?php if ($page == $this->current_page): ?>
        <a class="active" href="#"><?=$page ?></a>
    <?php else: ?>
        <?php
            $params = $_GET;
            $params['page'] = $page;
        ?>
        <a href="/movies/?<?=http_build_query($params) ?>"><?=$page ?></a>
    <?php endif; ?>

    <?php endfor; ?>

    <?php if ($this->current_page < $this->pages_count): ?>
        <?php
            $params = $_GET;
            $params['page'] = $this->current_page + 1;
        ?>
        <a href="/movies/?<?=http_build_query($params) ?>"><i class="ion-arrow-right-b"></i></a>
    <?php endif; ?>

    </div>
</div>