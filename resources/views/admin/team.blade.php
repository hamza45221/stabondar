@extends('layouts.mainadmin')

@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                            Teams
                        </h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Admin</a>
                            </li>
                            <li class="breadcrumb-item"><span class="bullet bg-gray-500 w-5px h-2px"></span></li>
                            <li class="breadcrumb-item text-muted">Teams</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--end::Toolbar-->

            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <div class="card">
                        <div class="card-header border-0 pt-6">
                            <div class="card-title"></div>
                            <div class="card-toolbar">
                                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base"></div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <form class="form" method="POST" action="{{ route('admin.team.store') }}" enctype="multipart/form-data">
                                @csrf

                                {{-- People Text --}}
                                <div class="row mb-7">
                                    <div class="col-md-6 fv-row">
                                        <label class="required fs-6 fw-semibold mb-2">People Text</label>
                                        <input
                                            type="text"
                                            name="people_text"
                                            value="{{ $team->people_text ?? '' }}"
                                            class="form-control form-control-solid"
                                            placeholder="Main Heading 1"
                                        >
                                    </div>
                                </div>

                                {{-- Team Repeater --}}
                                <div id="team_repeater">
                                    <div class="repeater">
                                        <div data-repeater-list="team">
                                            @php
                                                $members = old('team', $team->team ?? []);
                                            @endphp

                                            @foreach ($members as $member)
                                                <div data-repeater-item class="mb-4 border p-3 rounded">
                                                    <div class="row">
                                                        <!-- First Name -->
                                                        <div class="col-md-3">
                                                            <label class="form-label">First Name</label>
                                                            <input
                                                                type="text"
                                                                name="name"
                                                                class="form-control"
                                                                value="{{ $member['name'] ?? '' }}"
                                                            >
                                                        </div>

                                                        <!-- Last Name -->
                                                        <div class="col-md-3">
                                                            <label class="form-label">Last Name</label>
                                                            <input
                                                                type="text"
                                                                name="surname"
                                                                class="form-control"
                                                                value="{{ $member['surname'] ?? '' }}"
                                                            >
                                                        </div>

                                                        <!-- Position -->
                                                        <div class="col-md-3">
                                                            <label class="form-label">Position</label>
                                                            <input
                                                                type="text"
                                                                name="position"
                                                                class="form-control"
                                                                value="{{ $member['position'] ?? '' }}"
                                                            >
                                                        </div>

                                                        <!-- LinkedIn -->
                                                        <div class="col-md-3">
                                                            <label class="form-label">LinkedIn</label>
                                                            <input
                                                                type="text"
                                                                name="linkedin"
                                                                class="form-control"
                                                                value="{{ $member['linkedin'] ?? '' }}"
                                                            >
                                                        </div>

                                                        <!-- Photo -->
                                                        <div class="col-md-4 mt-3">
                                                            <label class="form-label">Photo</label>
                                                            <input
                                                                type="file"
                                                                name="photo"
                                                                class="form-control"
                                                            >
                                                            @if (!empty($member['photoUrl']))
                                                                <img
                                                                    src="{{ asset($member['photoUrl']) }}"
                                                                    width="70"
                                                                    class="mt-2"
                                                                >
                                                                <input
                                                                    type="hidden"
                                                                    name="old_photo"
                                                                    value="{{ $member['photoUrl'] }}"
                                                                >
                                                            @endif
                                                        </div>

                                                        <!-- Delete Button -->
                                                        <div class="col-12 mt-3 text-end">
                                                            <button
                                                                type="button"
                                                                data-repeater-delete
                                                                class="btn btn-sm btn-danger"
                                                            >
                                                                <i class="la la-trash"></i> Delete
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        {{-- Add Button --}}
                                        <div class="form-group mt-3 mb-5">
                                            <button
                                                type="button"
                                                data-repeater-create
                                                class="btn btn-primary btn-sm"
                                            >
                                                <i class="la la-plus"></i> Add Team Member
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                {{-- Submit --}}
                                <div class="fv-row mb-7">
                                    <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Content-->

            <!--begin::Footer-->
            <div id="kt_app_footer" class="app-footer">
                <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                    <div class="text-gray-900 order-2 order-md-1">
                        <span class="text-muted fw-semibold me-1">2024&copy;</span>
                        <a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Keenthemes</a>
                    </div>
                    <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                        <li class="menu-item"><a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a></li>
                        <li class="menu-item"><a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a></li>
                        <li class="menu-item"><a href="https://1.envato.market/Vm7VRE" target="_blank" class="menu-link px-2">Purchase</a></li>
                    </ul>
                </div>
            </div>
            <!--end::Footer-->
        </div>
    </div>
@endsection

@section('scripts')
    <!-- jQuery & Repeater plugin -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>

    <!-- CKEditor (if needed) -->
    <script src="{{ asset('admin_assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    <!-- Metronic global & formrepeater bundles -->
    <script src="{{ asset('admin_assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>

    <script>
        // Initialize CKEditor if you have a stats_description field:
        ClassicEditor
            .create(document.querySelector('#stats_description'))
            .catch(error => console.error(error));

        // Initialize the Team repeater
        $(document).ready(function () {
            $('#team_repeater .repeater').repeater({
                initEmpty: false,
                show: function () {
                    $(this).slideDown();
                },
                hide: function (deleteElement) {
                    if (confirm('Are you sure you want to delete this team member?')) {
                        $(this).slideUp(deleteElement);
                    }
                }
            });
        });
    </script>
@endsection
