@extends('admin::adminpannel.layout')


@section('content')
    <div class="card">
        <div class="card-body">

            <div>
                <ul class="ab">
                    <li class="ab">
                        <a href="{{ route('admin') }}">{{ trans('lang_data.home_lable') }}</a><i
                            class="mdi mdi-record
                        "></i>
                    </li>
                    <li class="ab active">
                        Social_Media {{ trans('lang_data.listing_lable') }}
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="ab"> &nbsp; Social_Media {{ trans('lang_data.listing_lable') }}
                </h3>
            </div>



            <h4><a href="{{ route('social_media.create') }}" class="btn btn-info btn-sm">{{ trans('lang_data.addnew_lable') }}
                </a></h4>

            <div class="table-responsive">
                <table class="table table-bordered" id="users-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>link</th>
                            <th>Image</th>
                            <th>{{ trans('lang_data.status_lable') }}</th>
                            <th>{{ trans('lang_data.action_lable') }}</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script>
        var oTable = $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            responsive: true,
            ajax: {
                url: '{!! route('social.listing') !!}',
                data: function(d) {

                }
            },
            columns: [{
                    data: 'id'
                },
                {
                    data: 'title'
                },
                {
                    data: 'link'
                },
                {
                    data: 'image'
                },
                {
                    data: 'status'
                },
                {
                    data: 'action'
                },
            ]
        });
    </script>
@endsection
