<?php
/**
 * Created by PhpStorm.
 * User: zamir
 * Date: 2020-06-20
 * Time: 16:07
 */
?>

@extends('layout')

@section('content')
    <div class="container">
        <div class="text-center">
            <h3 class="m-4">{{$login}}</h3>
            <h5>{{$first_name}} {{$last_name}}</h5>
            <a class="m-5" href="/account/logout">Logout</a>
            <h5 class="mt-5" ><a href="#" style="color: red;">My Wishlist</a></h5>
        </div>
    </div>
@endsection
