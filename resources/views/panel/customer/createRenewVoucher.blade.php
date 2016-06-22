@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">Odnowienie karnetu dla klienta {{ $customer->customer_name }} {{ $customer->customer_surname }} <a href="{{ route('panel.customer.index') }}">[ powrót do listy ]</a></h1>
            
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Formularz odnowienia karnetu dla klienta 
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    
                    {!! Form::open(['route' => ['panel.customer.storeRenewVoucher'], 'files' => true, 'role' => 'form']) !!}
                        {{ Form::hidden('id', $customer->customer_id) }}
                        {{ Form::hidden('customer_voucher_type', $customer->Voucher->customer_voucher_type) }}
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <h2>{{ $customer->customer_name }} {{ $customer->customer_surname }}</h2>
                                <h1>Czy na pewno chcesz odnowić karnet "{{ $customer->Voucher->customer_voucher_name }}"??</h1>
                            </div>
                            <div class="text-center">
                                {!! Form::label('customer_voucher_payed', 'ZAPŁACONY??') !!}
                                {!! Form::hidden('customer_voucher_payed', 0, ['id' => 'customer_voucher_payed_hidden']) !!}
                                {!! Form::checkbox('customer_voucher_payed', 1, false) !!}
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px">
                            <div class="col-lg-12 text-center">
                                <a href="{{ route('panel.customer.index') }}" class="btn btn-lg btn-danger">NIE</a>
                                {!! Form::submit('TAK', ['class' => 'btn btn-success btn-lg', 'onclick' => 'return confirm("Czy na pewno chcesz odnowić karnet temu klientowi??")']); !!}
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
