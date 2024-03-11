<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Company;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    //
    public function index()
    {
        $customers = Customer::all();
        $companies = Company::all();
        //esto se comento porque tambien se puede hacer pasando scopes desde el modelos y solo instanciarlos para tener una vista mas limpia
        // $activeCustomers = Customer::where('active',1)->get();
        // $inactiveCustomers = Customer::where('active',0 )->get();
        //SCOPES
        $activeCustomers = Customer::active()->get();
        $inactiveCustomers = Customer::inactive()->get();
        // return view('internals.customers',[
        //     'activeCustomers' => $activeCustomers,
        //     'inactiveCustomers' => $inactiveCustomers,
        //     'customers' =>$customers,
        // ]);
        //las lineas anteriores las podemos meter en una sola refactorizando del siguiente modo
        return view('customers.index', compact('customers','activeCustomers','inactiveCustomers','companies'));
    }

    public function create()
    {
        $companies = Company::all();
        //pasamos un customer vacio a la espera
        $customer = new Customer();

        return view('customers.create',compact('companies','customer'));
    }

    public function store()
    {
        Customer::create($this->validateRequest());
        //Customer::create($data);
        //esto se comento porque se va a apsar a travez de massive asigment desde el modelo
        // $customer = new Customer();
        // $customer->name = request('name');
        // $customer->email = request('email');
        // $customer->active = request('active');
        // $customer->save();
        return redirect('customers');
    }

    public function show(Customer $customer)
    {
        //puedes comentar esta linea solo si le pasas el modelo como parametro a la funcion
        //$customer = Customer::where('id',$customer)->firstOrFail();
        //dd($customer);
        return view('customers.show',compact('customer'));

    }

    public function edit(Customer $customer)
    {
        $companies = Company::all();

        return view('customers.edit', compact('customer','companies'));
    }

    public function update(Customer $customer)
    {
        $customer->update($this->validateRequest());
        // $data = request()->validate([
        //     'name' => 'required|min:3',
        //     'email' => 'required|email',
        //     'active' => 'required',
        //     'company_id' => 'required',
        // ]);
        // $customer->update($data);
        return redirect('customers/'.$customer->id);
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required',
        ]);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        
        return redirect('customers');
        
    }
}
