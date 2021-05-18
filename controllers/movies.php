<?php

$movies = Movie::getLimit(10);

new View('search', compact('movies'));
