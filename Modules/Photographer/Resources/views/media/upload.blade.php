@extends('layouts.app')
@section('title', 'Images')
@push('style')
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
    <style>
        .dropify-wrapper {
            height: 100% !important;
        }

        .trash_icon {
            position: absolute;
            top: -15px;
            right: -15px;
            height: 30px;
            width: 30px;
            border-radius: 50%;
            background: red;
            text-align: center;
            padding: 3px;
            color: wheat;
            cursor: pointer;
            z-index: 999;
        }
    </style>
@endpush
@section('content')
    <div class="mt-100" style="margin-top: 100px"></div>
    <div class="profile_section pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 m-auto ">
                    <form action="{{route('photographer.upload.submit')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="append_body">
                            <div class="card">
                                <div class="card-body position-relative">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="file" required name="image[]" class="dropify" data-min-width="2000"
                                                   data-min-height="2000">
                                            @error('image')
                                            <p class="error">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="title[]" required class="form-control"
                                                       placeholder="Enter Title">
                                            </div>
                                            <div class="form-group mt-2">
                                                <select name="category_id[]" class="form-control">
                                                    @foreach($categories as $cat)
                                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group mt-2">
                                                <textarea name="description[]" placeholder="Description" rows="5"
                                                          required class="w-100 form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="mt-2" style="float: right">
                            <button type="button" class="btn btn-primary add_more_button">Add More</button>
                        </a>

                        <button style="float: left" type="submit" class="btn btn-primary mt-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script type="text/javascript">

        let number = 1;
        dropifyInitialize();

        function dropifyInitialize() {
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
        }

        $(document).on('click', '.add_more_button', function (e) {
            e.preventDefault();
            if (number >= 5) {
                toastr.error('Sorry! 5 images can be uploaded at a time');
                return false;
            }
            number += 1;
            let html = ` <div class="card mt-4">
                                    <div class="card-body position-relative">
                                        <div class="trash_icon">
                                            <i class="fa fa-trash"></i>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="file" required name="image[]" class="dropify" data-min-width="2000"
                                                       data-min-height="2000">
                                                @error('image')
            <p class="error">{{ $message }}</p>
                                                @enderror
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="title[]" required class="form-control"
                           placeholder="Enter Title">
                </div>
                <div class="form-group mt-2">
                    <select name="category_id[]" class="form-control">
@foreach($categories as $cat)
            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                        @endforeach
            </select>
        </div>
        <div class="form-group mt-2">
            <textarea name="description[]"  placeholder="Description" rows="5" required class="w-100 form-control"></textarea>
        </div>
    </div>
</div>
</div>
</div>`;
            $('.append_body').append(html);
            dropifyInitialize();
        })

        $(document).on('click', '.trash_icon', function () {
            number -= 1;
            $(this).closest('.card').remove();
        })
    </script>

@endpush

