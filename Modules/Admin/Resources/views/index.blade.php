@extends('admin::adminpannel.layout')

@section('content')
    <div class="col-md-12 grid-margin transparent">
        <div class="row">
            <div class="col-md-3 mb-4 stretch-card transparent">
                <div class="card card-dark-blue">
                    <div class="card-body">
                        <div class="ab">
                            <a href="{{ route('banner.index') }}" class="ab">
                                <div>
                                    <i class="mdi mdi-book-multiple

                                    "></i>
                                </div>
                                <div>
                                    <p class="mb-2">Banner</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4 stretch-card transparent">
                <div class="card card-dark-blue">
                    <div class="card-body">
                        <div class="ab">
                            <a href="{{ route('email.index') }}" class="ab">
                                <div>
                                    <i class="mdi mdi-email-outline"></i>
                                </div>
                                <div>
                                    <p>Email Template</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4 stretch-card transparent">
                <div class="card card-dark-blue">
                    <div class="card-body">
                        <div class="ab">
                            <a href="{{ route('social_media.index') }}" class="ab">
                                <div>
                                    <i class="mdi mdi-share-variant
                                    "></i>
                                </div>
                                <div>
                                    <p class="mb-2">social_media</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4 stretch-card transparent">
                <div class="card card-dark-blue">
                    <div class="card-body">
                        <div class="ab">
                            <a href="{{ route('contact_us.index') }}" class="ab">
                                <div><i class="mdi mdi-phone-in-talk

                                    "></i>
                                </div>
                                <div>
                                    <p class="mb-2">Contact_Us</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4 stretch-card transparent">
                <div class="card card-dark-blue">
                    <div class="card-body">
                        <div class="ab">
                            <a href="{{ route('newslater.index') }}" class="ab">
                                <div><i class="mdi mdi-send
                                    "></i>
                                </div>
                                <div>
                                    <p class="mb-2">Newslater</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4 stretch-card transparent">
                <div class="card card-dark-blue">
                    <div class="card-body">
                        <div class="ab">
                            <a href="{{ route('cms.index') }}" class="ab">
                                <div><i class="mdi mdi-database

                                    "></i>
                                </div>
                                <div>
                                    <p class="mb-2">CMS</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4 stretch-card transparent">
                <div class="card card-dark-blue">
                    <div class="card-body">
                        <div class="ab">
                            <a href="{{ route('modules.index') }}" class="ab">
                                <div><i class="mdi mdi-view-module


                                    "></i>
                                </div>
                                <div>
                                    <p class="mb-2">Modules</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4 stretch-card transparent">
                <div class="card card-dark-blue">
                    <div class="card-body">
                        <div class="ab">
                            <a href="{{ route('setting.index') }}" class="ab">
                                <div><i class="mdi mdi-settings


                                    "></i>
                                </div>
                                <div>
                                    <p class="mb-2">Setting</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">

            <div class="col-md-3 mb-4 stretch-card transparent">
                <div class="card card-dark-blue">
                    <div class="card-body">
                        <div class="ab">
                            <a href="{{ route('blog.index') }}" class="ab">

                                <div>
                                    <i class="mdi mdi-credit-card-multiple

                                        ">
                                    </i>
                                </div>
                                <div>
                                    <p class="mb-2">Blog</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4 stretch-card transparent">
                <div class="card card-dark-blue">
                    <div class="card-body">
                        <div class="ab">
                            <a href="{{ route('categories.index') }}" class="ab">
                                <div>
                                    <i class="mdi mdi-equal-box
                                        "></i>
                                </div>

                                <div>
                                    <p class="mb-2">Categories</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4 stretch-card transparent">
                <div class="card card-dark-blue">
                    <div class="card-body">
                        <div class="ab">
                            <a href="{{ route('tags.index') }}" class="ab">
                              <div><i class="mdi mdi-text-shadow
                                "></i>
                                </div>
                                <div><p class="mb-2">Tags</p>
                                    </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
