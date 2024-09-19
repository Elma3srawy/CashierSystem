@extends('layouts.master')
@section('title' , 'الفواتير')
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
                        @can('access-superAdmin')
                        <th>السعر</th>
                        <th>المدفوع</th>
                        <th>علية</th>
                        @endcan
                        <th>الصورة</th>
                        @can('access-superAdmin')
                        <th>العمليات</th>
                        @endcan
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
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

                                    @can('access-superAdmin')
                                    <td>{{ $order->price }}</td>
                                    <td>{{ $order->payment }}</td>
                                    <td>{{ $order->price - $order->payment }}</td>
                                    @endcan

                                    @if (isset($order->product->image))<td>
                                        <a target="_blank" href="{{ Storage::url($order->product->image) }}"><img style="width: 50px;height: 50px;border: 1px solid #ccc;padding: 5px;margin: 0 auto;background-color: #f2f2f2;" src="{{ Storage::url($order->product->image) }}" alt=""></a>
                                    </td>
                                    @else
                                    <td>لا يوجد</td>
                                    @endif
                                    @can('access-superAdmin')
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <!-- Button to trigger modal -->
                                            <button type="button" class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#updateModal" data-order-id="{{ $order->id }}" data-invoice-id="{{ $order->invoice_id }}" data-payment="{{ $order->payment }}" data-price="{{ $order->price }}" disabled>
                                                <i class="fe fe-16 fe-edit"></i>&nbsp;تعديل
                                            </button>
                                            {{-- <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#deleteModal" data-order-id="{{ $order->id }}" data-invoice-id="{{ $order->invoice_id }}" disabled>
                                                <i class="fe fe-16 fe-trash"></i>&nbsp;حذف
                                            </button> --}}
                                        </div>
                                    </td>
                                    @endcan
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
                                    @can('access-superAdmin')
                                    <td>{{ $order->price }}</td>
                                    <td>{{ $order->payment }}</td>
                                    <td>{{ $order->price - $order->payment }}</td>
                                    @endcan
                                    <td>{{ 'لا يوجد' }}</td>
                                    @can('access-superAdmin')
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <!-- Button to trigger modal -->
                                            <button type="button" class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#updateModal" data-order-id="{{ $order->id }}" data-invoice-id="{{ $order->invoice_id }}" data-payment="{{ $order->payment }}" data-price="{{ $order->price }}" disabled>
                                                <i class="fe fe-16 fe-edit"></i>&nbsp;تعديل
                                            </button>
                                            {{-- <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#deleteModal" data-order-id="{{ $order->id }}" data-invoice-id="{{ $order->invoice_id }}" disabled>
                                                <i class="fe fe-16 fe-trash"></i>&nbsp;حذف
                                            </button> --}}
                                        </div>
                                    </td>
                                    @endcan
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


<!-- Update Modal -->
<!-- Update Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">تحديث المدفوعات</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form inside the modal -->
                <form id="updateForm" action="{{ route('order.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="order_id" name="order_id">
                    <input type="hidden" id="invoice_id" name="invoice_id">
                    <div class="form-group">
                        <label for="price">السعر:</label>
                        <input type="text" class="form-control" id="price" name="price">
                    </div>
                    <div class="form-group">
                        <label for="payment">مقدار الدفع:</label>
                        <input type="number" class="form-control" id="payment" name="payment" placeholder="أدخل مقدار الدفع الجديد" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                <button type="button" class="btn btn-primary" id="saveChanges">حفظ التعديلات</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">تأكيد الحذف</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                هل أنت متأكد أنك تريد حذف هذا الطلب؟
            </div>
            <div class="modal-footer">
                <form id="deleteForm" action="{{ route('order.delete') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" id="delete_order_id" name="order_id">
                    <input type="hidden" id="delete_invoice_id" name="invoice_id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-danger">حذف</button>
                </form>
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
<script>
    $(document).ready(function () {
        $('.btn-outline-success').prop('disabled', false); // Enable the button
        $('.btn-outline-danger').prop('disabled', false); // Enable the button
    });
</script>
<script>
    $(document).ready(function() {
        $('#updateModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var orderId = button.data('order-id'); // Extract the order ID
            var invoiceId = button.data('invoice-id'); // Extract the invoice ID
            var payment = button.data('payment'); // Extract the existing payment amount
            var price = button.data('price'); // Extract the price

            var modal = $(this);
            modal.find('#order_id').val(orderId); // Set the order ID in the hidden input
            modal.find('#invoice_id').val(invoiceId); // Set the invoice ID in the hidden input
            modal.find('#payment').val(payment); // Set the existing payment amount in the input field
            modal.find('#price').val(price); // Set the price in the readonly input field
        });

        $('#saveChanges').on('click', function() {
            $('#updateForm').submit(); // Submit the form inside the modal
        });
        // Handle Delete Modal Show
        $('#deleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var orderId = button.data('order-id');
            var invoiceId = button.data('invoice-id');

            var modal = $(this);
            modal.find('#delete_order_id').val(orderId);
            modal.find('#delete_invoice_id').val(invoiceId);
        });

        $('#saveChanges').on('click', function() {
            $('#updateForm').submit();
        });
    });
</script>

@endsection
