@extends('layouts.mainadmin')


@section('content')
    <style>
        .logos {
            width: 90px;
            background-color: #ff4949;
            border-radius: 5px;
            padding: 10px;
        }

        .ck-rounded-corners {
            /*display: none;*/
        }
    </style>
    <div id="kt_app_header_page_title_wrapper -4">
        <!--begin::Page title-->
        <div data-kt-swapper="true" class="ms-5 mb-5" data-kt-swapper-mode="{default: 'prepend', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_content_container', lg: '#kt_app_header_page_title_wrapper'}" class="page-title d-flex flex-column justify-content-center me-3 mb-6 mb-lg-0">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center me-3 my-0">Popup</h1>
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
                <li class="breadcrumb-item text-muted">Popup</li>
                <!--end::Item-->
                <!--begin::Item-->

                <!--end::Item-->
                <!--begin::Item-->
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
    </div>


    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-fluid">
                    <!--begin::Card-->
                    <form action="{{ route('admin.popup.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card" id="kt_docs_repeater_advanced">
                            <div class="form-group">
                                <div  >

                                    <div  class="mb-5 border p-3 rounded">
                                        <div class="row">
                                            <!-- Title -->
                                            <div class="col-md-6">
                                                <label class="form-label">Main Title:</label>
                                                <input type="text" name="main_title" class="form-control" value="{{ $popup->main_title ?? '' }}">
                                            </div>



                                            <!-- Title -->
                                            <div class="col-md-6">
                                                <label class="form-label">Footer Title:</label>
                                                <input type="text" name="footer_title" class="form-control" value="{{ $popup->footer_title ?? '' }}">
                                            </div>

                                            <!-- Title -->
                                            <div class="col-md-6">
                                                <label class="form-label">Page 2 Heading:</label>
                                                <input type="text" name="page2_heading" class="form-control" value="{{ $popup->page2_heading ?? '' }}">
                                            </div>

                                            <!-- Title -->
                                            <div class="col-md-6">
                                                <label class="form-label">Page 2 Sub Heading:</label>
                                                <input type="text" name="page2_sub_heading" class="form-control" value="{{ $popup->page2_sub_heading ?? '' }}">
                                            </div>

                                            <!-- Description -->
                                            <div class="col-md-6">
                                                <label class="form-label">Footer Description:</label>
                                                <textarea name="footer_desc" rows="4" class="form-control ck-editor">{!! $popup->footer_desc ?? '' !!}</textarea>
                                            </div>

                                            <!-- Description -->
                                            <div class="col-md-6">
                                                <label class="form-label">Description:</label>
                                                <textarea name="description" rows="4" class="form-control ck-editor">{!! $popup->description ?? '' !!}</textarea>
                                            </div>


                                            <div data-repeater-list="page2_details" class="mt-4">
                                                @php
                                                    $titles = json_decode($popup->page2_detail_title ?? '[]');
                                                    $descs = json_decode($popup->page2_detail_desc ?? '[]');
                                                @endphp

                                                @if(count($titles))
                                                    @foreach($titles as $index => $title)
                                                        <div data-repeater-item class="mb-5 border p-3 rounded">
                                                            <div class="row">
                                                                <!-- Title -->
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="form-label">Page 2 Detail Title:</label>
                                                                    <input type="text" name="page2_detail_title" class="form-control" value="{{ $title }}" />
                                                                </div>

                                                                <!-- Description -->
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="form-label">Page 2 Detail Description:</label>
                                                                    <textarea name="page2_detail_desc" rows="4" class="form-control ck-editor">{!! $descs[$index] ?? '' !!}</textarea>
                                                                </div>

                                                                <!-- Delete button -->
                                                                <div class="col-md-12 text-end">
                                                                    <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-danger">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <!-- Show one empty repeater by default -->
                                                    <div data-repeater-item class="mb-5 border p-3 rounded">
                                                        <div class="row">
                                                            <div class="col-md-6 mb-3">
                                                                <label class="form-label">Page 2 Detail Title:</label>
                                                                <input type="text" name="page2_detail_title" class="form-control" />
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label class="form-label">Page 2 Detail Description:</label>
                                                                <textarea name="page2_detail_desc" rows="4" class="form-control ck-editor"></textarea>
                                                            </div>
                                                            <div class="col-md-12 text-end">
                                                                <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-danger">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>


                                            <!-- Add button -->
                                            <div class="form-group mt-3">
                                                <a href="javascript:;" data-repeater-create class="btn btn-light-primary">
                                                    <i class="ki-outline ki-plus fs-3"></i> Add New Detail
                                                </a>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <!-- Submit -->
                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                    <!--end::Modal - Customers - Add-->
                    <!--begin::Modal - Adjust Balance-->

                    <!--end::Modal - New Card-->
                    <!--end::Modals-->
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
        <!--begin::Footer-->
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
    <script src="{{ asset('admin_assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>


    <script>
        const editorMap = new Map();

        function initializeCKEditors(container) {
            container.querySelectorAll('textarea.ck-editor').forEach(textarea => {
                const editorId = textarea.getAttribute('data-editor-id') || ('editor_' + Math.random().toString(36).substring(2));
                textarea.setAttribute('data-editor-id', editorId);

                if (!editorMap.has(editorId)) {
                    ClassicEditor.create(textarea).then(editor => {
                        editorMap.set(editorId, editor);
                    }).catch(error => console.error(error));
                }
            });
        }

        function destroyCKEditor(textarea) {
            const editorId = textarea.getAttribute('data-editor-id');
            if (editorId && editorMap.has(editorId)) {
                editorMap.get(editorId).destroy().then(() => {
                    editorMap.delete(editorId);
                });
            }
        }

        $('#kt_docs_repeater_advanced').repeater({
            initEmpty: false,
            show: function () {
                $(this).slideDown();
                initializeCKEditors(this);
            },
            hide: function (deleteElement) {
                $(this).find('textarea.ck-editor').each(function () {
                    destroyCKEditor(this);
                });
                $(this).slideUp(deleteElement);
            },
            ready: function () {
                initializeCKEditors(document.getElementById('kt_docs_repeater_advanced'));
            }
        });

        document.querySelector('form').addEventListener('submit', () => {
            editorMap.forEach(editor => editor.updateSourceElement());
        });
    </script>

@endsection
