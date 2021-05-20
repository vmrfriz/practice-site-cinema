<?php

$movies = Movie::getLimit(10);

new View('index', true, compact('movies'));
