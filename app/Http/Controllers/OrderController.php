<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Http\Requests\StoreOrder;

class OrderController extends Controller
{
    private $order;
    private $orderDetail;

    public function __construct(Order $order, OrderDetail $orderDetail)
    {
        $this->order = $order;
        $this->orderDetail = $orderDetail;
        $this->authorizeResource(Order::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = $this->order->with('user:id,name')->get();

        $results = [
            'orders' => $orders,
        ];

        return view('orders.index', $results);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrder $request)
    {
        $data = [
          'name' => $request->name,
          'email' => $request->email,
          'user_id' => Auth::id(),
        ];

        DB::beginTransaction();
        try {
            $order = $this->order->create($data);

            $order->save();

            $this->orderDetail->create(
                [
                    'service_1' => $request->service1,
                    'service_2' => $request->service2,
                    'order_id' => $order->id,
                ]
            );

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::info($e);
        }
        dispatch(new \App\Jobs\ProcessSendMail($request->email));

        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $results = [
            'order' => $order->load('details'),
        ];

        return view('orders.view', $results);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {   // echo $order->load('details'); die;
        $results = [
            'order' => $order->load('details'),
        ];

        return view('orders.edit', $results);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        $order->update($data);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index');
    }
}
