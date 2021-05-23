
# Evaluation symfony

## Installation
    git clone https://github.com/ninon69004/symfony-eval.git
    symfony server:start -d

    check your database credentials and version in .env

    symfony console doctrine:database:create
    symfony console make:migration
    symfony console doctrine:migrations:migrate
    symfony console doctrine:fixtures:load

    then 
        login with email : admin@test.com and password: admin1
        or register a new user

    I added a profile page /profile/{id}, you can find the link in the navbar by clicking on the user's name.

    


## sources :
    https://symfony.com/doc/current/doctrine/registration_form.html

    make:registration-form
    (I cheched no for email verification for practical reasons)

    https://stackoverflow.com/questions/6734821/how-to-set-a-class-attribute-to-a-symfony2-form-input
    class on input

    https://bootstrapious.com/p/bootstrap-sidebar
    side bar classes

    https://developer.mozilla.org/fr/docs/Web/CSS/::-webkit-scrollbar
    scrollbar

