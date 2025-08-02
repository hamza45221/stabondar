@extends('layouts.mainfrontpage')
@section('content')

    <style>
        #disclosureModal {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.823);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        .modal-custom {
            max-width: 985px;
            background-color: #fff;
            border-radius: 0;
            padding: 0px;
            margin: 100px auto;
        }

        .modal-header h2 {
            font-size: 40px;
            font-weight: 400;
            color: black;
            margin-bottom: 15px;
            line-height: 40px;
            letter-spacing: -2px;
        }

        .modal-body {
            padding: 0px 24px;
            padding-left: 55px;
        }

        .modal-body p {
            color: #555;
            margin-bottom: 30px;
        }

        .btn-accept {
            background-color: #1e2430;
            color: white;
            padding: 10px 30px;
            border: none;
            font-weight: bold;
            border-radius: 0;
        }

        .btn:hover {
            background-color: #1e2430;
            color: white;
        }


        .btn-decline {
            background: none;
            color: #6c757d;
            text-decoration: underline;
            border: none;
            margin-left: 20px;
        }

        .btn-decline:hover {
            background-color: white !important;
            color: #6c757d !important;
        }

        .disclosure-box {
            background-color: #f5f4f2;
            padding: 40px 50px;
            margin-top: 30px;
        }

        .disclosure-box p {
            margin: 0;
            color: #000;
        }

        .logo {
            text-align: right;
            font-weight: 500;
            letter-spacing: 3px;
            font-size: 25px;
            padding: 36px 55px;
            color: black;
        }

        .model-scroll {
            overflow: auto;
            height: 160px;
            padding-right: 120px;
        }

        ::-webkit-scrollbar {
            width: 3px;
        }

        ::-webkit-scrollbar-track {
            background: #f0f0f0;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #393939;
        }

        .page-content {
            display: none;
        }

        .page-content.active {
            display: block;
        }

        /* ====================== secong ========================= */

        .modal-custom-second {
            background: white;
            padding: 28px;
            width: 985px;
            height: 480px;
        }

        .modal-custom-second p {
            margin: 0;
            font-size: 13px;
            color: black;
        }

        .second-page-back-link {
            color: #3a4355;
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            background-color: white;
        }

        .second-page-back-link:hover {
            text-decoration: underline;
        }

        .second-page-title {
            font-size: 58px;
            font-weight: 500;
            margin-top: 20px;
            color: black;
            margin-bottom: 15px;
            line-height: 40px;
            letter-spacing: -2px;
        }

        .second-page-subtitle {
            font-size: 20px !important;
            color: #6c757d;
            margin-bottom: 30px;
        }

        .second-page-section-title {
            font-weight: 600;
            margin-top: 30px;
        }

        .second-page-right-align {
            text-align: right;
        }

        .second-page-logo {
            font-size: 25px;
            color: black;
            letter-spacing: 2px;
            font-weight: 500;
        }

        .second-page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0px;
        }

        p a {
            color: black;
            text-decoration: none;
        }

        p a:hover {
            color: black;
            text-decoration: underline;
        }

        .model-step-details {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-top: 40px;
        }


        .swiper {
            width: 100%;
            height: 150px;
            overflow: hidden;
        }

        .swiper-wrapper {
            transition-timing-function: linear !important;
        }

        .swiper-slide {
            width: auto;
            padding: 0 50px;
            font-size: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
            border-radius: 0;
            margin: 10px 0;
            white-space: nowrap;
        }


        @media (max-width: 768px) {
            .second-page-right-align {
                text-align: left;
            }

            .second-page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
        }

        .preloader {
            font-family: 'arialregular';
        }

        .cta {
            border: 1px solid white;
            max-width: 300px;
            padding: 5px 10px;
        }

        .cta img {
            width: 20px;
        }

    </style>


    <div id="popup" class="popup">
        <div class="popup__bg" id="popup-bg"></div>
        <div class="popup__close" id="popup-close" data-link>Close</div>
        <div class="popup__element" id="ajax-popup"></div>
    </div>


    <div id="disclosureModal" style="display: none;">
        <div class="modal-custom page-content active" id="page1">
            <div class="logo">{{ $popup->main_title }}</div>

            <div class="modal-body">
                <div class="model-scroll">
                    {!! $popup->description !!}
                </div>
                <div style="margin-top: 20px;">
                    <button class="btn btn-accept" id="acceptBtn">I Accept</button>
                    <button class="btn btn-decline" id="declineBtn">I Do Not Accept</button>
                </div>
            </div>
            <div class="disclosure-box">
                <h6 class="fw-bold mb-2">{{ $popup->footer_title }}</h6>
                <p>{!! $popup->footer_desc  !!}</p>
            </div>
        </div>
        <!-- Hidden second page -->
        <div id="page2" class="modal-custom-second" style="display: none;">
            <div class="second-page-header">
                <a href="#" class="second-page-back-link" onclick="goBackToPage1()">
                    <i class="fa-solid fa-angle-left me-2"></i><span style="text-decoration: underline;">Back</span>
                </a>
                <div class="second-page-logo">
                    {{ $popup->main_title }}
                </div>
            </div>

            <h1 class="second-page-title">{{ $popup->page2_heading }}</h1>
            <p class="second-page-subtitle pb-4">{{ $popup->page2_sub_heading }} </p>

            <div class="model-scroll py-0" style="height: 230px !important;">

                @php
                    $titles = json_decode($popup->page2_detail_title ?? '[]', true);
                    $descs  = json_decode($popup->page2_detail_desc ?? '[]', true);
                @endphp

                @foreach($titles as $index => $title)
                    <div class="row mb-4" style="display: flex; justify-content: space-between; margin-top: 12px">
                        <div class="col-md-6">
                            <p class="second-page-section-title">{{ $title }}</p>
                        </div>
                        <div class="col-md-6 second-page-left-align"
                             style="display: flex;justify-content: start;width: 25%;align-items: start;flex-direction: column;">
                            {!! $descs[$index] ?? '' !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>



    <main data-transition="container" data-transition-page="home">
    <header class="hero">
        <div class="header">
            <div class="header_body">
                <div class="header_sticky">
                    <div class="hero_cols"> <!-- First Col -->
                        <div class="hero_col">
                            <div class="hero_list">
                                <div class="hero_item">
                                    <h1 class="_24">
                                        @foreach($main->main_heading_1 as $heading)
                                            @foreach($heading as $lineKey => $lineValue)
                                                <div class="hero_line">{{ $lineKey }}: {{ $lineValue }}</div>
                                            @endforeach
                                        @endforeach
                                    </h1>


                                    <div class="hero_item">
                                        <h2 class="_24">
                                            @foreach($main->main_heading_2 as $heading)
                                                @foreach($heading as $lineKey => $lineValue)
                                                    <div class="hero_line">{{ $lineKey }}: {{ $lineValue }}</div>
                                                @endforeach
                                            @endforeach
                                        </h2>


                                    </div>
                            </div>
                        </div> <!-- Second Coll -->
                        <div class="hero_col">
                            <div class="hero_item">
                                <h2 class="_24">
                                    @foreach($main->main_heading_3 as $heading)
                                        @foreach($heading as $key => $line)
                                            <div class="hero_line">
                                                @if ($loop->parent->index == 0 || $loop->parent->index == 2)
                                                    <span class="indent"></span>{{ $line }}
                                                @else
                                                    {{ $line }}
                                                @endif
                                            </div>
                                        @endforeach
                                    @endforeach
                                </h2>


                            </div>
                        </div> <!-- Third Col -->
                        <div class="hero_col">
                            <div class="hero_list">
                                <div class="hero_item">
                                    <div class="_24">
                                        @foreach($main->main_heading_1 as $heading)
                                            @foreach($heading as $key => $line)
                                                <div class="hero_line">({{ $key }}) {{ $line }}</div>
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                                <div class="hero_item">
                                    <h2 class="_24">
                                        @foreach($main->main_heading_4 as $heading)
                                            @foreach($heading as $key => $line)
                                                <div class="hero_line">
                                                    @if ($loop->last)
                                                        <span class="indent"></span>{{ $line }}
                                                    @else
                                                        {{ $line }}
                                                    @endif
                                                </div>
                                            @endforeach
                                        @endforeach
                                    </h2>

                                </div>
                            </div>
                        </div>
                        <div class="scroll_down">
                            <div class="_24">
                                @foreach($main->main_heading_5 as $heading)
                                    @foreach($heading as $key => $line)
                                        <div class="hero_line">
                                            @if ($loop->parent->index == 1)
                                                <span class="indent"></span>{{ $line }}
                                            @else
                                                {{ $line }}
                                            @endif
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>


                        </div>
                    </div>
                    <div class="hero_video-wrapper">
                        <div class="hero_video">
                            <svg width="100" height="100" fill="none">
                                <clippath id="hero_mask" clippathunits="objectBoundingBox"> <!-- <rect class="rect-1" x="1.0" y=".01" width=".7" height=".12" rx=".035" ry="1" fill="white"/>
        <rect class="rect-2" x="-1.2" y=".135" width=".7" height=".12" rx=".035" ry="1" fill="white"/> -->
                                    <rect class="rect-3" x=".23" y=".26" width=".42" height=".12" rx=".035" ry="1"
                                          fill="white"></rect>
                                    <rect class="rect-4" x=".2" y=".385" width=".55" height=".12" rx=".035" ry="1"
                                          fill="white"></rect>
                                    <rect class="rect-5" x=".3" y=".51" width=".4" height=".12" rx=".035" ry="1"
                                          fill="white"></rect> <!-- <rect class="rect-6" x="1.45" y=".635" width=".5" height=".12" rx=".035" ry="1" fill="white"/>
        <rect class="rect-7" x="-1.35" y=".76" width=".4" height=".12" rx=".035" ry="1" fill="white"/> --> </clippath>
                            </svg>
                            <div class="background-video">
                                <video muted="" autoplay="" crossorigin="anonymous" loop="" playsinline="">
                                    <source src="{{ $main->hero_video_wrapper }}" type="video/mp4">
                                </video>
                            </div>
                            <div class="hero_video-sound">
                                <div class="video-sound _18">{{ $main->hero_video_unmute }}</div>
                            </div> <!-- <Image src={myImage} alt="Hero Video" /> --> </div> <!-- <SvgBehind /> --></div>

                    </div>
                    <div class="falling-text">
                        <div class="text_shape"></div>
                        <div class="text_shape"></div>
                        {!! $main->description !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="num">
            <div class="num_col is-left">
                <div class="num_list">
                    <div class="num_item">
                        <div class="num_dot"></div>
                        <div class="num_text f-12">{{ $main->num_text }}</div>
                    </div>
                    <div class="num_item">
                        <div class="num_dot"></div>
                        <div class="num_text f-12">{{ $main->num_text }}</div>
                    </div>
                    <div class="num_item">
                        <div class="num_dot"></div>
                        <div class="num_text f-12">{{ $main->num_text }}</div>
                    </div>
                    <div class="num_item">
                        <div class="num_dot"></div>
                        <div class="num_text f-12">{{ $main->num_text }}</div>
                    </div>
                </div>
                <div class="num_list">
                    <div class="num_item">
                        <div class="num_dot"></div>
                        <div class="num_text f-12">{{ $main->num_text }}</div>
                    </div>
                    <div class="num_item">
                        <div class="num_dot"></div>
                        <div class="num_text f-12">{{ $main->num_text }}</div>
                    </div>
                </div>
            </div>
            <div class="num_col">
                <div class="num_list">
                    <div class="num_item">
                        <div class="num_dot"></div>
                        <div class="num_text f-12">{{ $main->num_text }}</div>
                    </div>
                    <div class="num_item">
                        <div class="num_dot"></div>
                        <div class="num_text f-12">{{ $main->num_text }}</div>
                    </div>
                    <div class="num_item">
                        <div class="num_dot"></div>
                        <div class="num_text f-12">{{ $main->num_text }}</div>
                    </div>
                    <div class="num_item">
                        <div class="num_dot"></div>
                        <div class="num_text f-12">{{ $main->num_text }}</div>
                    </div>
                </div>
                <div class="num_list">
                    <div class="num_item">
                        <div class="num_dot"></div>
                        <div class="num_text f-12">{{ $main->num_text }}</div>
                    </div>
                    <div class="num_item">
                        <div class="num_dot"></div>
                        <div class="num_text f-12">{{ $main->num_text }}</div>
                    </div>
                </div>
            </div>
            <div class="num_col">
                <div class="num_list">
                    <div class="num_item">
                        <div class="num_dot"></div>
                        <div class="num_text f-12">{{ $main->num_text }}</div>
                    </div>
                    <div class="num_item">
                        <div class="num_dot"></div>
                        <div class="num_text f-12">{{ $main->num_text }}</div>
                    </div>
                    <div class="num_item">
                        <div class="num_dot"></div>
                        <div class="num_text f-12">{{ $main->num_text }}</div>
                    </div>
                    <div class="num_item">
                        <div class="num_dot"></div>
                        <div class="num_text f-12">{{ $main->num_text }}</div>
                    </div>
                </div>
            </div>
            <div class="num_col">
                <div class="num_list">
                    <div class="num_item">
                        <div class="num_dot"></div>
                        <div class="num_text f-12">{{ $main->num_text }}</div>
                    </div>
                    <div class="num_item">
                        <div class="num_dot"></div>
                        <div class="num_text f-12">{{ $main->num_text }}</div>
                    </div>
                    <div class="num_item">
                        <div class="num_dot"></div>
                        <div class="num_text f-12">{{ $main->num_text }}</div>
                    </div>
                    <div class="num_item">
                        <div class="num_dot"></div>
                        <div class="num_text f-12">{{ $main->num_text }}</div>
                    </div>
                </div>
                <div class="num_list">
                    <div class="num_item">
                        <div class="num_dot"></div>
                        <div class="num_text f-12">{{ $main->num_text }}</div>
                    </div>
                    <div class="num_item">
                        <div class="num_dot"></div>
                        <div class="num_text f-12">{{ $main->num_text }}</div>
                    </div>
                    <div class="num_item">
                        <div class="num_dot"></div>
                        <div class="num_text f-12">{{ $main->num_text }}</div>
                    </div>
                    <div class="num_item">
                        <div class="num_dot"></div>
                        <div class="num_text f-12">{{ $main->num_text }}</div>
                    </div>
                </div>
            </div>
            <div class="num_col is-left">
                <div class="num_list">
                    <div class="num_item">
                        <div class="num_dot"></div>
                        <div class="num_text f-12">{{ $main->num_text }}</div>
                    </div>
                    <div class="num_item">
                        <div class="num_dot"></div>
                        <div class="num_text f-12">{{ $main->num_text }}</div>
                    </div>
                    <div class="num_item">
                        <div class="num_dot"></div>
                        <div class="num_text f-12">{{ $main->num_text }}</div>
                    </div>
                    <div class="num_item">
                        <div class="num_dot"></div>
                        <div class="num_text f-12">{{ $main->num_text }}</div>
                    </div>
                </div>
            </div>
            <div class="num_col is-left">
                <div class="num_list">
                    <div class="num_item">
                        <div class="num_dot"></div>
                        <div class="num_text f-12">{{ $main->num_text }}</div>
                    </div>
                    <div class="num_item">
                        <div class="num_dot"></div>
                        <div class="num_text f-12">{{ $main->num_text }}</div>
                    </div>
                    <div class="num_item">
                        <div class="num_dot"></div>
                        <div class="num_text f-12">{{ $main->num_text }}</div>
                    </div>
                </div>
                <div class="num_list">
                    <div class="num_item">
                        <div class="num_dot"></div>
                        <div class="num_text f-12">{{ $main->num_text }}</div>
                    </div>
                    <div class="num_item">
                        <div class="num_dot"></div>
                        <div class="num_text f-12">{{ $main->num_text }}</div>
                    </div>
                    <div class="num_item">
                        <div class="num_dot"></div>
                        <div class="num_text f-12">{{ $main->num_text }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero_letters">
            <div class="letter-s" data-letter="s">
                <svg width="100%" height="100%" viewbox="0 0 196 229" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="hero_letter-path"
                          d="M101.046 227.563C72.979 227.563 49.3579 221.31 30.1832 208.805C11.2864 196.299 1.42109 177.68 0.587402 152.948L58.1116 150.864C58.9453 160.034 63.3916 167.398 71.4506 172.956C79.7874 178.514 90.2085 181.293 102.714 181.293C112.44 181.293 120.36 179.626 126.474 176.291C132.587 172.678 135.644 167.815 135.644 161.702C135.644 155.032 132.032 150.03 124.806 146.695C117.859 143.36 106.604 139.887 91.0421 136.274C74.3685 132.384 60.4737 128.354 49.3579 124.186C38.52 119.739 29.0716 113.07 21.0127 104.177C13.2316 95.0068 9.34109 83.0573 9.34109 68.3289C9.34109 54.4341 13.2316 42.4846 21.0127 32.4804C28.7937 22.1983 39.3537 14.4173 52.6927 9.13728C66.0316 3.57938 80.76 0.800415 96.8779 0.800415C114.385 0.800415 129.947 3.99621 143.564 10.3878C157.459 16.5015 168.297 24.9773 176.078 35.8152C183.859 46.3752 187.888 57.9078 188.166 70.4131L131.893 72.0804C130.781 64.2994 127.03 57.9078 120.638 52.9057C114.524 47.9036 106.326 45.4025 96.0443 45.4025C87.9853 45.4025 81.0379 47.0699 75.2021 50.4046C69.6442 53.7394 66.8653 58.3246 66.8653 64.1604C66.8653 70.552 70.339 75.2762 77.2864 78.3331C84.2337 81.3899 95.4885 84.8636 111.051 88.7541C128.28 92.6446 142.453 96.8131 153.568 101.259C164.962 105.428 174.688 112.236 182.747 121.685C191.084 130.855 195.253 143.221 195.253 158.784C195.253 180.459 186.499 197.411 168.992 209.638C151.762 221.588 129.114 227.563 101.046 227.563Z"
                          stroke="url(#paint0_linear_633_332)">

                    </path>
                    <defs>
                        <lineargradient id="paint0_linear_633_332" x1="97.92" y1="0.800415" x2="97.92" y2="227.563"
                                        gradientunits="userSpaceOnUse">
                            <stop stop-color="var(--letter-start-color)"></stop>
                            <stop offset="1" stop-color="var(--letter-end-color)"></stop>
                        </lineargradient>
                    </defs>
                </svg>
                <svg width="100%" height="100%" viewbox="0 0 196 229" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="hero_letter-path"
                          d="M101.046 227.563C72.979 227.563 49.3579 221.31 30.1832 208.805C11.2864 196.299 1.42109 177.68 0.587402 152.948L58.1116 150.864C58.9453 160.034 63.3916 167.398 71.4506 172.956C79.7874 178.514 90.2085 181.293 102.714 181.293C112.44 181.293 120.36 179.626 126.474 176.291C132.587 172.678 135.644 167.815 135.644 161.702C135.644 155.032 132.032 150.03 124.806 146.695C117.859 143.36 106.604 139.887 91.0421 136.274C74.3685 132.384 60.4737 128.354 49.3579 124.186C38.52 119.739 29.0716 113.07 21.0127 104.177C13.2316 95.0068 9.34109 83.0573 9.34109 68.3289C9.34109 54.4341 13.2316 42.4846 21.0127 32.4804C28.7937 22.1983 39.3537 14.4173 52.6927 9.13728C66.0316 3.57938 80.76 0.800415 96.8779 0.800415C114.385 0.800415 129.947 3.99621 143.564 10.3878C157.459 16.5015 168.297 24.9773 176.078 35.8152C183.859 46.3752 187.888 57.9078 188.166 70.4131L131.893 72.0804C130.781 64.2994 127.03 57.9078 120.638 52.9057C114.524 47.9036 106.326 45.4025 96.0443 45.4025C87.9853 45.4025 81.0379 47.0699 75.2021 50.4046C69.6442 53.7394 66.8653 58.3246 66.8653 64.1604C66.8653 70.552 70.339 75.2762 77.2864 78.3331C84.2337 81.3899 95.4885 84.8636 111.051 88.7541C128.28 92.6446 142.453 96.8131 153.568 101.259C164.962 105.428 174.688 112.236 182.747 121.685C191.084 130.855 195.253 143.221 195.253 158.784C195.253 180.459 186.499 197.411 168.992 209.638C151.762 221.588 129.114 227.563 101.046 227.563Z"
                          stroke="url(#paint0_linear_633_332)"></path>
                    <defs>
                        <lineargradient id="paint0_linear_633_332" x1="97.92" y1="0.800415" x2="97.92" y2="227.563"
                                        gradientunits="userSpaceOnUse">
                            <stop stop-color="var(--letter-start-color)"></stop>
                            <stop offset="1" stop-color="var(--letter-end-color)"></stop>
                        </lineargradient>
                    </defs>
                </svg>
            </div>
            <div class="letter-t" data-letter="t">
                <svg width="100%" height="100%" viewbox="0 0 146 283" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="hero_letter-path"
                          d="M94.7233 64.296V64.796H95.2233H145.161V110.482H95.2233H94.7233V110.982V281.804H36.5317V110.982V110.482H36.0317H1.1001V64.796H36.0317H36.5317V64.296V1.01917H94.7233V64.296Z"
                          stroke="url(#paint0_linear_633_474)"></path>
                    <defs>
                        <lineargradient id="paint0_linear_633_474" x1="73.1306" y1="0.519165" x2="73.1306" y2="282.304"
                                        gradientunits="userSpaceOnUse">
                            <stop stop-color="var(--letter-start-color)"></stop>
                            <stop offset="1" stop-color="var(--letter-end-color)"></stop>
                        </lineargradient>
                    </defs>
                </svg>
                <svg width="100%" height="100%" viewbox="0 0 146 283" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="hero_letter-path"
                          d="M94.7233 64.296V64.796H95.2233H145.161V110.482H95.2233H94.7233V110.982V281.804H36.5317V110.982V110.482H36.0317H1.1001V64.796H36.0317H36.5317V64.296V1.01917H94.7233V64.296Z"
                          stroke="url(#paint0_linear_633_474)"></path>
                    <defs>
                        <lineargradient id="paint0_linear_633_474" x1="73.1306" y1="0.519165" x2="73.1306" y2="282.304"
                                        gradientunits="userSpaceOnUse">
                            <stop stop-color="var(--letter-start-color)"></stop>
                            <stop offset="1" stop-color="var(--letter-end-color)"></stop>
                        </lineargradient>
                    </defs>
                </svg>
            </div>
            <div class="letter-v is-1" data-letter="v">
                <svg width="100%" height="100%" viewbox="0 0 232 219" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="hero_letter-path"
                          d="M99.6176 108.796C92.9659 130.691 80.7804 167.114 63.0584 218.071L1.19724 218.071L84.1832 1.0625L143.527 1.06249L231.077 218.071L167.975 218.071C148.865 165.445 135.707 128.184 128.499 106.284C121.276 84.3361 116.42 67.2673 113.925 55.0686L112.941 55.0898C110.723 68.9526 106.284 86.8525 99.6176 108.796Z"
                          stroke="url(#paint0_linear_633_480)"></path>
                    <defs>
                        <lineargradient id="paint0_linear_633_480" x1="116.144" y1="218.571" x2="116.144" y2="0.562495"
                                        gradientunits="userSpaceOnUse">
                            <stop stop-color="var(--letter-start-color)"></stop>
                            <stop offset="1" stop-color="var(--letter-end-color)"></stop>
                        </lineargradient>
                    </defs>
                </svg>
                <svg width="100%" height="100%" viewbox="0 0 232 219" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="hero_letter-path"
                          d="M99.6176 108.796C92.9659 130.691 80.7804 167.114 63.0584 218.071L1.19724 218.071L84.1832 1.0625L143.527 1.06249L231.077 218.071L167.975 218.071C148.865 165.445 135.707 128.184 128.499 106.284C121.276 84.3361 116.42 67.2673 113.925 55.0686L112.941 55.0898C110.723 68.9526 106.284 86.8525 99.6176 108.796Z"
                          stroke="url(#paint0_linear_633_480)"></path>
                    <defs>
                        <lineargradient id="paint0_linear_633_480" x1="116.144" y1="218.571" x2="116.144" y2="0.562495"
                                        gradientunits="userSpaceOnUse">
                            <stop stop-color="var(--letter-start-color)"></stop>
                            <stop offset="1" stop-color="var(--letter-end-color)"></stop>
                        </lineargradient>
                    </defs>
                </svg>
            </div>
            <div class="letter-b" data-letter="b">
                <svg width="100%" height="100%" viewbox="0 0 242 319" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="hero_letter-path"
                          d="M136.264 91.1276C157.662 91.1276 176.281 96.2687 192.121 106.551C207.961 116.555 220.049 130.311 228.386 147.818C237.001 165.048 241.308 184.083 241.308 204.926C241.308 226.601 236.862 246.054 227.969 263.283C219.355 280.235 206.849 293.574 190.454 303.3C174.058 313.027 154.883 317.89 132.929 317.89C118.757 317.89 105.001 314.694 91.662 308.302C78.601 301.911 68.1799 292.879 60.3989 281.208V313.304H1.20728V0.672852H60.3989V133.229C65.9568 120.168 75.4052 109.886 88.7441 102.382C102.361 94.8792 118.201 91.1276 136.264 91.1276ZM120.841 264.534C138.626 264.534 153.216 258.976 164.609 247.86C176.003 236.467 181.7 222.016 181.7 204.509C181.7 186.723 176.003 172.273 164.609 161.157C153.216 150.041 138.626 144.483 120.841 144.483C103.334 144.483 88.8831 150.18 77.4894 161.574C66.3736 172.69 60.8157 187.001 60.8157 204.509C60.8157 221.738 66.3736 236.05 77.4894 247.443C88.8831 258.837 103.334 264.534 120.841 264.534Z"
                          stroke="url(#paint0_linear_633_475)"></path>
                    <defs>
                        <lineargradient id="paint0_linear_633_475" x1="121.258" y1="0.672852" x2="121.258" y2="317.89"
                                        gradientunits="userSpaceOnUse">
                            <stop stop-color="var(--letter-start-color)"></stop>
                            <stop offset="1" stop-color="var(--letter-end-color)"></stop>
                        </lineargradient>
                    </defs>
                </svg>
                <svg width="100%" height="100%" viewbox="0 0 242 319" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="hero_letter-path"
                          d="M136.264 91.1276C157.662 91.1276 176.281 96.2687 192.121 106.551C207.961 116.555 220.049 130.311 228.386 147.818C237.001 165.048 241.308 184.083 241.308 204.926C241.308 226.601 236.862 246.054 227.969 263.283C219.355 280.235 206.849 293.574 190.454 303.3C174.058 313.027 154.883 317.89 132.929 317.89C118.757 317.89 105.001 314.694 91.662 308.302C78.601 301.911 68.1799 292.879 60.3989 281.208V313.304H1.20728V0.672852H60.3989V133.229C65.9568 120.168 75.4052 109.886 88.7441 102.382C102.361 94.8792 118.201 91.1276 136.264 91.1276ZM120.841 264.534C138.626 264.534 153.216 258.976 164.609 247.86C176.003 236.467 181.7 222.016 181.7 204.509C181.7 186.723 176.003 172.273 164.609 161.157C153.216 150.041 138.626 144.483 120.841 144.483C103.334 144.483 88.8831 150.18 77.4894 161.574C66.3736 172.69 60.8157 187.001 60.8157 204.509C60.8157 221.738 66.3736 236.05 77.4894 247.443C88.8831 258.837 103.334 264.534 120.841 264.534Z"
                          stroke="url(#paint0_linear_633_475)"></path>
                    <defs>
                        <lineargradient id="paint0_linear_633_475" x1="121.258" y1="0.672852" x2="121.258" y2="317.89"
                                        gradientunits="userSpaceOnUse">
                            <stop stop-color="var(--letter-start-color)"></stop>
                            <stop offset="1" stop-color="var(--letter-end-color)"></stop>
                        </lineargradient>
                    </defs>
                </svg>
            </div>
            <div class="letter-o" data-letter="o">
                <svg width="100%" height="100%" viewbox="0 0 237 228" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="hero_letter-path"
                          d="M178.423 15.4344L178.426 15.436C196.411 25.1199 210.376 38.5334 220.332 55.6805L220.335 55.6857C230.567 72.8315 235.687 92.1943 235.687 113.787C235.687 135.38 230.567 154.743 220.335 171.889L220.332 171.894C210.374 189.043 196.547 202.457 178.84 212.14C161.137 221.822 140.935 226.668 118.221 226.668C95.7872 226.668 75.5845 221.823 57.6018 212.14C39.8953 202.457 26.0678 189.043 16.1103 171.894C6.15426 154.748 1.17163 135.383 1.17163 113.787C1.17163 92.1928 6.15375 72.8291 16.1088 55.6831C26.3445 38.5323 40.312 25.1179 58.0189 15.4344C75.7228 5.75263 95.7861 0.90625 118.221 0.90625C140.656 0.90625 160.719 5.75263 178.423 15.4344ZM118.221 174.313C135.847 174.313 150.428 168.573 161.923 157.079C173.696 145.585 179.58 131.142 179.58 113.787C179.58 96.1583 173.699 81.7127 161.922 70.4945C150.426 59.0014 135.846 53.2621 118.221 53.2621C100.87 53.2621 86.4288 59.004 74.9347 70.4971C63.4361 81.7166 57.6959 96.1613 57.6959 113.787C57.6959 131.139 63.4384 145.581 74.9328 157.076C86.4272 168.57 100.869 174.313 118.221 174.313Z"
                          stroke="url(#paint0_linear_2257_7044)"></path>
                    <defs>
                        <lineargradient id="paint0_linear_2257_7044" x1="118.43" y1="0.40625" x2="118.43" y2="227.168"
                                        gradientunits="userSpaceOnUse">
                            <stop stop-color="var(--letter-start-color)"></stop>
                            <stop offset="1" stop-color="var(--letter-end-color)"></stop>
                        </lineargradient>
                    </defs>
                </svg>
                <svg width="100%" height="100%" viewbox="0 0 237 228" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="hero_letter-path"
                          d="M178.423 15.4344L178.426 15.436C196.411 25.1199 210.376 38.5334 220.332 55.6805L220.335 55.6857C230.567 72.8315 235.687 92.1943 235.687 113.787C235.687 135.38 230.567 154.743 220.335 171.889L220.332 171.894C210.374 189.043 196.547 202.457 178.84 212.14C161.137 221.822 140.935 226.668 118.221 226.668C95.7872 226.668 75.5845 221.823 57.6018 212.14C39.8953 202.457 26.0678 189.043 16.1103 171.894C6.15426 154.748 1.17163 135.383 1.17163 113.787C1.17163 92.1928 6.15375 72.8291 16.1088 55.6831C26.3445 38.5323 40.312 25.1179 58.0189 15.4344C75.7228 5.75263 95.7861 0.90625 118.221 0.90625C140.656 0.90625 160.719 5.75263 178.423 15.4344ZM118.221 174.313C135.847 174.313 150.428 168.573 161.923 157.079C173.696 145.585 179.58 131.142 179.58 113.787C179.58 96.1583 173.699 81.7127 161.922 70.4945C150.426 59.0014 135.846 53.2621 118.221 53.2621C100.87 53.2621 86.4288 59.004 74.9347 70.4971C63.4361 81.7166 57.6959 96.1613 57.6959 113.787C57.6959 131.139 63.4384 145.581 74.9328 157.076C86.4272 168.57 100.869 174.313 118.221 174.313Z"
                          stroke="url(#paint0_linear_2257_7044)"></path>
                    <defs>
                        <lineargradient id="paint0_linear_2257_7044" x1="118.43" y1="0.40625" x2="118.43" y2="227.168"
                                        gradientunits="userSpaceOnUse">
                            <stop stop-color="var(--letter-start-color)"></stop>
                            <stop offset="1" stop-color="var(--letter-end-color)"></stop>
                        </lineargradient>
                    </defs>
                </svg>
            </div>
            <div class="letter-n" data-letter="n">
                <svg width="100%" height="100%" viewbox="0 0 216 224" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="hero_letter-path"
                          d="M170.808 11.5753L170.815 11.579C184.054 18.1986 194.683 28.6825 202.699 43.0553L202.701 43.0589C210.706 57.1362 214.724 74.83 214.724 96.1676V222.804H155.699V105.338C155.699 85.834 151.244 71.9055 142.202 63.7059C133.484 55.2719 122.379 51.0654 108.929 51.0654C93.8085 51.0654 81.7187 55.8306 72.7166 65.3954L72.7165 65.3954L72.7112 65.4012C63.9822 74.9749 59.6586 89.0103 59.6586 107.422V222.804H0.633301V5.79597H49.78L58.8451 36.6999L59.1613 37.7777L59.7505 36.8215C74.3786 13.0853 96.8567 1.21069 127.27 1.21069C143.034 1.21069 157.544 4.66697 170.808 11.5753Z"
                          stroke="url(#paint0_linear_633_476)"></path>
                    <defs>
                        <lineargradient id="paint0_linear_633_476" x1="107.679" y1="0.710693" x2="107.679" y2="223.304"
                                        gradientunits="userSpaceOnUse">
                            <stop stop-color="var(--letter-start-color)"></stop>
                            <stop offset="1" stop-color="var(--letter-end-color)"></stop>
                        </lineargradient>
                    </defs>
                </svg>
                <svg width="100%" height="100%" viewbox="0 0 216 224" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="hero_letter-path"
                          d="M170.808 11.5753L170.815 11.579C184.054 18.1986 194.683 28.6825 202.699 43.0553L202.701 43.0589C210.706 57.1362 214.724 74.83 214.724 96.1676V222.804H155.699V105.338C155.699 85.834 151.244 71.9055 142.202 63.7059C133.484 55.2719 122.379 51.0654 108.929 51.0654C93.8085 51.0654 81.7187 55.8306 72.7166 65.3954L72.7165 65.3954L72.7112 65.4012C63.9822 74.9749 59.6586 89.0103 59.6586 107.422V222.804H0.633301V5.79597H49.78L58.8451 36.6999L59.1613 37.7777L59.7505 36.8215C74.3786 13.0853 96.8567 1.21069 127.27 1.21069C143.034 1.21069 157.544 4.66697 170.808 11.5753Z"
                          stroke="url(#paint0_linear_633_476)"></path>
                    <defs>
                        <lineargradient id="paint0_linear_633_476" x1="107.679" y1="0.710693" x2="107.679" y2="223.304"
                                        gradientunits="userSpaceOnUse">
                            <stop stop-color="var(--letter-start-color)"></stop>
                            <stop offset="1" stop-color="var(--letter-end-color)"></stop>
                        </lineargradient>
                    </defs>
                </svg>
            </div>
            <div class="letter-d" data-letter="d">
                <svg width="100%" height="100%" viewbox="0 0 242 319" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="hero_letter-path"
                          d="M181.44 1.40784H240.632V314.039H181.44V276.524C176.16 289.307 166.712 299.45 153.095 306.953C139.756 314.456 124.055 318.208 105.992 318.208C84.5937 318.208 65.8358 313.206 49.7179 303.202C33.8779 292.919 21.6505 279.164 13.0358 261.934C4.69894 244.427 0.530518 225.252 0.530518 204.41C0.530518 182.734 4.83789 163.42 13.4526 146.469C22.3453 129.239 34.9895 115.762 51.3853 106.035C67.781 96.3089 86.9558 91.4457 108.909 91.4457C123.36 91.4457 137.116 94.6415 150.177 101.033C163.238 107.425 173.659 116.456 181.44 128.128V1.40784ZM121.415 265.269C138.644 265.269 152.956 259.572 164.349 248.178C175.743 236.785 181.44 222.334 181.44 204.827C181.44 187.597 175.743 173.425 164.349 162.309C152.956 150.915 138.644 145.218 121.415 145.218C103.629 145.218 89.04 150.776 77.6463 161.892C66.2526 173.008 60.5558 187.319 60.5558 204.827C60.5558 222.612 66.2526 237.202 77.6463 248.595C89.04 259.711 103.629 265.269 121.415 265.269Z"
                          stroke="url(#paint0_linear_633_477)"></path>
                    <defs>
                        <lineargradient id="paint0_linear_633_477" x1="120.581" y1="1.40784" x2="120.581" y2="318.208"
                                        gradientunits="userSpaceOnUse">
                            <stop stop-color="var(--letter-start-color)"></stop>
                            <stop offset="1" stop-color="var(--letter-end-color)"></stop>
                        </lineargradient>
                    </defs>
                </svg>
                <svg width="100%" height="100%" viewbox="0 0 242 319" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="hero_letter-path"
                          d="M181.44 1.40784H240.632V314.039H181.44V276.524C176.16 289.307 166.712 299.45 153.095 306.953C139.756 314.456 124.055 318.208 105.992 318.208C84.5937 318.208 65.8358 313.206 49.7179 303.202C33.8779 292.919 21.6505 279.164 13.0358 261.934C4.69894 244.427 0.530518 225.252 0.530518 204.41C0.530518 182.734 4.83789 163.42 13.4526 146.469C22.3453 129.239 34.9895 115.762 51.3853 106.035C67.781 96.3089 86.9558 91.4457 108.909 91.4457C123.36 91.4457 137.116 94.6415 150.177 101.033C163.238 107.425 173.659 116.456 181.44 128.128V1.40784ZM121.415 265.269C138.644 265.269 152.956 259.572 164.349 248.178C175.743 236.785 181.44 222.334 181.44 204.827C181.44 187.597 175.743 173.425 164.349 162.309C152.956 150.915 138.644 145.218 121.415 145.218C103.629 145.218 89.04 150.776 77.6463 161.892C66.2526 173.008 60.5558 187.319 60.5558 204.827C60.5558 222.612 66.2526 237.202 77.6463 248.595C89.04 259.711 103.629 265.269 121.415 265.269Z"
                          stroke="url(#paint0_linear_633_477)"></path>
                    <defs>
                        <lineargradient id="paint0_linear_633_477" x1="120.581" y1="1.40784" x2="120.581" y2="318.208"
                                        gradientunits="userSpaceOnUse">
                            <stop stop-color="var(--letter-start-color)"></stop>
                            <stop offset="1" stop-color="var(--letter-end-color)"></stop>
                        </lineargradient>
                    </defs>
                </svg>
            </div>
            <div class="letter-v is-2" data-letter="v">
                <svg width="100%" height="100%" viewbox="0 0 232 219" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="hero_letter-path"
                          d="M99.6176 108.796C92.9659 130.691 80.7804 167.114 63.0584 218.071L1.19724 218.071L84.1832 1.0625L143.527 1.06249L231.077 218.071L167.975 218.071C148.865 165.445 135.707 128.184 128.499 106.284C121.276 84.3361 116.42 67.2673 113.925 55.0686L112.941 55.0898C110.723 68.9526 106.284 86.8525 99.6176 108.796Z"
                          stroke="url(#paint0_linear_633_480)"></path>
                    <defs>
                        <lineargradient id="paint0_linear_633_480" x1="116.144" y1="218.571" x2="116.144" y2="0.562495"
                                        gradientunits="userSpaceOnUse">
                            <stop stop-color="var(--letter-start-color)"></stop>
                            <stop offset="1" stop-color="var(--letter-end-color)"></stop>
                        </lineargradient>
                    </defs>
                </svg>
                <svg width="100%" height="100%" viewbox="0 0 232 219" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="hero_letter-path"
                          d="M99.6176 108.796C92.9659 130.691 80.7804 167.114 63.0584 218.071L1.19724 218.071L84.1832 1.0625L143.527 1.06249L231.077 218.071L167.975 218.071C148.865 165.445 135.707 128.184 128.499 106.284C121.276 84.3361 116.42 67.2673 113.925 55.0686L112.941 55.0898C110.723 68.9526 106.284 86.8525 99.6176 108.796Z"
                          stroke="url(#paint0_linear_633_480)"></path>
                    <defs>
                        <lineargradient id="paint0_linear_633_480" x1="116.144" y1="218.571" x2="116.144" y2="0.562495"
                                        gradientunits="userSpaceOnUse">
                            <stop stop-color="var(--letter-start-color)"></stop>
                            <stop offset="1" stop-color="var(--letter-end-color)"></stop>
                        </lineargradient>
                    </defs>
                </svg>
            </div>
            <div class="letter-r" data-letter="r">
                <svg width="100%" height="100%" viewbox="0 0 124 220" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="hero_letter-path"
                          d="M57.7626 30.0822L58.1214 31.1274L58.6696 30.168C69.6881 10.8856 87.1597 1.24097 111.174 1.24097C113.316 1.24097 117.311 1.50288 123.176 2.0311L122.768 51.8514C119.156 51.3459 114.176 51.0957 107.84 51.0957C91.6564 51.0957 79.4255 54.7568 71.2389 62.1671C63.0428 69.586 58.986 80.684 58.986 95.3641V219.5H0.794434V2.4915H48.2911L57.7626 30.0822Z"
                          stroke="url(#paint0_linear_633_478)"></path>
                    <defs>
                        <lineargradient id="paint0_linear_633_478" x1="61.9871" y1="0.740967" x2="61.9871" y2="220"
                                        gradientunits="userSpaceOnUse">
                            <stop stop-color="var(--letter-start-color)"></stop>
                            <stop offset="1" stop-color="var(--letter-end-color)"></stop>
                        </lineargradient>
                    </defs>
                </svg>
                <svg width="100%" height="100%" viewbox="0 0 124 220" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="hero_letter-path"
                          d="M57.7626 30.0822L58.1214 31.1274L58.6696 30.168C69.6881 10.8856 87.1597 1.24097 111.174 1.24097C113.316 1.24097 117.311 1.50288 123.176 2.0311L122.768 51.8514C119.156 51.3459 114.176 51.0957 107.84 51.0957C91.6564 51.0957 79.4255 54.7568 71.2389 62.1671C63.0428 69.586 58.986 80.684 58.986 95.3641V219.5H0.794434V2.4915H48.2911L57.7626 30.0822Z"
                          stroke="url(#paint0_linear_633_478)"></path>
                    <defs>
                        <lineargradient id="paint0_linear_633_478" x1="61.9871" y1="0.740967" x2="61.9871" y2="220"
                                        gradientunits="userSpaceOnUse">
                            <stop stop-color="var(--letter-start-color)"></stop>
                            <stop offset="1" stop-color="var(--letter-end-color)"></stop>
                        </lineargradient>
                    </defs>
                </svg>
            </div>
            <div class="empty-letter"></div>
        </div>
        <div class="hero_logo">
            <svg width="100%" height="100%" viewbox="0 0 26 150" fill="none" xmlns="http://www.w3.org/2000/svg"> <!-- <linearGradient id="gradient-0" x1="13" y1="150" x2="13" y2="100" gradientUnits="userSpaceOnUse" >
        <stop offset="0"/>
        <stop offset="1" stop-color="white"/>
    </linearGradient>
    <mask id="mask" maskUnits="userSpaceOnUse" x="0" y="0" width="26" height="150">
        <rect class="logo-mask" width="26" height="180" fill="url(#gradient-0)"/>
    </mask> -->
                <g>
                    <path d="M9.98399 5.52495L10.5066 5.34556L10.0269 5.07143C8.54006 4.22184 7.79492 2.88324 7.79492 1.0106C7.79492 0.871167 7.80984 0.620209 7.84108 0.251953L11.4407 0.281464C11.4161 0.553685 11.4044 0.887417 11.4044 1.28007C11.4044 2.61525 11.706 3.6633 12.3533 4.37836C13.0048 5.09816 13.967 5.43743 15.1912 5.43743H25.0128V9.72059H7.89598L7.89597 6.24173L9.98399 5.52495Z"
                          fill="currentColor" stroke="currentColor" stroke-width="0.5"></path>
                    <path d="M15.948 21.5477C17.6927 22.0778 20.5856 23.0449 24.6296 24.4505V28.9958L7.5127 22.4502V17.9404L24.6296 11.0347V15.6765C20.4498 17.1936 17.4876 18.2392 15.7404 18.8142C13.9692 19.3971 12.599 19.7865 11.6253 19.9857L11.6359 20.4775C12.7427 20.6546 14.1789 21.0103 15.948 21.5477Z"
                          fill="currentColor" stroke="currentColor" stroke-width="0.5"></path>
                    <path d="M25.35 41.1019C25.35 42.7896 24.9562 44.2578 24.1763 45.5153C23.3708 46.7555 22.2945 47.7126 20.943 48.3888C19.5649 49.0447 18.0532 49.374 16.4042 49.374C14.6868 49.374 13.166 49.033 11.8361 48.3573C10.485 47.6598 9.43124 46.6706 8.66975 45.387C7.90998 44.1062 7.52579 42.6022 7.52579 40.8661C7.52579 39.7368 7.77522 38.6627 8.27508 37.6413C8.77287 36.6241 9.4737 35.8164 10.3787 35.2131L11.0657 34.7551H10.24H0.25V30.4719H25.0132V34.7551H22.2316L22.1361 35.2361C23.1101 35.6384 23.8891 36.3591 24.4716 37.4163L24.4726 37.4182C25.0544 38.4524 25.35 39.6774 25.35 41.1019ZM20.1515 43.5692L20.1537 43.567C21.103 42.594 21.5721 41.3497 21.5721 39.8556C21.5721 38.4021 21.0889 37.1804 20.1178 36.2094C19.146 35.2375 17.9126 34.7551 16.4379 34.7551C14.9849 34.7551 13.7735 35.238 12.8242 36.2105C11.8539 37.1813 11.3711 38.4027 11.3711 39.8556C11.3711 41.3497 11.8402 42.594 12.7895 43.567C13.7397 44.541 14.9632 45.0235 16.4379 45.0235C17.9338 45.0235 19.1788 44.5419 20.1515 43.5692Z"
                          fill="currentColor" stroke="currentColor" stroke-width="0.5"></path>
                    <path d="M8.33923 53.8545L8.3411 53.8508C8.85515 52.8227 9.67042 51.9932 10.7993 51.3637L10.8011 51.3627C11.8987 50.7385 13.2901 50.4185 14.9891 50.4185H25.0128V54.769H15.7301C14.1323 54.769 12.9344 55.1323 12.2129 55.926C11.4908 56.6737 11.1349 57.6246 11.1349 58.758C11.1349 60.0277 11.5371 61.0635 12.3588 61.8369L12.3617 61.8396C13.1878 62.5928 14.381 62.949 15.8985 62.949H25.0128V67.2996H7.89592V63.6947L10.2426 63.0063L10.7815 62.8482L10.3034 62.5536C8.45358 61.4136 7.52539 59.6686 7.52539 57.2759C7.52539 56.0339 7.79739 54.8948 8.33923 53.8545Z"
                          fill="currentColor" stroke="currentColor" stroke-width="0.5"></path>
                    <path class="logo-dot"
                          d="M11.1329 83.2523L11.1327 83.2521L11.125 83.2602C10.6767 83.7289 10.1463 83.9578 9.52045 83.9578C8.86938 83.9578 8.31508 83.7267 7.8446 83.2562L7.84459 83.2562C7.39891 82.8106 7.17676 82.2685 7.17676 81.6141C7.17676 80.9613 7.39794 80.4071 7.84464 79.9382C8.31347 79.4916 8.8677 79.2704 9.52045 79.2704C10.15 79.2704 10.6816 79.4909 11.1289 79.9382C11.5994 80.4086 11.8305 80.963 11.8305 81.6141C11.8305 82.2649 11.5998 82.8058 11.1329 83.2523Z"
                          fill="white" stroke="white" stroke-width="0.5"></path>
                    <path d="M20.723 85.5115C19.4085 86.2432 17.9294 86.6287 16.2803 86.664L16.2803 82.6132C17.6503 82.5627 18.8106 82.0927 19.7452 81.1968C20.7369 80.2463 21.2321 79.0483 21.2321 77.6212C21.2321 76.174 20.7381 74.9649 19.7463 74.0137C18.8122 73.0969 17.6515 72.6152 16.2803 72.5634L16.2803 68.5456C17.9282 68.5818 19.4064 68.9778 20.7204 69.7295L20.723 69.7309C22.1047 70.4999 23.1834 71.5661 23.9631 72.9326C24.7416 74.2971 25.1338 75.8577 25.1338 77.6212C25.1338 79.3618 24.742 80.9229 23.9627 82.3105C23.1831 83.6767 22.1045 84.7427 20.723 85.5115Z"
                          fill="currentColor" stroke="currentColor" stroke-width="0.5"></path>
                    <path class="logo-dot"
                          d="M11.1329 76.2319L11.1327 76.2318L11.125 76.2398C10.6768 76.7085 10.1463 76.9373 9.52045 76.9373C8.86936 76.9373 8.31506 76.7063 7.8446 76.2358L7.84459 76.2358C7.39891 75.7902 7.17676 75.2481 7.17676 74.5937C7.17676 73.941 7.39794 73.3867 7.84464 72.9178C8.31347 72.4712 8.8677 72.25 9.52045 72.25C10.15 72.25 10.6816 72.4705 11.1289 72.9178C11.5994 73.3883 11.8305 73.9426 11.8305 74.5937C11.8305 75.2445 11.5998 75.7854 11.1329 76.2319Z"
                          fill="white" stroke="white" stroke-width="0.5"></path>
                    <path d="M8.76549 91.6425L8.76716 91.6398C9.54945 90.4012 10.6243 89.4557 11.998 88.8015L12.0023 88.7994C13.3571 88.122 14.8566 87.7816 16.5053 87.7816C18.2217 87.7816 19.7536 88.1334 21.1064 88.8317L21.1078 88.8324C22.4352 89.507 23.4779 90.4844 24.2397 91.7686C24.9995 93.0494 25.3837 94.5534 25.3837 96.2895C25.3837 97.3954 25.1347 98.4699 24.6339 99.5153C24.1362 100.532 23.4355 101.339 22.5308 101.943L21.8438 102.401H22.6695H25.0132V106.684H0.25V102.401H10.7116L10.8095 101.921C9.80919 101.495 9.01887 100.772 8.43741 99.7385C7.85486 98.6809 7.55947 97.444 7.55947 96.02C7.55947 94.3326 7.9643 92.8767 8.76549 91.6425ZM20.1537 93.5549L20.1515 93.5527C19.1796 92.5808 17.9463 92.0984 16.4716 92.0984C14.9757 92.0984 13.7405 92.5801 12.7895 93.5549C11.8402 94.528 11.3711 95.7723 11.3711 97.2663C11.3711 98.7411 11.8535 99.9744 12.8253 100.946C13.776 101.897 14.9988 102.367 16.4716 102.367C17.9232 102.367 19.1442 101.896 20.1156 100.948L20.1178 100.946C21.0897 99.9744 21.5721 98.7411 21.5721 97.2663C21.5721 95.7723 21.103 94.528 20.1537 93.5549Z"
                          fill="currentColor" stroke="currentColor" stroke-width="0.5"></path>
                    <path d="M15.948 118.041C17.6927 118.572 20.5856 119.539 24.6296 120.944V125.49L7.5127 118.944V114.434L24.6296 107.529V112.17C20.4498 113.687 17.4876 114.733 15.7404 115.308C13.9692 115.891 12.599 116.28 11.6253 116.479L11.6359 116.971C12.7427 117.148 14.1789 117.504 15.948 118.041Z"
                          fill="currentColor" stroke="currentColor" stroke-width="0.5"></path>
                    <path d="M7.64587 126.706H7.89587V126.456V122.631H11.1685V126.456V126.706H11.4185H25.0127V130.99H11.4185H11.1685V131.24V133.853H7.89587V131.24V130.99H7.64587H2.74219V126.706H7.64587Z"
                          fill="currentColor" stroke="currentColor" stroke-width="0.5"></path>
                    <path d="M21.3928 143.867L21.395 143.864C21.8776 143.14 22.1107 142.247 22.1107 141.199C22.1107 140.387 21.9718 139.702 21.6759 139.159L21.6717 139.152C21.3434 138.596 20.8757 138.288 20.2775 138.288C19.96 138.288 19.672 138.375 19.4238 138.554C19.1786 138.731 18.9862 138.988 18.8387 139.307C18.557 139.895 18.2716 140.826 17.9793 142.085C17.6668 143.425 17.3445 144.535 17.0132 145.419C16.6689 146.257 16.1534 146.988 15.4642 147.613C14.7783 148.194 13.8753 148.494 12.7322 148.494C11.6593 148.494 10.7491 148.195 9.98888 147.604L9.98625 147.602C9.1959 147.004 8.59329 146.189 8.18153 145.149L8.17985 145.145C7.7448 144.101 7.52539 142.944 7.52539 141.671C7.52539 140.287 7.77791 139.066 8.27644 138.004L8.27896 137.999C8.75751 136.911 9.416 136.073 10.2507 135.474L10.2532 135.472C10.9964 134.924 11.7967 134.621 12.6583 134.556L12.7791 138.634C12.1836 138.768 11.6852 139.091 11.2907 139.594C10.8413 140.145 10.6296 140.868 10.6296 141.738C10.6296 142.424 10.7718 143.03 11.0668 143.546L11.0694 143.551C11.3781 144.065 11.8249 144.346 12.3954 144.346C12.7019 144.346 12.9795 144.262 13.2172 144.087C13.4522 143.914 13.6334 143.664 13.7695 143.354C14.0256 142.772 14.3104 141.846 14.6253 140.586L14.6266 140.58C14.9393 139.196 15.2727 138.064 15.6254 137.182L15.6281 137.175C15.9498 136.296 16.4745 135.546 17.206 134.922L17.212 134.917C17.8961 134.295 18.8298 133.971 20.0417 133.971C21.7128 133.971 23.0054 134.64 23.9458 135.986C24.874 137.324 25.3496 139.1 25.3496 141.334C25.3496 143.564 24.8532 145.422 23.8749 146.923C22.9555 148.312 21.6113 149.069 19.8108 149.189L19.6598 145.021C20.3716 144.896 20.9522 144.506 21.3928 143.867Z"
                          fill="currentColor" stroke="currentColor" stroke-width="0.5"></path>
                </g>
            </svg>
        </div>
    </header>
    <section class="cube_wrapper">
        <div class="cube_sticky">
            <div class="cube">
                <div class="cube_part">

                    <div class="cube_side top">
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                        </div>
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="cube_side left large">
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                        </div>
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                        </div>
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                        </div>
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="cube_side front">
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                        </div>
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="cube_side bottom">
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                        </div>
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="cube_part">
                    <div class="cube_side top">
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                        </div>
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="cube_side left">
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                        </div>
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="cube_side front">
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                        </div>
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="cube_side bottom">
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                        </div>
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cube_part">
                    <div class="cube_side top">
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                        </div>
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="cube_side left">
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                        </div>
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="cube_side front">
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                        </div>
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="cube_side bottom">
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                        </div>
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                        <div class="cube_tile">
                            <div class="cube_text is-1">
                                @foreach($main->cube_char_1 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-1 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-1 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div class="cube_text is-2">
                                @foreach($main->cube_char_2 as $index => $char)
                                    @foreach($char as $line)
                                        @if ($loop->last)
                                            <span><div class="cube_char-2 cube_char">{{ $line }}</div></span>
                                        @else
                                            <div class="cube_char-2 cube_char">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
{{--    <section class="projects">--}}
{{--        <div class="projects_body">--}}
{{--            <div class="projects_container">--}}
{{--                @foreach ($case as $index => $blog)--}}
{{--                    <div class="projects_list">--}}
{{--                        <!-- Only one hero_image used per blog, class structure untouched -->--}}
{{--                        <a href="{{ url('cases/' . $blog->slug) }}" class="projects_img {{ strtolower(str_replace(' ', '-', $blog->case_nav_name)) }} is-{{ $index + 1 }}">--}}
{{--                            <img--}}
{{--                                draggable="false"--}}
{{--                                data-src="{{ asset($blog->hero_image) }}"--}}
{{--                                alt="{{ $blog->depo_studio }}"--}}
{{--                                width="3001"--}}
{{--                                height="2000">--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                @endforeach--}}

{{--            </div>--}}

{{--        </div>--}}
{{--    </section>--}}

        @php
            $stylesRow1 = [
                ['slug' => 'runway',        'scrollY' => '-54.498054', 'x' => '238.2',   'y' => '-99.9',   'img' => '/images/runway/main.webp', 'width' => 3001],
                ['slug' => 'depo-studio',   'scrollY' => '-57.366373', 'x' => '226.29',  'y' => '-94.905', 'img' => '/images/depo/main.webp',   'width' => 2000],
                ['slug' => 'dima-kutsenko', 'scrollY' => '-51.629735', 'x' => '238.2',   'y' => '-99.9',   'img' => '/images/dima/main.webp',   'width' => 2000],
                ['slug' => 'orb-space',     'scrollY' => '-51.629735', 'x' => '250.11',  'y' => '-104.895','img' => '/images/orb/main.webp',    'width' => 2000],
                ['slug' => 'terrane-group', 'scrollY' => '-60.234691', 'x' => '238.2',   'y' => '-99.9',   'img' => '/images/terrane/main.webp','width' => 2000],
            ];

            $stylesRow2 = [
                ['slug' => 'runway',        'scrollY' => '-63.10301',  'x' => '238.2',   'y' => '-99.9',   'img' => '/images/runway/main.webp', 'width' => 3001],
                ['slug' => 'depo-studio',   'scrollY' => '-63.10301',  'x' => '214.38',  'y' => '-89.91',  'img' => '/images/depo/main.webp',   'width' => 2000],
                ['slug' => 'dima-kutsenko', 'scrollY' => '-51.629735', 'x' => '238.2',   'y' => '-99.9',   'img' => '/images/dima/main.webp',   'width' => 2000],
                ['slug' => 'orb-space',     'scrollY' => '-51.629735', 'x' => '226.29',  'y' => '-94.905', 'img' => '/images/orb/main.webp',    'width' => 2000],
                ['slug' => 'terrane-group', 'scrollY' => '-60.234691', 'x' => '262.02',  'y' => '-109.89', 'img' => '/images/terrane/main.webp','width' => 2000],
            ];
        @endphp

        <section class="projects">
            <div class="projects_body">
                <div class="projects_container">

                    {{-- First row --}}
                    <div class="projects_list">
                        @foreach($stylesRow1 as $index => $item)
                            <a href="/cases/{{ $item['slug'] }}" class="projects_img {{ \Str::slug($item['slug']) }} is-{{ $index + 1 }}"
                               style="--scrollY: {{ $item['scrollY'] }}; --x: {{ $item['x'] }}; --y: {{ $item['y'] }}; --opacity: 0.998814; --position: 0.998814;">
                                <img draggable="false"
                                     data-src="{{ asset($item['img']) }}"
                                     alt="{{ $item['slug'] }}"
                                     width="{{ $item['width'] }}"
                                     height="2000"
                                     src="{{ asset($item['img']) }}">
                            </a>
                        @endforeach
                    </div>

                    {{-- Second row --}}
                    <div class="projects_list">
                        @foreach($stylesRow2 as $index => $item)
                            <a href="/cases/{{ $item['slug'] }}" class="projects_img {{ \Str::slug($item['slug']) }} is-{{ $index + 1 }}"
                               style="--scrollY: {{ $item['scrollY'] }}; --x: {{ $item['x'] }}; --y: {{ $item['y'] }}; --opacity: 0.998814; --position: 0.998814;">
                                <img draggable="false"
                                     data-src="{{ asset($item['img']) }}"
                                     alt="{{ $item['slug'] }}"
                                     width="{{ $item['width'] }}"
                                     height="2000"
                                     src="{{ asset($item['img']) }}">
                            </a>
                        @endforeach
                    </div>

                </div>
            </div>
        </section>

        <footer>
            <div class="footer_body">
                <div class="footer_center">
                    <div class="footer_center-grid">
                        <div class="footer_center-item">
                            <div class="footer_center-title _24"><span>Drop me</span> <span>a line:</span></div>
                            <div class="footer_center-list"><a class="footer_link" href="https://t.me/stabondar"
                                                               target="_blank">
                                    <div class="footer_arrow">
                                        <svg fill="none" height="100%" viewBox="0 0 11 11" width="100%"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.08023 1.98054L1.18205 0.521072L10.2783 0.487132L10.2613 9.60032L8.80184 9.70215L8.81881 2.96483L1.48752 10.2961L0.452319 9.26091L7.76663 1.9466L1.08023 1.98054Z"
                                                  fill="currentColor"></path>
                                        </svg>
                                    </div>
                                    <div class="footer_text _24" link-text-parent><span link-text-target>Telegram</span></div>
                                </a> <a class="footer_link" href="https://wa.me/380731910491" target="_blank">
                                    <div class="footer_arrow">
                                        <svg fill="none" height="100%" viewBox="0 0 11 11" width="100%"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.08023 1.98054L1.18205 0.521072L10.2783 0.487132L10.2613 9.60032L8.80184 9.70215L8.81881 2.96483L1.48752 10.2961L0.452319 9.26091L7.76663 1.9466L1.08023 1.98054Z"
                                                  fill="currentColor"></path>
                                        </svg>
                                    </div>
                                    <div class="footer_text _24" link-text-parent><span link-text-target>WhatsApp</span></div>
                                </a></div>
                        </div>
                        <div class="footer_center-item" copy-mail>
                            <div class="footer_center-title _24"><span>copy:</span></div>
                            <div class="footer_center-list">
                                <div class="footer_copy _24" link-text-parent><span
                                        link-text-target>hey@stabondar.com</span></div>
                            </div>
                        </div>
                        <div class="footer_center-item">
                            <div class="footer_center-title _24"><span>Social</span> <span>Media:</span></div>
                            <div class="footer_center-list"><a class="footer_link" href="https://www.awwwards.com/stabondar/"
                                                               target="_blank">
                                    <div class="footer_arrow">
                                        <svg fill="none" height="100%" viewBox="0 0 11 11" width="100%"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.08023 1.98054L1.18205 0.521072L10.2783 0.487132L10.2613 9.60032L8.80184 9.70215L8.81881 2.96483L1.48752 10.2961L0.452319 9.26091L7.76663 1.9466L1.08023 1.98054Z"
                                                  fill="currentColor"></path>
                                        </svg>
                                    </div>
                                    <div class="footer_text _24" link-text-parent><span link-text-target>Awwwards</span></div>
                                </a> <a class="footer_link" href="https://www.linkedin.com/in/stabondar/" target="_blank">
                                    <div class="footer_arrow">
                                        <svg fill="none" height="100%" viewBox="0 0 11 11" width="100%"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.08023 1.98054L1.18205 0.521072L10.2783 0.487132L10.2613 9.60032L8.80184 9.70215L8.81881 2.96483L1.48752 10.2961L0.452319 9.26091L7.76663 1.9466L1.08023 1.98054Z"
                                                  fill="currentColor"></path>
                                        </svg>
                                    </div>
                                    <div class="footer_text _24" link-text-parent><span link-text-target>LinkedIn</span></div>
                                </a> <a class="footer_link" href="https://x.com/stabondar" target="_blank">
                                    <div class="footer_arrow">
                                        <svg fill="none" height="100%" viewBox="0 0 11 11" width="100%"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.08023 1.98054L1.18205 0.521072L10.2783 0.487132L10.2613 9.60032L8.80184 9.70215L8.81881 2.96483L1.48752 10.2961L0.452319 9.26091L7.76663 1.9466L1.08023 1.98054Z"
                                                  fill="currentColor"></path>
                                        </svg>
                                    </div>
                                    <div class="footer_text _24" link-text-parent><span link-text-target>X | Twitter</span>
                                    </div>
                                </a></div>
                        </div>
                    </div>
                </div>
                <div class="footer_bot">
                    <div class="footer_bot-left">
                        <div class="_24">Stas Bondar</div>
                        <div class="_24">© 2025</div>
                    </div>
                    <a class="footer_link" href="/privacy-policy">
                        <div class="footer_arrow">
                            <svg fill="none" height="100%" viewBox="0 0 11 11" width="100%"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.08023 1.98054L1.18205 0.521072L10.2783 0.487132L10.2613 9.60032L8.80184 9.70215L8.81881 2.96483L1.48752 10.2961L0.452319 9.26091L7.76663 1.9466L1.08023 1.98054Z"
                                      fill="currentColor"></path>
                            </svg>
                        </div>
                        <div class="footer_text _24" link-text-parent><span link-text-target>Privacy Policy</span></div>
                    </a></div>
            </div>
        </footer>
        <div class="awards" data-lenis-prevent>
            <div class="awards_wrapper">
                <div class="awards_container">
                    <div class="awards_list _20">
                        <div class="awards_list-title">awwwards</div>
                        <div class="awards_inner-list">
                            <div class="awards_item _18"><span>stabondar 3.0 | feb ‘25</span> <span>sotd</span></div>
                            <div class="awards_item _18"><span>significo | may ‘24</span> <span>dev award</span></div>
                            <div class="awards_item _18"><span>significo | may ‘24</span> <span>sotd</span></div>
                            <div class="awards_item _18"><span>depo studio | oct ‘23</span> <span>dev award</span></div>
                            <div class="awards_item _18"><span>depo studio | oct ‘23</span> <span>sotd</span></div>
                            <div class="awards_item _18"><span>a. mcguire portfolio | feb ‘23</span> <span>dev award</span>
                            </div>
                            <div class="awards_item _18"><span>a. mcguire portfolio | feb ‘23</span> <span>sotd</span></div>
                            <div class="awards_item _18"><span>orb space | sep ‘22</span> <span>dev award</span></div>
                            <div class="awards_item _18"><span>orb space | sep ‘22</span> <span>sotd</span></div>
                            <div class="awards_item _18"><span>stabondar 1.0 | apr ‘22</span> <span>dev award</span></div>
                            <div class="awards_item _18"><span>stabondar 1.0 | apr ‘22</span> <span>sotd</span></div>
                            <div class="awards_item _18"><span>dima kutsenko | oct ‘21</span> <span>dev award</span></div>
                            <div class="awards_item _18"><span>dima kutsenko | oct ‘21</span> <span>sotd</span></div>
                        </div>
                    </div>
                    <div class="awards_list _20">
                        <div class="awards_list-title">css design awards</div>
                        <div class="awards_inner-list">
                            <div class="awards_item _18"><span>function health | sep ‘24</span> <span>wotd</span></div>
                            <div class="awards_item _18"><span>depo studio | oct ‘23</span> <span>wotd</span></div>
                            <div class="awards_item _18"><span>stabondar 2.0 | jun ‘23</span> <span>wotd</span></div>
                            <div class="awards_item _18"><span>a. mcguire portfolio | feb ‘23</span> <span>wotd</span></div>
                            <div class="awards_item _18"><span>orb space | sep ‘22</span> <span>wotd</span></div>
                            <div class="awards_item _18"><span>stabondar 1.0 | apr ‘22</span> <span>wotd</span></div>
                            <div class="awards_item _18"><span>dima kutsenko | oct ‘21</span> <span>wotd</span></div>
                        </div>
                    </div>
                    <div class="awards_list _20">
                        <div class="awards_list-title">the fwa</div>
                        <div class="awards_inner-list">
                            <div class="awards_item _18"><span>stabondar 3.0 | feb ‘25</span> <span>fotd</span></div>
                            <div class="awards_item _18"><span>depo studio | oct ‘23</span> <span>fotd</span></div>
                            <div class="awards_item _18"><span>orb space | sep ‘22</span> <span>fotd</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="awards_cursor">
                <div class="awards_cursor-text _18 caps">
                    full list
                </div>
            </div>
            <div class="awards_overlay"></div>
        </div>
    </main>

@endsection
