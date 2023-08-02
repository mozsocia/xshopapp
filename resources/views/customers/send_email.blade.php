@extends('layouts.app')

@section('content')
  <h1>Send Email to Customer: {{ $customer->name }}</h1>
  <form action="{{ route('customers.sendEmail', $customer) }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="subject">Subject</label>
      <input type="text" name="subject" id="subject" class="form-control" value="{{ old('subject') }}" required>
    </div>
    <div class="form-group">
      <label for="content">Email Content</label>
      <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content') }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Send Email</button>
  </form>
@endsection
