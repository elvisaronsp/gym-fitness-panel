@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">Klienci - wejścia pojedyncze na siłownie</h1>
            
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Wejścia pojedyńcze klientów bez karnetów
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    
                    <div class="row text-center" style="margin-bottom: 30px">
                        <a href="{{ route('panel.customerSingleEntry.store') }}" class="btn btn-lg btn-success" onclick="return confirm('Czy napewno chcesz zarejestrować pojedyncze wejście klienta na siłownie???')">REJESTRUJ WIZYTĘ KLIENTA</a>
                    </div>
                    
                    @if (count($entries))
                        <div class="col-xs-6 col-xs-offset-3">
                            {!! $entries->links() !!}
                            <div class="table-responsive">
                                <table class="table table-customer table-striped table-bordered table-hover table-condensed ">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Data</th>
                                            <th class="text-center">Liczba wejść</th>
                                            <th class="text-center">Operacje</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($entries as $entry)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $entry->customer_single_entry_date }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $entry->customer_single_entry_sum }}
                                                </td>
                                                <td class="text-center">
                                                    <a href="#" class="btn btn-default btn-xs" onclick="return alert('Tutaj mozna wyswietlic kiedy klient byl na silowni - jesli taka funckja jest potrzebna')">[ szczegóły wizyt ]</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {!! $entries->links() !!}
                        </div>
                    @else
                        <p class="text-danger">NIE DODANO JESZCZE ŻADNYCH POJEDYNCZYCH WEJŚĆ KLIENTÓW...</p>
                    @endif

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
@endsection
