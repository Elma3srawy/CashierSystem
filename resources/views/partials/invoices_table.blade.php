@foreach ($invoices as $invoice)
<tr>
  <td><a href="{{ route('clients.show' , $invoice->id) }}" style="
      text-decoration: none;
      color: #3498db; /* Link color */
      font-weight: 600; /* Bold text */
      border-radius: 5px; /* Rounded corners */
      transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition */
  ">{{ $invoice->name }}</a></td>
  <td>
      <a style="text-decoration: none;" href="{{ route('invoice.show' , $invoice->id) }}"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: red">{{ $invoice->count }}</span></a>
  </td>
  {{-- <td>{{ $invoice->orders->sum('price') }}</td> --}}
  {{-- <td>{{ $invoice->orders->sum('payment') }}</td> --}}
  @can('access-superAdmin')
  <td>{{ $invoice->price - $invoice->payment }}</td>
  @endcan
  <td>{{\Carbon\Carbon::parse($invoice->created_at)->format('d-m-Y') }}</td>
  <td>{{ $invoice->date_of_receipt ? \Carbon\Carbon::parse($invoice->date_of_receipt)->format('d-m-Y') : 'لا يوجد' }}</td>
  <td>{{ $invoice->return_date ? \Carbon\Carbon::parse($invoice->return_date)->format('d-m-Y') : 'لا يوجد' }}</td>
  @if($invoice->status == 'pending')
      <td><span class="badge badge-warning">ايجار</span></td>
  @else
      <td><span class="badge badge-danger">بيع</span></td>
  @endif
  <td class="text-center">
      <div class="btn-group">
    @can('access-superAdmin')
          @if ($invoice->price - $invoice->payment <> 0 )
              <form action="{{ route('invoice.pay' , $invoice->id) }}" method="post">
                  @csrf
                  <button type="button" class="btn btn-sm btn-outline-info pay-btn" data-toggle="modal" data-target="#verticalModal2" data-invoice-id="{{ $invoice->id }}">
                      <i class="fe fe-16 fe-dollar-sign"></i>&nbsp;دفع
                  </button>
              </form>
          @else
          <button type="button" class="btn btn-sm btn-outline-danger">
              <i class="fe fe-16 fe-x-circle"></i>&nbsp;
          </button>
          @endif
          @if (is_null($invoice->restored_at))
              <form action="{{ route('invoice.restore' , $invoice->id) }}" method="post">
                  @csrf
                  @method("PUT")
                  <button type="button" class="btn btn-sm btn-outline-success restore-btn" data-toggle="modal" data-target="#verticalModal" data-invoice-id="{{ $invoice->id }}" >
                      <i class="fe fe-16 fe-rotate-ccw"></i>&nbsp;استرجاع
                  </button>
              </form>
          @else
              <button type="button" class="btn btn-sm btn-outline-danger">
                  <i class="fe fe-16 fe-x-circle"></i>&nbsp;
              </button>
          @endif
        @endcan
          <a href="{{ route('invoice.print' , $invoice->id) }}" class="btn btn-sm btn-outline-primary">
              <i class="fe fe-16 fe-printer"></i>&nbsp;طباعة
          </a>
          {{-- <button type="button" class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#updateModal"
                data-invoice-id="{{ $invoice->id }}"
                data-status="{{ $invoice->status }}"
                data-name="{{ $invoice->name}}"
                data-address="{{ $invoice->address }}"
                data-phone="{{ $invoice->phone }}"
                data-date-of-receipt="{{ $invoice->date_of_receipt }}"
                data-return-date="{{ $invoice->return_date }}">
            <i class="fe fe-16 fe-edit"></i>&nbsp;تعديل
        </button> --}}
        {{-- <a href="{{ route('invoice.edit' , $invoice->id) }}" class="btn btn-sm btn-outline-success">
            <i class="fe fe-16 fe-edit"></i>&nbsp;تعديل
        </a> --}}
         @can('access-superAdmin')

          <form action="{{ route('invoice.destroy', $invoice->id) }}" method="post">
              @csrf
              @method("DELETE")
              <button type="button" class="btn btn-sm btn-outline-danger delete-btn" data-toggle="modal" data-target="#verticalModal1" data-invoice-id="{{ $invoice->id }}">
                  <i class="fe fe-16 fe-trash-2"></i>&nbsp;حذف
              </button>
          </form>
          @endcan
      </div>
  </td>
</tr>
@endforeach

