<div class="hero common-hero">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="hero-ct">
                    <h1> movie listing - list</h1>
                    <ul class="breadcumb">
                        <li class="active"><a href="/">Home</a></li>
                        <li> <span class="ion-ios-arrow-right"></span> movie listing</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-single movie_list">
    <div class="container">
        <div class="row ipad-width2">
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="topbar-filter">
                    <p>Found <span>1,608 movies</span> in total</p>
                    <label>Sort by:</label>
                    <select>
                        <option value="popularity">Popularity Descending</option>
                        <option value="popularity">Popularity Ascending</option>
                        <option value="rating">Rating Descending</option>
                        <option value="rating">Rating Ascending</option>
                        <option value="date">Release date Descending</option>
                        <option value="date">Release date Ascending</option>
                    </select>
                    <a href="movielist.html" class="list"><i class="ion-ios-list-outline active"></i></a>
                    <a href="moviegrid.html" class="grid"><i class="ion-grid"></i></a>
                </div>

                <?php foreach ($this->movies as $movie): ?>
                <div class="movie-item-style-2">
                    <img src="<?=$movie->poster ?>" alt="">
                    <div class="mv-item-infor">
                        <h6><a href="/movie/<?=$movie->id ?>"><?=$movie->name ?> <span>(<?=date('Y', strtotime($movie->release_date)) ?>)</span></a></h6>
                        <p class="describe"><?=$movie->short_description ?></p>
                        <p class="run-time"> Run Time: <?=$movie->duration ?> min. <span>Release: <?=$movie->release_date ?></span></p>
                        <p>Director: <a href="/director/<?=urlencode(strtolower($movie->director->id)) ?>"><?=$movie->director->name ?></a></p>
                        <?php if ($movie->actors): ?>
                        <p>Stars: <?=$movie->actors ?></p>
                        <?php endif ?>
                    </div>
                </div>
                <?php endforeach ?>

                <div class="topbar-filter">
                    <div class="pagination2">
                        <span>Page 1 of 2:</span>
                        <a class="active" href="#">1</a>
                        <a href="#">2</a>
                        <a href="#"><i class="ion-arrow-right-b"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="sidebar">
                    <div class="searh-form">
                        <h4 class="sb-title">Search for movie</h4>
                        <form class="form-style-1" action="/movies/">
                            <div class="row">
                                <div class="col-md-12 form-it">
                                    <label>Movie name</label>
                                    <input type="text" name="q" value="<?=$_GET['q'] ?: ''?>" placeholder="Enter keywords">
                                </div>
                                <?php if ($this->genres): ?>
                                <div class="col-md-12 form-it">
                                    <label>Genres & Subgenres</label>
                                    <div class="group-ip">
                                        <select name="genres[]" multiple="" class="ui fluid dropdown">
                                            <option value=""></option>
                                            <?php foreach ($this->genres as $genre): ?>
                                            <option value="<?=$genre->id ?>" <?php if (in_array($genre->id, $_GET['genres'] ?? [])) echo 'selected="selected"' ?>><?=$genre->title ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <div class="col-md-12 ">
                                    <input class="submit" type="submit" value="submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>