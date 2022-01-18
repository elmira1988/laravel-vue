@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-4">
            <h4>Standart VUE+Laravel</h4>
            <hr>
            <a class="btn btn-success url" href="#zero">Example Component</a>

            <a class="btn btn-success url" href="#one">Vue->Blade</a>

            <a class="btn btn-success url" href="#two">Ajax</a>
        </div>

        <div class="col-md-4">
            <h4>ChartJS: VUE+Laravel</h4>
            <hr>
            <a class="btn btn-success url" href="#three">Line</a>

            <a class="btn btn-success url" href="#four">Pie</a>

            <a class="btn btn-success url" href="#five">Trigger</a>
        </div>

        <div class="col-md-4">
            <h4>Realtime VUE+Laravel</h4>
            <hr>
            <a class="btn btn-success url" href="#six">ChartJs</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12 bg-white border-dark">
            <div class="owl-carousel">
                <div data-hash="zero">
                    <h2 class="text-center">#1 Example Component</h2>
                    <example-component></example-component>
                </div>
                <div data-hash="one">
                    <h2 class="text-center">#2 Передача из Blade во Vue</h2>
                    <prop-component :urldata="{{ json_encode($url_data) }}"></prop-component>
                </div>
                <div data-hash="two">
                    <h2 class="text-center">#3 Ajax</h2>
                    <ajax-component></ajax-component>
                </div>

                <div data-hash="three">
                    <h2 class="text-center">#1 Line</h2>
                    <chart-line-component></chart-line-component>
                </div>

                <div data-hash="four">
                    <h2 class="text-center">#3 Ajax</h2>
                    <chart-pie-component></chart-pie-component>
                </div>

                <div data-hash="five">
                    <h2 class="text-center">#3 Ajax</h2>
                    <chart-random-component></chart-random-component>
                </div>

                <div data-hash="six">
                    <h2 class="text-center">Realtime</h2>
                    <socket-component></socket-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
