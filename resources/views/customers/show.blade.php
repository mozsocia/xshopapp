<!-- resources/views/customers/show.blade.php -->

@extends('layouts.app')

@section('content')
  <h1>Customer Details</h1>
  <ul>
    <li><strong>Name:</strong> {{ $customer->name }}</li>
    <li><strong>Email:</strong> {{ $customer->email }}</li>
    <li><strong>Contact Number:</strong> {{ $customer->contact_number }}</li>
    <!-- Add other relevant details here -->
  </ul>
  <a href="{{ route('customers.edit', $customer) }}" class="btn btn-warning">Edit</a>
  <form action="{{ route('customers.destroy', $customer) }}" method="POST" style="display: inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
  </form>
@endsection
