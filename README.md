## Starter Template Laravel 10

This is a starter template for Laravel 10 with included blogs, settings and FAQs sections.
The only package that is used aside standard Laravel 10 jetstream/livewire stack is spatie/laravel-permission.
It also has factories for users and blogs in order to generate them faster for testing.

## Commands to run after cloning the project

In the root of the project enter the following commands:

```
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan storage:link

```

Create database for the project and setup user/password for the database in the .env file.

After that run the following commands:

```
php artisan migrate:fresh --seed
npm run dev -- -- host 0.0.0.0
```

If you are not using the URL starter.test for the project be sure to change the URL in the .env file and in the vite.config.js file.

If you want to run the factories enter tinker with the following command:

```
php artisan tinker
```

For creating 1000 users with the user factory enter the following code in the tinker console:

```
User::factory()->count(1000)->create();
```

For creating 1000 blogs with the blog factory enter the following code in the tinker console:

```
Blog::factory()->count(1000)->create();
```

In order to exit the artisan console use the following command:

```
exit
```

## &copy; made by zlatkomajstor

## &copy; frontend made by italijance
