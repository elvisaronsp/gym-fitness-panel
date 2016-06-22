@extends('layouts.app')

@section('content')

<style>
.table-customer {
    font-size: 12px;
}
</style>

    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">Klienci - wizyty na siłowni</h1>
            
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lista wszystkich klientów z karnetem na wejścia
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
                                    <th>Opłacone</th>
                                    <th class='text-center'>Wykorzystane wejścia</th>
                                    <th class="text-center">Operacje</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $index => $customer)
                                    <tr class="{{ $customer->VisitVoucher->hasVisitsAvailable() === false ? 'danger' : '' }}">
                                        <td>{{ $index+1 }} <small>(c:{{ $customer->customer_id }}, v:{{ $customer->VisitVoucher->customer_voucher_id }})</small></td>
                                        <td>
                                            {{ $customer->namePresenter() }}
                                        </td>
                                        <td>
                                            {{ $customer->customer_created_at->format('Y-m-d') }}
                                        </td>
                                        <td>
                                            {{ $customer->VisitVoucher->customer_voucher_name }}
                                        </td>
                                        <td class='info'>
                                            @if ($customer->VisitVoucher->isPayed())
                                                <b class='text-success'>TAK <small>({{ $customer->VisitVoucher->customer_voucher_payed_at }})</small></b>
                                            @else
                                                <b class='text-danger'>NIE </b>
                                                <a href="{{ route('panel.customer.updateVoucherPayedAt', $customer->VisitVoucher->customer_voucher_id) }}" class="btn btn-default btn-xs" onclick="return confirm('Czy napewno chcesz przyjąć wpłatę za karnet:\n {{ $customer->Voucher->customer_voucher_name }}\n dotyczący klienta: {{ $customer->namePresenter() }}??')">przyjmij wpłatę</a>

                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <b class="text-success" style="font-size: 13px">{{ $customer->VisitVoucher->getVisitsAvailableInfo() }}</b>
                                        </td>
                                        <td class="text-center">
                                            @if ($customer->VisitVoucher->hasVisitsAvailable())
                                                <a href="{{ route('panel.customerVisit.store', ['customer_visit_voucher_id' => $customer->VisitVoucher->customer_voucher_id]) }}" class="btn btn-sm btn-success" onclick="return confirm('Czy na pewno DODAĆ 1 wizytę dla klienta {{ $customer->customer_name }} {{ $customer->customer_surname }}??')">[ rejestruj wizytę ]</a>
                                                
                                                @if ($customer->VisitVoucher->getVisitsUsed() > 0)
                                                    <a href="{{ route('panel.customerVisit.cancel', ['customer_visit_voucher_id' => $customer->VisitVoucher->customer_voucher_id]) }}" class="btn btn-sm btn-danger" onclick="return confirm('Czy na pewno ANULOWAĆ 1 wizytę dla klienta {{ $customer->customer_name }} {{ $customer->customer_surname }}??')">[ anuluj wizytę ]</a>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                    
                    @else
                        <p class="text-danger">NIE DODANO JESZCZE ŻADNYCH KLIENTÓW DO SYSTEMU...</p>
                    @endif
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
@endsection
