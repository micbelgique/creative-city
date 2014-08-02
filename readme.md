## CreativeCity

Run in development :

    $ composer update
    $ composer install
    $ php artisan migrate:reset --force
    $ php artisan migrate --force
    $ php artisan db:seed --force
    $ php artisan serve


# Vagrant

    $ vagrant up
    $ ssh vagrant@127.0.0.1 -p 2222
    # Perform migration & al on the Vagrant server
    $ vagrant halt
