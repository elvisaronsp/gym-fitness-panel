@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">Produkty <a href="{{ route('panel.product.create') }}" style="text-decoration: none">[ dodaj nowy ]</a></h1>
            
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lsta produktów dla klientów
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    
                    @if (count($products))
                        <div class="col-xs-10 col-xs-offset-1">
                            <div class="table-responsive">
                                <table class="table table-customer table-striped table-bordered table-hover table-condensed ">
                                    <thead>
                                        <tr>
                                            <th>Lp.</th>
                                            <th>Nazwa</th>
                                            <th>Stan</th>
                                            <th class="text-center">Magazyn</th>
                                            <th class="text-center">Operacje</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $item => $product)
                                            <tr>
                                                <td>
                                                    {{ $item+1 }}
                                                </td>
                                                <td>
                                                    {{ $product->product_name }}
                                                </td>
                                                <td>
                                                    <b>{{ $product->getCurrentQuantity() }}</b>
                                                </td>
                                                <td class="text-center">
                                                    @if ($product->hasCurrentQuantity() && $product->getCurrentQuantity() > 0)
                                                        <a href="{{ route('panel.productWarehouse.sell', $product->product_id) }}" onclick="return confirm('Czy napewno chcesz wydać 1 sztuke produktu:\n{{ $product->product_name }}\n???')"  class="btn btn-xs btn-success">[ wydanie 1szt. ]</a>
                                                    @endif

                                                    <a href="{{ route('panel.productWarehouse.correct', $product->product_id) }}" class="btn btn-xs btn-warning ladda-button">[ korekta stanu ]</a>
                                                    <a href="{{ route('panel.productWarehouse.adoption', $product->product_id) }}" class="btn btn-xs btn-default ladda-button">[ przyjęcie dostawy ]</a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('panel.product.delete', $product->product_id) }}" onclick="return confirm('Czy napewno chcesz usunąć z systemu produkt:\n{{ $product->product_name }}\n???')" class="btn btn-xs btn-danger ladda-button">[ usuń ]</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                        <p class="text-danger">NIE DODANO JESZCZE ŻADNYCH PRODUKTÓW...</p>
                    @endif

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
@endsection
