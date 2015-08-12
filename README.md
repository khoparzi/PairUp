PairUp app
==========

Introduction
------------

This app is a shared repo for an as-yet unfinished web application to help programmers find other programmers willing to teach a technical skill, or to collaborate on interesting projects. Users can either skills-swap in pairs, or learn from one and pay it forward to another. It will be written in PHP using the Laravel framework.

Programmers in the system will have a profile where they can rate their skill set in various areas, and which will aid other programmers searching for specific skill requirements.

General notes
-------------

All dependencies have been kept local, so there are minimal assumptions about the machine upon which this application is installed.

The repository has been called PairUp just as a working title, and this may change.

Installation instructions
-------------------------

Create a directory and get the repo:

    git clone git@github.com:Lets-Build-Something/PairUp.git
    cd PairUp

Install Composer:

    curl -sS https://getcomposer.org/installer | php

Get dependencies:

    php composer.phar install

Set encryption keys inside the app:

    php artisan key:generate

In a development version only, to see errors verbosely:

    cp .env.example .env

Now grab a copy of Selenium server. I imagine the latest from here would be fine:

    http://selenium-release.storage.googleapis.com/index.html

Here's a quick link to one that worked for me (30M in size):

    wget http://selenium-release.storage.googleapis.com/2.47/selenium-server-standalone-2.47.0.jar

On a spare console, fire it up using the following. You'll need Java installed on your system:

    java -jar selenium-server-standalone-2.47.0.jar

On another spare console, fire up an instance of the app (uses http:localhost:8000)

    php artisan serve

Or of course, create an Apache vhost on localhost:8000 (the default Laravel URL).

To run the tests, just run this shortcut:

    ./phpunit
