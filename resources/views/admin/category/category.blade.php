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
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.news') }}" class="breadcrumb-link">Danh
                                        sách danh mục</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.includes.messages');
        <!-- ============================================================== -->
        <!-- end pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- ============================================================== -->
            <!-- basic table -->
            <!-- ============================================================== -->
            <div class="col-12">
                <div class="card"  style="margin-bottom: 0">
                    <div class="card-header card-header-with-button" style="margin-left: 1px">
                        <h5 class="col-md-2 mb-0 card-header-title">Danh sách Danh mục</h5>
                        <div class="row col-md-6">
                            <label>Tìm kiếm
                                <input id="searchBox" type="text" style="padding-left: 2px" autocomplete="off"> </label>
                                {{-- <div class="dataTables_length bs-select" id="dtBasicExample_length">
                                    <label>Show
                                        <select name="dtBasicExample_length" aria-controls="dtBasicExample" class="custom-select custom-select-sm form-control form-control-sm">
                                            <option value="Tất cả">Tất cả</option>
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="25">25</option>
                                            <option value="30">30</option>

                                        </select>
                                    </label>

                                    </div> --}}

                        </div>

                        <div class="col-md-4">
                            <a href="{{ route('admin.category.create') }}" class="btn btn-sm btn-success"   style="float: right">Thêm mới</a>
                        </div>
                        {{-- <a href="{{ route('admin.news.create') }}" class="btn btn-sm btn-success">Import</a>
                        <a href="{{ route('admin.news.create') }}" class="btn btn-sm btn-success">Xuất</a> --}}

                    </div>

                    {{-- @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                        </div>
                    @endif --}}
                    <div style="background-color: #fff">

                        <div class="ctable-responsive">
                            <table class="table"  id="myTable">
                                <thead>
                                    <tr class="border-0">
                                        <th class="border-0 no-wrap">#</th>
                                        {{-- <th class="border-0 no-wrap">Hình ảnh</th> --}}
                                        <th class="border-0 no-wrap">Danh mục</th>
                                        <th class="border-0 no-wrap">Thể loại</th>
                                        <th class="border-0 no-wrap">Nguồn</th>
                                        <th class="border-0 no-wrap">Ngày tạo</th>
                                        <th class="border-0 no-wrap">Ngày cập nhật</th>
                                        <th class="border-0 no-wrap">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $key => $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            {{-- <td>
                                                <div class="m-r-10">
                                                    <img src="{{ $item->image_url }}" alt="{{ $item->title }}"
                                                        class="rounded" width="45">
                                                </div>
                                            </td> --}}
                                            <td>{{ $item->name }}</td>
                                            <td class="no-wrap">{{ $item->slug }}</td>
                                            <td class="no-wrap"><span class="badge-dot badge-brand mr-1"></span>
                                                {{ $item->source }}</td>
                                            <td class="no-wrap">{{ $item->created_at }}</td>
                                            <td class="no-wrap">{{ $item->updated_at }}</td>
                                            <td>
                                                <div class="btn-groups-category mt-0">
                                                    {{-- <a class="btn btn-detail btn-xs " href="{{ route('admin.news.detail', $item->id) }}"> Xem</a> --}}

                                                    <a class="btn btn-info btn-xs"
                                                        href="{{ route('admin.category.edit', $item->id) }}">
                                                        <i class="fas fa-info-circle"></i>
                                                    </a>
                                                    <a class="btn btn-danger-category btn-xs delete-confirm"
                                                        href="{{ route('admin.category.delete', $item->id) }}">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </td>
                        </div>


                        </tr>
                        @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer navigation">
                    {{ $categories->onEachSide(2)->links() }}
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
    </div>
@endsection
