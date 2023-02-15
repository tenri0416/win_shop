@props(['status' => 'info'])

@php

    if (session('status') =='info') {
        $bgColor = 'bg-blue-300';
    }
    if (session('status') == 'alert') {
        $bgColor = 'bg-red-500';
    }
    if(session('status')==='fukugen') {
        $bgColor = 'bg-green-500';
    }
    if(session('status')==='sakujyo'){
        $bgColor = 'bg-red-600';
    }
@endphp

@if (session('message'))
    <div class="{{ $bgColor }} w1/2 mx-auto p-2 text-white">
        {{ session('message') }}
    </div>
@endif
