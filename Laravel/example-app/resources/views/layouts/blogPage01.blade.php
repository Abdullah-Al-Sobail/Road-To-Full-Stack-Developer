@extends('layouts.master_layouts')
@section('title')
    Blog Page01
@endsection



@section('card-header')
    Header
@endsection

@section('sidebar')
    @parent
    <li>New item</li>
@endsection
@push('scripts')
    <script src="script.js"></script>

@endpush
@prepend('scripts')
    <script src="script1.js"></script>
@endprepend

