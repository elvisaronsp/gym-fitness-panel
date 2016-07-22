<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            {!! Form::label('product_name', 'Nazwa produktu') !!}
            {!! Form::text('product_name', null, ['class' => 'form-control']) !!}
            {!! $errors->first('product_name', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
</div>
