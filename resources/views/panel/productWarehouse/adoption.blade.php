@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">Przyjęcie magazynowe dla {{ $product->product_name }} <a href="{{ route('panel.product.index') }}">[ powrót do listy ]</a></h1>
            
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Formularz przyjecie produktu na magazyn stanu magazynowego
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    
                    {!! Form::open(['route' => ['panel.productWarehouse.storeAdoption'], 'role' => 'form']) !!}
                        {!! Form::hidden('product_id', $product->product_id) !!}
                        <div class="row">
                            <div class="col-lg-6 col-lg-offset-3">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <h3>Aktualny stan magazynowy: {{ $product->getCurrentQuantity() }}</h3>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            {!! Form::label('quantity', 'Ilość towaru jaką chcesz wprowadzić na magazyn (o tyle zwiększy się aktualny stan magazynowy)') !!}
                                            {!! Form::text('quantity', old('quantity'), ['class' => 'form-control']) !!}
                                            {!! $errors->first('quantity', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                {!! Form::submit('Zapisz przyjęcie towaru na magazyn', ['class' => 'btn btn-success btn-lg ladda-button']); !!}
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
