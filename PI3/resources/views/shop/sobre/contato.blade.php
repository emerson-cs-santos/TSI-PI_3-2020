@extends('layouts.Shopping')

@section('content_Shopping')
    <!--feature start -->
    <section id="feature" class="feature">
        <div class="container">
            @include('exibirErros')

            <div class="section-header">
                <h2>Contato</h2>
            </div><!--/.section-header-->

            <div class="feature-content">
                <div class="col-12 text-center">
                    <h3>{{$contato->titulo}}</h3>

                    <p class="mt-5">{{$contato->texto}}</p>
                </div>
            </div>

        </div><!--/.container-->

    </section>

@endsection
