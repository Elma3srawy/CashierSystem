@foreach ($products as $product)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $product->quantity ?? "لا توجد"}}</td>
            <td>{{ $product->color ?? "لا توجد"}}</td>
            <td>{{ $product->size  ?? "لا توجد"}}</td>
            <td>{{ $product->model ?? "لا توجد" }}</td>
            {{-- <td>
            @switch($product->status)
                @case('active')
                    <button type="button" class="btn btn-sm btn-success">في المخزن</button>
                    @break
                @case('inactive')
                    <button type="button" class="btn btn-sm btn-danger">مباع</button>
                    @break
                @default
                    <button type="button" class="btn btn-sm btn-warning">متأجر</button>
            @endswitch

            </td> --}}
            @if (isset($product->image))<td>
                <a target="_blank" href="{{ Storage::url($product->image) }}"><img style="width: 50px;height: 50px;border: 1px solid #ccc;padding: 5px;margin: 0 auto;background-color: #f2f2f2;" src="{{ Storage::url($product->image) }}" alt=""></a>
            </td>
            @else
            <td>لا توجد</td>
            @endif
            <td>{{ \Carbon\Carbon::parse($product->created_at)->format('Y-m-d') }}</td>
            <td class="text-center">
                <div class="btn-group">
                    <a href="{{ route('products.edit' , $product->id) }}">
                        <button type="submit" class="btn btn-sm btn-outline-success">
                            <i class="fe fe-16 fe-edit"></i>&nbsp;تعديل
                        </button>
                    </a>
                    <button type="button" class="btn btn-sm btn-outline-danger delete-btn" data-toggle="modal" data-target="#deleteModal" data-product-id="{{ $product->id }}">
                        <i class="fe fe-16 fe-delete"></i>&nbsp;حذف
                    </button>
                </div>
            </td>
        </tr>
@endforeach
