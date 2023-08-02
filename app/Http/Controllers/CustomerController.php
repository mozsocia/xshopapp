<?php
namespace App\Http\Controllers;

use App\Mail\CustomerEmail;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'contact_number' => 'nullable|string|max:20',
            // Add validation rules for other relevant attributes
        ]);

        Customer::create($data);

        return redirect()->route('customers.index')
            ->with('success', 'Customer created successfully.');
    }

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'contact_number' => 'nullable|string|max:20',
            // Add validation rules for other relevant attributes
        ]);

        $customer->update($data);

        return redirect()->route('customers.index')
            ->with('success', 'Customer updated successfully.');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')
            ->with('success', 'Customer deleted successfully.');
    }

    public function sendEmailForm(Customer $customer)
    {
        return view('customers.send_email', compact('customer'));
    }

    public function sendEmail(Request $request, Customer $customer)
    {
        $data = $request->validate([
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        try {
            Mail::to($customer->email)->send(new CustomerEmail($customer, $data['subject'], $data['content']));
            return redirect()->route('customers.index')->with('success', 'Email sent successfully.');
        } catch (\Exception $e) {
            Log::info($e);
            return redirect()->route('customers.index')->with('error', 'Failed to send email. Please try again.');
        }
    }
}
