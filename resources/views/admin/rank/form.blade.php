<div class="row">

  <div class="col-8">

    {{-- {!!Form::text('name', 'Giải đấu')->placeholder('Giải đấu')!!} --}}
    <h5>Giải đấu</h5>
    <input type="text" name="name" class="form-control"
    placeholder="Giải đấu" />
@if ($errors->has('name'))
    <span class="text-danger">{{ $errors->first('name') }}</span>
@endif
    {{-- {!!Form::file('image_url', 'Ảnh thu nhỏ')->attrs(['class' => 'input-file'])!!} --}}
    <div style="margin-top: 10px">
    <input type='file' id='input1'>
    <img id='imagepreview1'>
        <button id="cancel">Cancel</button>
    {{-- <button id="cancelImage">Cancel</button> --}}
</div>
    {{-- <input type="file" multiple id="gallery-photo-add">
    <div class="gallery"></div> --}}
    {{-- {!!Form::textarea('detail', 'Chi tiết')->placeholder('Chi tiết')->attrs(['class' => 'editor'])!!} --}}
    {{-- {!!Form::text('link', 'Liên kết')->placeholder('Liên kết bài gốc')!!} --}}
    <div class="btn-groups">
      <a class="btn btn-danger btn-sm" href="{{route('get.list.rank')}}">Huỷ bỏ</a>
      <button class="btn btn-success btn-sm">Xác nhận</button>
    </div>

  </div>

  {{-- <div class="col-4"> --}}
    {{-- {!!Form::select('name', 'Danh mục tin tức', $category)->placeholder('Danh mục')!!} --}}

  {{-- </div> --}}
</div>
