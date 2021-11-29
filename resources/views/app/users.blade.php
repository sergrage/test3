@extends('layouts.app')
@section('content')
    <main>
        <ul class="list-group">
            <li class="list-group-item">
                <h5>Средствами Laravel</h5>
                <pre>
                $users = User::whereHas('orders')->get();
                </pre>
                <h5>SQL</h5>
                <pre>
                select * from `users` where exists (select * from `orders` where `users`.`id` = `orders`.`user_id`)
                </pre>
            </li>
            <li class="list-group-item">
                <h5>Средствами Laravel</h5>
                <pre>
                $products = Product::whereHas('catalog')->get();
                </pre>
                <h5>SQL</h5>
                <pre>
                select * from `products` where exists (select * from `catalogs` where `products`.`catalog_id` = `catalogs`.`id`)
                </pre>
            </li>
            <li class="list-group-item">
                <h3 style="color:#dc3545;">Тут до конца разобраться не успел. Пока только наметки</h3>
                <h5>Средствами Laravel</h5>
                <pre>
                DB::transaction(function () {
                    $user = DB("shop")->table("users")->select("SELECT * from users WHERE id=1");
                    DB("sample")->table("users")->insert(get_object_vars($user));
                 });
                </pre>
            </li>
            <li class="list-group-item">
                <h5>Средствами Laravel</h5>
                <pre>
                Используется Raw Expressions (https://laravel.com/docs/8.x/queries#raw-expressions), сам запрос не меняется
                DB::raw('SELECT .....')
                </pre>
                <h5>SQL</h5>
                <pre>
                SELECT name AS UserName
                FROM users AS usr
                JOIN orders AS ord
                ON ord.user_id = usr.id
                WHERE TIMESTAMPDIFF(YEAR, usr.birthday_at, CURDATE()) > 30
                AND ord.created_at >= DATE_ADD(LAST_DAY(DATE_SUB(CURDATE(), INTERVAL 3+1 MONTH)), INTERVAL 1 DAY)
                GROUP BY usr.name
                HAVING COUNT(ord.id) >= 3
                LIMIT 1</pre>
            </li>
         </ul>
    </main>
@endsection
