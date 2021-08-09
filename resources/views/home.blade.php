@extends('layouts.app')

@section('content')

<div class="card">
    <!-- <div class="card-header">Dashboard</div> -->

    <div class="card-body p-0">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <div class="row">
            <div class="col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3662.2095198920574!2d-51.93673108440995!3d-23.380636460829564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ecd1537b97eba3%3A0x63d006b7bfc0ef46!2sAv.%20das%20Palmeiras%2C%2040%20-%20Jardim%20Paris%2C%20Maring%C3%A1%20-%20PR%2C%2087083-350!5e0!3m2!1spt-BR!2sbr!4v1628433205312!5m2!1spt-BR!2sbr" width="500" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="col-md-6 d-flex" style="flex-direction: column;justify-content: center;">
                <div class="row mb-3">
                    <img src="{{ url('storage/BTZTransportes_logo.png') }}" alt="Logo BTZ Transports" width="200" height="60" class="d-inline-block align-top">
                </div>
                <div class="row">
                    <div class="col-md-1"><i class="fas fa-phone"></i></div>
                    <div class="col-md-10 p-0">(41) 3246-4144</div>
                </div>
                <div class="row">
                    <div class="col-md-1"><i class="fab fa-whatsapp"></i></div>
                    <div class="col-md-10 p-0">(41) 99999-8888</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-1"><i class="fas fa-envelope"></i></div>
                    <div class="col-md-10 p-0">sac@btztransports.combr</div>
                </div>
                <div class="row">
                    <div class="col-md-1 d-flex align-items-center"><i class="fas fa-clock"></i></div>
                    <div class="col-md-10 p-0">Horário de atendimento <br> seg/sex - 08h00 - 22h00</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection