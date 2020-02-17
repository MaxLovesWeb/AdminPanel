<?php

namespace Modules\Account\Http\ViewComposers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MustVerifyIdentifier
{
    /**
     * The abilities.
     */
    protected $request;

    /**
     * Create a new composer.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {

        if (Auth::check() && !$this->request->user()->hasVerifiedEmail()){
            //$view->with('unverified', $this->getNotice());
            flash($this->getNotice())->warning()->important();
        }
    }

    protected function getNotice()
    {
        return view('account::auth.verification-notice')->render();
    }
}
