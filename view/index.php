<div class="slider movie-items">
	<div class="container">
		<div class="row">
	    	<div  class="slick-multiItemSlider">

			<?php foreach ($this->movies as $movie): ?>
	    		<div class="movie-item">
	    			<div class="mv-img">
	    				<a href="/movie/<?=$movie->id ?>"><img src="<?=$movie->poster ?>" alt="" width="285" height="437"></a>
	    			</div>
	    			<div class="title-in">
	    				<div class="cate">
	    					<span class="blue">
								<a href="/movie/<?=$movie->id ?>">
									<?=$movie->getGenres()[0]['title'] // TEMP ?>
								</a>
							</span>
	    				</div>
	    				<h6><a href="/movie/<?=$movie->id ?>"><?=$movie->name ?></a></h6>
	    			</div>
	    		</div>
			<?php endforeach; ?>

	    	</div>
	    </div>
	</div>
</div>
