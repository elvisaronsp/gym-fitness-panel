@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">Korekta stanu magazynowego dla {{ $product->product_name }} <a href="{{ route('panel.product.index') }}">[ powrót do listy ]</a></h1>
            
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Formularz korekty stanu magazynowego
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    
                    {!! Form::open(['route' => ['panel.productWarehouse.storeCorrect'], 'role' => 'form']) !!}
                        {!! Form::hidden('product_id', $product->product_id) !!}
                        <div class="row">
                            <div class="col-lg-6 col-lg-offset-3">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <h3>Aktualny stan magazynowy: {{ $product->getCurrentQuantity() }}</h3>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            {!! Form::label('quantity', 'Prawidłowy stan magazynowy (wprowadź ilość sztuk jaka jest fizycznie na magazynie)') !!}
                                            {!! Form::text('quantity', old('quantity'), ['class' => 'form-control']) !!}
                                            {!! $errors->first('quantity', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                {!! Form::submit('Zapisz korekte stanu magazyowego', ['class' => 'btn btn-success btn-lg ladda-button']); !!}
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
