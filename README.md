Install Symfony (http://symfony.com/doc/current/book/installation.html)

sudo curl -LsS http://symfony.com/installer -o /usr/local/bin/symfony
sudo chmod a+x /usr/local/bin/symfony

Installing a Symfony Project
symfony new vide-fetch lts

Or Installing a Symfony Project with composer
composer create-project symfony/framework-standard-edition video-fetch-wc


No need to run the project but it's possible with:
cd video-fetch-wc/
php app/console server:run

An browse is at: 127.0.0.1:8000

We need a database:
- Create the database called video-fetch
- Create an user video-fetch
- Create the table videos width the columns: id, fetch_date, labels, name, url 
In the mysql console (or client):

    CREATE TABLE  `video-fetch`.`videos` (
    `id` INT NOT NULL ,
    `fetch_date` DATETIME NOT NULL ,
    `labels` VARCHAR( 255 ) NOT NULL ,
    `name` VARCHAR( 255 ) NOT NULL ,
    `url` VARCHAR( 255 ) NOT NULL
    ) ENGINE = INNODB;

CREATE USER 'video-fetch'@'localhost' IDENTIFIED BY 'video-fetch-password';
use video-fetch;
GRANT ALL PRIVILEGES ON `video-fetch`.* TO 'video-fetch'@'localhost';
Just in case (clear cache): 
php app/console cache:clear --env=prod
Test environment:
php app/console doctrine:ensure-production-settings --env=prod

Updating composer
sudo composer self-update

Updating project
composer update

Execute the command:
php app/console App:VideoCommand

How to ask for help:
php app/console help App:VideoCommand

How to use the command:
php app/console App:VideoCommand -d '../feed-exports' -S 'glorf'
php app/console App:VideoCommand -d '../feed-exports' -S 'flub'

For the future, in order to use an URL, it's also posible get the file from the URL using file_get_contents or with CURL, in both cases it's just a little change

Run the test:
phpunit -c app src/AppBundle/Tests/Command/VideoCommandTest.php

What would you have done differently if you had had more time.
- I would add more columns y the video table, I also would think in separate labels to another table to make easier search in the future
- I would like to install Cassandra and try something like this: https://github.com/amigos-del-rigor/ADRCassandraBundle
- I would create a migration to have the database and table
- I would remove the Bundles which are installed by composer install from the repository (there are just available using composer install after clone the repo)


I dind't create commands before this one, and I didn't create tests commands before this.
