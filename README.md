PairUp app
==========

General notes
-------------

All dependencies have been kept local, so there are minimal assumptions about the machine upon which this application is installed.

The repository has been called PairUp just as a working title, and this may change.

Installation instructions
-------------------------

Create a directory and get the repo:

	mkdir PairUp && cd PairUp
	git clone git@github.com:Lets-Build-Something/PairUp.git

Install Composer:

    curl -sS https://getcomposer.org/installer | php

Get dependencies:

	php composer.phar install

Set encryption keys inside the app:

	php artisan key:generate

In a development version only, to see errors verbosely:

	cp .env.example .env

On a spare console, fire up an instance of the app on http:localhost:8000

	php artisan serve

Or of course, create an Apache vhost.
