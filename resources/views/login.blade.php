<?php
/**
 * Created by PhpStorm.
 * User: zamir
 * Date: 2020-08-03
 * Time: 23:20
 */
?>

@extends('layout')

@section('content')
    <div class="container">
        <div class="text-center">
            <h1 class="m-5">Log in</h1>
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div>
            <a href="/account/sign">Sign up</a>
        </div>
    </div>
@endsection
