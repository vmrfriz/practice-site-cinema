<?php

$movies = Movie::getLimit(10);

new View('index', compact('movies'));
