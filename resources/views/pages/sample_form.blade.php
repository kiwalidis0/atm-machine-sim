@extends('app/layout')

@section('content')
    <h1>Contact Form</h1>

    <form id="contactForm">
        @csrf
        <div class="mb-3">
            <label class="form-label">First Name</label>
            <input type="text" name="first_name" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Last Name</label>
            <input type="text" name="last_name" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <div id="result" class="mt-3 alert alert-info d-none"></div>
@endsection