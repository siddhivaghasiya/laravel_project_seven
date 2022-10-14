@extends('admin::adminpannel.layout')


@section('content')
    <div class="card">
        <div class="card-body">

            <div>
                <ul class="ab">
                    <li class="ab">
                        <a href="{{ route('admin') }}">{{ trans('lang_data.home_lable') }}</a><i class="mdi mdi-record"></i>
                    </li>
                    <li class="ab">
                        <a href="{{ route('contact_us.index') }}">Contact_Us {{ trans('lang_data.listing_lable') }}</a><i
                            class="mdi mdi-record"></i>
                    <li class="ab active">
                        {{ trans('lang_data.view_lable') }} Contact_Us
                    </li>
                </ul>
            </div>

            <h3 class="ab">{{ trans('lang_data.view_lable') }} Contact_Us</h3>

            <div class="abc">
                <div class="form-group row">
                    <label class="col-sm-2">Name:-</label>
                    <div class="col-sm-9">
                        {{ $editdata->name }}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2">Email:-</label>
                    <div class="col-sm-9">
                        {{ $editdata->email }}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2">Message:-</label>
                    <div class="col-sm-9">
                        {{ $editdata->message }}
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
