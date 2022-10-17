@extends('admin::adminpannel.layout')


@section('content')

@section('content')
    <div class="card">
        <div class="card-body">


            <div>
                <ul class="ab">
                    <li class="ab">
                        <a href="{{ route('admin') }}">{{ trans('lang_data.home_lable') }}</a><i class="mdi mdi-record"></i>
                    </li>

                    <li class="ab active">
                        {{ trans('lang_data.edit_lable') }} Setting
                    </li>

                </ul>
            </div>



            <h3 class="ab">
                &nbsp;
                {{ trans('lang_data.edit_lable') }} Setting


            </h3>

            @if (isset($editdata))
                {!! Form::model($editdata, [
                    'url' => route('setting.update', $editdata->id),
                    'id' => 'setting',
                    'method' => 'put',
                    'enctype' => 'multipart/form-data',
                ]) !!}
            @endif

            @csrf

            <p class="card-description">
            <h3>Basic info</h3>
            <hr>
            </p>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Website Url</label>
                        <div class="col-sm-9">

                            {!! Form::url('website_url', null, [
                                'id' => 'website_url',
                                'placeholder' => 'Enter url',
                                'class' => 'form-control',
                            ]) !!}
                            @if ($errors->has('website_url'))
                                <span class="text-danger">{{ $errors->first('website_url') }}</span>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Author Name</label>
                        <div class="col-sm-9">

                            {!! Form::text('author_name', null, [
                                'id' => 'author_name',
                                'placeholder' => 'Enter author name',
                                'class' => 'form-control',
                            ]) !!}
                            @if ($errors->has('author_name'))
                                <span class="text-danger">{{ $errors->first('author_name') }}</span>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">

                            {!! Form::email('email', null, [
                                'id' => 'email',
                                'placeholder' => 'Enter email',
                                'class' => 'form-control',
                            ]) !!}
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Second Email</label>
                        <div class="col-sm-9">

                            {!! Form::email('second_email', null, [
                                'id' => 'second_email',
                                'placeholder' => 'Enter second email ',
                                'class' => 'form-control',
                            ]) !!}
                            @if ($errors->has('second_email'))
                                <span class="text-danger">{{ $errors->first('second_email') }}</span>
                            @endif

                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Mobile</label>
                        <div class="col-sm-9">

                            {!! Form::number('mobile', null, [
                                'id' => 'mobile',
                                'placeholder' => 'Enter mobile',
                                'class' => 'form-control',
                            ]) !!}
                            @if ($errors->has('mobile'))
                                <span class="text-danger">{{ $errors->first('mobile') }}</span>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Second Mobile</label>
                        <div class="col-sm-9">

                            {!! Form::number('second_mobile', null, [
                                'id' => 'second_mobile',
                                'placeholder' => 'Enter second mobile',
                                'class' => 'form-control',
                            ]) !!}
                            @if ($errors->has('second_mobile'))
                                <span class="text-danger">{{ $errors->first('second_mobile') }}</span>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

            <div>
                <h3>
                    Description Details
                </h3>
            </div>

            <hr>



            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Author Desciption Footer</label>
                        <div class="col-sm-9">


                            {!! Form::textarea('author_desciption_footer', null, [
                                'id' => 'author_desciption_footer',
                                'class' => 'form-control',
                            ]) !!}
                            @if ($errors->has('author_desciption_footer'))
                                <span class="text-danger">{{ $errors->first('author_desciption_footer') }}</span>
                            @endif


                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Author Desciption Sidebar</label>
                        <div class="col-sm-9">


                            {!! Form::textarea('author_desciption_sidebar', null, [
                                'id' => 'author_desciption_sidebar',
                                'class' => 'form-control',
                            ]) !!}
                            @if ($errors->has('author_desciption_sidebar'))
                                <span class="text-danger">{{ $errors->first('author_desciption_sidebar') }}</span>
                            @endif


                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Second Address</label>
                        <div class="col-sm-9">

                            {!! Form::textarea('second_address', null, [
                                'id' => 'second_address',
                                'class' => 'form-control',
                            ]) !!}
                            @if ($errors->has('second_address'))
                                <span class="text-danger">{{ $errors->first('second_address') }}</span>
                            @endif

                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-12">
                <div class="form-group row ">
                    <label class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-9">

                        {!! Form::textarea('address', null, [
                            'id' => 'address',
                            'class' => 'form-control editor-tinymce',
                        ]) !!}

                        @if ($errors->has('address'))
                            <span class="text-danger">{{ $errors->first('address') }}</span>
                        @endif

                    </div>
                </div>
            </div>


            <div>
                <h3>
                    Upload Image
                </h3>
            </div>

            <hr>
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Logo</label>
                        <div class="col-sm-9">

                            {!! Form::file('logo', null, [
                                'id' => 'logo',
                                'class' => 'form-control',
                            ]) !!}
                            <div>
                                @if ($errors->has('logo'))
                                    <span class="text-danger">{{ $errors->first('logo') }}</span>
                                @endif
                            </div>
                            <div>
                                <img src="{{ asset('uploads/setting/') }}/{{ $editdata->logo }}" alt=""
                                    class="ab hide_logo">
                            </div>
