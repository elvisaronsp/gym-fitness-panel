@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">Edycja danych klienta {{ $customer->customer_name }} {{ $customer->customer_surname }} <a href="{{ route('panel.customer.index') }}">[ powrót do listy ]</a></h1>
            
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Formularz edycji danych klienta
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    {!! Form::model($customer, ['route' => ['panel.customer.update', $customer->customer_id], 'files' => true, 'role' => 'form']) !!}
                    
                        <div class="row">
                            <div class="col-lg-6">
                                @include('panel.customer.form')
                                
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        {!! Form::submit('Zapisz zmiany', ['class' => 'btn btn-success btn-lg']); !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                @if (count($customer->Vouchers))
                                    <div class="row">
                                        <div class="text-center">
                                        <h3>Historia karnetów klienta</h3>
                                        </div>
                                        <div class="col-xs-12" style="margin-top: 20px">
                                            <table class="table table-condensed">
                                                <tr>
                                                    <th>Lp.</th>
                                                    <th>Nazwa</th>
                                                    <th>Data Utworzenia</th>
                                                    <th>Data wygaśnięcia</th>
                                                    <th class="text-center">Wizyty</th>
                                                    <th class="text-center">Rozliczono</th>
                                                    <th class="text-center">Aktualny</th>
                                                </tr>
                                                
                                            @foreach ($customer->Vouchers as $index => $voucher)
                                                <tr class="{{ $index == 0 && $voucher->isExpired() ? 'danger' : '' }}">
                                                    <td>{{ $index+1}}</td>
                                                    <td>{{ $voucher->customer_voucher_name }}</td>
                                                    <td>{{ $voucher->customer_voucher_created_at }}</td>
                                                    <td>{{ $voucher->getExpiredDate() }}</td>
                                                    <td class="text-center">
                                                        @if ($voucher->hasVisitsLimit())
                                                            {{ $voucher->getVisitsAvailableInfo() }}
                                                        @endif
                                                    </td>
                                                    <td class="text-center">{{ $voucher->isPayed() ? 'TAK' : 'NIE'  }}</td>
                                                    <td class="text-center">
                                                        @if ($index == 0)
                                                        <i class="fa fa-hand-o-left" aria-hidden="true"></i>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </table>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
@endsection
