<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            {!! Form::label('customer_name', 'Imię') !!}
            {!! Form::text('customer_name', null, ['class' => 'form-control']) !!}
            {!! $errors->first('customer_name', '<span class="help-block">:message</span>') !!}
        </div>
        <div class="form-group">
            {!! Form::label('customer_surname', 'Nazwisko') !!}
            {!! Form::text('customer_surname', null, ['class' => 'form-control']) !!}
            {!! $errors->first('customer_surname', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
</div>
