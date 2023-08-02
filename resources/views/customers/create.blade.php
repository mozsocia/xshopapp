<!-- resources/views/customers/create.blade.php -->

@extends('layouts.app')

@section('content')
  <h1>Create Customer</h1>
  <form action="{{ route('customers.store') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
    </div>
    <div class="form-group">
      <label for="contact_number">Contact Number</label>
      <input type="text" name="contact_number" id="contact_number" class="form-control"
        value="{{ old('contact_number') }}">
    </div>
    <!-- Add other relevant fields here -->
    <button type="submit" class="btn btn-primary">Save Customer</button>
  </form>
@endsection
