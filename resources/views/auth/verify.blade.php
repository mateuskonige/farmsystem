@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Uma nova solicitação foi enviada para o seu email
                        </div>
                    @endif

                    Antes de continuar, confere o seu email.
                    Se não recebeu o email,
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Solicitar um novo email</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
