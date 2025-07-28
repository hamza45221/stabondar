@extends('layouts.mainadmin')

@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            {{-- Toolbar --}}
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <div class="app-container container-xxl d-flex flex-stack">
                    <div class="page-title">
                        <h1 class="page-heading text-gray-900 fw-bold fs-3">Hero Main</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Admin</a>
                            </li>
                            <li class="breadcrumb-item"><span class="bullet bg-gray-500 w-5px h-2px"></span></li>
                            <li class="breadcrumb-item text-muted">Hero Main</li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Content --}}
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div class="app-container container-xxl">
                    <div class="card">
                        <div class="card-body pt-0">
                            <form method="POST" action="{{ route('admin.heromain.store') }}" enctype="multipart/form-data">
                                @csrf

                                {{-- Navbar --}}
                                <div class="form-group">
                                    <label class="form-label">Navbar Items</label>
                                    <div id="navbar_repeater" data-repeater-list="navbar">
                                        @if(!empty($heromain->navbar) && is_array($heromain->navbar))
                                            @foreach($heromain->navbar as $item)
                                                <div data-repeater-item class="row mb-3">
                                                    <div class="col-md-5">
                                                        <input type="text" name="name" class="form-control"
                                                               value="{{ is_array($item) ? ($item['name'] ?? '') : '' }}"
                                                               placeholder="Menu Name">
                                                    </div>
                                                    <div class="col-md-5">
                                                        <input type="text" name="url" class="form-control"
                                                               value="{{ is_array($item) ? ($item['url'] ?? '') : '' }}"
                                                               placeholder="Menu URL">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="button" data-repeater-delete class="btn btn-danger">
                                                            Delete
                                                        </button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div data-repeater-item class="row mb-3">
                                                <div class="col-md-5">
                                                    <input type="text" name="name" class="form-control" placeholder="Menu Name">
                                                </div>
                                                <div class="col-md-5">
                                                    <input type="text" name="url" class="form-control" placeholder="Menu URL">
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button" data-repeater-delete class="btn btn-danger">
                                                        Delete
                                                    </button>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <button type="button" data-repeater-create class="btn btn-primary mt-2 mb-5">
                                        Add Navbar Link
                                    </button>
                                </div>

                                {{-- Loader Body --}}
                                <div class="form-group">
                                    <label class="form-label">Loader Body</label>
                                    <div data-repeater-list="loader_body">
                                        @if(!empty($heromain->loader_body) && is_array($heromain->loader_body))
                                            @foreach($heromain->loader_body as $key => $value)
                                                <div data-repeater-item class="row mb-3">
                                                    <div class="col-md-5">
                                                        <input type="text" name="{{ $key }}" class="form-control"
                                                               value="{{ is_string($value) ? $value : '' }}"
                                                               placeholder="Enter line text">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="button" data-repeater-delete class="btn btn-danger">
                                                            Delete
                                                        </button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div data-repeater-item class="row mb-3">
                                                <div class="col-md-5">
                                                    <input type="text" name="line1" class="form-control"
                                                           placeholder="Enter line text">
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button" data-repeater-delete class="btn btn-danger">
                                                        Delete
                                                    </button>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <button type="button" data-repeater-create class="btn btn-primary mt-2 mb-5">
                                        Add Loader Line
                                    </button>
                                </div>

                                {{-- Main Heading 1 --}}
                                <div class="form-group mt-5">
                                    <label class="fs-5 fw-bold mb-2">Main Heading 1</label>

                                    <div id="main_heading_1_repeater" data-repeater-list="main_heading_1">
                                        @php($list = $heromain->main_heading_1 ?? [])
                                        @if(count($list))
                                            @foreach($list as $item)
                                                <div data-repeater-item class="d-flex align-items-center mb-3">
                                                    <input type="text"
                                                           name="line"
                                                           class="form-control me-2"
                                                           value="{{ is_array($item) ? ($item['line'] ?? '') : $item }}"
                                                           placeholder="Enter line" />
                                                    <button type="button" data-repeater-delete class="btn btn-sm btn-light-danger">
                                                        <i class="la la-trash fs-4 text-danger"></i>
                                                    </button>
                                                </div>
                                            @endforeach
                                        @else
                                            <div data-repeater-item class="d-flex align-items-center mb-3">
                                                <input type="text" name="line" class="form-control me-2" placeholder="Enter line" />
                                                <button type="button" data-repeater-delete class="btn btn-sm btn-light-danger">
                                                    <i class="la la-trash fs-4 text-danger"></i>
                                                </button>
                                            </div>
                                        @endif
                                    </div>

                                    <button type="button" data-repeater-create class="btn btn-sm btn-light-primary mt-2">
                                        <i class="la la-plus"></i> Add Line
                                    </button>
                                </div>


                                <div class="form-group mt-5">
                                    <label class="fs-5 fw-bold mb-3">Project Logos</label>
                                    <div class="projects_query_repeater" data-repeater-list="projects">
                                        @if(!empty($heromain->projects) && is_array($heromain->projects))
                                            @foreach($heromain->projects as $proj)
                                                <div data-repeater-item class="d-flex align-items-center gap-4 mb-3">
                                                    <input type="file" name="image" class="form-control w-50" />
                                                    <input type="hidden" name="old_image" value="{{ $proj }}">
                                                    @if($proj)
                                                        <img src="{{ asset($proj) }}" alt="Logo" style="height:40px;">
                                                    @endif
                                                    <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger">
                                                        <i class="la la-trash-o fs-2"></i>
                                                    </a>
                                                </div>
                                            @endforeach
                                        @else
                                            <div data-repeater-item class="d-flex align-items-center gap-4 mb-3">
                                                <input type="file" name="image" class="form-control w-50" />
                                                <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger">
                                                    <i class="la la-trash-o fs-2"></i>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                    <a href="javascript:;" data-repeater-create class="btn btn-light-primary mb-5">
                                        <i class="la la-plus"></i> Add Logo
                                    </a>
                                </div>

                                {{-- Drop Me Links --}}
                                <div class="form-group mt-5">
                                    <label class="fs-5 fw-bold mb-3">Drop Me Links</label>
                                    <div class="drop_links_repeater" data-repeater-list="drop_me_links">
                                        @if(!empty($heromain->drop_me_links) && is_array($heromain->drop_me_links))
                                            @foreach($heromain->drop_me_links as $link)
                                                <div data-repeater-item class="d-flex gap-3 mb-3 align-items-center">
                                                    <input type="text" name="name" class="form-control w-25"
                                                           value="{{ is_array($link) ? ($link['name'] ?? '') : '' }}"
                                                           placeholder="Platform Name">
                                                    <input type="text" name="url" class="form-control w-50"
                                                           value="{{ is_array($link) ? ($link['url'] ?? '') : '' }}"
                                                           placeholder="https://...">
                                                    <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger">
                                                        <i class="la la-trash-o fs-2"></i>
                                                    </a>
                                                </div>
                                            @endforeach
                                        @else
                                            <div data-repeater-item class="d-flex gap-3 mb-3 align-items-center">
                                                <input type="text" name="name" class="form-control w-25" placeholder="Platform Name">
                                                <input type="text" name="url" class="form-control w-50" placeholder="https://...">
                                                <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger">
                                                    <i class="la la-trash-o fs-2"></i>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                    <a href="javascript:;" data-repeater-create class="btn btn-light-primary mt-2">
                                        <i class="la la-plus"></i> Add Link
                                    </a>
                                </div>

                                {{-- Copy Links --}}
                                <div class="form-group mt-5">
                                    <label class="fs-5 fw-bold mb-3">Copy Links</label>
                                    <div class="copy_links_repeater" data-repeater-list="copy_links">
                                        @if(!empty($heromain->copy_links) && is_array($heromain->copy_links))
                                            @foreach($heromain->copy_links as $c)
                                                <div data-repeater-item class="d-flex gap-3 mb-3 align-items-center">
                                                    <input type="text" name="name" class="form-control w-50"
                                                           value="{{ is_array($c) ? ($c['name'] ?? '') : '' }}" placeholder="Name or Email">
                                                    <input type="text" name="url" class="form-control w-50"
                                                           value="{{ is_array($c) ? ($c['url'] ?? '') : '' }}" placeholder="URL (optional)">
                                                    <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger">
                                                        <i class="la la-trash-o fs-2"></i>
                                                    </a>
                                                </div>
                                            @endforeach
                                        @else
                                            <div data-repeater-item class="d-flex gap-3 mb-3 align-items-center">
                                                <input type="text" name="name" class="form-control w-50" placeholder="Name or Email">
                                                <input type="text" name="url" class="form-control w-50" placeholder="URL (optional)">
                                                <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger">
                                                    <i class="la la-trash-o fs-2"></i>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                    <a href="javascript:;" data-repeater-create class="btn btn-light-primary mt-2">
                                        <i class="la la-plus"></i> Add Copy Link
                                    </a>
                                </div>

                                {{-- Social Media Links --}}
                                <div class="form-group mt-5">
                                    <label class="fs-5 fw-bold mb-3">Social Media Links</label>
                                    <div class="social_media_links_repeater" data-repeater-list="social_media_links">
                                        @if(!empty($heromain->social_media_links) && is_array($heromain->social_media_links))
                                            @foreach($heromain->social_media_links as $s)
                                                <div data-repeater-item class="d-flex gap-3 mb-3 align-items-center">
                                                    <input type="text" name="name" class="form-control w-25"
                                                           value="{{ is_array($s) ? ($s['name'] ?? '') : '' }}" placeholder="Platform Name">
                                                    <input type="text" name="url" class="form-control w-75"
                                                           value="{{ is_array($s) ? ($s['url'] ?? '') : '' }}" placeholder="URL">
                                                    <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger">
                                                        <i class="la la-trash-o fs-2"></i>
                                                    </a>
                                                </div>
                                            @endforeach
                                        @else
                                            <div data-repeater-item class="d-flex gap-3 mb-3 align-items-center">
                                                <input type="text" name="name" class="form-control w-25" placeholder="Platform Name">
                                                <input type="text" name="url" class="form-control w-75" placeholder="URL">
                                                <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger">
                                                    <i class="la la-trash-o fs-2"></i>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                    <a href="javascript:;" data-repeater-create class="btn btn-light-primary mt-2">
                                        <i class="la la-plus"></i> Add Social Media Link
                                    </a>
                                </div>

                                {{-- Award List --}}
                                <div class="form-group mt-5">
                                    <label class="form-label fw-bold">Award List</label>
                                    <div data-repeater-list="awward_list">
                                        @if(!empty($heromain->awward_list) && is_array($heromain->awward_list))
                                            @foreach($heromain->awward_list as $a)
                                                <div data-repeater-item class="d-flex gap-3 align-items-end mb-3">
                                                    <div class="flex-grow-1">
                                                        <label class="form-label">Line 1</label>
                                                        <input type="text" name="line1" class="form-control"
                                                               value="{{ is_array($a) ? ($a['line1'] ?? '') : '' }}"
                                                               placeholder="e.g., stabondar 3.0 | Feb ‘25">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <label class="form-label">Line 2</label>
                                                        <input type="text" name="line2" class="form-control"
                                                               value="{{ is_array($a) ? ($a['line2'] ?? '') : '' }}"
                                                               placeholder="e.g., SOTD">
                                                    </div>
                                                    <div>
                                                        <button type="button" data-repeater-delete class="btn btn-sm btn-danger">
                                                            Delete
                                                        </button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div data-repeater-item class="d-flex gap-3 align-items-end mb-3">
                                                <div class="flex-grow-1">
                                                    <label class="form-label">Line 1</label>
                                                    <input type="text" name="line1" class="form-control"
                                                           placeholder="e.g., stabondar 3.0 | Feb ‘25">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <label class="form-label">Line 2</label>
                                                    <input type="text" name="line2" class="form-control" placeholder="e.g., SOTD">
                                                </div>
                                                <div>
                                                    <button type="button" data-repeater-delete class="btn btn-sm btn-danger">
                                                        Delete
                                                    </button>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <button type="button" data-repeater-create class="btn btn-primary mt-2 mb-5">
                                        Add Award
                                    </button>
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
        </div>
    </div>

    {{-- Footer omitted for brevity --}}
