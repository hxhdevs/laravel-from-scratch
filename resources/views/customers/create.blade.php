@extends('layout')

@section('title','Customer List')

@section('content')
<div class="row">
    <div class="col-12">
        <h1>Customers</h1>
    </div>
</div>

<div class="row">
    <div class="col">
        <form action="/customers" method="POST">
            
            @include('customers.form')

            <button type="submit" class="btn btn-primary">Add customer</button>

        </form>

    </div>
</div>

@endsection

<hr>
