<?php

namespace Modules\Addresses\Tables;

use App\Tables\AdminDatatable;
use Modules\Addresses\Entities\Address;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class AddressDatatable extends AdminDatatable
{
    /**
     * Relations columns
     * @var array
     */
    protected $relations = [
       // 'users', 'permissions'
    ];

    //columns which must html render
    protected $rawColumns = [];

    // table id
    protected $tableId = 'addresses-dt';

    // Sorting and searching will only work
    // on columns explicitly defined as whitelist.
    protected $whiteList = [
        'country_code',
        'state', 'city',
        'postcode', 'street',
        'is_primary', 'is_billing', 'is_shipping'
    ];

    // Sorting and searching will not work
    // on columns explicitly defined as blacklisted.
    protected $blackList = [];

    /**
     * @var Column
     */
    protected $actions;

    /**
     * @return Builder
     */
    public function getModelBuilder()
    {
        return Address::query();
    }

    /**
     * RoleDatatable constructor.
     */
    public function __construct()
    {
        $this->actions = new AddressActions;
    }

    /**
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $html = parent::html()->add($this->actions);

        return $html;
    }

    /**
     * @param Builder $source
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function ajax()
    {
        return DataTables::eloquent($this->query())

            ->editColumn($this->actions->name, function(Address $address) {
                return view($this->actions->view, [$this->actions->variable => $address])->render();
            })
            ->rawColumns([
                $this->actions->name
            ])
            ->whitelist($this->whiteList)->make(true);
    }

    /**
     * @return array
     */
    public function getColumns()
    {
        return [
            [
                'data' => 'id', 'name'=> 'id', 'visible' => false, 'title' => __('addresses::address.columns.id'),
                'searchable' => false, 'orderable' => true
            ],
            [
                'data' => 'country_code', 'name'=> 'country_code',  'title' => __('addresses::address.columns.country_code'),
                'searchable' => true, 'orderable' => true
            ],
            [
                'data' => 'street', 'name'=> 'street',  'title' => __('addresses::address.columns.street'),
                'searchable' => true, 'orderable' => false
            ],
            [
                'data' => 'state', 'name'=> 'state',  'title' => __('addresses::address.columns.state'),
                'searchable' => true, 'orderable' => false
            ],
            [
                'data' => 'city', 'name'=> 'city',  'title' => __('addresses::address.columns.city'),
                'searchable' => true, 'orderable' => false
            ],
            [
                'data' => 'postcode', 'name'=> 'postcode',  'title' => __('addresses::address.columns.postcode'),
                'searchable' => true, 'orderable' => false
            ],
            [
                'data' => 'is_primary', 'name'=> 'is_primary',  'title' => __('addresses::address.columns.is_primary'),
                'searchable' => true, 'orderable' => true
            ],
            [
                'data' => 'is_billing', 'name'=> 'is_billing',  'title' => __('addresses::address.columns.is_billing'),
                'searchable' => true, 'orderable' => true
            ],
            [
                'data' => 'is_shipping', 'name'=> 'is_shipping',  'title' => __('addresses::address.columns.is_shipping'),
                'searchable' => true, 'orderable' => true
            ],
            [
                'data' => 'created_at', 'name'=> 'created_at', 'visible' => false, 'title' => __('addresses::address.columns.created_at'),
                'searchable' => false, 'orderable' => true
            ],
            [
                'data' => 'updated_at', 'name'=> 'updated_at', 'visible' => false, 'title' => __('addresses::address.columns.updated_at'),
                'searchable' => false, 'orderable' => true
            ],
        ];
    }

}
