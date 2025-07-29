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
                                            @foreach($heromain->navbar as $index => $item)
                                                <div data-repeater-item class="row mb-3">
                                                    <div class="col-md-6">
                                                        <input type="text" name="navbar[{{ $index }}][name]" class="form-control"
                                                               value="{{ $item['name'] ?? '' }}" placeholder="Menu Name">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" name="navbar[{{ $index }}][url]" class="form-control"
                                                               value="{{ $item['url'] ?? '' }}" placeholder="Menu URL">
                                                    </div>
{{--                                                    <div class="col-md-2">--}}
{{--                                                        <button type="button" data-repeater-delete class="btn btn-danger">--}}
{{--                                                            Delete--}}
{{--                                                        </button>--}}
{{--                                                    </div>--}}
                                                </div>
                                            @endforeach
                                        @else
                                            <div data-repeater-item class="row mb-3">
                                                <div class="col-md-6">
                                                    <input type="text" name="navbar[][name]" class="form-control" placeholder="Menu Name">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="navbar[][url]" class="form-control" placeholder="Menu URL">
                                                </div>
{{--                                                <div class="col-md-2">--}}
{{--                                                    <button type="button" data-repeater-delete class="btn btn-danger">--}}
{{--                                                        Delete--}}
{{--                                                    </button>--}}
{{--                                                </div>--}}
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

                                <div class="row">
                                    {{-- Main Heading 1 --}}
                                    <div class="form-group mt-4 col-md-6">
                                        <label class="form-label">Main Heading 1</label>
                                        <div id="main_heading_1_repeater" data-repeater-list="main_heading_1">
                                            @php($list = $heromain->main_heading_1 ?? [])
                                            @if(count($list))
                                                @foreach($list as $index => $item)
                                                    <div data-repeater-item class="d-flex align-items-center mb-3">
                                                        @foreach($item as $key => $value)
                                                            <div class="col-md-12">
                                                                <input type="text" name="main_heading_1[{{ $index }}][{{ $key }}]" class="form-control me-2"
                                                                       value="{{ $value }}" placeholder="Enter {{ $key }}" />
                                                            </div>
                                                        @endforeach
                                                        {{--                                                    <button type="button" data-repeater-delete class="btn btn-sm btn-light-danger">--}}
                                                        {{--                                                        <i class="la la-trash fs-4 text-danger"></i>--}}
                                                        {{--                                                    </button>--}}
                                                    </div>
                                                @endforeach
                                            @else
                                                <div data-repeater-item class="d-flex align-items-center mb-3">
                                                    <input type="text" name="main_heading_1[][line1]" class="form-control me-2" placeholder="Enter line1" />
                                                    <input type="text" name="main_heading_1[][line2]" class="form-control me-2" placeholder="Enter line2" />
                                                    <input type="text" name="main_heading_1[][line3]" class="form-control me-2" placeholder="Enter line3" />
                                                    {{--                                                <button type="button" data-repeater-delete class="btn btn-sm btn-light-danger">--}}
                                                    {{--                                                    <i class="la la-trash fs-4 text-danger"></i>--}}
                                                    {{--                                                </button>--}}
                                                </div>
                                            @endif
                                        </div>
                                        {{--                                    <button type="button" data-repeater-create class="btn btn-primary mt-2 mb-5">--}}
                                        {{--                                        Add New Line--}}
                                        {{--                                    </button>--}}
                                    </div>

                                    <!-- Add "Add New" Button -->
                                    {{--                                <button type="button" data-repeater-create class="btn btn-primary mt-2 mb-5">--}}
                                    {{--                                    Add New Line--}}
                                    {{--                                </button>--}}

                                    {{-- Main Heading 2 --}}
                                    <div class="form-group mt-4 col-md-6">
                                        <label class="form-label">Main Heading 2</label>
                                        <div id="main_heading_2_repeater" data-repeater-list="main_heading_2">
                                            @php($list = $heromain->main_heading_2 ?? [])
                                            @if(count($list))
                                                @foreach($list as $index => $item)
                                                    <div data-repeater-item class=" d-flex align-items-center mb-3">
                                                        @foreach($item as $key => $value)
                                                            <div class="col-md-12">
                                                                <input type="text" name="main_heading_2[{{ $index }}][{{ $key }}]" class="form-control me-2"
                                                                       value="{{ $value }}" placeholder="Enter {{ $key }}" />
                                                            </div>
                                                        @endforeach
                                                        {{--                                                    <button type="button" data-repeater-delete class="btn btn-sm btn-light-danger">--}}
                                                        {{--                                                        <i class="la la-trash fs-4 text-danger"></i>--}}
                                                        {{--                                                    </button>--}}
                                                    </div>
                                                @endforeach
                                            @else
                                                <div data-repeater-item class="d-flex align-items-center mb-3">
                                                    <input type="text" name="main_heading_2[][line1]" class="form-control me-2" placeholder="Enter line1" />
                                                    <input type="text" name="main_heading_2[][line2]" class="form-control me-2" placeholder="Enter line2" />
                                                    <input type="text" name="main_heading_2[][line3]" class="form-control me-2" placeholder="Enter line3" />
                                                    {{--                                                <button type="button" data-repeater-delete class="btn btn-sm btn-light-danger">--}}
                                                    {{--                                                    <i class="la la-trash fs-4 text-danger"></i>--}}
                                                    {{--                                                </button>--}}
                                                </div>
                                            @endif
                                        </div>
                                        {{--                                    <button type="button" data-repeater-create class="btn btn-primary mt-2 mb-5">--}}
                                        {{--                                        Add New Line--}}
                                        {{--                                    </button>--}}
                                    </div>

                                    <!-- Add "Add New" Button -->
                                    {{--                                <button type="button" data-repeater-create class="btn btn-primary mt-2 mb-5">--}}
                                    {{--                                    Add New Line--}}
                                    {{--                                </button>--}}


                                    <div class="form-group mt-4 col-md-6">
                                        <label class="form-label">Main Heading 3</label>
                                        <div id="main_heading_3_repeater" data-repeater-list="main_heading_3">
                                            @php($list = $heromain->main_heading_3 ?? [])
                                            @if(count($list))
                                                @foreach($list as $index => $item)
                                                    <div data-repeater-item class=" d-flex align-items-center mb-3">
                                                        @foreach($item as $key => $value)
                                                            <div class="col-md-12">
                                                                <input type="text" name="main_heading_3[{{ $index }}][{{ $key }}]" class="form-control me-2"
                                                                       value="{{ $value }}" placeholder="Enter {{ $key }}" />
                                                            </div>
                                                        @endforeach
                                                        {{--                                                    <button type="button" data-repeater-delete class="btn btn-sm btn-light-danger">--}}
                                                        {{--                                                        <i class="la la-trash fs-4 text-danger"></i>--}}
                                                        {{--                                                    </button>--}}
                                                    </div>
                                                @endforeach
                                            @else
                                                <div data-repeater-item class="d-flex align-items-center mb-3">
                                                    <input type="text" name="main_heading_3[][line1]" class="form-control me-2" placeholder="Enter line1" />
                                                    <input type="text" name="main_heading_3[][line2]" class="form-control me-2" placeholder="Enter line2" />
                                                    <input type="text" name="main_heading_3[][line3]" class="form-control me-2" placeholder="Enter line3" />
                                                    {{--                                                <button type="button" data-repeater-delete class="btn btn-sm btn-light-danger">--}}
                                                    {{--                                                    <i class="la la-trash fs-4 text-danger"></i>--}}
                                                    {{--                                                </button>--}}
                                                </div>
                                            @endif
                                        </div>
                                        {{--                                    <button type="button" data-repeater-create class="btn btn-primary mt-2 mb-5">--}}
                                        {{--                                        Add New Line--}}
                                        {{--                                    </button>--}}
                                    </div>

                                    <!-- Add "Add New" Button -->
                                    {{--                                <button type="button" data-repeater-create class="btn btn-primary mt-2 mb-5">--}}
                                    {{--                                    Add New Line--}}
                                    {{--                                </button>--}}


                                    <div class="form-group mt-4 col-md-6">
                                        <label class="form-label">Main Heading 4</label>
                                        <div id="main_heading_4_repeater" data-repeater-list="main_heading_4">
                                            @php($list = $heromain->main_heading_4 ?? [])
                                            @if(count($list))
                                                @foreach($list as $index => $item)
                                                    <div data-repeater-item class=" d-flex align-items-center mb-3">
                                                        @foreach($item as $key => $value)
                                                            <div class="col-md-12">
                                                                <input type="text" name="main_heading_4[{{ $index }}][{{ $key }}]" class="form-control me-2"
                                                                       value="{{ $value }}" placeholder="Enter {{ $key }}" />
                                                            </div>
                                                        @endforeach
                                                        {{--                                                    <button type="button" data-repeater-delete class="btn btn-sm btn-light-danger">--}}
                                                        {{--                                                        <i class="la la-trash fs-4 text-danger"></i>--}}
                                                        {{--                                                    </button>--}}
                                                    </div>
                                                @endforeach
                                            @else
                                                <div data-repeater-item class="d-flex align-items-center mb-3">
                                                    <input type="text" name="main_heading_4[][line1]" class="form-control me-2" placeholder="Enter line1" />
                                                    <input type="text" name="main_heading_4[][line2]" class="form-control me-2" placeholder="Enter line2" />
                                                    <input type="text" name="main_heading_4[][line3]" class="form-control me-2" placeholder="Enter line3" />
                                                    {{--                                                <button type="button" data-repeater-delete class="btn btn-sm btn-light-danger">--}}
                                                    {{--                                                    <i class="la la-trash fs-4 text-danger"></i>--}}
                                                    {{--                                                </button>--}}
                                                </div>
                                            @endif
                                        </div>
                                        {{--                                    <button type="button" data-repeater-create class="btn btn-primary mt-2 mb-5">--}}
                                        {{--                                        Add New Line--}}
                                        {{--                                    </button>--}}
                                    </div>

                                    <!-- Add "Add New" Button -->
                                    {{--                                <button type="button" data-repeater-create class="btn btn-primary mt-2 mb-5">--}}
                                    {{--                                    Add New Line--}}
                                    {{--                                </button>--}}




                                    <div class="form-group mt-4 col-md-6">
                                        <label class="form-label">Main Heading 5</label>
                                        <div id="main_heading_5_repeater" data-repeater-list="main_heading_5">
                                            @php($list = $heromain->main_heading_5 ?? [])
                                            @if(count($list))
                                                @foreach($list as $index => $item)
                                                    <div data-repeater-item class=" d-flex align-items-center mb-3">
                                                        @foreach($item as $key => $value)
                                                            <div class="col-md-12">
                                                                <input type="text" name="main_heading_5[{{ $index }}][{{ $key }}]" class="form-control me-2"
                                                                       value="{{ $value }}" placeholder="Enter {{ $key }}" />
                                                            </div>
                                                        @endforeach
                                                        {{--                                                    <button type="button" data-repeater-delete class="btn btn-sm btn-light-danger">--}}
                                                        {{--                                                        <i class="la la-trash fs-4 text-danger"></i>--}}
                                                        {{--                                                    </button>--}}
                                                    </div>
                                                @endforeach
                                            @else
                                                <div data-repeater-item class="d-flex align-items-center mb-3">
                                                    <input type="text" name="main_heading_5[][line1]" class="form-control me-2" placeholder="Enter line1" />
                                                    <input type="text" name="main_heading_5[][line2]" class="form-control me-2" placeholder="Enter line2" />
                                                    <input type="text" name="main_heading_5[][line3]" class="form-control me-2" placeholder="Enter line3" />
                                                    {{--                                                <button type="button" data-repeater-delete class="btn btn-sm btn-light-danger">--}}
                                                    {{--                                                    <i class="la la-trash fs-4 text-danger"></i>--}}
                                                    {{--                                                </button>--}}
                                                </div>
                                            @endif
                                        </div>
                                        {{--                                    <button type="button" data-repeater-create class="btn btn-primary mt-2 mb-5">--}}
                                        {{--                                        Add New Line--}}
                                        {{--                                    </button>--}}
                                    </div>

                                    <!-- Add "Add New" Button -->
                                    {{--                                <button type="button" data-repeater-create class="btn btn-primary mt-2 mb-5">--}}
                                    {{--                                    Add New Line--}}
                                    {{--                                </button>--}}

                                </div>


                                <div class="row">
                                    <div class=" col-md-6 form-group mt-3">
                                        <label for="hero_video_wrapper" class="form-label">Hero Video Wrapper</label>
                                        <input
                                            type="text"
                                            name="hero_video_wrapper"
                                            id="hero_video_wrapper"
                                            class="form-control"
                                            value="{{ old('hero_video_wrapper', $heromain->hero_video_wrapper ?? '') }}"
                                            placeholder="st-b-showreel.mp4">
                                    </div>

                                    {{-- Hero Video Unmute Text --}}
                                    <div class=" col-md-6 form-group mt-3 mb-4">
                                        <label for="hero_video_unmute" class="form-label">Hero Video Unmute Text</label>
                                        <input
                                            type="text"
                                            name="hero_video_unmute"
                                            id="hero_video_unmute"
                                            class="form-control"
                                            value="{{ old('hero_video_unmute', $heromain->hero_video_unmute ?? '') }}"
                                            placeholder="unmute">
                                    </div>

                                    <div class=" col-md-12 form-group mt-3 mb-4">
                                        <label for="hero_video_unmute" class="form-label">Description</label>
                                        <textarea
                                            name="description"
                                            id="description"
                                            class="form-control">
                                            {!!  old('description', $heromain->description ?? '') !!}
                                           </textarea>
                                    </div>

                                    <div class=" col-md-12 form-group mt-3 mb-4">
                                        <label for="team_description" class="form-label">Team Description</label>
                                        <textarea
                                            name="team_description"
                                            id="team_description"
                                            class="form-control"
                                           >{!! old('team_description', $heromain->team_description ?? '') !!}
                                           </textarea>
                                    </div>

                                    <div class=" col-md-6 form-group mt-3 mb-4">
                                        <label for="num_text" class="form-label">Num Text</label>
                                        <input
                                            type="text"
                                            name="num_text"
                                            id="num_text"
                                            class="form-control"
                                            value="{{ old('num_text', $heromain->num_text ?? '') }}"
                                            placeholder="">
                                    </div>

                                </div>


                                <div id="cubeChar1Repeater">
                                    <label class="form-label">Cube Char 1</label>
                                    <div data-repeater-list="cube_char_1">
                                        @if (!empty(old('cube_char_1', $heromain->cube_char_1 ?? [])))
                                            @foreach (old('cube_char_1', $heromain->cube_char_1 ?? []) as $item)
                                                <div data-repeater-item class="row mb-3">
                                                    <div class="col-md-3">
                                                        <input type="text" name="line1" class="form-control" placeholder="Line 1" value="{{ $item['line1'] ?? '' }}">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" name="line2" class="form-control" placeholder="Line 2" value="{{ $item['line2'] ?? '' }}">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" name="line3" class="form-control" placeholder="Line 3" value="{{ $item['line3'] ?? '' }}">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" name="line4" class="form-control" placeholder="Line 4" value="{{ $item['line4'] ?? '' }}">
                                                    </div>
{{--                                                    <div class="col-md-1">--}}
{{--                                                        <button type="button" data-repeater-delete class="btn btn-danger btn-sm">×</button>--}}
{{--                                                    </div>--}}
                                                </div>
                                            @endforeach
                                        @else
                                            <div data-repeater-item class="row mb-3">
                                                <div class="col-md-3">
                                                    <input type="text" name="line1" class="form-control" placeholder="Line 1">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" name="line2" class="form-control" placeholder="Line 2">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" name="line3" class="form-control" placeholder="Line 3">
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" name="line4" class="form-control" placeholder="Line 4">
                                                </div>
{{--                                                <div class="col-md-1">--}}
{{--                                                    <button type="button" data-repeater-delete class="btn btn-danger btn-sm">×</button>--}}
{{--                                                </div>--}}
                                            </div>
                                        @endif
                                    </div>
{{--                                    <button type="button" data-repeater-create class="btn btn-primary btn-sm mt-2">+ Add Row</button>--}}
                                </div>

                                <div id="cubeChar2Repeater">
                                    <label class="form-label">Cube Char 2</label>
                                    <div data-repeater-list="cube_char_2">
                                        @if (!empty(old('cube_char_2', $heromain->cube_char_2 ?? [])))
                                            @foreach (old('cube_char_2', $heromain->cube_char_2 ?? []) as $item)
                                                <div data-repeater-item class="row mb-3">
                                                    <div class="col-md-3">
                                                        <input type="text"
                                                               name="{{ array_key_first($item) }}"
                                                               class="form-control"
                                                               placeholder="{{ array_key_first($item) }}"
                                                               value="{{ $item[array_key_first($item)] ?? '' }}">
                                                    </div>
{{--                                                    <div class="col-md-1">--}}
{{--                                                        <button type="button" data-repeater-delete class="btn btn-danger btn-sm">×</button>--}}
{{--                                                    </div>--}}
                                                </div>
                                            @endforeach
                                        @else
                                            @foreach (['line1', 'line2', 'line3', 'line4'] as $line)
                                                <div data-repeater-item class="row mb-3">
                                                    <div class="col-md-11">
                                                        <input type="text" name="{{ $line }}" class="form-control" placeholder="{{ ucfirst($line) }}">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button type="button" data-repeater-delete class="btn btn-danger btn-sm">×</button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
{{--                                    <button type="button" data-repeater-create class="btn btn-primary btn-sm mt-2">+ Add Row</button>--}}
                                </div>



                                <div class="form-group mt-5">
                                    <label class="form-label fw-bold">Cube Char 1</label>
                                    <div data-repeater-list="cube_char_1">
                                        @if(!empty($heromain->cube_char_1) && is_array($heromain->cube_char_1))
                                            @foreach($heromain->cube_char_1 as $index => $item)
                                                <div data-repeater-item class="d-flex gap-3 mb-3 align-items-center">
                                                    <div class="flex-grow-1">
                                                        <label class="form-label">Line 1</label>
                                                        <input type="text" name="cube_char_1[{{ $index }}][line1]" class="form-control"
                                                               value="{{ $item['line1'] ?? '' }}" placeholder="e.g., Nominee">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <label class="form-label">Line 2</label>
                                                        <input type="text" name="cube_char_1[{{ $index }}][line2]" class="form-control"
                                                               value="{{ $item['line2'] ?? '' }}" placeholder="e.g., Designer">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <label class="form-label">Line 3</label>
                                                        <input type="text" name="cube_char_1[{{ $index }}][line3]" class="form-control"
                                                               value="{{ $item['line3'] ?? '' }}" placeholder="e.g., of the Year">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <label class="form-label">Line 4</label>
                                                        <input type="text" name="cube_char_1[{{ $index }}][line4]" class="form-control"
                                                               value="{{ $item['line4'] ?? '' }}" placeholder="e.g., ’23">
                                                    </div>
{{--                                                    <div>--}}
{{--                                                        <button type="button" data-repeater-delete class="btn btn-sm btn-light-danger">--}}
{{--                                                            Delete--}}
{{--                                                        </button>--}}
{{--                                                    </div>--}}
                                                </div>
                                            @endforeach
                                        @else
                                            <div data-repeater-item class="d-flex gap-3 mb-3 align-items-center">
                                                <div class="flex-grow-1">
                                                    <label class="form-label">Line 1</label>
                                                    <input type="text" name="cube_char_1[][line1]" class="form-control" placeholder="e.g., Nominee">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <label class="form-label">Line 2</label>
                                                    <input type="text" name="cube_char_1[][line2]" class="form-control" placeholder="e.g., Designer">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <label class="form-label">Line 3</label>
                                                    <input type="text" name="cube_char_1[][line3]" class="form-control" placeholder="e.g., of the Year">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <label class="form-label">Line 4</label>
                                                    <input type="text" name="cube_char_1[][line4]" class="form-control" placeholder="e.g., ’23">
                                                </div>
{{--                                                <div>--}}
{{--                                                    <button type="button" data-repeater-delete class="btn btn-sm btn-light-danger">--}}
{{--                                                        Delete--}}
{{--                                                    </button>--}}
{{--                                                </div>--}}
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Add New Cube Char Button -->
{{--                                    <button type="button" data-repeater-create class="btn btn-light-primary mt-2">--}}
{{--                                        <i class="la la-plus"></i> Add Cube Char--}}
{{--                                    </button>--}}
                                </div>

                                <div class="form-group mt-5">
                                    <label class="form-label fw-bold">Cube Char 2</label>
                                    <div data-repeater-list="cube_char_2">
                                        @if(!empty($heromain->cube_char_2) && is_array($heromain->cube_char_2))
                                            @foreach($heromain->cube_char_2 as $index => $item)
                                                <div data-repeater-item class="d-flex gap-3 mb-3 align-items-center">
                                                    <div class="flex-grow-1">
                                                        <label class="form-label">Line 1</label>
                                                        <input type="text" name="cube_char_2[{{ $index }}][line1]" class="form-control"
                                                               value="{{ $item['line1'] ?? '' }}" placeholder="e.g., Won several">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <label class="form-label">Line 2</label>
                                                        <input type="text" name="cube_char_2[{{ $index }}][line2]" class="form-control"
                                                               value="{{ $item['line2'] ?? '' }}" placeholder="e.g., International">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <label class="form-label">Line 3</label>
                                                        <input type="text" name="cube_char_2[{{ $index }}][line3]" class="form-control"
                                                               value="{{ $item['line3'] ?? '' }}" placeholder="e.g., Awards">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <label class="form-label">Line 4</label>
                                                        <input type="text" name="cube_char_2[{{ $index }}][line4]" class="form-control"
                                                               value="{{ $item['line4'] ?? '' }}" placeholder="e.g., 23">
                                                    </div>
                                                    <div>
                                                        <button type="button" data-repeater-delete class="btn btn-sm btn-light-danger">
                                                            Delete
                                                        </button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div data-repeater-item class="d-flex gap-3 mb-3 align-items-center">
                                                <div class="flex-grow-1">
                                                    <label class="form-label">Line 1</label>
                                                    <input type="text" name="cube_char_2[][line1]" class="form-control" placeholder="e.g., Won several">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <label class="form-label">Line 2</label>
                                                    <input type="text" name="cube_char_2[][line2]" class="form-control" placeholder="e.g., International">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <label class="form-label">Line 3</label>
                                                    <input type="text" name="cube_char_2[][line3]" class="form-control" placeholder="e.g., Awards">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <label class="form-label">Line 4</label>
                                                    <input type="text" name="cube_char_2[][line4]" class="form-control" placeholder="e.g., 23">
                                                </div>
                                                <div>
                                                    <button type="button" data-repeater-delete class="btn btn-sm btn-light-danger">
                                                        Delete
                                                    </button>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Add New Cube Char Button -->
                                    <button type="button" data-repeater-create class="btn btn-light-primary mt-2">
                                        <i class="la la-plus"></i> Add Cube Char
                                    </button>
                                </div>



                                <div class="row">
                                   <div class="col-md-6">
                                       <label class="form-label">Drop Me Heading1</label>
                                       <input type="text" name="drop_me_heading1" class="form-control "
                                              value="{{ $heromain->drop_me_heading1 ?? ''  }}"
                                              placeholder="">
                                   </div>

                                   <div class="col-md-6">
                                       <label class="form-label">Drop Me Heading2</label>
                                       <input type="text" name="drop_me_heading2" class="form-control  "
                                              value="{{ $heromain->drop_me_heading2 ?? ''  }}"
                                              placeholder="">
                                   </div>
                                </div>

                                {{-- Drop Me Links --}}
                                <div class="form-group mt-5">
                                    <label class="form-label mb-3">Drop Me Links</label>
                                    <div class="drop_links_repeater" data-repeater-list="drop_me_links">
                                        @if(!empty($heromain->drop_me_links) && is_array($heromain->drop_me_links))
                                            @foreach($heromain->drop_me_links as $index => $link)
                                                <div data-repeater-item class="d-flex gap-3 mb-3 align-items-center">
                                                    <!-- Dynamic Inputs for each link -->
                                                    <input type="text" name="drop_me_links[{{ $index }}][name]" class="form-control w-50"
                                                           value="{{ $link['name'] ?? '' }}" placeholder="Platform Name">
                                                    <input type="text" name="drop_me_links[{{ $index }}][url]" class="form-control w-50"
                                                           value="{{ $link['url'] ?? '' }}" placeholder="https://...">
{{--                                                    <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger">--}}
{{--                                                        <i class="la la-trash-o fs-2"></i>--}}
{{--                                                    </a>--}}
                                                </div>
                                            @endforeach
                                        @else
                                            <div data-repeater-item class="d-flex gap-3 mb-3 align-items-center">
                                                <!-- Empty Inputs for new link -->
                                                <input type="text" name="drop_me_links[][name]" class="form-control w-25" placeholder="Platform Name">
                                                <input type="text" name="drop_me_links[][url]" class="form-control w-50" placeholder="https://...">
{{--                                                <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger">--}}
{{--                                                    <i class="la la-trash-o fs-2"></i>--}}
{{--                                                </a>--}}
                                            </div>
                                        @endif
                                    </div>
                                    <!-- Button to Add New Link -->
{{--                                    <a href="javascript:;" data-repeater-create class="btn btn-light-primary mt-2">--}}
{{--                                        <i class="la la-plus"></i> Add Link--}}
{{--                                    </a>--}}
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Copy Heading</label>
                                        <input type="text" name="copy_heading" class="form-control"
                                               value="{{ $heromain->copy_heading ?? ''  }}"
                                               placeholder="">
                                    </div>
                                </div>

                                {{-- Copy Links --}}
                                <div class="form-group mt-5">
                                    <label class="fs-5 fw-bold mb-3">Copy Links</label>
                                    <div class="copy_links_repeater" data-repeater-list="copy_links">
                                        @if(!empty($heromain->copy_links) && is_array($heromain->copy_links))
                                            @foreach($heromain->copy_links as $index => $c)
                                                <div data-repeater-item class="d-flex gap-3 mb-3 align-items-center">
                                                    <!-- Platform Name or Email -->
                                                    <input type="text" name="copy_links[{{ $index }}][name]" class="form-control w-50"
                                                           value="{{ $c['name'] ?? '' }}" placeholder="Name or Email">
                                                    <!-- URL -->
                                                    <input type="text" name="copy_links[{{ $index }}][url]" class="form-control w-50"
                                                           value="{{ $c['url'] ?? '' }}" placeholder="URL (optional)">
                                                    <!-- Delete Button -->
{{--                                                    <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger">--}}
{{--                                                        <i class="la la-trash-o fs-2"></i>--}}
{{--                                                    </a>--}}
                                                </div>
                                            @endforeach
                                        @else
                                            <div data-repeater-item class="d-flex gap-3 mb-3 align-items-center">
                                                <input type="text" name="copy_links[][name]" class="form-control w-50" placeholder="Name or Email">
                                                <input type="text" name="copy_links[][url]" class="form-control w-50" placeholder="URL (optional)">
{{--                                                <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger">--}}
{{--                                                    <i class="la la-trash-o fs-2"></i>--}}
{{--                                                </a>--}}
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Add Link Button -->
{{--                                    <a href="javascript:;" data-repeater-create class="btn btn-light-primary mt-2">--}}
{{--                                        <i class="la la-plus"></i> Add Copy Link--}}
{{--                                    </a>--}}
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Social Media Heading 1</label>
                                        <input type="text" name="social_media_heading1" class="form-control "
                                               value="{{ $heromain->social_media_heading1 ?? ''  }}"
                                               placeholder="">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Social Media Heading 2</label>
                                        <input type="text" name="drop_me_heading2" class="form-control  "
                                               value="{{ $heromain->social_media_heading2 ?? ''  }}"
                                               placeholder="">
                                    </div>
                                </div>

                                <div class="row">
                                    {{-- Social Media Links --}}
                                    <div class="col-md-6 form-group mt-5">
                                        <label class="fs-5 fw-bold mb-3">Social Media Links</label>
                                        <div class="social_media_links_repeater" data-repeater-list="social_media_links">
                                            @if(!empty($heromain->social_media_links) && is_array($heromain->social_media_links))
                                                @foreach($heromain->social_media_links as $index => $s)
                                                    <div data-repeater-item class="d-flex gap-3 mb-3 align-items-center">
                                                        <!-- Platform Name Input -->
                                                        <input type="text" name="social_media_links[{{ $index }}][name]" class="form-control w-25"
                                                               value="{{ $s['name'] ?? '' }}" placeholder="Platform Name">
                                                        <!-- URL Input -->
                                                        <input type="text" name="social_media_links[{{ $index }}][url]" class="form-control w-75"
                                                               value="{{ $s['url'] ?? '' }}" placeholder="URL">
                                                        <!-- Delete Button -->
                                                        <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger">
                                                            <i class="la la-trash-o fs-2"></i>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div data-repeater-item class="d-flex gap-3 mb-3 align-items-center">
                                                    <!-- Empty Platform Name and URL Inputs -->
                                                    <input type="text" name="social_media_links[][name]" class="form-control w-25" placeholder="Platform Name">
                                                    <input type="text" name="social_media_links[][url]" class="form-control w-75" placeholder="URL">
                                                    <!-- Delete Button -->
                                                    <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger">
                                                        <i class="la la-trash-o fs-2"></i>
                                                    </a>
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Add New Link Button -->
                                        <a href="javascript:;" data-repeater-create class="btn btn-light-primary mt-2">
                                            <i class="la la-plus"></i> Add Social Media Link
                                        </a>
                                    </div>

                                    {{-- Stas Bondar --}}
                                    <div class="col-md-6 form-group mt-3">
                                        <label for="stas_bondar" class="fs-5 fw-bold mb-2">Stas Bondar</label>
                                        <input
                                            type="text"
                                            name="stas_bondar"
                                            id="stas_bondar"
                                            class="form-control"
                                            value="{{ old('stas_bondar', $heromain->stas_bondar ?? '') }}"
                                            placeholder="Enter name">
                                    </div>

                                    {{-- Year --}}
                                    <div class="col-md-6 form-group mt-3">
                                        <label for="year" class="fs-5 fw-bold mb-2">Year</label>
                                        <input
                                            type="text"
                                            name="year"
                                            id="year"
                                            class="form-control"
                                            value="{{ old('year', $heromain->year ?? '') }}"
                                            placeholder="e.g. 2025">
                                    </div>

                                    {{-- Privacy Policy URL --}}
                                    <div class="col-md-6 form-group mt-3">
                                        <label for="privacy_policy_url" class="fs-5 fw-bold mb-2">Privacy Policy URL</label>
                                        <input
                                            type="url"
                                            name="privacy_policy_url"
                                            id="privacy_policy_url"
                                            class="form-control"
                                            value="{{ old('privacy_policy_url', $heromain->privacy_policy_url ?? '') }}"
                                            placeholder="https://example.com/privacy-policy">
                                    </div>

                                    {{-- Privacy Policy Text --}}
                                    <div class="col-md-6 form-group mt-3">
                                        <label for="privacy_policy" class="fs-5 fw-bold mb-2">Privacy Policy Text</label>
                                        <input
                                            type="text"
                                            name="privacy_policy"
                                            id="privacy_policy"
                                            class="form-control"
                                            value="{{ old('privacy_policy', $heromain->privacy_policy ?? '') }}"
                                            placeholder="Privacy Policy">
                                    </div>

                                    {{-- Awward Title --}}
                                    <div class="col-md-6 form-group mt-3 mb-4">
                                        <label for="awward_title" class="fs-5 fw-bold mb-2">Awward Title</label>
                                        <input
                                            type="text"
                                            name="awward_title"
                                            id="awward_title"
                                            class="form-control"
                                            value="{{ old('awward_title', $heromain->awward_title ?? '') }}"
                                            placeholder="awwwards">
                                    </div>
                                </div>

                                {{-- Award List --}}
                                <div class="form-group mt-5">
                                    <label class="form-label fw-bold">Award List</label>
                                    <div data-repeater-list="awward_list">
                                        @if(!empty($heromain->awward_list) && is_array($heromain->awward_list))
                                            @foreach($heromain->awward_list as $index => $a)
                                                <div data-repeater-item class="d-flex gap-3 align-items-end mb-3">
                                                    <div class="flex-grow-1">
                                                        <label class="form-label">Line 1</label>
                                                        <input type="text" name="awward_list[{{ $index }}][line1]" class="form-control"
                                                               value="{{ $a['line1'] ?? '' }}" placeholder="e.g., stabondar 3.0 | Feb ‘25">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <label class="form-label">Line 2</label>
                                                        <input type="text" name="awward_list[{{ $index }}][line2]" class="form-control"
                                                               value="{{ $a['line2'] ?? '' }}" placeholder="e.g., SOTD">
                                                    </div>
{{--                                                    <div>--}}
{{--                                                        <button type="button" data-repeater-delete class="btn btn-sm btn-danger">--}}
{{--                                                            Delete--}}
{{--                                                        </button>--}}
{{--                                                    </div>--}}
                                                </div>
                                            @endforeach
                                        @else
                                            <div data-repeater-item class="d-flex gap-3 align-items-end mb-3">
                                                <div class="flex-grow-1">
                                                    <label class="form-label">Line 1</label>
                                                    <input type="text" name="awward_list[][line1]" class="form-control"
                                                           placeholder="e.g., stabondar 3.0 | Feb ‘25">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <label class="form-label">Line 2</label>
                                                    <input type="text" name="awward_list[][line2]" class="form-control" placeholder="e.g., SOTD">
                                                </div>
{{--                                                <div>--}}
{{--                                                    <button type="button" data-repeater-delete class="btn btn-sm btn-danger">--}}
{{--                                                        Delete--}}
{{--                                                    </button>--}}
{{--                                                </div>--}}
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Add Award Button -->
{{--                                    <button type="button" data-repeater-create class="btn btn-primary mt-2 mb-5">--}}
{{--                                        Add Award--}}
{{--                                    </button>--}}
                                </div>


                               <div class="row">
                                   <div class="col-md-12  form-group mt-3">
                                       <label for="css_design_title" class="fs-5 fw-bold mb-2">CSS Design Awards Title</label>
                                       <input
                                           type="text"
                                           name="css_design_title"
                                           id="css_design_title"
                                           class="form-control"
                                           value="{{ old('css_design_title', $heromain->css_design_title ?? '') }}"
                                           placeholder="css design awards">
                                   </div>




                                   {{-- The FWA Title --}}
                                   <div class=" col-md-12 form-group mt-3 mb-4">
                                       <label for="the_fwa_title" class="fs-5 fw-bold mb-2">The FWA Title</label>
                                       <input
                                           type="text"
                                           name="the_fwa_title"
                                           id="the_fwa_title"
                                           class="form-control"
                                           value="{{ old('the_fwa_title', $heromain->the_fwa_title ?? '') }}"
                                           placeholder="the fwa">
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
        </div>
    </div>

    {{-- Footer omitted for brevity --}}
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('admin_assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#team_description'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });


        $(document).ready(function () {
            // Navbar
                // Initialize Metronic Query Repeater
                $('#navbar_repeater').repeater({
                    initEmpty: {{ empty($heromain->navbar) ? 'true' : 'false' }},
                    defaultValues: {
                        'navbar[][name]': '',
                        'navbar[][url]': ''
                    },
                    show() {
                        $(this).slideDown();
                    },
                    hide(deleteElement) {
                        $(this).slideUp(deleteElement);
                    }
                });

                // Click event for the "Add Navbar Link" button
                $('[data-repeater-create]').on('click', function(e) {
                    e.preventDefault();
                    $('#navbar_repeater').repeater('create');
                });




            $('#main_heading_1_repeater').repeater({
                initEmpty: {{ empty($heromain->main_heading_1) ? 'true' : 'false' }},
                defaultValues: {
                    'main_heading_1[][line1]': '',
                    'main_heading_1[][line2]': '',
                    'main_heading_1[][line3]': ''
                },
                show() {
                    $(this).slideDown();
                },
                hide(deleteElement) {
                    $(this).slideUp(deleteElement);
                }
            });

            $('[data-repeater-create]').on('click', function (e) {
                e.preventDefault();
                $('#main_heading_1_repeater').repeater('create');
            });

            $('#main_heading_2_repeater').repeater({
                initEmpty: {{ empty($heromain->main_heading_1) ? 'true' : 'false' }},
                defaultValues: {
                    'main_heading_2[][line1]': '',
                    'main_heading_2[][line2]': '',
                    'main_heading_2[][line3]': ''
                },
                show() {
                    $(this).slideDown();
                },
                hide(deleteElement) {
                    $(this).slideUp(deleteElement);
                }
            });

            $('[data-repeater-create]').on('click', function (e) {
                e.preventDefault();
                $('#main_heading_2_repeater').repeater('create');
            });

            $('#main_heading_3_repeater').repeater({
                initEmpty: {{ empty($heromain->main_heading_1) ? 'true' : 'false' }},
                defaultValues: {
                    'main_heading_3[][line1]': '',
                    'main_heading_3[][line2]': '',
                    'main_heading_3[][line3]': ''
                },
                show() {
                    $(this).slideDown();
                },
                hide(deleteElement) {
                    $(this).slideUp(deleteElement);
                }
            });

            $('[data-repeater-create]').on('click', function (e) {
                e.preventDefault();
                $('#main_heading_3_repeater').repeater('create');
            });

            $('#main_heading_4_repeater').repeater({
                initEmpty: {{ empty($heromain->main_heading_1) ? 'true' : 'false' }},
                defaultValues: {
                    'main_heading_4[][line1]': '',
                    'main_heading_4[][line2]': '',
                    'main_heading_4[][line3]': ''
                },
                show() {
                    $(this).slideDown();
                },
                hide(deleteElement) {
                    $(this).slideUp(deleteElement);
                }
            });

            $('[data-repeater-create]').on('click', function (e) {
                e.preventDefault();
                $('#main_heading_4_repeater').repeater('create');
            });

            $('#main_heading_5_repeater').repeater({
                initEmpty: {{ empty($heromain->main_heading_1) ? 'true' : 'false' }},
                defaultValues: {
                    'main_heading_5[][line1]': '',
                    'main_heading_5[][line2]': '',
                    'main_heading_5[][line3]': ''
                },
                show() {
                    $(this).slideDown();
                },
                hide(deleteElement) {
                    $(this).slideUp(deleteElement);
                }
            });

            $('[data-repeater-create]').on('click', function (e) {
                e.preventDefault();
                $('#main_heading_5_repeater').repeater('create');
            });

            // Trigger to add a new item when clicking "Add New" button
            $('[data-repeater-create]').on('click', function (e) {
                e.preventDefault();
                $('#main_heading_1_repeater').repeater('create');  // Create a new repeater item
            });

            // Loader body
            $('[data-repeater-list="loader_body"]').parent().repeater({
                initEmpty: {{ empty($heromain->loader_body) ? 'true' : 'false' }},
                defaultValues: {},
                show() { $(this).slideDown(); },
                hide(deleteElement) { $(this).slideUp(deleteElement); }
            });

            $('.drop_links_repeater').repeater({
                initEmpty: {{ empty($heromain->drop_me_links) ? 'true' : 'false' }},
                defaultValues: {
                    'drop_me_links[][name]': '',
                    'drop_me_links[][url]': ''
                },
                show() {
                    $(this).slideDown();    // Slide down newly added items
                },
                hide(deleteElement) {
                    $(this).slideUp(deleteElement);  // Slide up deleted items
                }
            });


            $('.copy_links_repeater').repeater({
                initEmpty: {{ empty($heromain->copy_links) ? 'true' : 'false' }},
                defaultValues: {
                    'copy_links[][name]': '',
                    'copy_links[][url]': ''
                },
                show() {
                    $(this).slideDown();    // Slide down newly added items
                },
                hide(deleteElement) {
                    $(this).slideUp(deleteElement);  // Slide up deleted items
                }
            });


            $('[data-repeater-create]').on('click', function (e) {
                e.preventDefault();
                $('.copy_links_repeater').repeater('create');  // Create a new repeater item when clicked
            });

            // Handle "Add New" button click event
            $('[data-repeater-create]').on('click', function (e) {
                e.preventDefault();
                $('.drop_links_repeater').repeater('create');  // Create a new repeater item
            });
            // Cube chars
            ['cube_char_1','cube_char_2'].forEach(function(name) {
                $('.' + name + '_repeater').repeater({
                    initEmpty: {{ 'false' }}, defaultValues: { line: '' },
                    show() { $(this).slideDown(); }, hide(deleteElement) { $(this).slideUp(deleteElement); }
                });
            });



            // Drop, Copy, Social links
            ['drop_links','copy_links','social_media_links'].forEach(function(name) {
                $('.' + name + '_repeater').repeater({
                    initEmpty: {{ 'false' }}, defaultValues: { name: '', url: '' },
                    show() { $(this).slideDown(); }, hide(deleteElement) { $(this).slideUp(deleteElement); }
                });
            });

            $('.social_media_links_repeater').repeater({
                initEmpty: {{ empty($heromain->social_media_links) ? 'true' : 'false' }},
                defaultValues: {
                    'social_media_links[][name]': '',
                    'social_media_links[][url]': ''
                },
                show() {
                    $(this).slideDown();    // Slide down newly added items
                },
                hide(deleteElement) {
                    $(this).slideUp(deleteElement);  // Slide up deleted items
                }
            });

            // Handle the "Add Social Media Link" button click
            $('[data-repeater-create]').on('click', function (e) {
                e.preventDefault();
                $('.social_media_links_repeater').repeater('create');  // Create a new repeater item when clicked
            });

            // Award list
            $('[data-repeater-list="awward_list"]').parent().repeater({
                initEmpty: {{ empty($heromain->awward_list) ? 'true' : 'false' }},
                defaultValues: { line1: '', line2: '' },
                show() { $(this).slideDown(); }, hide(deleteElement) { $(this).slideUp(deleteElement); }
            });


            $('[data-repeater-list="awward_list"]').repeater({
                initEmpty: {{ empty($heromain->awward_list) ? 'true' : 'false' }},
                defaultValues: {
                    'awward_list[][line1]': '',
                    'awward_list[][line2]': ''
                },
                show() {
                    $(this).slideDown();    // Slide down newly added items
                },
                hide(deleteElement) {
                    $(this).slideUp(deleteElement);  // Slide up deleted items
                }
            });

            // Handle the "Add Award" button click
            $('[data-repeater-create]').on('click', function (e) {
                e.preventDefault();
                $('[data-repeater-list="awward_list"]').repeater('create');  // Create a new repeater item when clicked
            });



            $('[data-repeater-list="cube_char_1"]').repeater({
                initEmpty: {{ empty($heromain->cube_char_1) ? 'true' : 'false' }},
                defaultValues: {
                    'cube_char_1[][line1]': '',
                    'cube_char_1[][line2]': '',
                    'cube_char_1[][line3]': '',
                    'cube_char_1[][line4]': ''
                },
                show() {
                    $(this).slideDown();    // Slide down newly added items
                },
                hide(deleteElement) {
                    $(this).slideUp(deleteElement);  // Slide up deleted items
                }
            });

            // Handle the "Add Cube Char" button click
            $('[data-repeater-create]').on('click', function (e) {
                e.preventDefault();
                $('[data-repeater-list="cube_char_1"]').repeater('create');  // Create a new repeater item when clicked
            });
            $('[data-repeater-list="cube_char_2"]').repeater({
                initEmpty: {{ empty($heromain->cube_char_2) ? 'true' : 'false' }},
                defaultValues: {
                    'cube_char_2[][line1]': '',
                    'cube_char_2[][line2]': '',
                    'cube_char_2[][line3]': '',
                    'cube_char_2[][line4]': ''
                },
                show() {
                    $(this).slideDown();    // Slide down newly added items
                },
                hide(deleteElement) {
                    $(this).slideUp(deleteElement);  // Slide up deleted items
                }
            });

            // Handle the "Add Cube Char" button click
            $('[data-repeater-create]').on('click', function (e) {
                e.preventDefault();
                $('[data-repeater-list="cube_char_2"]').repeater('create');  // Create a new repeater item when clicked
            });
            $(document).ready(function () {
                $('#cubeChar1Repeater').repeater({
                    initEmpty: false,
                    defaultValues: {
                        'line1': '',
                        'line2': '',
                        'line3': '',
                        'line4': '',
                    },
                    show: function () {
                        $(this).slideDown();
                    },
                    hide: function (deleteElement) {
                        if(confirm('Are you sure you want to delete this item?')) {
                            $(this).slideUp(deleteElement);
                        }
                    }
                });
                $('#cubeChar2Repeater').repeater({
                    initEmpty: false,
                    show: function () {
                        $(this).slideDown();
                    },
                    hide: function (deleteElement) {
                        if(confirm('Are you sure you want to delete this row?')) {
                            $(this).slideUp(deleteElement);
                        }
                    }
                });



        });
    </script>
@endsection
