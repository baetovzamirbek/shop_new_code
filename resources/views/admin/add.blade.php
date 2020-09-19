<?php
/**
 * Created by PhpStorm.
 * User: zamir
 * Date: 2020-07-26
 * Time: 21:54
 */
?>

@extends('layout')

@section('content')
    <div class="container">
        <div class="btn-group" style="margin-top: 20px;">
            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Продукт
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="/admin/edit">Изменить/Удалить продукт</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/admin">Главная</a>
            </div>
        </div>

        <h4 class="mt-5">Добавление продукта</h4>
        <form class="mt-4" action="/admin/add" method="post" required enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputEmail1">Название продукта</label>
                <input type="text" name="product_name" class="form-control" placeholder="Название продукта">
                <br>
                <label for="exampleInputEmail1">Цена продукта</label>
                <input type="number" name="product_price" class="form-control" placeholder="Цена продукта">
                <br>
                <img id="product_image" class="mb-4" src="{{url('/images/noimage.jpg')}}" alt="Image"/>
                <input type="file" name="file_image" class="form-control" accept="image/gif, image/jpeg, image/png" onchange="readURL(this);" />
                <br><br>
                <label for="exampleInputEmail1">Описание</label>
                <textarea id="w3review" name="product_description" rows="4" cols="50" placeholder="Описание"></textarea>
                <small class="form-text text-muted">Testing mode</small>
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            </div>
            <button type="submit" class="btn btn-primary">Ok</button>
        </form>

    </div>
@endsection
