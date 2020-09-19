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
        <div class="btn-group mb-5" style="margin-top: 20px;">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                Продукт
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="/admin/add">Добавить продукт</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/admin">Главная</a>
            </div>
        </div>

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Photo</th>
                <th scope="col">Price</th>
                <th scope="col">Decription</th>
                <th scope="col">#</th>
                <th scope="col">#</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($data as $key => $product)
                <tr>
                    <th scope="row">{{ $key+1 }}</th>
                    <td>{{ $product->name }}</td>
                    <td>
                        @if ($product->image)
                            <img src="{{url($product->image)}}" alt="Image"/>
                        @else
                            <img src="{{url('/images/noimage.jpg')}}" alt="Image"/>
                        @endif
                    </td>
                    <td>$ {{ $product->price }}</td>
                    <td>
                        <div class="table-description">{{ $product->description }}</div>
                    </td>
                    <td id="edit-product" class="edit-product" onclick="editProduct({{ $product->id }})">Edit</td>
                    <td id="edit-product" class="edit-product" onclick="deleteProduct({{ $product->id }})">Delete</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <h4 class="mt-5">Редактирование продукта</h4>
        <span class="float-right close-btn">Закрыть</span>
        <form class="mt-4" action="/admin/edit" method="post" required enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputEmail1">Название продукта</label>
                <input type="text" name="edit_product_name" id="edit_product_name" class="form-control"
                       placeholder="Название продукта">
                <br>
                <label for="exampleInputEmail1">Цена продукта</label>
                <input type="number" name="edit_product_price" id="edit_product_price" class="form-control"
                       placeholder="Цена продукта">
                <br>
                <img id="edit_product_image" src="{{url('/images/noimage.jpg')}}" alt="Image"/>
                <input type="file" id="file-edit-product" name="edit_file_image" class="form-control" accept="image/gif, image/jpeg, image/png" onchange="readURL(this);" />
                <div class="text-muted activity-btn ml-4" onclick="resetFile();">Удалить</div>
                <br><br>
                <label for="exampleInputEmail1">Описание</label>
                <textarea id="edit_product_description" name="edit_product_description" rows="4" cols="50"
                          placeholder="Описание"></textarea>
                <small class="form-text text-muted">Testing mode</small>
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <input type="hidden" id="productId" name="productId" value="">
                <input type="hidden" id="originalImage" name="originalImage" value="">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
