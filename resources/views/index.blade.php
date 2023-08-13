@extends('templates.master')

@section('cssthis')
    <style>
        #ulasansec {
            resize: none;
            min-height: 10rem !important;
        }

        .rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: left;
        }

        .rating>input {
            display: none;
        }

        .rating>label {
            position: relative;
            width: 1.1em;
            font-size: 3rem;
            color: #FFD700;
            cursor: pointer;
        }

        .rating>label::before {
            content: "\2605";
            position: absolute;
            opacity: 0;
        }

        .rating>label:hover:before,
        .rating>label:hover~label:before {
            opacity: 1 !important;
        }

        .rating>input:checked~label:before {
            opacity: 1;
        }

        .rating:hover>input:checked~label:before {
            opacity: 0.4;
        }
    </style>
@endsection

@section('title')
    Pelacakan Progres Pesanan - CV FIRMOS
@endsection

@section('heading')
    Pelacakan Progres Pesanan
@endsection
@section('isi')
    @livewire('tracking-pesanan-index')
@endsection

@section('jsthis')
@endsection
