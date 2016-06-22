@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">Klient {{ $customer->customer_name }} {{ $customer->customer_surname }} <a href="{{ route('panel.customer.index') }}">[ powrót do listy ]</a></h1>
            
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Formularz zmiany karnetu klienta
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    
                    {!! Form::open(['route' => ['panel.customer.updateVoucher'], 'files' => true, 'role' => 'form']) !!}
                        {!! Form::hidden('id', $customer->customer_id) !!}
                        <div class="row">
                            <div class="text-center">
                                <h3>Aktualny karnet: {{ $customer->Voucher->customer_voucher_name }}</h3>
                                <h5>Opłacony: {{ $customer->Voucher->isPayed() ? 'TAK' : 'NIE' }}</h5>
                                <hr>
                                <h4>Zmień na:</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-lg-offset-3">
                                <div class="form-group">
                                    @include('panel.customer.voucherDropdown')
                                </div>
                                <div class="form-group">
                                    {!! Form::label('customer_voucher_payed', 'ZAPŁACONY??') !!}
                                    {!! Form::hidden('customer_voucher_payed', 0, ['id' => 'customer_voucher_payed_hidden']) !!}
                                    {!! Form::checkbox('customer_voucher_payed', 1, false) !!}
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                {!! Form::submit('Zmień voucher', ['id' => 'change-voucher-btn', 'class' => 'btn btn-success btn-lg']); !!}
                            </div>
                        </div>
                        
                    {!! Form::close() !!}
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>


<script>
    $(function() {
        $('#change-voucher-btn').on('click', function(event) {
            return confirm('Czy napewno chcesz zmienić karnet dla tego klienta??');
        });
    });
</script>
@endsection
