@extends('layouts.mainadmin')

@section('content')

    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Case Blog</h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="{{route('admin.dashboard')}}" class="text-muted text-hover-primary">Admin</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">Case Blog</li>

                            <!--end::Item-->
                            <!--begin::Item-->
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                    <!--begin::Actions-->

                    <!--end::Actions-->
                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <!--begin::Card-->
                    <!--begin::Card-->
                    <div class="card">
                        <!--begin::Card header-->
                        <div class="card-header border-0 pt-6">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <!--begin::Search-->
                                <div class="d-flex align-items-center position-relative my-1">
                                    <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
                                    <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search Case Blog" />
                                </div>
                                <!--end::Search-->
                            </div>
                            <!--begin::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Toolbar-->
                                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                    <!--begin::Filter-->

                                    <!--begin::Export-->

                                    <!--end::Export-->
                                    <!--begin::Add customer-->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer">Add Blog</button>
                                    <!--end::Add customer-->
                                </div>
                                <!--end::Toolbar-->
                                <!--begin::Group actions-->
                                <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                                    <div class="fw-bold me-5">
                                        <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected</div>
                                    <button type="button" data-url="{{route('admin.case.delete.multiple')}}" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete Selected</button>
                                </div>
                                <!--end::Group actions-->
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                                <thead>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="w-10px pe-2">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                            <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_customers_table .form-check-input" value="1" />
                                        </div>
                                    </th>
                                    <th class="min-w-125px">Main Image</th>
                                    <th class="min-w-125px">Site Award Heading 1</th>
                                    <th class="min-w-125px">Site Award Heading 2</th>
                                    <th class="min-w-125px">Web Day Heading 1</th>
                                    <th class="text-end min-w-70px">Actions</th>
                                </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                </tbody>
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                    <!--begin::Modals-->
                    <!--begin::Modal - Customers - Add-->
                    <div class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content w-100">


                                <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.case.store') }}" id="kt_modal_add_customer_form">
                                    @csrf

                                    <!-- Header -->
                                    <div class="modal-header" id="kt_modal_add_customer_header">
                                        <h2 class="fw-bold">Add or Edit Case Blog</h2>
                                        <div id="kt_modal_add_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                                            <i class="ki-outline ki-cross fs-1"></i>
                                        </div>
                                    </div>

                                    <!-- Body -->
                                    <div class="modal-body py-10 px-lg-17">
                                        <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true"
                                             data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                                             data-kt-scroll-dependencies="#kt_modal_add_customer_header"
                                             data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">

                                            <div class="row">
                                                <!-- Category -->

                                                {{-- Site Award Headings --}}
                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Site Award Heading 1</label>
                                                    <input type="text"
                                                           name="site_award_heading_1"
                                                           class="form-control"
                                                           placeholder="Site of the Day">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Site Award Heading 2</label>
                                                    <input type="text"
                                                           name="site_award_heading_2"
                                                           class="form-control"
                                                           placeholder="by Awwwards">
                                                </div>

                                                {{-- Website of the Day --}}
                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Web Day Heading 1</label>
                                                    <input type="text"
                                                           name="web_day_heading_1"
                                                           class="form-control"
                                                           placeholder="Website of the Day">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Web Day Heading 2</label>
                                                    <input type="text"
                                                           name="web_day_heading_2"
                                                           class="form-control"
                                                           placeholder="by CSS">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Web Day Heading 3</label>
                                                    <input type="text"
                                                           name="web_day_heading_3"
                                                           class="form-control"
                                                           placeholder="Design Awards">
                                                </div>

                                                {{-- FWA Headings --}}
                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">FWA Heading 1</label>
                                                    <input type="text"
                                                           name="fwa_heading_1"
                                                           class="form-control"
                                                           placeholder="FWA">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">FWA Heading 2</label>
                                                    <input type="text"
                                                           name="fwa_heading_2"
                                                           class="form-control"
                                                           placeholder="of the day">
                                                </div>

                                                {{-- Studio Headings --}}
                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Studio Heading 1</label>
                                                    <input type="text"
                                                           name="studio_heading_1"
                                                           class="form-control"
                                                           placeholder="Digital Studio">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Studio Heading 2</label>
                                                    <input type="text"
                                                           name="studio_heading_2"
                                                           class="form-control"
                                                           placeholder="website">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Depo Studio</label>
                                                    <input type="text"
                                                           name="depo_studio"
                                                           class="form-control"
                                                           placeholder="Depo Studio">
                                                </div>

                                                {{-- Hero Image Path --}}
                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Hero Image</label>
                                                    <input type="file"
                                                           name="hero_image"
                                                           class="form-control"
                                                           placeholder="/images/depo/main.webp">
                                                </div>

                                                {{-- Case Navigation --}}
                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Case Nav Name</label>
                                                    <input type="text"
                                                           name="case_nav_name"
                                                           class="form-control"
                                                           placeholder="Depo Studio">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Case Nav Section</label>
                                                    <input type="text"
                                                           name="case_nav_section"
                                                           class="form-control"
                                                           placeholder="Home page">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Case Nav Footer</label>
                                                    <input type="text"
                                                           name="case_nav_footer"
                                                           class="form-control"
                                                           placeholder="Visit Live Site">
                                                </div>

                                                {{-- Depo Sequence Hero Image --}}
                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Depo Sequence Hero Image</label>
                                                    <input type="file"
                                                           class="form-control"
                                                           name="depo_suquence_h"
                                                           placeholder="/_astro/Item 01.BBYPfXL5.png">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Depo Sequence Banner Content</label>
                                                    <textarea
                                                        name="depo_sequence_banner_content"
                                                        class="form-control"
                                                        rows="4"
                                                        placeholder="Our mission is creating world-class websites…"></textarea>
                                                </div>

                                                {{-- Home Section Images --}}
                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Home Section Image 1</label>
                                                    <input type="file"
                                                           name="home_sec_images1"
                                                           class="form-control"
                                                           placeholder="/_astro/Item 02.CuVfKpgV.png">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Home Section Image 2</label>
                                                    <input type="file"
                                                           name="home_sec_images2"
                                                           class="form-control"
                                                           placeholder="/_astro/Item 03.BBEM4OUP.png">
                                                </div>

                                                {{-- Home Page Images & Video --}}
                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Home Page Image 1</label>
                                                    <input type="file"
                                                           name="home_page_images1"
                                                           class="form-control"
                                                           placeholder="/_astro/Item 04.CJIt6T5S.webp">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Home Page Image 2</label>
                                                    <input type="file"
                                                           name="home_page_images2"
                                                           class="form-control"
                                                           placeholder="/_astro/Item 05.C38x99a7.png">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Home Page Video</label>
                                                    <input type="file"
                                                           name="home_page_video"
                                                           class="form-control"
                                                           placeholder="video.m3u8">
                                                </div>


                                                {{-- Case Section Images & Videos --}}
                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Case Image 1</label>
                                                    <input type="file"
                                                           name="case_image1"
                                                           class="form-control"
                                                           placeholder="/_astro/Item 07.CAPq2iIi.png">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Case Image 2</label>
                                                    <input type="file"
                                                           name="case_image2"
                                                           class="form-control"
                                                           placeholder="/_astro/Item 08.CoDuYzdB.png">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Case Image 3</label>
                                                    <input type="file"
                                                           name="case_image3"
                                                           class="form-control"
                                                           placeholder="/_astro/Item 09.Bbu6EhMK.webp">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Case Image 4</label>
                                                    <input type="file"
                                                           name="case_image4"
                                                           class="form-control"
                                                           placeholder="/_astro/Item 10.BN4W3hnH.png">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Case Image 5</label>
                                                    <input type="file"
                                                           name="case_image5"
                                                           class="form-control"
                                                           placeholder="/_astro/Item 11.DvJ4TERn.webp">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Case Video</label>
                                                    <input type="file"
                                                           name="case_video"
                                                           class="form-control"
                                                           placeholder="https://.../manifest/video.m3u8">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Case Image 6</label>
                                                    <input type="file"
                                                           name="case_image6"
                                                           class="form-control"
                                                           placeholder="/_astro/Item 11.DvJ4TERn.webp">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Case Image 7</label>
                                                    <input type="file"
                                                           name="case_image7"
                                                           class="form-control"
                                                           placeholder="/_astro/Item 12.BucVJLVa.png">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Case Image 8</label>
                                                    <input type="file"
                                                           name="case_image8"
                                                           class="form-control"
                                                           placeholder="/_astro/Item 14.Cv7x6EHL.png">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Case Video 2</label>
                                                    <input type="file"
                                                           name="case_vide2"
                                                           class="form-control"
                                                           placeholder="https://.../manifest/video.m3u8">
                                                </div>

                                                {{-- Contact Section Images & Video --}}
                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Contact Image 1</label>
                                                    <input type="file"
                                                           name="contact_img1"
                                                           class="form-control"
                                                           placeholder="/_astro/Item 15.CGBNrj-6.png">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Contact Image 2</label>
                                                    <input type="file"
                                                           name="contact_img2"
                                                           class="form-control"
                                                           placeholder="/_astro/Item 16.30FS1xAs.png">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Contact Video</label>
                                                    <input type="file"
                                                           name="contact_img3"
                                                           class="form-control"
                                                           placeholder="https://.../manifest/video.m3u8">
                                                </div>

                                                {{-- Footer --}}
                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Footer Image</label>
                                                    <input type="file"
                                                           name="footer_image"
                                                           class="form-control"
                                                           placeholder="/_astro/Item 16.30FS1xAs.png">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Footer Thumbnail</label>
                                                    <input type="file"
                                                           name="footer_thumb"
                                                           class="form-control"
                                                           placeholder="/images/dima/main.webp">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Footer Text</label>
                                                    <input type="text"
                                                           name="footer_text"
                                                           class="form-control"
                                                           placeholder="Next Project">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Footer Fixed Image</label>
                                                    <input type="file"
                                                           name="footer_fixed_img"
                                                           class="form-control"
                                                           placeholder="/images/dima/main.webp">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label class="form-label fw-bold">Footer Fixed Text</label>
                                                    <input type="text"
                                                           name="footer_fixed_text"
                                                           class="form-control"

                                                           placeholder="Next Project">
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                    <!-- Footer -->
                                    <div class="modal-footer flex-center">
                                        <button type="reset" id="kt_modal_add_customer_cancel" class="btn btn-light me-3">Discard</button>
                                        <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    <!--end::Modal - Customers - Add-->
                    <!--begin::Modal - Adjust Balance-->

                    <!--end::Card-->
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
        <!--begin::Footer-->
        <div id="kt_app_footer" class="app-footer">
            <!--begin::Footer container-->
            <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                <!--begin::Copyright-->
                <div class="text-gray-900 order-2 order-md-1">
                    <span class="text-muted fw-semibold me-1">2024&copy;</span>
                    <a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Keenthemes</a>
                </div>
                <!--end::Copyright-->
                <!--begin::Menu-->
                <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                    <li class="menu-item">
                        <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
                    </li>
                    <li class="menu-item">
                        <a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a>
                    </li>
                    <li class="menu-item">
                        <a href="https://1.envato.market/Vm7VRE" target="_blank" class="menu-link px-2">Purchase</a>
                    </li>
                </ul>
                <!--end::Menu-->
            </div>
            <!--end::Footer container-->
        </div>
        <!--end::Footer-->
    </div>

@endsection

@section('scripts')
    <script>
        var fetchUrl='{{route('admin.case.fetch')}}';
    </script>
    <script src="{{ asset('admin_assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
    <script src="{{ asset('custom/case.js') }}"></script>
    <script src="{{ asset('custom/add-case.js') }}"></script>


    <script>



    </script>
@endsection
