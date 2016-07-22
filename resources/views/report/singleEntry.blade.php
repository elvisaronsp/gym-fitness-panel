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
        @if (count($entries))
            <div class="text-center">
                <h5>Wejścia pojedyńcze z okresu: {{ $startDate }} - {{ $endDate }}</h5>
            </div>
            <table border="1">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Liczba wejść</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($entries as $entry)
                            <tr>
                                <td class="text-center">
                                    {{ $entry->customer_single_entry_date }}
                                </td>
                                <td class="text-center">
                                    {{ $entry->customer_single_entry_sum }}
                                </td>
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