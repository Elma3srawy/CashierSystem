@extends('layouts.master')
@section('title' , 'المبيعات')
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
        <div class="row">
            <!-- Striped rows -->
            <div class="col-md-12 my-4">
              <div class="card shadow">
                <div class="card-body">
                  <!-- table -->
                  <table class="table table-bordered">
                    <thead>
                        <th>اسم المنتج</th>
                        <th>السعر</th>
                        <th>المدفوع</th>
                        <th>علية</th>
                        <th>الصورة</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        {{-- Check if product_id is not null --}}
                        @if(!is_null($order->product_id) && $order->product)
                            @foreach ([$order->product] as $product)
                                <tr>
                                    <td>
                                        <a style="
                                        text-decoration: none;
                                        color: #3498db; /* Link color */
                                        font-weight: 600; /* Bold text */
                                        border-radius: 5px; /* Rounded corners */
                                        transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition */
                                        " href="{{ route('clients.show' ,  $order->invoice->client_id) }}">
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
                                        </a>
                                    </td>


                                    <td>{{ $order->price }}</td>
                                    <td>{{ $order->payment }}</td>
                                    <td>{{ $order->price - $order->payment }}</td>
                                    @if (isset($order->product->image))<td>
                                        <a target="_blank" href="{{ Storage::url($order->product->image) }}"><img style="width: 50px;height: 50px;border: 1px solid #ccc;padding: 5px;margin: 0 auto;background-color: #f2f2f2;" src="{{ Storage::url($order->product->image) }}" alt=""></a>
                                    </td>
                                    @else
                                    <td>لا يوجد</td>
                                    @endif
                                </tr>
                            @endforeach
                        @elseif(!is_null($order->addition_id) && $order->addition)
                            @foreach ([$order->addition] as $addition)
                                <tr>
                                    <td>
                                        <a style="
                                        text-decoration: none;
                                        color: #3498db; /* Link color */
                                        font-weight: 600; /* Bold text */
                                        border-radius: 5px; /* Rounded corners */
                                        transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition */
                                        " href="{{ route('clients.show' ,  $order->invoice->client_id) }}">
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
                                        </a>
                                    </td>
                                    <td>{{ $order->price }}</td>
                                    <td>{{ $order->payment }}</td>
                                    <td>{{ $order->price - $order->payment }}</td>
                                    <td>{{ 'لا يوجد' }}</td>
                                </tr>
                            @endforeach
                        @endif
                    @endforeach
                    </tbody>
                  </table>
                  <nav aria-label="Table Paging" class="mb-0 text-muted">
                      <ul class="pagination justify-content-end mb-0">
                          {{-- {{ $orders->links() }} --}}
                    </ul>
                  </nav>
                </div>
              </div>
            </div> <!-- simple table -->
          </div> <!-- end section -->
        </div> <!-- .col-12 -->
      </div> <!-- .row -->
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
