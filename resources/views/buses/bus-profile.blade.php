@extends('layouts.main')
@section('heading')
    Bus Profile
@endsection
@section('title')
    Bus Profile
@stop
@section('second')
    Bus
@stop
@section('last')
    Bus Profile
@stop
@section('contents')
    <div class="tabs">
        <ul id="myTab2" class="nav nav-tabs nav-justified">
            <li class="{{ Request::is('buses/'.$id.'/bus-profile') ? 'active' : '' }}">
                <a href="{{ url('buses/'.$id.'/bus-profile') }}" >General</a>
            </li>
            <li class="{{ Request::is('buses/'.$id.'/bus-tickets') ? 'active' : '' }}">
                <a href="{{ url('buses/'.$id.'/bus-tickets') }}" >Seating Plan(Tickets)</a>
            </li>
            <li class="{{ Request::is('buses/'.$id.'/bus-documents') ? 'active' : '' }}">
                <a href="{{ url('buses/'.$id.'/bus-documents') }}" >Documents</a>
            </li>
            <li class="{{ Request::is('buses/'.$id.'/bus-inspections') ? 'active' : '' }}">
                <a href="{{ url('buses/'.$id.'/bus-inspections') }}" >Inspections</a>
            </li>
            <li class="{{ Request::is('buses/'.$id.'/bus-maintenance') ? 'active' : '' }}">
                <a href="{{ url('buses/'.$id.'/bus-maintenance') }}" >Maintenance</a>
            </li>
            <li class="{{ Request::is('buses/'.$id.'/bus-insurances') ? 'active' : '' }}">
                <a href="{{ url('buses/'.$id.'/bus-insurances') }}" >Permits & Insurances</a>
            </li>
        </ul>
        <div id="" class="tab-content">
            @yield('profile')
        </div>
    </div>
@endsection