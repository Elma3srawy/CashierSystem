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
              <h2 class="mb-2 page-title">الايجار و البيع</h2>
              <div class="row my-4">
                <!-- Small table -->
                <div class="col-md-12">
                    {{-- <form class="form-inline">
                        <div class="form-row">
                          <div class="form-group col-auto">
                            <label for="search" class="sr-only">بحث</label>
                            <input type="text" class="form-control" id="search" value="" placeholder="بحث">
                          </div>
                        </div>
                      </form> --}}
                    <div class="card shadow">
                        <div class="card-body">
                       <!-- Add a create button to trigger the creation of a new item -->
                        {{-- <a href="#" class="btn btn-success">تسجيل منتج جديد
                            <input type="hidden" name="section_name" value="">
                        </a> --}}

                        <!-- table -->
                      <table class="table datatables" id="productsTable">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>عرض البيانات</th>
                            <th>الحالة</th>
                            <th>الاسبوع</th>
                            <th>الشهر</th>
                            <th>السنة</th>
                            <th>الحساب الكلي</th>
                            <th>المدفوع</th>
                            <th>الباقي</th>
                            {{-- <th class="text-center">العمليه</th> --}}
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($sales as $sale)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <form method="GET" action="{{ route('sales.orders') }}" style="display: inline;">
                                    <input type="hidden" name="order_ids" value="{{ $sale->order_ids }}">
                                    <button type="submit" style="border: none; background: none; color: red; cursor: pointer; text-decoration: none; padding: 0;">
                                        البيانات
                                    </button>
                                </form>
                            </td>

                            @if($sale->status == 'pending')
                            <td><span class="badge badge-warning">ايجار</span></td>
                            @else
                                <td><span class="badge badge-danger">بيع</span></td>
                            @endif

                            <td>@switch($sale->number_of_week)
                                @case(1)
                                    الاسبوع الاول
                                    @break
                                @case(2)
                                        الاسبوع الثاني
                                    @break
                                @case(3)
                                        الاسبوع الثالث
                                    @break
                                @case(4)
                                        الاسبوع الرابع
                                    @break
                                @case(5)
                                        الاسبوع الخامس
                                    @break
                            @endswitch
                            </td>
                            <td>{{ $sale->month_name }}</td>
                            <td>{{ $sale->number_of_year }}</td>
                            <td>{{ $sale->total_price ?? 0  }}</td>
                            <td>{{ $sale->payments  ?? 0}}</td>
                            <td>{{ $sale->total_price  - $sale->payments  }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $sales->links() }}
                      <!-- Delete Modal -->
                        {{-- <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Delete Confirmation</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        هل انت متاكد من حذف المنتج ؟
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                        <form id="delete-form" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" id="delete-btn">حذف</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                    </div>
                  </div>
                </div> <!-- simple table -->
              </div> <!-- end section -->
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


{{-- <script>
    $(document).ready(function() {
        // Enable all buttons with class "delete-btn"
        $('.delete-btn').prop('disabled', false);

        // Enable the button when the modal is shown
        $('#deleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var productId = button.data('product-id');
            var form = $('#delete-form');
            form.attr('action', '{{ route("products.destroy", ":product") }}'.replace(':product', productId));
            $('#delete-form button[type="submit"]').removeClass('disabled').prop('disabled', false);
        });
    });
</script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-56159088-1');

    $(document).ready(function(){
      let debounceTimer;

      function fetchProducts(page = 1) {
          let search = $('#search').val();
          let status = $('#status').val();
          $.ajax({
              url: '{{ route('product.search') }}',
              method: 'GET',
              data: {
                sectionId: @json($section->id), // Ensure proper escaping
                search: search,
                status: status,
                page: page
            },
              success: function(data) {
                console.log(data);

                  $('#productsTable tbody').html(data.tableRows);
                  $('.pagination').html(data.pagination);
              },
            error: function(xhr, status, error) {
                // Handle error
                console.error('Error:', error);
            }

          });
      }

      function debounce(func, delay) {
          return function(...args) {
              clearTimeout(debounceTimer);
              debounceTimer = setTimeout(() => func.apply(this, args), delay);
          };
      }

      const debouncedFetchProducts = debounce(function() {
          fetchProducts();
      }, 500); // 500ms delay

      $('#search, #status').on('keyup change', debouncedFetchProducts);

      $(document).on('click', '.pagination a', function(event) {
          event.preventDefault();
          let url = $(this).attr('href');
          let page = new URL(url).searchParams.get('page');
          fetchProducts(page);
      });
  });

</script> --}}

@endsection
