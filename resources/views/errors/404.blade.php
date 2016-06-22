@extends('layouts.frontend')

@section('content')
<section class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="post">
                    <div class="post-title">
                        <h2>Przepraszamy, podana strona nie została odnaleziona.</h2>
                    </div>
                    <div class="post-body">
                        <p>
                            Podana strona nie została odnaleziona, przejdź do <a href="{{ url('/') }}" style='color: red'>strony głównej</a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection