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
            <h1 class="m-5">Корзина</h1>

            <table class="table table-borderless table-dark">
                <thead>
                <tr>
                    <th scope="col">Remove</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($cart_products as $key => $cart_product)
                <tr data-id="{{ $cart_product->product_id }}">
                    <td>
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash remove-from-cart" fill="currentColor"  data-id="{{ $cart_product->product_id }}">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </td>
                    <td>{{$cart_product->name}}</td>
                    <td>
                        <span>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-dash-square cart-btn-page" fill="currentColor" data-id="{{ $cart_product->product_id }}" data-btn="-">
                                <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                <path fill-rule="evenodd" d="M3.5 8a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                        </span>
                            <span class="cart-counter-page" data-id="{{ $cart_product->product_id }}">{{$cart_product->quantity}}</span>
                            <span>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-square cart-btn-page" fill="currentColor" data-id="{{ $cart_product->product_id }}" data-btn="+"><path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                              <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                              <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                            </svg>
                        </span>
                    </td>
                    <td class="price-{{ $cart_product->product_id }}">$ {{$cart_product->price}}</td>
                    <td class="total-{{ $cart_product->product_id }}">$ {{$cart_product->quantity * $cart_product->price}} </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="4"></td>
                    <td scope="row" class="sum">$ {{$total}} </td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>

    <script>

    </script>
@endsection
