<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Customer;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{
    /**
     * Display the customer's list.
     */
    public function index(Request $request): Response
    {
        $customers = Customer::paginate(10);
        return Inertia::render('Customer/List', [
            'title' => 'Customer',
            'breadcrumbs' => [['label' => 'Customer List', 'link' => route('customer')]],
            'customers' => $customers
        ]);
    }

    /**
     * Display the customer's form create.
     */
    public function create(Request $request): Response
    {
        return Inertia::render('Customer/Create', [
            'title' => 'Customer Create',
            'breadcrumbs' => [['label' => 'Customer Create', 'link' => route('customer')]]
        ]);
    }

    /**
     * Display the customer's form create.
     */
    public function edit(Customer $customer)
    {
        return Inertia::render('Customer/Edit', [
            'title' => 'Customer Edit',
            'breadcrumbs' => [['label' => 'Customer Edit', 'link' => route('customer')]],
            'customer' => $customer
        ]);
    }

    /**
     * Set the customer's to database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:225',
            'email' => 'required|email|unique:customers',
            'phone' => 'required |unique:customers|max:14|min:10'
        ]);

        Customer::create($validated);

        return Redirect::route('customer')->with('success', "Success create customer");
    }

    /**
     * Set the customer's to database.
     */
    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'name' => 'required|max:225',
            'email' => 'required|email',
            'phone' => 'required|max:14|min:10'
        ]);

        $customer->update($validated);

        return Redirect::route('customer')->with('success', "Success edit customer");
    }

    public function destroy(Customer $customer) {
        $customer->delete($customer);
        return Redirect::route('customer')->with('success', "Success delete customer");
    }
}
