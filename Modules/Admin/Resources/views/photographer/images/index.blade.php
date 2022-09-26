@extends('layouts.admin')
@section('title', 'Images')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="overlay-bg d-none"></div>
                <div class="">

                    <div class="card shadow-sm">
                        <div class="card-header border-bottom">
                            <h4 class="card-title">Photographer's Images</h4>
                        </div>
                        <div class="card-body mt-2">
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <span>Show </span>
                                    <select name="table_length_limit"
                                            class="table_length_limit custom-select form-control">
                                        <option value="15">15</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                    <span>entries</span>
                                </div>
                                <div class="col-lg-6 text-right">
                                    <span>Search: </span>
                                    <input type="text" name="table_filter_search "
                                           class="form-control table_filter_search "
                                    >
                                </div>
                            </div>
                            <!--RECORD WILL BE APPEND HERE in #append-record FROM RENDERED VIEW VIA AJAX-->
                            <div id="append-record"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
@push('js')
    <script src="{{asset('assets/admin/app-assets/js/fetchRecord.js')}}"></script>
@endpush
