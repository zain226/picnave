@extends('layouts.admin')
@section('title', 'Images')
@push('css')
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
@endpush
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Upload Image</h4>
                            </div>
                            <div class="card-body">

                                <form action="{{route('admin.images.store')}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="basicInput">Title</label>
                                                <input required type="text" class="form-control" name="title" id="basicInput"
                                                       placeholder="Enter Title">
                                                @error('title')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="basicSelect">Select Category</label>
                                                <select class="form-control" required name="category_id" id="basicSelect">
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="basicInput">Description</label>
                                                <textarea required class="form-control" id="" placeholder="Enter email"
                                                          name="descrip"></textarea>
                                                @error('descrip')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="file" name="image" class="dropify" data-min-width="2000" data-min-height="2000">
                                            @error('image')
                                            <p class="error">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mt-2 row">
                                        <div class="col-md-12">
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
    @include('Admin.components.ckeditor')
    {{--    <script src="{{asset('admin/app-assets/js/fetchRecord.js')}}"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script type="text/javascript">
        $('.dropify').dropify(
            {
                messages: {
                    'default': 'Upload File',
                    'replace': 'Drag and drop or click to replace',
                    'remove': 'Remove',
                    'error': 'Ooops, something wrong happended.'
                }
            }
        );
    </script>
@endpush
