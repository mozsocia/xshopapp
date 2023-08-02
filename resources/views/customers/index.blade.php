@extends('layouts.app')

@section('content')
  <h1>Customers</h1>
  <a href="{{ route('customers.create') }}" class="btn btn-primary mb-3">Add Customer</a>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Contact Number</th>
        <!-- Add other relevant columns here -->
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($customers as $customer)
        <tr>
          <td>{{ $customer->id }}</td>
          <td>{{ $customer->name }}</td>
          <td>{{ $customer->email }}</td>
          <td>{{ $customer->contact_number }}</td>
          <!-- Add other relevant columns here -->
          <td>
            <a href="{{ route('customers.show', $customer) }}" class="btn btn-info">View</a>
            <a href="{{ route('customers.edit', $customer) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('customers.sendEmail', $customer->id) }}" class="btn btn-success">Send Email</a>
            <form action="{{ route('customers.destroy', $customer) }}" method="POST" style="display: inline-block;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger" onclick="return confirmDelete()">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <script>
    function confirmDelete() {
      if (confirm('Are you sure you want to delete this customer?')) {
        // If user confirms, submit the form
        document.getElementById('deleteForm').submit();
      } else {
        // If user cancels, do nothing
        return false;
      }
    }
  </script>
@endsection
