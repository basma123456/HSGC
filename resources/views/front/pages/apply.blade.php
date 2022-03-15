@extends('layouts_front.master')



@section('content')

    <!-- Start Header -->
    <section class="header">
        @include('layouts_front.nav')
    </section>
    <!-- End Header -->



    <!-- Start Main -->
    <section class="main row-cols-lg-2 p-4">
        <div class="container">
            <form action="{{  \LaravelLocalization::localizeURL(route('employees_front.store')) }}" method="Post" enctype="multipart/form-data">

                @csrf
                <div class="row">
                    <div class="mb-3 col-6">
                        <label class="form-label">First Name</label>
                        <input type="text" name="f_name" value="{{ old('f_name') }}" class="form-control @error('f_name') is-invalid @enderror">
                        @error('f_name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </div>
                    <div class="mb-3 col-6">
                        <label class="form-label">Last Name</label>
                        <input type="text" name="l_name" value="{{ old('l_name') }}" class="form-control @error('l_name') is-invalid @enderror">
                        @error('l_name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title"  value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>
                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="text" name="phone_number"  value="{{ old('phone_number') }}" class="form-control @error('phone_number') is-invalid @enderror">
                    @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror


                </div>
                <div class="mb-3">
                    <label class="form-label">Addres</label>
                    <input type="text" name="address"  value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror">
                    @error('address')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Upload your photo:</label>
                    <input class="form-control @error('image') is-invalid @enderror"  value="{{ old('image') }}"  name="image" type="file">
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Summary</label>
                    <div class="form-floating">
                        <textarea class="form-control @error('summary') is-invalid @enderror"  value="{{ old('summary') }}"  name="summary" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                        @error('summary')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </div>
                </div>
                <div class="mb-3">
                    <label for="formFile"  class="form-label">Resume</label>
                    <input class="form-control @error('resume') is-invalid @enderror"  value="{{ old('resume') }}" name="resume" type="file">
                    @error('resume')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror


                </div>


                <input type="submit" class="btn bg-main text-white w-100" value='Submit'/>
            </form>
        </div>
    </section>
    <!-- End Main -->

    @endsection
