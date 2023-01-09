<div class="row">

  <div class="col-8">

    {!!Form::text('name', 'Giải đấu')->placeholder('Giải đấu')!!}
    {!!Form::textarea('nguồn', 'Thể loại')->placeholder('Thể loại')!!}
    {{-- {!!Form::textarea('detail', 'Chi tiết')->placeholder('Chi tiết')->attrs(['class' => 'editor'])!!} --}}
    {{-- {!!Form::text('link', 'Liên kết')->placeholder('Liên kết bài gốc')!!} --}}
    {!!Form::text('source', 'Nguồn')->placeholder('Nguồn tin tức')!!}
    <div class="btn-groups">
      <a class="btn btn-danger btn-sm" href="{{route('get.list.rank')}}">Huỷ bỏ</a>
      <button class="btn btn-success btn-sm">Xác nhận</button>
    </div>
  </div>

  <div class="col-4">
    {{-- {!!Form::select('name', 'Danh mục tin tức', $category)->placeholder('Danh mục')!!} --}}

    {{-- {!!Form::file('image_url', 'Ảnh thu nhỏ')->attrs(['class' => 'input-file'])!!} --}}
  </div>
</div>
