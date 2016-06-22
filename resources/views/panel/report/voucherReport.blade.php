@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Generator raportów
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    
                    {!! Form::open(['route' => ['panel.report.generate'], 'files' => true, 'role' => 'form', 'target' => '_blank']) !!}
                        <div class="row" style="margin-bottom: 20px">
                            <div class="col-lg-6 col-lg-offset-3">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <input type='text' name="start_date" class="form-control datepicker-input" placeholder="OD" value="{{ $starDate }}"/>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <input type='text' name="end_date" class="form-control datepicker-input" placeholder="DO" value="{{ $endDate }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-6 col-lg-offset-3">
                                <div class="col-xs-12">
                                    <div class="form-group text-center">
                                        TYP RAPORTU:<br>
                                        <input type='radio' name="type" value="voucher" checked="checked"/> <b>KARNETY</b>
                                        &nbsp;&nbsp;&nbsp;
                                        <input type='radio' name="type" value="singleEntry"/> <b>WEJŚCIA JEDNORAZOWE</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                {!! Form::submit('Generuj raport', ['class' => 'btn btn-success btn-lg']); !!}
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
