@extends('client.layout.app')
@section('title', 'Order')
@section('content')
<main>
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
      <h2 class="page-title">Cart</h2>
      <div class="shopping-cart">
        <div class="cart-table__wrapper">
          <table class="cart-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>status</th>
                    <th>total</th>
                    <th>ship</th>
                    <th>customer name</th>
                    <th>customer email</th>
                    <th>customer address</th>
                    <th>note</th>
                    <th>payment</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $item)
                  <tr>
                    <td>{{ $item->id }}</td>
    
                    <td>{{ $item->status }}</td>
                    <td>${{ $item->total }}</td>
    
                    <td>${{ $item->ship }}</td>
                    <td>{{ $item->customer_name }}</td>
                    <td>{{ $item->customer_email }}</td>
    
                    <td>{{ $item->customer_address }}</td>
                    <td>{{ $item->note }}</td>
                    <td>{{ $item->payment }}</td>
                <td>
                    <div class="btn-group mb-1">
                        <button type="button"
                            class="mdi mdi-pencil dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" data-display="static">
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('orders.show', $item->id) }}">Info</a>
                            @if ($item->status == 'pending')
                            <form action="{{ route('client.orders.cancel', $item->id) }}" id="form-delete{{ $item->id }}" method="post">
                                @csrf
                                @method('delete')
                                <a class="dropdown-item delete-item cursor-pointer" data-id={{ $item->id }}>
                                    Delete
                                </a>
                            </form>  
                            @endif                   
                        </div>
                    </div>
                </td>
              </tr>
            </tbody>
          </table>
          {{ $orders->links('vendor.pagination.simple-bootstrap-5') }} 
        </div>
      </div>
    </section>
  </main>
  <script>
    $(function() {

        $(document).on("click", ".delete-item", function(e) {
            e.preventDefault();
            let id = $(this).data("id");
            confirmDelete()
                .then(function() {
                    $(`#form-delete${id}`).submit();
                })
                .catch();
        });

    });
</script>

@endsection