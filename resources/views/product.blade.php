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
            <h1 class="m-5">Страница продукта</h1>
        </div>

        <div class="row">
            <div class="col-4">
                @if ($product->image)
                    <img src="{{url($product->image)}}" alt="Image"/>
                @else
                    <img src="{{url('/images/noimage.jpg')}}" alt="Image"/>
                @endif
            </div>
            <div class="col-8">
                <h5> {{ $product->name }} </h5>
                <h6> $ {{ $product->price }} </h6>
                <p> {{ $product->description }} </p>
                <div class="group-buttons">
                    @if ($checkInCart == 0)
                        <span>
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-dash-square cart-btn"
                             data-btn="-" fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                            <path fill-rule="evenodd" d="M3.5 8a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                        </span>
                        <span class="cart-counter">1</span>
                        <span>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-square cart-btn"
                                 data-btn="+" fill="currentColor"><path fill-rule="evenodd"
                                                                        d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                              <path fill-rule="evenodd"
                                    d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                              <path fill-rule="evenodd"
                                    d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                            </svg>
                        </span>
                        <button type="button" class="btn btn-secondary add-to-cart-btn" data-id="{{ $product->id }}">Добавить в корзину</button>
{{--                                                <button type="button" class="btn btn-secondary add-to-cart-btn" data-id="{{ $product->id }}" data-user-id="{{ $user_id }}">Добавить в корзину</button>--}}
                    @else
                        <button type="button" class="btn btn-secondary" disabled>Уже в корзине</button>
                    @endif
                </div>
                <div class="group-buttons">
                    <button type="button" id="add-to-wishlist" class="btn btn-danger">Add to wishlist</button>
                </div>
            </div>
        </div>

        {{--            ---------------------------------------------Reviews-------}}
        <div id="ssw-widget-recommends-html" class="ssw-new-widget">
            <div class="ssw-reviews-head ssw-reviews-head-masonry">
                <div class="ssw-reviews-head-title">Customer Reviews</div>
            </div>
            <div class="ssw-row-fluid ssw-reviews-header ssw-reviews-layout-masonry">
                    <span class="ssw-span12 ssw-full-width">
                        <div class="ssw-rate-info-masonry" style="width: 376px;">
                            <div class="ssw-stars-averg">
                                <div class="ssw-stars-avg-bar">
                                    <b>5.0</b>
                                    <span>out of 5</span>
                                </div>
                                <div id="stars_avg" class="ssw-stars-avg stars-large" data-avg-rate="5.0000"
                                     data-rate-count="1">
                                    <i class="ssw-icon-star" data-value="1"></i>
                                    <i class="ssw-icon-star" data-value="2"></i>
                                    <i class="ssw-icon-star" data-value="3"></i>
                                    <i class="ssw-icon-star" data-value="4"></i>
                                    <i class="ssw-icon-star" data-value="5"></i>
                                </div>
                                <span class="ssw-rate-count">
                                    <span>1</span>review
                                </span>
                            </div>
                            <div id="ssw-review-filter-wrapper">
                                <div class="ssw-review-filter">
                                    <a href="javascript:void(0)" data-rate="5" data-review-count="1">5&nbsp;stars</a>
                                    <div class="ssw-review-bar"><div class="ssw-review-progress"
                                                                     style="width: 100%"></div></div>
                                    <span>1</span>
                                </div>
                            <div class="ssw-review-filter">
                                <a href="javascript:void(0)" data-rate="4" style="pointer-events: none;"
                                   data-review-count="0">4&nbsp;stars</a>
                                <div class="ssw-review-bar" style="pointer-events: none;"><div
                                        class="ssw-review-progress" style="width: 0%"></div></div>
                                <span>0</span>
                            </div>
                  <div class="ssw-review-filter">
                    <a href="javascript:void(0)" data-rate="3" style="pointer-events: none;" data-review-count="0">3&nbsp;stars</a>
                    <div class="ssw-review-bar" style="pointer-events: none;"><div class="ssw-review-progress"
                                                                                   style="width: 0%"></div></div>
                    <span>0</span>
                  </div>
                  <div class="ssw-review-filter">
                    <a href="javascript:void(0)" data-rate="2" style="pointer-events: none;" data-review-count="0">2&nbsp;stars</a>
                    <div class="ssw-review-bar" style="pointer-events: none;"><div class="ssw-review-progress"
                                                                                   style="width: 0%"></div></div>
                    <span>0</span>
                  </div>
                  <div class="ssw-review-filter">
                    <a href="javascript:void(0)" data-rate="1" style="pointer-events: none;" data-review-count="0">1&nbsp;star</a>
                    <div class="ssw-review-bar" style="pointer-events: none;"><div class="ssw-review-progress"
                                                                                   style="width: 0%"></div></div>
                    <span>0</span>
                  </div>
                </div>
                <div class="ssw-clearfix"></div>
              </div>
                                      <div class="ssw-clearfix"></div>
          </span>
            </div>

            <ul class="ssw-nav ssw-nav-tabs ssw-nav-masonry">
                <li class="ssw-active" data-content="#ssw-reviews-content">
                    <a href="javascript://" class="ssw-product-reviews-title">
                        Reviews<span class="ssw-reviews-count">(1)</span>
                    </a>
                </li>
                <li data-content="#ssw-questions-content" class="">
                    <a href="javascript://" class="ssw-product-comments-title">
                        Questions<span class="ssw-comments-count"></span>
                    </a>
                </li>
            </ul>
            <div id="ssw-reviews-content" class="ssw-tab-content" style="display: block;">

                <form id="review-photos-uploadForm" action="/apps/ssw/lite2/review/upload" method="post"
                      enctype="multipart/form-data"></form>
                <div class="ssw-add-btns">
                          <span class="ssw-add-recommend">
                    <a class="btn button" id="add_recommend" href="javascript:void(0);" role="button"
                       data-product-id="4568451743819">Add a review</a>
                  </span>
                    <a href="javascript:void(0);" class="ssw-ask-question-link ssw-pull-right btn button">Ask a
                        question</a>
                    <div class="ssw-clearfix"></div>
                </div>


                <div id="ssw-review-simple-html" class="ssw-row-fluid" style="display: none;">
                    <span class="ssw-span12">
{{--                        <form id="ssw-simple-add-review-form" method="post" enctype="multipart/form-data">--}}
                            <div class="ssw-control-group">
                                <div class="ssw-stars" title="Love it">
                                  <i class="ssw-icon-star-empty" data-value="1"></i>
                                  <i class="ssw-icon-star-empty" data-value="2"></i>
                                  <i class="ssw-icon-star-empty" data-value="3"></i>
                                  <i class="ssw-icon-star-empty" data-value="4"></i>
                                  <i class="ssw-icon-star-empty" data-value="5"></i>
                                </div>
                            </div>

                            <div class="ssw-control-group">
                                <input type="hidden" name="rate" value="0">
                                <textarea name="body" class="ssw-input-block-level" placeholder="Why do you recommend..." required="required" rows="4"></textarea>
                            </div>

                            <div class="ssw-control-group guest-group ">
                                <div class="ssw-review-socialconnect ssw-socialconnect-7 ssw-group1" style="display: none;">
                                    <div class="ssw-socialconnect">
                                        <div class="ssw-fbconnect">
                                            <a href="javascript://" title="Continue with Facebook">
                                                <i class="ssw-icon-facebook"></i>
                                            </a>
                                        </div>
                                        <div class="ssw-twconnect">
                                            <a href="javascript://" title="Sign-in with Twitter">
                                              <i class="ssw-icon-twitter"></i>
                                            </a>
                                        </div>
                                                                          <div class="ssw-gconnect">
                            <a href="javascript://" title="Google">
                              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px"
                                   viewBox="0 0 48 48" style="vertical-align: middle;"><g><path fill="#EA4335"
                                                                                                d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"></path><path
                                          fill="#4285F4"
                                          d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"></path><path
                                          fill="#FBBC05"
                                          d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"></path><path
                                          fill="#34A853"
                                          d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"></path><path
                                          fill="none" d="M0 0h48v48H0z"></path></g></svg>
                            </a>
                          </div>
                                                                          <div class="ssw-yconnect">
                            <a href="javascript://" title="Sign-in with Yahoo">
                              <i class="ssw-icon-yahoo"></i>
                            </a>
                          </div>
                                                                          <div class="ssw-tmconnect">
                            <a href="javascript://" title="Sign-in with Tumblr">
                              <i class="ssw-icon-tumblr"></i>
                            </a>
                          </div>
                                                                            <div class="ssw-azconnect">
                            <a href="javascript://" title="Sign-in with Amazon">
                              <i class="ssw-icon-amazon"></i>
                            </a>
                          </div>
                                                                        <div class="ssw-simple-login">
                          <a title="Sign-in with email" href="javascript://"
                             onclick="trackShopStats('login_popup_view', 'all'); ssw('#login_modal').sswModal();">
                            <i class="ssw-icon-at"></i>
                          </a>
                        </div>
                                              </div>
                        <div class="ssw-or "> -OR-</div>
                    </div>
                                                      <div class="ssw-simple-connect ssw-simple-connect-7">
                    <div class="ssw-review-input-block ssw-group1 ssw-hide">
                      <input type="email" name="email" class="ssw-input-block-level" placeholder="Your email"
                             title="Please enter your email">
                    </div>
                    <div class="ssw-review-input-block ssw-group2 ssw-hide">
                      <input type="text" name="name" class="ssw-input-block-level" placeholder="Type your name"
                             title="Please enter your name">
                    </div>
                  </div>
                                  </div>
                            <div class="ssw-control-group ssw-text-right">
                                  <div id="recommed-images">

                  </div>
                  <span class="ssw-recommend-images-file ssw-file-wrapper ssw-pull-left">
                    <a href="javascript://" title="Add photos" class="ssw-add-review-photos">
                      <input type="file" name="fileToUpload[]" accept="image/*" class="ssw-review-photos-input"
                             style="display: inline-block" multiple="multiple">
                      <i class="ssw-icon-photocam">
                      </i>
                      Add photos                    </a>
                  </span>
                              </div>
                            <input type="hidden" id="_token" value="{{ csrf_token() }}">

                              <div class="ssw-control-group ssw-text-right">
{{--                  <input type="submit" class="btn button" value="Post" data-text="Share" data-loading-text="Posting...">--}}
                  <button class="btn button button-post">Post</button>
                                  <span class="ssw-or">or</span>
                  <a href="javascript: void(0);" class="add_recommend">cancel</a>
                </div>
{{--                                                      </form>--}}
          </span>
                </div>

                <div id="recomends_list" class="ssw-recomends-list ssw-recomends-list-feed" data-filter-rate="all"
                     data-review-count="1">
                    <div class="ssw-masonry-column ssw-column-count-1">
                        <div class="ssw-item ssw-added" id="recommend_1" data-total-pages="1">
                            <a href="javascript:void(0)" class="ssw-thumb">
                                    <span title="Ops O." class="ssw-user-avatar ssw-avatar-icon ssw-img-circle"
                                          style="background-color: #f3f365">O</span> </a>
                            <a class="ssw-recommend-author" data-uid="1" href="javascript:void(0)">Ops O.</a>
                            <span class="ssw-review-sticker-title"><span>Verified Buyer</span></span>
                            <div class="ssw-review-sticker ssw-review-sticker-buyer"><i title="Verified Buyer"
                                                                                        class="ssw-icon-ok-circled">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9.8" height="7"
                                         viewBox="0 0 9.8 7">
                                        <path id="Path_96" data-name="Path 96"
                                              d="M8.5,14,5,10.635l.98-.942L8.5,12.115,13.82,7l.98.942L8.5,14Z"
                                              transform="translate(-5 -7)" fill="#fff" fill-rule="evenodd"></path>
                                    </svg>
                                </i></div>
                            <br>
                            <span class="ssw-timestamp" data-timestamp="1597899178">
      Aug 20, 2020    </span>
                            <div class="ssw-starsd">
                                <i class="ssw-icon-star"></i>
                                <i class="ssw-icon-star"></i>
                                <i class="ssw-icon-star"></i>
                                <i class="ssw-icon-star"></i>
                                <i class="ssw-icon-star"></i>
                            </div>

                            <!--    Custom form answers-->

                            <div class="ssw-text">
                                cool
                            </div>

                            <div class="ssw-review-opts">
                                <div data-rid="1" data-vote="0" data-unvote="0"
                                     class="ssw-review-helpful ssw-review-opts-right">
                                    <i class="ssw-icon-like" data-rid="1" data-answer="1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="15.61"
                                             viewBox="0 0 18 15.61">
                                            <path id="Path_2" data-name="Path 2"
                                                  d="M8.218,15.237,12.652,10.8a1.592,1.592,0,0,0,.484-1.129V1.612A1.617,1.617,0,0,0,11.523,0H4.267A1.593,1.593,0,0,0,2.816.967L.156,7.094A2.444,2.444,0,0,0,2.413,10.48h4.6L6.2,14.189a1.445,1.445,0,0,0,.322,1.129A1.247,1.247,0,0,0,8.218,15.237ZM16.36,0a1.617,1.617,0,0,0-1.612,1.612V8.062a1.612,1.612,0,0,0,3.225,0V1.612A1.617,1.617,0,0,0,16.36,0Z"
                                                  transform="translate(17.973 15.61) rotate(180)"
                                                  fill="rgba(136,136,136,0.25)"></path>
                                        </svg>
                                        <span class="ssw-review-helpful-vote-count ssw-hide">0</span>
                                    </i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="ssw-review-masonry-items" style="display: none;">
                    <div class="ssw-item ssw-added" id="recommend_1" data-total-pages="1">
                        <a href="javascript:void(0)" class="ssw-thumb">
                                <span title="Ops O." class="ssw-user-avatar ssw-avatar-icon ssw-img-circle"
                                      style="background-color: #f3f365">O</span> </a>
                        <a class="ssw-recommend-author" data-uid="1" href="javascript:void(0)">Ops O.</a>
                        <span class="ssw-review-sticker-title"><span>Verified Buyer</span></span>
                        <div class="ssw-review-sticker ssw-review-sticker-buyer"><i title="Verified Buyer"
                                                                                    class="ssw-icon-ok-circled">
                                <svg xmlns="http://www.w3.org/2000/svg" width="9.8" height="7" viewBox="0 0 9.8 7">
                                    <path id="Path_96" data-name="Path 96"
                                          d="M8.5,14,5,10.635l.98-.942L8.5,12.115,13.82,7l.98.942L8.5,14Z"
                                          transform="translate(-5 -7)" fill="#fff" fill-rule="evenodd"></path>
                                </svg>
                            </i></div>
                        <br>
                        <span class="ssw-timestamp" data-timestamp="1597899178">
      Aug 20, 2020    </span>
                        <div class="ssw-starsd">
                            <i class="ssw-icon-star"></i>
                            <i class="ssw-icon-star"></i>
                            <i class="ssw-icon-star"></i>
                            <i class="ssw-icon-star"></i>
                            <i class="ssw-icon-star"></i>
                        </div>

                        <!--    Custom form answers-->

                        <div class="ssw-text">
                            cool
                        </div>

                        <div class="ssw-review-opts">
                            <div data-rid="1" data-vote="0" data-unvote="0"
                                 class="ssw-review-helpful ssw-review-opts-right">
                                <i class="ssw-icon-like" data-rid="1" data-answer="1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="15.61"
                                         viewBox="0 0 18 15.61">
                                        <path id="Path_2" data-name="Path 2"
                                              d="M8.218,15.237,12.652,10.8a1.592,1.592,0,0,0,.484-1.129V1.612A1.617,1.617,0,0,0,11.523,0H4.267A1.593,1.593,0,0,0,2.816.967L.156,7.094A2.444,2.444,0,0,0,2.413,10.48h4.6L6.2,14.189a1.445,1.445,0,0,0,.322,1.129A1.247,1.247,0,0,0,8.218,15.237ZM16.36,0a1.617,1.617,0,0,0-1.612,1.612V8.062a1.612,1.612,0,0,0,3.225,0V1.612A1.617,1.617,0,0,0,16.36,0Z"
                                              transform="translate(17.973 15.61) rotate(180)"
                                              fill="rgba(136,136,136,0.25)"></path>
                                    </svg>
                                    <span class="ssw-review-helpful-vote-count ssw-hide">0</span>
                                </i>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="ssw-recommends-loadmore-wrapper" class="ssw-hide">
                    <div class="ssw-text-center">
                        <a id="ssw-recommends-loadmore" href="javascript://" data-page-count="1">Load more</a>
                    </div>
                    <div id="ajax-loader" style="height: 32px; text-align: center; display: none">
                        <span class="ssw-spin ssw-loader"></span>
                    </div>
                </div>


            </div>
            <!-- questions content start -->
            <div id="ssw-questions-content" class="ssw-hide ssw-tab-content" style="display: none;">
                <form class="ssw-add-question-form ssw-hide ssw-question-smaller" method="post"
                      data-buttons-count="7" style="display: none;">
                    <input type="hidden" name="product_id" value="4568451743819">
                    <div class="ssw-control-group">
                            <textarea name="question" class="ssw-input-block-level" rows="4" required="required"
                                      placeholder="Your question..."></textarea>
                    </div>
                    <div class="ssw-control-group guest-group">
                        <div class="ssw-question-socialconnect ssw-socialconnect-7 ssw-group1 ssw-hide">
                            <div class="ssw-socialconnect">
                                <div class="ssw-fbconnect">
                                    <a href="javascript://" title="Continue with Facebook">
                                        <i class="ssw-icon-facebook"></i>
                                    </a>
                                </div>
                                <div class="ssw-twconnect">
                                    <a href="javascript://" title="Sign-in with Twitter">
                                        <i class="ssw-icon-twitter"></i>
                                    </a>
                                </div>
                                <div class="ssw-gconnect">
                                    <a href="javascript://" title="Google">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="18px"
                                             height="18px" viewBox="0 0 48 48" style="vertical-align: middle;">
                                            <g>
                                                <path fill="#EA4335"
                                                      d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"></path>
                                                <path fill="#4285F4"
                                                      d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"></path>
                                                <path fill="#FBBC05"
                                                      d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"></path>
                                                <path fill="#34A853"
                                                      d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"></path>
                                                <path fill="none" d="M0 0h48v48H0z"></path>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                                <div class="ssw-yconnect">
                                    <a href="javascript://" title="Sign-in with Yahoo">
                                        <i class="ssw-icon-yahoo"></i>
                                    </a>
                                </div>
                                <div class="ssw-tmconnect">
                                    <a href="javascript://" title="Sign-in with Tumblr">
                                        <i class="ssw-icon-tumblr"></i>
                                    </a>
                                </div>
                                <div class="ssw-azconnect">
                                    <a href="javascript://" title="Sign-in with Amazon">
                                        <i class="ssw-icon-amazon"></i>
                                    </a>
                                </div>
                                <div class="ssw-simple-login">
                                    <a title="Sign-in" href="javascript://"
                                       onclick="trackShopStats('login_popup_view', 'all'); ssw('#login_modal').sswModal();">
                                        <i class="ssw-icon-at"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ssw-or"> -OR-</div>
                        </div>
                        <div class="ssw-simple-connect ssw-simple-connect-7">
                            <div class="ssw-question-input-block ssw-group1 ssw-hide">
                                <input type="email" name="email" class="ssw-input-block-level"
                                       placeholder="Your email">
                            </div>
                            <div class="ssw-question-input-block ssw-group2 ssw-hide">
                                <input type="text" name="user_name" class="ssw-input-block-level"
                                       placeholder="Type your name">
                            </div>
                        </div>
                        <div class="ssw-clearfix"></div>
                    </div>
                    <div class="ssw-control-group ssw-text-right">
                        <input type="submit" class="btn button" value="Post" data-text="Post"
                               data-loading-text="Posting..." data-pending="0">
                        <span class="ssw-or">or</span>
                        <a href="javascript: void(0);" class="ssw-ask-question-link">cancel</a>
                        <div class="ssw-clearfix"></div>
                    </div>
                </form>

                <div class="ssw-no-question">
                    If you have any questions, please drop us a line with your question.
                </div>
            </div><!-- questions content end -->
        </div>
    </div>



<div style="margin-bottom: 200px"></div>

@endsection
