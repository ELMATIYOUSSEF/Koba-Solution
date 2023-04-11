<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $orders = $user->orders()->with('user')->orderBy('id', 'DESC')->paginate(10);
        return view('orders.show',['orders'=>$orders]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('checkout');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(StoreOrderRequest $request)
    {
        
        $user = Auth::user();
        $validated = $request->validated();
        $validated['DateTimeOrder'] = date('Y-m-d');
        $validated['StatusOrder'] = 'pending';
        $order = $user->orders()->create($validated);
        return redirect()->back()->with('success', 'Order is submitted!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order-> delete();
        return redirect()
        ->back()
        ->with('success', 'order has been deleted !!');
    }
    public function changeSatatusOrder(Request $request){
         $request->validate([
            'status' => [
                'required',
                Rule::in(['pending', 'in progress','delivered']),
            ],
        ]);


        $id= $request->input('orderId');
    
        $Order = Order::find($id);
        $Order->StatusOrder =$request->status ;
        $Order->save();
        return redirect()
        ->back()
        ->with('success', 'Satatus is changed !');
    
    }
}
