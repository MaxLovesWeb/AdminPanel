<?php

namespace Modules\Contact\Tables;

use Modules\Company\Entities\Company;
use Modules\Contact\Entities\Contact;
use Modules\Template\Tables\AdminDatatable;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class ContactDatatable extends AdminDatatable
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
    protected $tableId = 'contacts-dt';

    // Sorting and searching will only work
    // on columns explicitly defined as whitelist.
    protected $whiteList = [
        'type',
        'value'
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
        return Contact::query();
    }

    /**
     * CompanyDatatable constructor.
     */
    public function __construct()
    {
        $this->actions = new ContactActions();
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

            ->editColumn($this->actions->name, function(Contact $contact) {
                return view($this->actions->view, [$this->actions->variable => $contact])->render();
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
                'data' => 'id', 'name'=> 'id', 'visible' => false, 'title' => __('contact::contact.columns.id'),
                'searchable' => false, 'orderable' => true
            ],
            [
                'data' => 'type', 'name'=> 'type',  'title' => __('contact::contact.columns.type'),
                'searchable' => true, 'orderable' => true
            ],
            [
                'data' => 'value', 'name'=> 'value',  'title' => __('contact::contact.columns.value'),
                'searchable' => true, 'orderable' => false
            ],

            [
                'data' => 'created_at', 'name'=> 'created_at', 'visible' => false, 'title' => __('contact::contact.columns.created_at'),
                'searchable' => false, 'orderable' => true
            ],
            [
                'data' => 'updated_at', 'name'=> 'updated_at', 'visible' => false, 'title' => __('contact::contact.columns.updated_at'),
                'searchable' => false, 'orderable' => true
            ],
        ];
    }

}