@endsection

@section('scripts')
    <script src="{{ asset('admin_assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>

    <script>
        $(document).ready(function () {
            // Navbar
            $('#navbar_repeater').repeater({
                initEmpty: {{ empty($heromain->navbar) ? 'true' : 'false' }},
                defaultValues: { name: '', url: '' },
                show() { $(this).slideDown(); },
                hide(deleteElement) { $(this).slideUp(deleteElement); }
            });

            $('#main_heading_1_repeater').repeater({
                initEmpty: false,           // we provided items in Blade
                defaultValues: { line: '' },
                show() { $(this).slideDown(); },
                hide(deleteElement) { $(this).slideUp(deleteElement); }
            });

            // Loader body
            $('[data-repeater-list="loader_body"]').parent().repeater({
                initEmpty: {{ empty($heromain->loader_body) ? 'true' : 'false' }},
                defaultValues: {},
                show() { $(this).slideDown(); },
                hide(deleteElement) { $(this).slideUp(deleteElement); }
            });

            // Headings 1–5
            @foreach(range(1,5) as $n)
            $('#main_heading_{{ $n }}_repeater').repeater({
                initEmpty: {{ empty($heromain->{"main_heading_$n"}) ? 'true' : 'false' }},
                defaultValues: { line: '' },
                show() { $(this).slideDown(); },
                hide(deleteElement) { $(this).slideUp(deleteElement); }
            });
            @endforeach

            // Cube chars
            ['cube_char_1','cube_char_2'].forEach(function(name) {
                $('.' + name + '_repeater').repeater({
                    initEmpty: {{ 'false' }}, defaultValues: { line: '' },
                    show() { $(this).slideDown(); }, hide(deleteElement) { $(this).slideUp(deleteElement); }
                });
            });

            // Projects
            $('.projects_query_repeater').repeater({
                initEmpty: {{ 'false' }}, defaultValues: { image: '' },
                show() { $(this).slideDown(); }, hide(deleteElement) { $(this).slideUp(deleteElement); }
            });

            // Drop, Copy, Social links
            ['drop_links','copy_links','social_media_links'].forEach(function(name) {
                $('.' + name + '_repeater').repeater({
                    initEmpty: {{ 'false' }}, defaultValues: { name: '', url: '' },
                    show() { $(this).slideDown(); }, hide(deleteElement) { $(this).slideUp(deleteElement); }
                });
            });

            // Award list
            $('[data-repeater-list="awward_list"]').parent().repeater({
                initEmpty: {{ empty($heromain->awward_list) ? 'true' : 'false' }},
                defaultValues: { line1: '', line2: '' },
                show() { $(this).slideDown(); }, hide(deleteElement) { $(this).slideUp(deleteElement); }
            });
        });
    </script>
@endsection
