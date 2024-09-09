@extends('layouts.master')
@section('title', 'طباعة فاتورة')
@section('style')
<link rel="stylesheet" href="/assets/css/print.css">
<link rel="stylesheet" href="/assets/css/printer.css" media="print">
@endsection

@section('content')
<div class="invoice-print container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-8">
            <div class="row align-items-center mb-4">
                <div class="col-auto">
                    <button type="button" class="btn btn-primary no-print" onclick="window.print()">طباعة</button>
                </div>
            </div>
            <div class="card print-invoice" id="printSection">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="/assets/images/logo.svg" class="navbar-brand-img brand-sm mx-auto mb-4" alt="Company Logo">
                        <h2 class="mb-0 text-uppercase">
                            إيصال
                            @if ($invoice->status == 'pending') {{ 'ايجار' }} @else {{ 'بيع' }} @endif
                        </h2>
                        <div class="bottom-info">
                            معرض اسلام للبدل الرجالي
                        </div>
                        <br>
                        <div class="address-phone">
                            <small class="label">ادارة&nbsp;: يوسف حجران</small>
                            <small class="label">رقم التلفون&nbsp;: 01064321970</small>
                        </div>
                    </div>
                    <div class="customer-info">
                        <hr>
                        <h2 class="text-center">بيانات العميل</h2>
                        <hr>
                        <div class="address-phone">
                            <div class="info-item">
                                <span class="label">الاسم&nbsp;&nbsp;:&nbsp;</span>
                                <span class="value"><b>{{ $invoice->client->name }}</b></span>
                            </div>
                            <div class="info-item">
                                <span class="label">رقم الهاتف:&nbsp;</span>
                                <span class="value"><b>{{ $invoice->client->phone }}</b></span>
                            </div>
                        </div>
                        <div class="info-item">
                            <span class="label">العنوان:&nbsp;</span>
                            <span class="value"><b>{{ $invoice->client->address }}</b></span>
                        </div>
                    </div>
                    @if ($invoice->orders->count() > 0)
                    <div class="table-container">
                        <table class="table table-borderless table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col"><b>اسم المنتج</b></th>
                                    <th scope="col"><b>السعر</b></th>
                                    <th scope="col"><b>المبلغ المدفوع</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invoice->orders as $order)
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
                                            </tr>
                                        @endforeach
                                    @endif
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    @endif
                    {{-- @empty(!$additions['additions'])
                    <hr>
                    <div class="additional-items">
                        <div class="additional-item">
                            <h3>الإضافات:&nbsp;</h3>
                            <span><b>{{ $additions['additions'] }}</b></span>
                        </div>
                        <div class="additional-item">
                            <h3>السعر:&nbsp;</h3>
                            <span><b>EGP {{ $additions['total_price'] }}</b></span>
                        </div>
                        <div class="additional-item">
                            <h3>المدفوع:&nbsp;</h3>
                            <span><b>EGP {{ $additions['total_payment'] }}</b></span>
                        </div>
                    </div>
                    <hr>
                    @endempty --}}
                    @empty(!$invoice->date_of_receipt)
                    <div class="invoice-dates">
                        <div class="invoice-date">
                            <h3>تاريخ الاستلام:&nbsp;{{ $invoice->date_of_receipt }}</h3>
                        </div>
                        <div class="invoice-date">
                            <h3>تاريخ الرجوع:&nbsp;{{ $invoice->return_date }}</h3>
                        </div>
                    </div>
                    @endempty
                    @if($invoice->status == 'inactive')
                    <div class="invoice-dates">
                        <div class="invoice-date">
                            <h3>تاريخ الاستلام:&nbsp; {{ $invoice->created_at->format('Y-m-d') }}</h3>
                        </div>
                    </div>
                    @endif
                    <div class="row mt-5">
                        @if($invoice->status == 'pending')
                        <div class="col-md-7">
                            <div class="note-section">
                                <p class="text small">
                                    <strong>ملحوظة :</strong><b> اقر انا / <span>{{ $invoice->client->name }}</span> بانني استلمت بدلة بحالة جيدة واتعهد بردها يوم <span>{{$invoice->return_date }}</span> في نفس الحالة التي كانت عليها وفي حالة التاخير غرامة 100 جنية عن كل يوم تأخير.</b>
                                </p>
                            </div>
                        </div>
                        @endif

                        <div class="col-md-5">
                            <div class="text-right payment-summary">
                                <div class="summary-item">
                                    <span class="label">السعر: </span>
                                    <span class="value">EGP {{ $invoice->orders->sum('price') }}</span>
                                </div>
                                <div class="summary-item">
                                    <span class="label">المدفوع: </span>
                                    <span class="value">EGP {{ $invoice->orders->sum('payment') }}</span>
                                </div>
                                <div class="summary-item total">
                                    <span class="label">الباقي: </span>
                                    <span class="value">EGP
                                        {{ $invoice->orders->sum('price') - $invoice->orders->sum('payment') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bottom-info">
                        أشمون-منوفية-ش عبدالمنعم رياض بجوار المخبز الآلي
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
