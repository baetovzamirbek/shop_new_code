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
            <h1 class="m-5">Sign up</h1>
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email_s" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password_s" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">First name</label>
                    <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First name">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Last name</label>
                    <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last name">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div>
            <a href="/account">Login</a>
        </div>
    </div>
@endsection
