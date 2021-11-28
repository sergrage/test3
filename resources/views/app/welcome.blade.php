@extends('layouts.app')
@section('content')
<main>
    <div class="">
        <h1>Тестовое задание Laravel/Vue</h1>
    </div>
    <div class="row pt-5">
        <div class="col-4 border">
            <h5 class="py-3">Задание 1. Поиск сотрудника.</h5>
            <workers-component></workers-component>
        </div>
        <div class="col-8 border">
            <h5 class="py-3">Задание 2. Временные интервалы.</h5>
            <intervals-component></intervals-component>
         </div>
        <div class="col-12 border">
            <h5 class="py-3">Задание 3. Работа с перевозчиками.</h5>
            <carriers-component></carriers-component>
        </div>
    </div>
</main>
@endsection
