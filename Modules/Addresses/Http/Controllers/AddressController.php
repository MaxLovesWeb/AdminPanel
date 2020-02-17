<?php

namespace Modules\Addresses\Http\Controllers;

use Mapper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\FormBuilderTrait;

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
        //$this->authorizeResource(Address::class);
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
     */
    public function show(Address $address)
    {
        $form = $this->form(ShowAddress::class, [
            'model' => $address
        ]);

        Mapper::location($address->getLocation())->map();

        //Mapper::map($location->getLatitude(), $location->getLongitude());

        event(new AddressViewed($address));

        return view('addresses::address.show', compact('address', 'form'));
    }

    /**
     * Show the form for editing Address.
     *
     * @param Address $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        $forms = [
            'role' => $this->form(EditAddress::class, [
                'model' => $address,
                'method' => 'PUT',
                'url' => route('addresses.update', $address),
            ]),

        ];

        event(new AddressEditing($address));

        return view('addresses::address.edit', compact('address', 'forms'));
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

        return redirect()->route('addresses.index');
    }

}
