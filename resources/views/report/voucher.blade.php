<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
          body { font-family: DejaVu Sans, sans-serif; }
          table { width: 100%; font-size: 14px }
          .text-center { text-align: center }
        </style>
    </head>
    
    <body>
        @if (count($vouchers))
            <div class="text-center">
                <h5>Karnety zapłacone z okresu: {{ $startDate }} - {{ $endDate }}</h5>
            </div>
        
            @if (count($vouchersSummary))
                <table>
                    <thead>
                        <tr>
                            <th>Rodzaj karnetu</th>
                            <th>Ilość karnetów</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($vouchersSummary as $voucher)
                                <tr>
                                    <td class="text-center">{{ $voucher->customer_voucher_name }}</td>
                                    <td class="text-center">{{ $voucher->customer_voucher_summary }}</td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            <br>
            @endif
        
            <table border="1">
                <thead>
                    <tr>
                        <th>Lp.</th>
                        <th>Klient</th>
                        <th>Rodzaj karnetu</th>
                        <th>Data wykupienia</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($vouchers as $index => $voucher)
                            <tr>
                                <td class="text-center">{{ $index+1 }}</td>
                                <td class="text-center">{{ isset($voucher->Customer) ? $voucher->Customer->namePresenter() : 'Brak danych' }}</td>
                                <td class="text-center">{{ $voucher->customer_voucher_name }}</td>
                                <td class="text-center">{{ $voucher->customer_voucher_created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
        @else
            <div class="text-center">
                <h3 style="color: red">BRAK DANYCH W SYSTEMIE DOTYCZĄCYCH OKRESU:{{ $startDate }} - {{ $endDate }} </h3>
            </div>
        @endif
    </body>
</html>