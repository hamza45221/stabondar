@extends('layouts.mainadmin')

@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            {{-- Toolbar --}}
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <div class="app-container container-xxl d-flex flex-stack">
                    <div class="page-title">
                        <h1 class="page-heading text-gray-900 fw-bold fs-3">Contact</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Admin</a>
                            </li>
                            <li class="breadcrumb-item"><span class="bullet bg-gray-500 w-5px h-2px"></span></li>
                            <li class="breadcrumb-item text-muted">Contact</li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Content --}}
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div class="app-container container-xxl">
                    <div class="card">
                        <div class="card-body pt-0">
                            <form method="POST" action="{{ route('admin.contact.store') }}" enctype="multipart/form-data">
                                @csrf

                                {{-- Image URL --}}
                                <div class="form-group mb-4">
                                    <label class="form-label fw-bold">Contact Image</label>
                                    <input
                                        type="file"
                                        name="image"
                                        class="form-control"
                                    />

                                    {{-- Preview existing image --}}
                                    @if(!empty($contact->image))
                                        <div class="mt-3">
                                            <img
                                                src="{{ asset($contact->image) }}"
                                                alt="Current contact image"
                                                class="img-fluid rounded"
                                                style="max-width: 100px;"
                                            />
                                        </div>
                                    @endif
                                </div>


                                {{-- Help Labels --}}
                                <div class="form-group mb-4">
                                    <label class="form-label fw-bold">Help Label 1</label>
                                    <input
                                        type="text"
                                        name="help_label_1"
                                        class="form-control"
                                        value="{{ old('help_label_1', $contact->help_label_1 ?? '') }}"
                                        placeholder="I can help you"
                                    />
                                </div>

                                <div class="form-group mb-4">
                                    <label class="form-label fw-bold">Help Label 2</label>
                                    <input
                                        type="text"
                                        name="help_label_2"
                                        class="form-control"
                                        value="{{ old('help_label_2', $contact->help_label_2 ?? '') }}"
                                        placeholder="with:"
                                    />
                                </div>

                                {{-- Range Labels --}}
                                <div class="form-group mb-4">
                                    <label class="form-label fw-bold">Range Label 1</label>
                                    <input
                                        type="text"
                                        name="range_label_1"
                                        class="form-control"
                                        value="{{ old('range_label_1', $contact->range_label_1 ?? '') }}"
                                        placeholder="Your budget"
                                    />
                                </div>

                                <div class="form-group mb-4">
                                    <label class="form-label fw-bold">Range Label 2</label>
                                    <input
                                        type="text"
                                        name="range_label_2"
                                        class="form-control"
                                        value="{{ old('range_label_2', $contact->range_label_2 ?? '') }}"
                                        placeholder="range is:"
                                    />
                                </div>

                                {{-- Details Labels --}}
                                <div class="form-group mb-4">
                                    <label class="form-label fw-bold">Details Label 1</label>
                                    <input
                                        type="text"
                                        name="details_label_1"
                                        class="form-control"
                                        value="{{ old('details_label_1', $contact->details_label_1 ?? '') }}"
                                        placeholder="Give me more details about"
                                    />
                                </div>

                                <div class="form-group mb-4">
                                    <label class="form-label fw-bold">Details Label 2</label>
                                    <input
                                        type="text"
                                        name="details_label_2"
                                        class="form-control"
                                        value="{{ old('details_label_2', $contact->details_label_2 ?? '') }}"
                                        placeholder="your project:"
                                    />
                                </div>

                                {{-- Contact Info Label --}}
                                <div class="form-group mb-4">
                                    <label class="form-label fw-bold">Contact Info Label</label>
                                    <input
                                        type="text"
                                        name="contact_info_label"
                                        class="form-control"
                                        value="{{ old('contact_info_label', $contact->contact_info_label ?? '') }}"
                                        placeholder="Contact info:"
                                    />
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
