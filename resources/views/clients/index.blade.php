@extends('layouts.master')
@section('title' , 'جميع العملاء')
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
        <h2 class="mb-2 page-title">جميع العملاء</h2>
        <div class="row my-4">
          <!-- Small table -->
          <div class="col-md-12">
              <div class="card shadow">
                  <div class="card-body">
                  <!-- table -->
                <table class="table datatables" id="productsTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>اسم العميل</th>
                      <th>التلفون</th>
                      <th>العنوان</th>
                      {{-- <th class="text-center">العمليه</th> --}}
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($clients as $client)
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                     <td><a href="{{ route('clients.show' , $client->id) }}" style="
                        text-decoration: none;
                        color: #3498db; /* Link color */
                        font-weight: 600; /* Bold text */
                        border-radius: 5px; /* Rounded corners */
                        transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition */
                    ">{{ $client->name }}</a></td>
                     <td>{{ $client->phone }}</td>
                      <td>{{ $client->address }}</td>
                  </tr>
                  @endforeach

                  </tbody>
              </table>
              {{ $clients->links() }}
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

