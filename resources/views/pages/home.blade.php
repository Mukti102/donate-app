@extends('layouts.main')
@section('title',setting('genera.brand_name'))
@section('content')
@php
    $campaign = $campaigns->first();
@endphp
    <div class="pb-10">
        <x-hero :campaign="$campaign"/>
        <x-category :categories="$categories" :campaigns="$campaigns" :donaturs="$donaturs"/>
        <x-campaigns :campaigns="$campaigns"/>
        <x-short-video :videos="$videos"/>
    </div>
@endsection