<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $customers = Customer::orderBy('id','desc')->get();
        return response()->json($customers);
        
    }

   

    public function store(Request $request)
    {
      $customer = new Customer;
      $customer->nombres = $request->get('nombres');
      $customer->apellidos = $request->get('apellidos');
      $customer->email = $request->get('email');
      $customer->save();
      return response()->json($customer);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return response()->json($customer);
    }

    public function update(Request $request, $id)
    {
       $customer = Customer::findOrFail($id);
          $customer->nombres = $request->get('nombres');
          $customer->apellidos = $request->get('apellidos');
          $customer->email = $request->get('email');
          $customer->save();
          return response()->json($customer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return response()->json($customer);

    }
}
