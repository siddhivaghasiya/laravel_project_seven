@extends('admin::adminpannel.layout')


@section('content')

@section('content')
    <div class="card">
        <div class="card-body">

            @if (isset($editdata))
                <div>
                    <ul class="ab">
                        <li class="ab">
                            <a href="{{ route('admin') }}">{{ trans('lang_data.home_lable') }}</a><i
                                class="mdi mdi-record"></i>
                        </li>
                        <li class="ab">
                            <a href="{{ route('cms.index') }}">CMS {{ trans('lang_data.listing_lable') }}</a><i
                                class="mdi mdi-record"></i>
                        <li class="ab active">
                            {{ trans('lang_data.edit_lable') }} CMS
                        </li>

                    </ul>
                </div>
            @else
                <ul class="ab">
                    <li class="ab">
                        <a href="{{ route('admin') }}">{{ trans('lang_data.home_lable') }}</a><i class="mdi mdi-record"></i>
                    </li>
                    <li class="ab">
                        <a href="{{ route('cms.index') }}">CMS {{ trans('lang_data.listing_lable') }}</a><i
                            class="mdi mdi-record"></i>
                    <li class="ab active">
                        {{ trans('lang_data.add_lable') }} CMS
                    </li>

                </ul>
            @endif

            <h3 class="ab">
                &nbsp; @if (isset($editdata))
                    {{ trans('lang_data.edit_lable') }} CMS
                @else
                    {{ trans('lang_data.add_lable') }} CMS
                @endif
            </h3>

            @if (isset($editdata))
                {!! Form::model($editdata, [
                    'url' => route('cms.update', $editdata->id),
                    'id' => 'cms',
                    'method' => 'put',
                    'enctype' => 'multipart/form-data',
                ]) !!}
            @else
                {!! Form::open([
                    'url' => route('cms.store'),
                    'id' => 'cms',
                    'method' => 'post',
                    'enctype' => 'multipart/form-data',
                ]) !!}
            @endif

            @csrf

            <p class="card-description">
            <h3>Content info</h3>
            <hr>
            </p>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Parent Title</label>
                        <div class="col-sm-9">

                            @if (isset($getparent_title))
                                {!! Form::select('parent_title', $getparent_title, null, [
                                    'id' => 'parent_title',
                                    'placeholder' => 'select parent categorie ',
                                    'class' => 'form-control',
                                ]) !!}
                            @endif

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Module</label>
                        <div class="col-sm-9">

                            @if (isset($getmodules))
                                {!! Form::select('modules', $getmodules, null, [
                                    'id' => 'modules',
                                    'placeholder' => 'select modules ',
                                    'class' => 'form-control',
                                ]) !!}
                                 @if ($errors->has('modules'))
                                 <span class="text-danger">{{ $errors->first('modules') }}</span>
                             @endif
                            @endif

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">

                            {!! Form::text('name', null, [
                                'id' => 'name',
                                'placeholder' => 'Enter name',
                                'class' => 'form-control',
                            ]) !!}
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Secondary Title</label>
                        <div class="col-sm-9">

                            {!! Form::text('secondary_title', null, [
                                'id' => 'secondary_title',
                                'placeholder' => 'Enter Secondary title',
                                'class' => 'form-control',
                            ]) !!}
                            @if ($errors->has('secondary_title'))
                                <span class="text-danger">{{ $errors->first('secondary_title') }}</span>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Display On Header</label>
                        <div class="col-sm-4">
                            <div class="form-check">
                                <label class="form-check-label">

                                    <?php
                                    if (isset($editdata) && $editdata->display_on_header == 1) {
                                        $tRUEFalse = true;
                                    } else {
                                        $tRUEFalse = false;
                                    }
                                    ?>

                                    {!! Form::radio('display_on_header', 1, $tRUEFalse, [
                                        'id' => 'display_on_header',
                                        'class' => 'form-control',
                                    ]) !!}
                                    Yes

                                </label>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-check">
                                <label class="form-check-label">

                                    {!! Form::radio('display_on_header', 2, $tRUEFalse, [
                                        'id' => 'display_on_header',
                                        'class' => 'form-control',
                                    ]) !!}
                                    No
                                </label>
                            </div>
                        </div>

                        @if ($errors->has('display_on_header'))
                            <span class="text-danger">{{ $errors->first('display_on_header') }}</span>
                        @endif

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Display On Footer</label>
                        <div class="col-sm-4">
                            <div class="form-check">
                                <label class="form-check-label">

                                    <?php
                                    if (isset($editdata) && $editdata->display_on_footer == 1) {
                                        $ab = true;
                                    } else {
                                        $ab = false;
                                    }
                                    ?>

                                    {!! Form::radio('display_on_footer', 1, $ab, [
                                        'id' => 'display_on_footer',
                                        'class' => 'form-control',
                                    ]) !!}

                                    Yes
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-check">
                                <label class="form-check-label">

                                    {!! Form::radio('display_on_footer', 2, $ab, [
                                        'id' => 'display_on_footer',
                                        'class' => 'form-control',
                                    ]) !!}
                                    No
                                </label>
                            </div>
                        </div>

                        @if ($errors->has('display_on_footer'))
                            <span class="text-danger">{{ $errors->first('display_on_footer') }}</span>
                        @endif

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-4">
                            <div class="form-check">
                                <label class="form-check-label">

                                    <?php
                                    if (isset($editdata) && $editdata->status == 1) {
                                        $tRUEFalse = true;
                                    } else {
                                        $tRUEFalse = false;
                                    }
                                    ?>
                                    {!! Form::radio('status', 1, $tRUEFalse, [
                                        'id' => 'status',
                                        'class' => 'form-control',
                                    ]) !!}
                                    Active
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-check">
                                <label class="form-check-label">

                                    {!! Form::radio('status', 2, $tRUEFalse, [
                                        'id' => 'status',
                                        'class' => 'form-control',
                                    ]) !!}
                                    Inactive
                                </label>
                            </div>
                        </div>


                        @if ($errors->has('status'))
                            <span class="text-danger">{{ $errors->first('status') }}</span>
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
                        <label class="col-sm-3 col-form-label">Image</label>
                        <div class="col-sm-9">
                            {!! Form::file('image', null, [
                                'id' => 'image',
                                'class' => 'form-control',
                            ]) !!}

                            <div>
                                @if ($errors->has('image'))
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <h3>
                    Search Engine Optimization (SEO)
                </h3>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">SEO Title</label>
                        <div class="col-sm-9">

                            {!! Form::text('seo_title', null, [
                                'id' => 'seo_title',
                                'placeholder' => 'Enter title',
                                'class' => 'form-control',
                            ]) !!}
                            @if ($errors->has('seo_title'))
                                <span class="text-danger">{{ $errors->first('seo_title') }}</span>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">SEO Keyword</label>
                        <div class="col-sm-9">

                            {!! Form::text('seo_keyword', null, [
                                'id' => 'seo_keyword',
                                'placeholder' => 'Enter keyword',
                                'class' => 'form-control',
                            ]) !!}
                            @if ($errors->has('seo_keyword'))
                                <span class="text-danger">{{ $errors->first('seo_keyword') }}</span>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">SEO Description</label>
                        <div class="col-sm-9">

                            {!! Form::textarea('seo_description', null, [
                                'id' => 'seo_description',
                                'class' => 'form-control',
                            ]) !!}
                            @if ($errors->has('seo_description'))
                                <span class="text-danger">{{ $errors->first('seo_description') }}</span>
                            @endif

                        </div>
                    </div>
                </div>

            </div>

            <div>
                <h3>
                    Description
                </h3>
            </div>

            <hr>


            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Short Description</label>
                <div class="col-sm-9">

                    {!! Form::textarea('short_description', null, [
                        'id' => 'short_description',
                        'class' => 'form-control editor-tinymce',
                    ]) !!}

                    @if ($errors->has('short_description'))
                        <span class="text-danger">{{ $errors->first('short_description') }}</span>
                    @endif

                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Long Description</label>
                <div class="col-sm-9">

                    {!! Form::textarea('long_description', null, [
                        'id' => 'long_description',
                        'class' => 'form-control editor-tinymce',
                    ]) !!}

                    @if ($errors->has('long_description'))
                        <span class="text-danger">{{ $errors->first('long_description') }}</span>
                    @endif

                </div>
            </div>

            {!! Form::submit('' . trans('lang_data.submit_lable') . '', ['class' => 'btn btn-primary']) !!}

            <a href="{{ route('cms.index') }}" class="btn btn-danger">{{ trans('lang_data.cancle_lable') }}</a>

            {!! Form::close() !!}

        </div>
    </div>



@endsection
