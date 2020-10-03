<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomer;
use App\Models\Customer;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return view('customers.index', ['customers' =>Customer::all()]);
        $customers=Customer::all();
        return view('customers.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(StoreCustomer $request )
    {
        //
        $validatedData = $request->validated();
        $customerdataadd =Customer::create($validatedData);


    //   $customer=StoreCustomer::create($customerdataadd);

    //   $customer->save();





        return redirect()->route('customers.index')->with('status', 'Your customer has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // $customer = Customer::findorFail($id);
        // return view('customers.show', compact('customer'));

     return view('customers.show', ['customer' => Customer::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // $customer=Customer::findorFail($id);
        return view('customers.edit',['customer'=>Customer::findorFail($id)]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCustomer $request, $id)
    {
        //
        $customer=Customer::findorFail($id);
        $validatedData = $request->validated();

        $customer->fill($validatedData);
        $customer->save();
        return redirect()->route('customers.index')->with('status', 'Your customer info has been updated');










    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $customer=Customer::find($id);

        $customer->delete();
        return redirect()->route('customers.index')->with('status', 'Your post  has been deleted');
    }
}
