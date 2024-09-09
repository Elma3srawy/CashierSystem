@extends('layouts.master')
@section('title' , 'عرض بيانات العميل')
@section('style')
    <style>
        /* Base Styles for the Page Title */
.page-title {
    font-size: 2rem; /* Adjust font size as needed */
    font-weight: bold;
    color: #333; /* Dark gray for better readability */
    margin-bottom: 1.5rem; /* Space below the title */
}

/* Container Styles */
.col-md-7 {
    margin-bottom: 1rem; /* Space between containers */
}

/* Styles for Customer Name */
.col-md-7 h4 {
    font-size: 1.5rem; /* Adjust font size for the name */
    font-weight: 600; /* Slightly bolder text for emphasis */
    color: #000; /* Black for maximum readability */
    margin-bottom: 0.5rem; /* Space below the name */
}

/* Styles for Address */
.col-md-7 p.small {
    font-size: 0.875rem; /* Smaller font size for address */
    color: #666; /* Light gray color for muted text */
    margin-bottom: 1rem; /* Space below the address */
}

/* Styles for Phone Number */
.col-md-7 p.text-muted {
    font-size: 0.875rem; /* Same size as address for consistency */
    color: #999; /* Even lighter gray for muted text */
    margin-bottom: 0; /* No extra space below the phone number */
}

    </style>
@endsection
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
        <h2 class="h3 mb-4 page-title">عرض بيانات العميل</h2>
        <div class="col-md-7" style="border: 1px solid #ddd; padding: 20px; border-radius: 8px; background-color: #f9f9f9;">
            <h4 class="mb-1" style="font-weight: bold; color: #333; margin-bottom: 10px;">الاسم: {{ $client->name }}</h4>
            <h4 class="mb-1" style="font-weight: bold; color: #333; margin-bottom: 10px;">العنوان: {{ $client->address }}</h4>
            <h4 class="mb-1" style="font-weight: bold; color: #333; margin-bottom: 10px;">رقم التلفون: {{ $client->phone }}</h4>
            {{-- <p class="small mb-3"><span class="text-muted">{{ $invoice->address }}</span></p> --}}
        </div>
        <div class="col-md-7">
            {{-- <p class="text-muted">{{ $invoice->phone }}</p> --}}
        </div>
        <div class="card-deck my-4">
          <div class="card mb-4 shadow">
            <div class="card-body text-center my-4">
              <a href="#">
                <h3 class="h5 mt-4 mb-0">السعر</h3>
              </a>
              <span class="h1 mb-0">{{ $client->invoice->orders->sum('price') }}</span>
            </div> <!-- .card-body -->
          </div> <!-- .card -->
          <div class="card mb-4">
            <div class="card-body text-center my-4">
              <a href="#">
                <h3 class="h5 mt-4 mb-0">المدفوع</h3>
              </a>
              <span class="h1 mb-0">{{ $client->invoice->orders->sum('payment') }}</span>
            </div> <!-- .card-body -->
          </div> <!-- .card -->
          <div class="card mb-4">
            <div class="card-body text-center my-4">
              <a href="#">
                <h3 class="h5 mt-4 mb-0">الباقي</h3>
              </a>
              <span class="h1 mb-0">{{ $client->invoice->orders->sum('price') -  $client->invoice->orders->sum('payment') }}</span>
            </div> <!-- .card-body -->
          </div> <!-- .card -->
        </div> <!-- .card-group -->
        <h6 class="mb-3">الطلبات</h6>
        <table class="table table-borderless table-striped">
          <thead>
            <tr role="row">
              <th>المنتج</th>
              <th>السعر</th>
              <th>المدفوع</th>
              <th>الباقي</th>
            </tr>
          </thead>
          <tbody>
                @foreach ($client->invoice->orders as $order)
                {{-- Check if product_id is not null --}}
                @if(!is_null($order->product_id) && $order->product)
                    @foreach ([$order->product] as $product)
                        <tr>
                            <td>
                                @php
                                $title = $product->title ?? '';
                                $model = $product->model ?? '';
                                $color = $product->color ?? '';
                                $size = $product->size ?? '';

                                $result = $title . ':- ';

                                $fields = array_filter([$model, $color, $size]);

                                $result .= implode(' - ', $fields);
                                @endphp

                                {{ $result }}
                            </td>


                            <td>{{ $order->price }}</td>
                            <td>{{ $order->payment }}</td>
                            <td>{{ $order->price - $order->payment }}</td>
                        </tr>
                    @endforeach
                @elseif(!is_null($order->addition_id) && $order->addition)
                    @foreach ([$order->addition] as $addition)
                        <tr>
                            <td>
                                @php
                                    $title = $addition->title ?? '';
                                    $data = $addition->data ?? '';

                                    if (!empty($data)) {
                                        $result = $title . ':- ' . $data;
                                    } else {
                                        $result = $title;
                                    }
                                @endphp
                                {{ $result }}
                            </td>
                            <td>{{ $order->price }}</td>
                            <td>{{ $order->payment }}</td>
                            <td>{{ $order->price - $order->payment }}</td>
                        </tr>
                    @endforeach
                @endif
            @endforeach
          </tbody>
        </table>
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
<script async src="/assets/js/googletagmanger.js"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());
  gtag('config', 'UA-56159088-1');
</script>
@endsection

