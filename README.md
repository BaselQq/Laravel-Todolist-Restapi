# Frontend in React:
https://github.com/BaselQq/react_todolist_frontend

# Important RestAPI Endpoints:
```bash
php artisan route::list
```

POST            api/login .................... Auth\UserAuthController@login
POST            api/register .............. Auth\UserAuthController@register
GET|HEAD        api/todos .............. todos.index › TodosController@index
POST            api/todos .............. todos.store › TodosController@store
GET|HEAD        api/todos/{todo} ......... todos.show › TodosController@show
PUT|PATCH       api/todos/{todo} ..... todos.update › TodosController@update
DELETE          api/todos/{todo} ... todos.destroy › TodosController@destroy


# Install
```bash
composer install
```

```bash
cp .env.example .env
```

```bash
php artisan migrate
```

```bash
php artisan config:clear
```

```bash
php artisan config:cache
```

and Enjoy!
```bash
php artisan serve
```

# Ressource - Article
https://blog.logrocket.com/laravel-passport-a-tutorial-and-example-build/

## Dockerizing the rest api app
https://www.udemy.com/course/docker-kubernetes-the-practical-guide/learn/lecture/22167164#overview
