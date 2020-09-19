<?php
/**
 * Created by PhpStorm.
 * User: zamir
 * Date: 2020-07-26
 * Time: 21:44
 */
?>

@extends('layout')

@section('content')
    <div class="container">
        <div class="mt-5">
            <h3 class="ml-5">Админская часть</h3>
        </div>
        <div class="mt-5">
            <a class="dropdown-item border" href="/admin/add">Добавить продукт</a>
            <a class="dropdown-item border" href="/admin/edit">Изменить/Удалить продукт</a>
        </div>
    </div>
@endsection
