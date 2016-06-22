@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">Klient: {{ $voucher->Customer->customer_name }} {{ $voucher->Customer->customer_surname }} <a href="{{ route('panel.customer.index') }}">[ powrót do listy ]</a></h1>
            
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Formularz zmiany daty wygaśnięcia karnetu klienta
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    
                    {!! Form::open(['route' => ['panel.customer.updateVoucherExpiredAt'], 'files' => true, 'role' => 'form']) !!}
                        {!! Form::hidden('id', $voucher->customer_voucher_id) !!}
                        <div class="row">
                            <div class="col-lg-6 col-lg-offset-3">
                                <div class="form-group text-center">
                                    <h3 class='text-danger'>AKTUALNA DATA WYGAŚNIECIA TO: {{ $voucher->customer_voucher_expired_at->format('Y-m-d') }}</h3>
                                </div>
                                <div class="form-group">
                                    <div class='input-group date datepicker col-xs-12'>
                                        <input type='hidden' name="customer_voucher_expired_at" value='{{ $voucher->customer_voucher_expired_at->format('Y-m-d') }}'/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                {!! Form::submit('Zmień datę wygaśniecia', ['id' => 'change-voucher-btn', 'class' => 'btn btn-success btn-lg']); !!}
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
