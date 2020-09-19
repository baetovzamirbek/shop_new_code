<?php
/**
 * Created by PhpStorm.
 * User: zamir
 * Date: 2020-06-20
 * Time: 15:59
 */

?>

@extends('layout')

@section('content')
    <div class="container">
        <div class="text-center">
            <h1 class="m-5">Коллекция</h1>

            <div class="row">
                @foreach ($data as $key => $product)
                    <div class="col-2 collection-col">
                        <a href="/product/{{ $product->id }}">
                            @if ($product->image)
                                <img src="{{url($product->image)}}" alt="Image"/>
                            @else
                                <img src="{{url('/images/noimage.jpg')}}" alt="Image"/>
                            @endif
                            <h5> {{ $product->name }} </h5>
                            <h6> $ {{ $product->price }} </h6>
                        </a>
                    </div>
                    @if(($key+1) % 3 === 0 )
            </div>
            <div class="row">
                @endif
                @endforeach
            </div>
            @include('layouts.pagination', ['page' => $page, 'count' => $count])
        </div>
@endsection
