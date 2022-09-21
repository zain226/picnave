@extends('layouts.app')
@section('title', 'Images')
@section('content')
    <div class="mt-100" style="margin-top: 100px"></div>
    <div class="profile_section pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 m-auto">
                    <div class="main_heading">My Profile</div>
                    <form class="editProfileForm" action="{{route('photographer.profile.edit.submit')}}" method="post" enctype="multipart/form-data">
                       @csrf
                        <div style="align-items: center;text-align: center" class="m-auto w-fit-content">
                            <div>
                                <div class="">
                                    <img src="{{$user->image}}" class="user_logo_image">
                                </div>
                            </div>
                            <label for="uploadImage" class="mt-2 btn btn-primary">
                                <i class="fa fa-upload"></i> Upload
                                <input type="file" name="file" id="uploadImage" class="d-none"
                                       accept="image/jpg, image/jpeg, image/png">
                            </label>
                        </div>
                        <div class="mt-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" value="{{$user->name}}" required name="first_name" class="form-control" id="exampleFormControlInput1" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" required value="{{$user->last_name}}" name="last_name" class="form-control" id="exampleFormControlInput1" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <input type="email" readonly value="{{$user->email}}" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <textarea  required name="bio"  class="form-control w-100" id="" rows="5">{{$user->bio ?? 'Your Bio........'}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <input type="text" required value="{{$user->instagram_link}}" name="instagram_link" class="form-control" id="" placeholder="Instagram Id">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <button class="btn btn-primary w-100" >Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush

