@extends('layouts.app')

@section('content')

<style>
.table-customer {
    font-size: 12px;
}
</style>

    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">Panel systemu</h1>
            
        </div>
    </div>

    <div class="row">
        <div class="col-xs-8">
            <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Klienci z wykorzystanymi karnetami
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    @if (count($customers))
                    <div class="table-responsive">
                        <table class="table table-customer table-striped table-bordered table-hover table-condensed customer-table">
                            <thead>
                                <tr>
                                    <th>Lp.</th>
                                    <th>Imię i nazwisko</th>
                                    <th>W systemie od</th>
                                    <th>Typ karnetu</th>
                                    <th>Karnet ważny od</th>
                                    <th>Ważny do</th> 
                                    <th>Wykorzystane wizyty</th>
                                    <th class="text-center">Operacje</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $index => $customer)
                                    <tr class="danger">
                                        <td>{{ $index+1 }} <small>({{ $customer->customer_id }})</small></td>
                                        <td>
                                            {{ $customer->namePresenter() }}
                                        </td>
                                        <td>
                                            {{ $customer->customer_created_at->format('Y-m-d') }}
                                        </td>
                                        <td>
                                            {{ $customer->Voucher->customer_voucher_name }}
                                        </td>
                                        <td>
                                            {{ $customer->Voucher->customer_voucher_created_at->format('Y-m-d') }}
                                        </td>
                                        <td> 
                                            @if ($customer->Voucher->hasExpiredDate())
                                                {{ $customer->Voucher->customer_voucher_expired_at->format('Y-m-d') }}
                                            @else
                                                Nie dotyczy
                                            @endif
                                        </td>
                                        <td> 
                                            @if ($customer->Voucher->hasVisitsLimit())
                                                {{ $customer->Voucher->getVisitsAvailableInfo() }}
                                            @else
                                                Nie dotyczy
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('panel.customer.createRenewVoucher', $customer->customer_id) }}" class="btn btn-xs btn-success">[ chce odnowić karnet ]</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                    @else
                    <p class="text-success"><b>BRAK KLIENTÓW Z WYGAŚNIĘTYMI KARNETAMI...</b></p>
                    @endif
                </div>
            </div>
            </div>
        </div>
        
        @if (count($visits))
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Wejścia klientów
                    </div>
                    <div class="panel-body">
                        <div style="height: 600px !important; overflow: scroll;">
                        <table class="table table-customer table-striped table-bordered table-hover table-condensed">
                            @foreach ($visits as $visit)
                            <tr>
                                <td>
                                    {{ $visit->Voucher->Customer->customer_name }} {{ $visit->Voucher->Customer->customer_surname }}
                                </td>
                                <td class="text-center">
                                    <span class="text-muted small"><em>{{ $visit->customer_visit_created_at->format('Y-m-d H:i') }}, {{ $visit->customer_visit_quantity }} wizyta</em> </span>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
@endsection
