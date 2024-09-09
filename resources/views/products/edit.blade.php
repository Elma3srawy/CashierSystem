@extends('layouts.master')
@section('title' , 'تعديل علي منتج')
@section('content')
@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <h4 class="alert-heading text-center">Error!</h4>
    <hr>
    <ul class="list-unstyled mb-0">
        @foreach ($errors->all() as $error)
            <li class="text-danger">
                <i class="fas fa-exclamation-circle mr-2"></i>
                {{ $error }}
            </li>
        @endforeach
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        {{-- Content --}}
        <h2 class="page-title">تعديل علي منتج</h2>
        <div class="card-deck">
          <div class="card shadow mb-4">
            <div class="card-header">
              <strong class="card-title">قسم : </strong><span>{{ App\Models\Section::whereId($product->section_id)->first()->name }} </span>
            </div>
            <div class="card-body">
              <form action="{{ route('products.update' , $product->id) }}" method="POST"  enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputE">العدد</label>
                    <input name="quantity" type="text" value="{{ $product->quantity }}" class="form-control" id="inputE" placeholder="العدد">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">اللون</label>
                    <input name="color" type="text" value="{{ $product->color }}" class="form-control" id="inputEmail4" placeholder="اللون">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">الموديل</label>
                    <input name="model" type="text" value="{{ $product->model }}" class="form-control" id="inputPassword4" placeholder="الموديل">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputState">المقاس</label>
                    <input name="size" placeholder="المقاس" value="{{ $product->size }}" type="number" id="inputState" class="form-control" min="1" max="100">
                  </div>
                  {{-- <div class="form-group col-md-6">
                    <label for="example-select">الحاله</label>
                    <select name="status" class="form-control" id="example-select">
                        <option value="active" {{ $product->status == 'active' ? 'selected' : '' }}>في المخزن</option>
                        <option value="pending" {{ $product->status == 'pending' ? 'selected' : '' }}>متأجر</option>
                        <option value="inactive" {{ $product->status == 'inactive' ? 'selected' : '' }}>مباع</option>
                    </select>
                  </div> --}}
                </div>
                <div class="form-group">
                    <label for="inputFiles">رفع صوره</label>
                    <div>
                        @if($product->image)
                            <img src="{{ Storage::url($product->image) }}" alt="Current Image" width="100" height="100">
                        @endif
                    </div>
                    <br>
                    <input type="file" name="image" class="form-control-file" id="inputFiles">
                    <small class="text-muted">Allowed file types: docx, jpg, png</small>
                </div>
                <button type="submit" class="btn btn-primary">حفظ</button>
              </form>
            </div>
        </div>
        {{-- End Content --}}

        </div> <!-- .col-12 -->
    </div> <!-- .row -->
</div> <!-- .container-fluid -->
@endsection
@section('script')
<script src="/js/jquery.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/moment.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/simplebar.min.js"></script>
<script src='/js/daterangepicker.js'></script>
<script src='/js/jquery.stickOnScroll.js'></script>
<script src="/js/tinycolor-min.js"></script>
<script src="/js/config.js"></script>
<script src="/js/apps.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];

  function gtag()
  {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());
  gtag('config', 'UA-56159088-1');
</script>
@endsection
