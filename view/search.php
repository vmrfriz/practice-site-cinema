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

                <?php include 'includes/search-topbar.php' ?>

                <?php foreach ($this->movies as $movie): ?>
                <div class="movie-item-style-2">
                    <img src="<?=$movie->poster ?>" alt="">
                    <div class="mv-item-infor">
                        <h6><a href="/movie/<?=$movie->id ?>"><?=$movie->name ?> <span>(<?=date('Y', strtotime($movie->release_date)) ?>)</span></a></h6>
                        <p class="describe"><?=$movie->short_description ?></p>
                        <p class="run-time"> Run Time: <?=$movie->duration ?> min. <span>Release: <?=$movie->release_date ?></span></p>
                        <p>Director: <a href="/movies/?director=<?=$movie->director->id ?>"><?=$movie->director->name ?></a></p>
                        <?php if ($movie->actors): ?>
                        <p>Stars: <?=$movie->actors ?></p>
                        <?php endif ?>
                    </div>
                </div>
                <?php endforeach ?>

                <?php include 'includes/search-topbar.php' ?>

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