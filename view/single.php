<div class="hero mv-single-hero">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
    </div>
</div>
<div class="page-single movie-single movie_single">
    <div class="container">
        <div class="row ipad-width2">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="movie-img sticky-sb">
                    <img src="<?=$this->movie->poster ?>" alt="">
                    <div class="movie-btn">
                        <?php if ($this->movie->trailer_url): ?>
                        <div class="btn-transform transform-vertical red">
                            <div><a href="#" class="item item-1 redbtn"> <i class="ion-play"></i> Дивитись треллер</a></div>
                            <div><a href="<?=$this->movie->trailer_url ?>" class="item item-2 redbtn fancybox-media hvr-grow"><i class="ion-play"></i></a></div>
                        </div>
                        <?php endif; ?>
                        <?php if (count($sessions = $this->movie->getSessions())): ?>
                        <div class="btn-transform transform-vertical">
                            <div><a href="/select/<?=$sessions[0]->id ?>" class="item item-1 yellowbtn"> <i class="ion-card"></i> Бронювати квиток</a></div>
                            <div><a href="/select/<?=$sessions[0]->id ?>" class="item item-2 yellowbtn"><i class="ion-card"></i></a></div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="movie-single-ct main-content">
                    <h1 class="bd-hd"><?=$this->movie->name ?> <span><?=date('Y', strtotime($this->movie->release_date)) ?></span></h1>
                    <div class="movie-tabs">
                        <div class="tabs">
                            <ul class="tab-links tabs-mv">
                                <li class="active"><a href="#overview">Огляд</a></li>
                                <li><a href="#cast">  Скдал та актори </a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="overview" class="tab active">
                                    <div class="row">
                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                            <p><?=$this->movie->description ?></p>
                                        </div>
                                        <div class="col-md-4 col-xs-12 col-sm-12">
                                            <div class="sb-it">
                                                <h6>Директор: </h6>
                                                <p><a href="/movies/?director=<?=$this->movie->director->id ?>"><?=$this->movie->director->name ?></a></p>
                                            </div>
                                            <?php if ($genres = $this->movie->getGenres()): ?>
                                            <div class="sb-it">
                                                <h6>Жанри:</h6>
                                                <p>
                                                <?php
                                                    $first = true;
                                                    $genres_text = '';
                                                    foreach ($genres as $genre) {
                                                        $genres_text .= ($first ? '': ', ') . '<a href="/movies/?genres[]='.$genre['id'].'">'.$genre['title'].'</a>';
                                                        $first = false;
                                                    }
                                                    echo $genres_text;
                                                ?>
                                                </p>
                                            </div>
                                            <?php endif; ?>
                                            <div class="sb-it">
                                                <h6>Дата виходу:</h6>
                                                <p><?=$this->movie->release_date ?></p>
                                            </div>
                                            <div class="sb-it">
                                                <h6>Тривалість:</h6>
                                                <p><?=$this->movie->duration ?> min</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="cast" class="tab">
                                    <div class="row">
                                        <?php if ($this->movie->director): ?>
                                        <div class="title-hd-sm">
                                            <h4>Автори та продюсери</h4>
                                        </div>
                                        <div class="mvcast-item">
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <h4><?=$this->movie->director->getInitials() ?></h4>
                                                    <a href="/movies/?director=<?=$this->movie->director->id ?>"><?=$this->movie->director->name ?></a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <!-- //== -->

                                        <?php if ($this->movie->actors): ?>
                                        <div class="title-hd-sm">
                                            <h4>Склад команди</h4>
                                        </div>
                                        <div class="mvcast-item">
                                            <?php foreach ($this->movie->actors as $actor): ?>
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <?php if ($actor->photo): ?>
                                                    <img src="<?=$actor->photo ?>" alt="">
                                                    <?php else: ?>
                                                    <h4><?=$actor->getInitials() ?></h4>
                                                    <?php endif; ?>
                                                    <a href="/movies/?actor=<?=$actor->id ?>"><?=$actor->name ?></a>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
