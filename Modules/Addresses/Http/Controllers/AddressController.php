<?php

namespace Modules\Addresses\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Auth;
use Mapper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use Modules\Account\Entities\User;
use Modules\Addresses\Entities\Address;
use Modules\Addresses\Events\AddressDeleted;
use Modules\Addresses\Events\AddressDeleting;
use Modules\Addresses\Events\AddressEditing;
use Modules\Addresses\Events\AddressUpdated;
use Modules\Addresses\Events\AddressViewed;
use Modules\Addresses\Forms\EditAddress;
use Modules\Addresses\Forms\ShowAddress;
use Modules\Addresses\Http\Requests\AddressFormRequest;
use Modules\Addresses\Tables\AddressDatatable;

class AddressController extends Controller
{
    use FormBuilderTrait;

    /**
     * AddressController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->authorizeResource(Address::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @param AddressDatatable $addressTable
     * @return \Illuminate\View\View
     */
    public function index(AddressDatatable $addressTable)
    {
        $datatables = [
            'addresses' => $addressTable->html()->ajax([
                'url' => route('datatables.addresses.index')
            ]),
        ];

        return view('addresses::address.index', compact( 'datatables'));
    }

    /**
     * Display the specified resource.
     *
     * @param Address $address
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function show(Address $address)
    {
        //dd(Auth::user(), $address->addressable);
        $forms = [
            'address' => $this->form(ShowAddress::class, [
                'model' => $address,
            ]),
        ];

        $gmaps = $this->getGmap($address);

        event(new AddressViewed($address));

        return view('addresses::address.show', compact('address', 'forms', 'gmaps'));
    }

    /**
     * Show the form for editing Address.
     *
     * @param Address $address
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function edit(Address $address)
    {
        $forms = [
            'address' => $this->form(EditAddress::class, [
                'model' => $address,
                'method' => 'PUT',
                'url' => route('addresses.update', $address),
            ]),
        ];

        $gmaps = $this->getGmap($address);

        event(new AddressEditing($address));

        return view('addresses::address.edit', compact('address', 'forms', 'gmaps'));
    }

    /**
     * Update Address.
     *
     * @param Address $address
     * @param AddressFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(Address $address, AddressFormRequest $request)
    {
        $address->fill($request->validated())->save();

        event(new AddressUpdated($address));

        flash(trans('update-address-success'))->success()->important();

        return redirect()->route('addresses.edit', $address);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Address $address
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Address $address, Request $request)
    {
        event(new AddressDeleting($address));

        $address->delete();

        flash(trans('delete-address-success'))->success()->important();

        event(new AddressDeleted);

        return back();
    }

    /**
     * Get Mapper and Add a new map
     *
     * @param Address $address
     * @return array|string
     * @throws \Throwable
     */
    protected function getGmap(Address $address)
    {
        try {
            Mapper::location($address->getLocation())->map();

        } catch (Exception $e) {
            return view('addresses::gmaps.error', ['error' => $e->getMessage()])->render();
        }

        return view('addresses::gmaps.map')->render();
    }

}
