<div class="row">

    <div class="col-8">
        {{-- <form class="mx-1 mx-md-4" method="POST" action="{{ route('admin.rank.store') }}">
        {{ csrf_field() }} --}}


        <h5>Giải đấu</h5>
        @if (isset($rankCategory))
        <input type="text" name="name" class="form-control" value="{{ $rankCategory->name }}" required>
        @elseif (!isset($rankCategory))
        <input type="text" name="name" class="form-control " placeholder="Giải đấu" required>
        @endif
        @if ($errors->has('name'))
            <span class="text-danger"> {{ $errors->first('name') }} </span>
        @endif


        <div class="pip" style="margin-top: 10px; ">
            <div class="field" align="left">
                <h3> Hình ảnh </h3>
                <input class="input-file" type="file" id="image" name="image" />

            </div>
            @if ($errors->has('image'))
                <span class="text-danger"> {{ $errors->first('image') }} </span>
            @endif
            @if(isset($rankCategory))
            @if (!is_null($rankCategory->image))
            <img class="imageThumb" src="{{ $rankCategory->image }}" style="margin-top: 20px;" type="file" id="old_image_rank" >
            @endif
            @endif

        </div>

        <div class="btn-groups">
            <a class="btn btn-danger btn-sm" href="{{ route('get.list.rank') }}">Huỷ bỏ</a>
            <button class="btn btn-success btn-sm">Xác nhận</button>
        </div>
    </div>

</div>
