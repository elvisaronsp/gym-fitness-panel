@extends('layouts.app')

@section('content')

<style>
.table-customer {
    font-size: 12px;
}
</style>

    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">Klienci <a href="{{ route('panel.customer.create') }}" style="text-decoration: none">[ dodaj nowego ]</a></h1>
            
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lista wszystkich klientów
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
                                    <th class='info'>Typ karnetu</th>
                                    <th class='info'>Karnet ważny od</th>
                                    <th class='info'>Ważny do</th>
                                    <th class='info'>Wykorzystane wizyty</th>
                                    <th class='info'>Opłacone</th>
                                    <th class="text-center">Operacje</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $index => $customer)
                                    {{--*/ $isNotAvailableForUse = $customer->Voucher->isNotAvailableForUse() /*--}}
                                    <tr class="{{ $isNotAvailableForUse ? 'danger' : '' }}">
                                        <td>{{ $index+1 }} <small>({{ $customer->customer_id }})</small></td>
                                        <td>
                                            {{ $customer->namePresenter() }}
                                            @if ($isNotAvailableForUse)
                                                <br>
                                                <a href="{{ route('panel.customer.createRenewVoucher', $customer->customer_id) }}" class="btn btn-xs btn-success">[ chce odnowić karnet ]</a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $customer->customer_created_at->format('Y-m-d') }}
                                        </td>
                                        <td class='info'>
                                            {{ $customer->Voucher->customer_voucher_name }}
                                        </td>
                                        <td class='info'>
                                            {{ $customer->Voucher->customer_voucher_created_at->format('Y-m-d') }}
                                        </td>
                                        <td class='info'> 
                                            @if ($customer->Voucher->hasExpiredDate())
                                                {{ $customer->Voucher->customer_voucher_expired_at->format('Y-m-d') }}
                                                <a href="{{ route('panel.customer.editVoucherExpiredAt', $customer->Voucher->customer_voucher_id) }}" class="btn btn-default btn-xs ladda-button">zmień datę ważności</a>
                                            @else
                                                Nie dotyczy
                                            @endif
                                        </td>
                                        <td  class='info'> 
                                            @if ($customer->Voucher->hasVisitsLimit())
                                                {{ $customer->Voucher->getVisitsAvailableInfo() }}
                                            @else
                                                Nie dotyczy
                                            @endif
                                        </td>
                                        <td class='info'>
                                            @if ($customer->Voucher->isPayed())
                                                <b class='text-success'>TAK</b>
                                            @else
                                                <b class='text-danger'>NIE </b>
                                                <a href="{{ route('panel.customer.updateVoucherPayedAt', $customer->Voucher->customer_voucher_id) }}" class="btn btn-default btn-xs" onclick="return confirm('Czy napewno chcesz przyjąć wpłatę za karnet:\n {{ $customer->Voucher->customer_voucher_name }}\n dotyczący klienta: {{ $customer->namePresenter() }}??')">przyjmij wpłatę</a>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('panel.customer.edit', $customer->customer_id) }}" class="btn btn-xs btn-info ladda-button">[ szczegóły ]</a>
                                            <a href="{{ route('panel.customer.editVoucher', $customer->customer_id) }}" class="btn btn-xs btn-warning ladda-button">[ zmień karnet ]</a>
                                            <a href="{{ route('panel.customer.delete', $customer->customer_id) }}" onclick="return confirm('Czy napewno chcesz usunąć z systemu klienta:\n{{ $customer->namePresenter() }}\n???')" class="btn btn-xs btn-danger ladda-button">[ usuń klienta ]</a>
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
