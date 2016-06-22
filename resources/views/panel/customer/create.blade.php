@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">Nowy klient <a href="{{ route('panel.customer.index') }}">[ powrót do listy ]</a></h1>
            
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Formularz dla nowego klienta
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    
                    {!! Form::open(['route' => ['panel.customer.store'], 'files' => true, 'role' => 'form']) !!}
                    
                        <div class="row">
                            <div class="col-lg-6">
                                @include('panel.customer.form')
                            </div>
                            <div class="col-lg-6">
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
                                {!! Form::submit('Dodaj nowego klienta', ['class' => 'btn btn-success btn-lg ladda-button']); !!}
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
