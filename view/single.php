<div class="hero mv-single-hero">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- <h1> movie listing - list</h1>
                <ul class="breadcumb">
                    <li class="active"><a href="#">Home</a></li>
                    <li> <span class="ion-ios-arrow-right"></span> movie listing</li>
                </ul> -->
            </div>
        </div>
    </div>
</div>
<div class="page-single movie-single movie_single">
    <div class="container">
        <div class="row ipad-width2">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="movie-img sticky-sb">
                    <img src="<?=$film->poster ?>" alt="">
                    <div class="movie-btn">
                        <?php if ($film->trailer_url): ?>
                        <div class="btn-transform transform-vertical red">
                            <div><a href="#" class="item item-1 redbtn"> <i class="ion-play"></i> Watch Trailer</a></div>
                            <div><a href="<?=$film->trailer_url ?>" class="item item-2 redbtn fancybox-media hvr-grow"><i class="ion-play"></i></a></div>
                        </div>
                        <?php endif; ?>
                        <div class="btn-transform transform-vertical">
                            <div><a href="#" class="item item-1 yellowbtn"> <i class="ion-card"></i> Buy ticket</a></div>
                            <div><a href="#" class="item item-2 yellowbtn"><i class="ion-card"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="movie-single-ct main-content">
                    <h1 class="bd-hd"><?=$film->name ?> <span><?=date('Y', strtotime($film->release_date)) ?></span></h1>
                    <div class="movie-tabs">
                        <div class="tabs">
                            <ul class="tab-links tabs-mv">
                                <li class="active"><a href="#overview">Overview</a></li>
                                <li><a href="#cast">  Cast & Crew </a></li>
                                <li><a href="#media"> Media</a></li> 
                            </ul>
                            <div class="tab-content">
                                <div id="overview" class="tab active">
                                    <div class="row">
                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                            <p><?=$film->description ?></p>
                                            <div class="title-hd-sm">
                                                <h4>Videos & Photos</h4>
                                                <a href="#" class="time">All 5 Videos & 245 Photos <i class="ion-ios-arrow-right"></i></a>
                                            </div>
                                            <div class="mvsingle-item ov-item">
                                                <a class="/img-lightbox"  data-fancybox-group="gallery" href="/images/uploads/image11.jpg" ><img src="/images/uploads/image1.jpg" alt=""></a>
                                                <a class="/img-lightbox"  data-fancybox-group="gallery" href="/images/uploads/image21.jpg" ><img src="/images/uploads/image2.jpg" alt=""></a>
                                                <a class="/img-lightbox"  data-fancybox-group="gallery" href="/images/uploads/image31.jpg" ><img src="/images/uploads/image3.jpg" alt=""></a>
                                                <div class="vd-it">
                                                    <img class="vd-img" src="/images/uploads/image4.jpg" alt="">
                                                    <a class="fancybox-media hvr-grow" href="https://www.youtube.com/embed/o-0hcF97wy0"><img src="/images/uploads/play-vd.png" alt=""></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xs-12 col-sm-12">
                                            <div class="sb-it">
                                                <h6>Director: </h6>
                                                <p><a href="/director/<?=urlencode(strtolower($film->director)) ?>"><?=$film->director ?></a></p>
                                            </div>
                                            <div class="sb-it">
                                                <h6>Genres:</h6>
                                                <p><?=$genres ?></p>
                                            </div>
                                            <div class="sb-it">
                                                <h6>Release Date:</h6>
                                                <p><?=$film->release_date ?></p>
                                            </div>
                                            <div class="sb-it">
                                                <h6>Run Time:</h6>
                                                <p><?=$film->duration ?> min</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="cast" class="tab">
                                    <div class="row">
                                        <div class="title-hd-sm">
                                            <h4>Directors & Credit Writers</h4>
                                        </div>
                                        <div class="mvcast-item">
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <h4>DR</h4>
                                                    <a href="/director/<?=urlencode(strtolower($film->director))?>"><?=$film->director ?></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- //== -->
                                        <div class="title-hd-sm">
                                            <h4>Cast</h4>
                                        </div>
                                        <div class="mvcast-item">
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <img src="/images/uploads/cast1.jpg" alt="">
                                                    <a href="#">Robert Downey Jr.</a>
                                                </div>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <img src="/images/uploads/cast2.jpg" alt="">
                                                    <a href="#">Chris Hemsworth</a>
                                                </div>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <img src="/images/uploads/cast3.jpg" alt="">
                                                    <a href="#">Mark Ruffalo</a>
                                                </div>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <img src="/images/uploads/cast4.jpg" alt="">
                                                    <a href="#">Chris Evans</a>
                                                </div>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <img src="/images/uploads/cast5.jpg" alt="">
                                                    <a href="#">Scarlett Johansson</a>
                                                </div>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <img src="/images/uploads/cast6.jpg" alt="">
                                                    <a href="#">Jeremy Renner</a>
                                                </div>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <img src="/images/uploads/cast7.jpg" alt="">
                                                    <a href="#">James Spader</a>
                                                </div>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <img src="/images/uploads/cast9.jpg" alt="">
                                                    <a href="#">Don Cheadle</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div id="media" class="tab">
                                    <div class="row">
                                        <div class="title-hd-sm">
                                            <h4>Photos <span> (21)</span></h4>
                                        </div>
                                        <div class="mvsingle-item">
                                            <a class="/img-lightbox"  data-fancybox-group="gallery" href="/images/uploads/image11.jpg" ><img src="/images/uploads/image1.jpg" alt=""></a>
                                            <a class="/img-lightbox"  data-fancybox-group="gallery"  href="/images/uploads/image21.jpg" ><img src="/images/uploads/image2.jpg" alt=""></a>
                                            <a class="/img-lightbox"  data-fancybox-group="gallery" href="/images/uploads/image31.jpg" ><img src="/images/uploads/image3.jpg" alt=""></a>
                                            <a class="/img-lightbox"  data-fancybox-group="gallery" href="/images/uploads/image41.jpg" ><img src="/images/uploads/image4.jpg" alt=""></a>
                                            <a class="/img-lightbox"  data-fancybox-group="gallery" href="/images/uploads/image51.jpg" ><img src="/images/uploads/image5.jpg" alt=""></a>
                                            <a class="/img-lightbox"  data-fancybox-group="gallery" href="/images/uploads/image61.jpg" ><img src="/images/uploads/image6.jpg" alt=""></a>
                                            <a class="/img-lightbox"  data-fancybox-group="gallery" href="/images/uploads/image71.jpg" ><img src="/images/uploads/image7.jpg" alt=""></a>
                                            <a class="/img-lightbox"  data-fancybox-group="gallery" href="/images/uploads/image81.jpg" ><img src="/images/uploads/image8.jpg" alt=""></a>
                                            <a class="/img-lightbox"  data-fancybox-group="gallery" href="/images/uploads/image91.jpg" ><img src="/images/uploads/image9.jpg" alt=""></a>
                                            <a class="/img-lightbox"  data-fancybox-group="gallery" href="/images/uploads/image101.jpg" ><img src="/images/uploads/image10.jpg" alt=""></a>
                                            <a class="/img-lightbox"  data-fancybox-group="gallery" href="/images/uploads/image111.jpg" ><img src="/images/uploads/image1-1.jpg" alt=""></a>
                                            <a class="/img-lightbox"  data-fancybox-group="gallery" href="/images/uploads/image121.jpg" ><img src="/images/uploads/image12.jpg" alt=""></a>
                                            <a class="/img-lightbox"  data-fancybox-group="gallery" href="/images/uploads/image131.jpg" ><img src="/images/uploads/image13.jpg" alt=""></a>
                                            <a class="/img-lightbox"  data-fancybox-group="gallery" href="/images/uploads/image141.jpg" ><img src="/images/uploads/image14.jpg" alt=""></a>
                                            <a class="/img-lightbox"  data-fancybox-group="gallery" href="/images/uploads/image151.jpg" ><img src="/images/uploads/image15.jpg" alt=""></a>
                                            <a class="/img-lightbox"  data-fancybox-group="gallery" href="/images/uploads/image161.jpg" ><img src="/images/uploads/image16.jpg" alt=""></a>
                                            <a class="/img-lightbox"  data-fancybox-group="gallery" href="/images/uploads/image171.jpg" ><img src="/images/uploads/image17.jpg" alt=""></a>
                                            <a class="/img-lightbox"  data-fancybox-group="gallery" href="/images/uploads/image181.jpg" ><img src="/images/uploads/image18.jpg" alt=""></a>
                                            <a class="/img-lightbox"  data-fancybox-group="gallery" href="/images/uploads/image191.jpg" ><img src="/images/uploads/image19.jpg" alt=""></a>
                                            <a class="/img-lightbox"  data-fancybox-group="gallery" href="/images/uploads/image201.jpg" ><img src="/images/uploads/image20.jpg" alt=""></a>
                                            <a class="/img-lightbox"  data-fancybox-group="gallery" href="/images/uploads/image211.jpg" ><img src="/images/uploads/image2-1.jpg" alt=""></a>
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
</div>
