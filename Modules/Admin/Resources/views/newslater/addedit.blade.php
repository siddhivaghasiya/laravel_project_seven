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
                    <a href="{{ route('newslater.index') }}">Newslater {{ trans('lang_data.listing_lable') }}</a><i
                        class="mdi mdi-record"></i>
                <li class="ab active">
                    {{ trans('lang_data.edit_lable') }} Newslater
                </li>

            </ul>
        </div>
    @else
        <ul class="ab">
            <li class="ab">
                <a href="{{ route('admin') }}">{{ trans('lang_data.home_lable') }}</a><i class="mdi mdi-record"></i>
            </li>
            <li class="ab">
                <a href="{{ route('email.index') }}">Newslater {{ trans('lang_data.listing_lable') }}</a><i class="mdi mdi-record"></i>
            <li class="ab active">
                {{ trans('lang_data.add_lable') }} Newslater
            </li>

        </ul>
    @endif

    <h3 class="ab">
       &nbsp; @if (isset($editdata))
            {{ trans('lang_data.edit_lable') }} Newslater
        @else
        {{ trans('lang_data.add_lable') }} Newslater
        @endif
    </h3>

    @if (isset($editdata))
        {!! Form::model($editdata, [
            'url' => route('newslater.update', $editdata->id),
            'id' => 'newslater',
            'method' => 'put',
            'enctype' => 'multipart/form-data',
        ]) !!}
    @else
        {!! Form::open([
            'url' => route('newslater.store'),
            'id' => 'newslater',
            'method' => 'post',
            'enctype' => 'multipart/form-data',
        ]) !!}
    @endif

     @csrf

    <div class="form-group">
        <label>Email:</label>
        {!! Form::email('email', null, [
            'id' => 'email',
            'placeholder' => 'Enter your email',
            'class' => 'form-control',
        ]) !!}
        @if ($errors->has('from'))
            <span class="text-danger">{{ $errors->first('from') }}</span>
        @endif
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

    <a href="{{ route('newslater.index') }}" class="btn btn-danger">{{ trans('lang_data.cancle_lable') }}</a>

    {!! Form::close() !!}

    </div>
</div>
@endsection
