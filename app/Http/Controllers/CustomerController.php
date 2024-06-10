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
        $customers = Customer::all()->map(function($customer) {
            return [
                'id' => $customer->id,
                'name' => $customer->name,
                'email' => $customer->email,
                'phone' => $customer->phone,
                'created_at' => $customer->created_at,
                'updated_at' => $customer->updated_at,
            ];
        });
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
     * Set the customer's to database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required|max:225',
        'phone' => 'required|email|unique:customers',
        'phone' => 'required |unique:customers|max:14|min:10'
        ]);

        Customer::create($validated);

        return Redirect::route('customer');
    }
}
