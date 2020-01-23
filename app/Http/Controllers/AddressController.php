<?php

namespace App\Http\Controllers;

use App\Address;
use App\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $addresses = Auth::user()->addresses;

        return view('addresses.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $user = Auth::user();
        $countries = Country::all();

        return view('addresses.create', compact('user', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $addresses = Address::all();

        $billing = 0;
        if($request->is_billing == 1) {
            $billing = $request->is_billing;
            foreach($addresses as $address) {
                if($address->is_billing == 1) {
                    $address->is_billing = 0;
                    $address->save();
                }
            }
        }

        $address = Address::create([
            'user_id' => $user->id,
            'token' => Str::random(32),
            'street_name' => $request->street,
            'house_number' => $request->number,
            'postal_code' => $request->postal_code,
            'state' => $request->state,
            'city' => $request->city,
            'country_id' => $request->country,
            'phone' => $request->phone,
            'is_billing' => $billing
        ]);

        return redirect('/dashboard/user/' . $user->token . '/addresses');
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $address = Address::where('token', $id)->firstOrFail();
        $countries = Country::all();
        return view('addresses.edit', compact('address', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $addresses = Address::all();
        $address = Address::where('token', $id)->firstOrFail();
        $user = Auth::user();

        $billing = 0;

        if($request->is_billing == 1) {
            $billing = $request->is_billing;
            foreach($addresses as $item) {
                if($item->is_billing == 1) {
                    $item->is_billing = 0;
                    $item->save();
                }
            }
        }

        $address->user_id = $user->id;
        $address->street_name = $request->street;
        $address->house_number = $request->number;
        $address->postal_code = $request->postal_code;
        $address->state = $request->state;
        $address->city = $request->city;
        $address->country_id = $request->country;
        $address->phone = $request->phone;
        $address->is_billing = $billing;

        $address->save();

        return redirect('/dashboard/user/' . $user->token . '/addresses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = Address::where('token', $id)->firstOrFail();

        $address->delete();

        return back();
    }
}