<a href="javascipt:void(0)" class="btn btn-danger btn-sm delete_logo">Delete</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Favicon Logo</label>
                        <div class="col-sm-9">

                            {!! Form::file('favicon_logo', null, [
                                'id' => 'favicon_logo',
                                'class' => 'form-control',
                            ]) !!}
                            <div>
                                @if ($errors->has('favicon_logo'))
                                    <span class="text-danger">{{ $errors->first('favicon_logo') }}</span>
                                @endif
                            </div>

                            <div>
                                <img src="{{ asset('uploads/setting/') }}/{{ $editdata->favicon_logo }}" alt=""
                                    class="ab hide_favicon_logo">
                            </div>
                            <a href="javascript:void(0)" class="btn btn-danger btn-sm delete_favicon_logo">Delete</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Email_Logo</label>
                        <div class="col-sm-9">

                            {!! Form::file('email_logo', null, [
                                'id' => 'email_logo',
                                'class' => 'form-control',
                            ]) !!}
                            <div>
                                @if ($errors->has('email_logo'))
                                    <span class="text-danger">{{ $errors->first('email_logo') }}</span>
                                @endif
                            </div>

                            <div>
                                <img src="{{ asset('uploads/setting/') }}/{{ $editdata->email_logo }}" alt=""
                                    class="ab hide_email_logo">
                            </div>
                            <a href="javascript:void(0)" class="btn btn-danger btn-sm delete_email_logo">Delete</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Default Banner</label>
                        <div class="col-sm-9">

                            {!! Form::file('default_banner', null, [
                                'id' => 'default_banner',
                                'class' => 'form-control',
                            ]) !!}
                            <div>
                                @if ($errors->has('default_banner'))
                                    <span class="text-danger">{{ $errors->first('default_banner') }}</span>
                                @endif
                            </div>

                            <div>
                                <img src="{{ asset('uploads/setting/') }}/{{ $editdata->default_banner }}" alt=""
                                    class="ab hide_default_banner">
                            </div>
                            <a href="javascript:void(0)" class="btn btn-danger btn-sm delete_default_banner">Delete</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Author Image </label>
                        <div class="col-sm-9">

                            {!! Form::file('author_image', null, [
                                'id' => 'author_image',
                                'class' => 'form-control',
                            ]) !!}
                            <div>
                                @if ($errors->has('author_image'))
                                    <span class="text-danger">{{ $errors->first('author_image') }}</span>
                                @endif
                            </div>

                            <div>
                                <img src="{{ asset('uploads/setting/') }}/{{ $editdata->author_image }}" alt=""
                                    class="ab author_image_hide">
                            </div>
                            <a href="javascript:void(0)" class="btn btn-danger btn-sm author_image_delete">Delete</a>
                        </div>
                    </div>
                </div>
            </div>



            {!! Form::submit('' . trans('lang_data.submit_lable') . '', ['class' => 'btn btn-primary']) !!}

            <a href="{{ route('cms.index') }}" class="btn btn-danger">{{ trans('lang_data.cancle_lable') }}</a>

            {!! Form::close() !!}

        </div>
    </div>




@endsection
@section('script')



    <script>
        $(".author_image_delete").click(function() {

            $.ajax({
                type: 'POST',
                url: "{{ route('delete_authorimage') }}",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    if (data.status == 'ok') {

                        $('.author_image_hide').hide();
                        $('.author_image_delete').hide();

                    }
                }
            });

        });

        $(".delete_default_banner").click(function() {

            $.ajax({
                type: 'POST',
                url: "{{ route('delete_defaultbanner') }}",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    if (data.status == 'ok') {

                        $('.hide_default_banner').hide();
                        $('.delete_default_banner').hide();

                    }
                }
            });

        });

        $(".delete_email_logo").click(function() {

            $.ajax({
                type: 'POST',
                url: "{{ route('delete_emaillogo') }}",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    if (data.status == 'ok') {

                        $('.hide_email_logo').hide();
                        $('.delete_email_logo').hide();

                    }
                }
            });

        });

        $(".delete_favicon_logo").click(function() {

            $.ajax({
                type: 'POST',
                url: "{{ route('delete_faviconlogo') }}",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    if (data.status == 'ok') {

                        $('.hide_favicon_logo').hide();
                        $('.delete_favicon_logo').hide();

                    }
                }
            });

        });

        $(".delete_logo").click(function() {

            $.ajax({
                type: 'POST',
                url: "{{ route('delete_logo') }}",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    if (data.status == 'ok') {

                        $('.hide_logo').hide();
                        $('.delete_logo').hide();

                    }
                }
            });

        });
    </script>

@endsection
