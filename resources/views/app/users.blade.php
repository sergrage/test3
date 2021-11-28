@extends('layouts.app')
@section('content')
    <main>
        <ul class="list-group">
            <li class="list-group-item">
                <pre>
                SELECT * FROM `users` WHERE EXIST
                (SELECT * FROM `orders` WHERE `users`.`id` = `orders`.`user_id`)</pre>
            </li>
            <li class="list-group-item">
                <pre>
                SELECT * FROM `products` WHERE EXIST
                (SELECT * FROM `catalogs` WHERE `products`.`catalog_id` = `catalogs`.`id`)</pre>
            </li>
            <li class="list-group-item">
                <pre>

                    DB::transaction(function () {
                       DB::update('update users set votes = 1');
                       DB::delete('delete from posts');
                    });
                    // Retrieve the first task
                    $users = DB::connection('mysql_external')->select('Select id from users');
                    DB::disconnect('mysql_external');
                    $task = Task::first();

                    $newTask = $task->replicate();
                    $newTask->project_id = 16; // the new project_id
                    $newTask->save();
                </pre>



            </li>
            <li class="list-group-item">
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
