<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $coupon;
    
    public function __construct(Coupon $coupon) {
        $this->coupon = $coupon;
    }

    public function index()
    {
        //
        $coupons = Coupon::latest('id')->paginate(3);
        return view('admin.coupon.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $dataCreate = $request->all();
        $coupon = $this->coupon->create($dataCreate);
        return redirect()->route('coupons.index')->with(['message' => 'create new coupon:'.$coupon->name. 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $coupon = $this->coupon->findOrFail($id);
        return view('admin.coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $dateUpdate =$request->all();
        $coupon = $this->coupon->findOrFail($id);
        $coupon->update($dateUpdate);
        return redirect()->route('coupons.index')->with(['message' => 'Update coupon: '.$coupon->name. 'success']);
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
        $coupon = $this->coupon->findOrFail($id);
        $coupon->delete();
        return to_route('coupons.index')->with(['message'=> 'delete success']);
    }
}
