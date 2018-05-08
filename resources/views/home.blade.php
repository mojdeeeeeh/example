@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <div>
                        salam
                        <date-picker v-model="date"></date-picker>       
                        <date-picker v-model="datetime" type="datetime"></date-picker>                 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/main.js') }}"></script>


    <script src="node_modules/moment/moment.js"></script>
    <script src="node_modules/moment-jalaali/build/moment-jalaali.js"></script>
    <script>
        var moment = require('moment-jalaali');
        moment().format('jYYYY/jM/jD');
        
         new Vue({
            el: '#app',
        });
    </script>


@endsection
