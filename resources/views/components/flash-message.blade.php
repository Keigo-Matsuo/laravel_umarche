@props(['status' => 'info'])

@php
if(session('status') === 'info'){ $textColor = 'text-blue-500';}
if(session('status') === 'alert'){ $textColor = 'text-red-500';}
@endphp

@if(session('message'))
    <div class="{{ $textColor }} w-1/2 mx-auto p-2">
        {{ session('message' )}}
    </div>
@endif