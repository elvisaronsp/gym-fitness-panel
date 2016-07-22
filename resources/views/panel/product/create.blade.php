@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">Nowy produkt <a href="{{ route('panel.product.index') }}">[ powrót do listy ]</a></h1>
            
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Formularz dla nowego produktu
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    
                    {!! Form::open(['route' => ['panel.product.store'], 'role' => 'form']) !!}
                    
                        <div class="row">
                            <div class="col-lg-6 col-lg-offset-3">
                                @include('panel.product.form')
                                
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            {!! Form::label('product_warehouse_quantity', 'Aktualny stan magazynowy') !!}
                                            {!! Form::text('product_warehouse_quantity', old('product_warehouse_quantity', 0), ['class' => 'form-control']) !!}
                                            {!! $errors->first('product_warehouse_quantity', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                {!! Form::submit('Dodaj nowy produkt', ['class' => 'btn btn-success btn-lg ladda-button']); !!}
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
