@extends('admin::adminpannel.layout')

@section('content')
    <div class="card">
        <div class="card-body">

            @if (isset($editdata))
                <div>
                    <ul class="ab">
                        <li class="ab">
                            <a href="{{ route('admin') }}">{{ trans('lang_data.home_lable') }}</a><i class="mdi mdi-record"></i>
                        </li>
                        <li class="ab">
                            <a href="{{ route('blog.index') }}">Blog {{ trans('lang_data.listing_lable') }}</a><i
                                class="mdi mdi-record"></i>
                        <li class="ab active">
                            {{ trans('lang_data.edit_lable') }} Blog
                        </li>

                    </ul>
                </div>
            @else
                <ul class="ab">
                    <li class="ab">
                        <a href="{{ route('admin') }}">{{ trans('lang_data.home_lable') }}</a><i class="mdi mdi-record"></i>
                    </li>
                    <li class="ab">
                        <a href="{{ route('banner.index') }}">Blog {{ trans('lang_data.listing_lable') }}</a><i class="mdi mdi-record"></i>
                    <li class="ab active">
                        {{ trans('lang_data.add_lable') }} Blog
                    </li>

                </ul>
            @endif

            <h3 class="ab">
                &nbsp; @if (isset($editdata))
                    {{ trans('lang_data.edit_lable') }} Blog
                @else
                    {{ trans('lang_data.add_lable') }} Blog
                @endif
            </h3>

            @if (isset($editdata))
                {!! Form::model($editdata, [
                    'url' => route('blog.update', $editdata->id),
                    'id' => 'blog',
                    'method' => 'put',
                    'enctype' => 'multipart/form-data',
                ]) !!}
            @else
                {!! Form::open([
                    'url' => route('blog.store'),
                    'id' => 'blog',
                    'method' => 'post',
                    'enctype' => 'multipart/form-data',
                ]) !!}
            @endif

            @csrf

            <div class="form-group">
                <label>Title:</label>
                {!! Form::text('title', null, [
                    'id' => 'title',
                    'placeholder' => 'Enter title',
                    'class' => 'form-control',
                ]) !!}
                @if ($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label>Categories:</label>
                {!! Form::select('categories', $getcategories, null, [
                    'id' => 'categories',
                    'placeholder' => 'select categories',
                    'class' => 'form-control',
                ]) !!}
                @if ($errors->has('categories'))
                    <span class="text-danger">{{ $errors->first('categories') }}</span>
                @endif
            </div>


            <div class="form-group">
                <label>Tags:</label>
                {!! Form::select('tags', $gettags, null, [
                    'id' => 'tags',
                    'placeholder' => 'select tags',
                    'class' => 'form-control',
                ]) !!}
                @if ($errors->has('tags'))
                    <span class="text-danger">{{ $errors->first('tags') }}</span>
                @endif
            </div>

            <div class="form-group">
                <div>
                    <label>Image:</label>
                </div>
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

            <div class="form-group">
                <label>Status:</label>
                {!! Form::select('status', ['1' => 'Active', '2' => 'Inactive'], null, [
                    'id' => 'status',
                    'placeholder' => 'select status',
                    'class' => 'form-control',
                ]) !!}
                @if ($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
            </div>

            {!! Form::submit('' . trans('lang_data.submit_lable') . '', ['class' => 'btn btn-primary']) !!}

            <a href="{{ route('blog.index') }}" class="btn btn-danger">{{ trans('lang_data.cancle_lable') }}</a>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
