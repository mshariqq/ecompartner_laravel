@extends('layouts.admin')

@section('CustomStyles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/cutsom-normal.css') }}"/>>
@endsection

@section('content')

<div class="page-header">
    <h2>Dashboard</h2>
</div>

@endsection
@section('custom-scripts')
<script src="{{ asset('js/admin/admins-delete.js') }}" defer></script>
@endsection