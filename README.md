
# Evaluation symfony

## Installation
    git clone 
    symfony server:start -d
    symfony console doctrine:database:create
    symfony console make:migration
    symfony console doctrine:migrations:migrate
    symfony console doctrine:fixtures:load

    then 
        register a new user
        or login with email : admin@test.com and password: admin1

    


## sources :
    https://symfony.com/doc/current/doctrine/registration_form.html

    make:registration-form
    (I cheched no for email verification for practical reasons)

    https://stackoverflow.com/questions/6734821/how-to-set-a-class-attribute-to-a-symfony2-form-input
    class on input
#todo
templtes
routes
