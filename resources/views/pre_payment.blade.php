<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Events.io</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+One&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pre_payment.css') }}">

    {{-- <!-- PWA  -->
    <meta name="theme-color" content="#BF3861"/>
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}"> --}}
</head>
<body>
    <div class="container-fluid vh-100 px-0 overflow-hidden">
        <div class="d-flex justify-content-center h-100">
            <div class="d-flex position-relative flex-column overflow-auto" id="app">
                <div class="d-inline-flex align-items-center">
                    <a href="/home" class="me-3"><i class="bx bx-chevron-left fs-3 text-white btn-back"></i></a>
                    <h3 class="mb-0 text-header">Payment</h3>
                </div>
                <div class="d-inline-flex card pre-payment-card mt-5">
                    <div class="card-header pre-payment-card-header">
                        This transaction is on behalf of
                    </div>
                    <div class="card-body pb-0">
                        <table class="table table-borderless text-white">
                            <tr>
                                <td class="pre-payment-transaction-text fw-light">Name</td>
                                <td>:</td>
                                <td class="pre-payment-transaction-text pre-payment-transaction-detail">{{ $user->getFullName() }}</td>
                            </tr>
                            <tr>
                                <td class="pre-payment-transaction-text fw-light">Phone</td>
                                <td>:</td>
                                <td class="pre-payment-transaction-text pre-payment-transaction-detail">{{ $user->phone }}</td>
                            </tr>
                            <tr>
                                <td class="pre-payment-transaction-text fw-light">Email</td>
                                <td>:</td>
                                <td class="pre-payment-transaction-text pre-payment-transaction-detail">{{ $user->email }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="d-inline-flex card pre-payment-card mt-5">
                    <div class="card-header pre-payment-card-header">
                        Ticket Detail
                    </div>
                    <div class="card-body pb-0">
                        <table class="table table-borderless text-white">
                            <tr>
                                <td class="pre-payment-transaction-text fw-light">Order Number</td>
                                <td>:</td>
                                <td class="pre-payment-transaction-text pre-payment-transaction-detail">{{ $transaction->order_number }}</td>
                            </tr>
                            <tr>
                                <td class="pre-payment-transaction-text fw-light">Name</td>
                                <td>:</td>
                                <td class="pre-payment-transaction-text pre-payment-transaction-detail">{{ $transaction->event->name }}</td>
                            </tr>
                            <tr>
                                <td class="pre-payment-transaction-text fw-light">Artist</td>
                                <td>:</td>
                                <td class="pre-payment-transaction-text pre-payment-transaction-detail">{{ $transaction->event->artist }}</td>
                            </tr>
                            <tr>
                                <td class="pre-payment-transaction-text fw-light">Date</td>
                                <td>:</td>
                                <td class="pre-payment-transaction-text pre-payment-transaction-detail">{{ $transaction->selected_date->format('l, d M y') }}</td>
                            </tr>
                            <tr>
                                <td class="pre-payment-transaction-text fw-light">Section</td>
                                <td>:</td>
                                <td class="pre-payment-transaction-text pre-payment-transaction-detail">{{ $transaction->event_ticket_category->category }}</td>
                            </tr>

                            <tr>
                                <td class="pre-payment-transaction-text fw-light">Quantity</td>
                                <td>:</td>
                                <td class="pre-payment-transaction-text pre-payment-transaction-detail">{{ $transaction->qty }}</td>
                            </tr>
                            <tr>
                                <td class="pre-payment-transaction-text fw-light">Price</td>
                                <td>:</td>
                                <td class="pre-payment-transaction-text pre-payment-transaction-detail">IDR {{ str_replace(',', '.', number_format($transaction->event_ticket_category->price * $transaction->qty, 0)) }}</td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div class="horizontal-line-dashed"></div>
                                </td>
                            </tr>
                            <tr>
                                <td class="pre-payment-transaction-text fw-light">Service Tax</td>
                                <td>:</td>
                                <td class="pre-payment-transaction-text pre-payment-transaction-detail">IDR {{ str_replace(',', '.', number_format($transaction->event_ticket_category->price * 0.03 * $transaction->qty, 0)) }}</td>
                            </tr>
                            <tr>
                                <td class="pre-payment-transaction-text fw-light">Total Price</td>
                                <td>:</td>
                                <td class="pre-payment-transaction-text pre-payment-transaction-detail">IDR {{ str_replace(',', '.', number_format(($transaction->event_ticket_category->price * $transaction->qty) + ($transaction->event_ticket_category->price * $transaction->qty * 0.03), 0)) }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="mt-5 row">
                    <div class="col-6">
                        <a class="btn-pink-outline" href="/pre-payment/cancel/{{ $transaction->id }}">Cancel</a>
                    </div>
                    <div class="col-6">
                        <a class="btn-pink" href="/pre-payment/pay/{{ $transaction->id }}">Pay Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("/sw.js").then(function (reg) {
                console.log("Service worker has been registered for scope: " + reg.scope);
            });
        }
    </script> --}}
</body>
</html>