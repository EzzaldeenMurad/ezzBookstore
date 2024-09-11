@extends('layouts.main')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div id="success" style="display:none" class="col-md-8 text-center h3 p-4 bg-success text-light rounded">تمت
                عملية الشراء بنجاح</div>
            @if (session('message'))
                <div class="col-md-8 text-center h3 p-4 bg-success text-light rounded">تمت عملية الشراء بنجاح </div>
            @endif

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">عربة التسوق</div>

                    <div class="card-body">

                        @if ($items->count())
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">العنوان</th>
                                        <th scope="col">السعر</th>
                                        <th scope="col">الكمية</th>
                                        <th scope="col">السعر الكلي</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                @php($totalPrice = 0)
                                @foreach ($items as $item)
                                    @php($totalPrice += $item->price * $item->pivot->number_of_copies)

                                    <tbody>
                                        <tr>
                                            <th scope="row">{{ $item->title }}</th>
                                            <td>{{ $item->price }} $</td>
                                            <td>
                                                <form style="float:center; margin: auto" method="post"
                                                    action="{{ route('cart.remove_one', $item->id) }}">
                                                    @csrf
                                                    <input type="number" name="number_of_copies"
                                                        value="{{ $item->pivot->number_of_copies }}" min="1"
                                                        max="{{ $item->number_of_copies }}"
                                                        style="width:22%; height:28px ; margin:auto ; border-radius:5px; text-align:center ;  ">
                                                    <button class="btn btn-outline-warning btn-sm" type="submit">تعديل
                                                        الكمية</button>

                                                </form>
                                            </td>
                                            <td>{{ $item->price * $item->pivot->number_of_copies }} $</td>
                                            <td>
                                                <form style="float:left; margin: auto 5px" method="post"
                                                    action="{{ route('cart.remove_all', $item->id) }}">
                                                    @csrf
                                                    <button class="btn btn-outline-danger btn-sm" type="submit">أزل
                                                        الكل</button>
                                                </form>


                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                            <h4 class="mb-5">المجموع النهائي: {{ $totalPrice }} $</h4>

                            <!-- Set up a container element for the button -->
                            <div class="d-inline-block" id="paypal-button-container"></div>
                            <a href="{{ route('credit.checkout') }}" class="d-inline-block mb-4 float-start btn bg-cart"
                                style="text-decoration:none;">
                                <span>بطاقة ائتمانية</span>
                                <i class="fas fa-credit-card"></i>
                            </a>
                        @else
                            <div class="alert alert-info text-center">
                                لا يوجد كتب في العربة
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Replace "test" with your own sandbox Business account app client ID -->
    <script
        src="https://www.paypal.com/sdk/js?client-id=Aezs4JBA3lgOH7rP2cMEffJRN0AVY9QBfHrpnX3-kXoSAlFs-4iaE7_W88AhtQ0h4CoWh8l7fGyK5BOD&currency=USD">
    </script>

    <script>
        paypal.Buttons({
            // Sets up the transaction when a payment button is clicked
            createOrder: (data, actions) => {
                return fetch('/api/paypal/create-payment', {
                    method: 'POST',
                    body: JSON.stringify({
                        'userId': "{{ auth()->user()->id }}",
                    })
                }).then(function(res) {
                    return res.json();
                }).then(function(orderData) {
                    return orderData.id;
                });
            },
            // Finalize the transaction after payer approval
            onApprove: (data, actions) => {
                return fetch('/api/paypal/execute-payment',  {
                    method: 'POST',
                    body: JSON.stringify({
                        orderId: data.orderID,
                        userId: "{{ auth()->user()->id }}",
                    })
                }).then(function(res) {
                    return res.json();
                }).then(function(orderData) {
                    $('#success').slideDown(200);
                    $('.card-body').slideUp(0);
                    $('span.badge').text(orderData.num_of_product);
                });
            }
        }).render('#paypal-button-container');
    </script>
@endsection
