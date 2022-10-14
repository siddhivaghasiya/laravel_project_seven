@extends('admin::adminpannel.layout')

@section('content')

<div class="card">
    <div class="card-body">

    @if(isset($editdata)) <div>
        <ul class="ab">
            <li class="ab">
                <a href="{{route('admin')}}">{{ trans('lang_data.home_lable') }}</a><i class="mdi mdi-record
                "></i>
              </li>
              <li class="ab">
                <a href="{{route('banner.index')}}">Banner {{ trans('lang_data.listing_lable') }}</a><i class="mdi mdi-record"></i>
              <li class="ab active">
                 {{ trans('lang_data.edit_lable') }} Banner
              </li>

            </ul>
    </div>
@else
<ul class="ab">
    <li class="ab">
        <a href="{{route('admin')}}">{{ trans('lang_data.home_lable') }}</a><i class="mdi mdi-record"></i>
      </li>
      <li class="ab">
        <a href="{{route('banner.index')}}">Banner {{ trans('lang_data.listing_lable') }}</a><i class="mdi mdi-record
        "></i>
      <li class="ab active">
         {{ trans('lang_data.add_lable') }} Banner
      </li>

    </ul>
@endif

    <h3 class="ab">
       &nbsp; @if (isset($editdata))
            {{ trans('lang_data.edit_lable') }} Banner
        @else
        {{ trans('lang_data.add_lable') }} Banner
        @endif
    </h3>

    @if (isset($editdata))
        {!! Form::model($editdata, [
            'url' => route('banner.update', $editdata->id),
            'id' => 'baneer',
            'method' => 'put',
            'enctype' => 'multipart/form-data',
        ]) !!}
    @else
        {!! Form::open([
            'url' => route('banner.store'),
            'id' => 'banner',
            'method' => 'post',
            'enctype' => 'multipart/form-data',
        ]) !!}
    @endif

     @csrf

    <div class="form-group">
        <label>Name:</label>
        {!! Form::text('name', null, [
            'id' => 'name',
            'placeholder' => 'Enter name',
            'class' => 'form-control',
        ]) !!}
        @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
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

    {!! Form::submit(''.trans('lang_data.submit_lable').'', ['class' => 'btn btn-primary']) !!}

    <a href="{{ route('banner.index') }}" class="btn btn-danger">{{ trans('lang_data.cancle_lable') }}</a>

    {!! Form::close() !!}

    </div>
</div>
@endsection
