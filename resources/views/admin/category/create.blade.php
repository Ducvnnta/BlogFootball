@extends('admin.layout')

@section('admin_content')
    <div class="container-fluid dashboard-content ">
        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Quản lý danh mục</h2>
                    <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris
                        facilisis faucibus at enim quis massa lobortis rutrum.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="breadcrumb-link">Quản lý Danh mục</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tạo mới</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- ============================================================== -->
            <!-- basic table -->
            <!-- ============================================================== -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                      {!!Form::open()->post()->multipart()->route('admin.category.store')!!}
                        @include('admin.category.form')
                      {!!Form::close()!!}
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
        </div>
    </div>
@endsection
