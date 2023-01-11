<div class="row">

    <div class="col-8">
        {!! Form::text('title', 'Tiêu đề')->placeholder('Tiêu đề')!!}
        {!! Form::textarea('description', 'Mô tả ngắn')->placeholder('Mô tả ngắn') !!}
        {!! Form::textarea('detail', 'Chi tiết')->placeholder('Chi tiết')->attrs(['class' => 'editor']) !!}
        {!! Form::text('link', 'Liên kết')->placeholder('Liên kết bài gốc') !!}
        {!! Form::text('source', 'Nguồn')->placeholder('Nguồn tin tức') !!}

        <div class="btn-groups">
            <a class="btn btn-danger btn-sm" href="{{ route('admin.news') }}">Huỷ bỏ</a>
            <button class="btn btn-success btn-sm">Xác nhận</button>
        </div>
    </div>

    <div class="col-4">
        {!! Form::select('category_id', 'Danh mục tin tức', $categories)->placeholder('Danh mục') !!}

        {{-- {!! Form::file('image_url', 'Ảnh thu nhỏ')->attrs(['class' => 'input-file']) !!} --}}
        <div class="form-group" style="margin-botttom: 12px">
            <label for="inp-image_url">Ảnh thu nhỏ</label>

            <input class="form-control-file input-file" type="file" name="image_url" id="inp-image_url" required>
            {{-- <span type="button" id="remove-news" style="margin-top: 10px; background-color:black">Cancel</span> --}}

            @if (isset($news))
            <div class="preview">
                <img src="{{ $news->image_url }}">
            </div>
            @endif

            <input class="old-input" type="hidden" name="old_image_url">
        </div>
        {{-- <button type="button" class="btn btn-primary video-btn" data-toggle="modal"
            src="https://www.youtube.com/embed/NFWSFbqL0A0" data-target="#myModal">
            Play Video 1 - autoplay
        </button> --}}

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">


                    <div class="modal-body">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="" id="video"
                                allowscriptaccess="always" allow="autoplay"></iframe>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
