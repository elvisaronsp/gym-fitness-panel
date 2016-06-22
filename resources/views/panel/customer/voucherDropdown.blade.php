{!! Form::label('customer_voucher_type', 'Rodzaj karnetu') !!}
{!! Form::select('customer_voucher_type', $availableVouchers, null, ['class' => 'form-control']) !!}
{!! $errors->first('customer_voucher_type', '<span class="help-block">:message</span>') !!}