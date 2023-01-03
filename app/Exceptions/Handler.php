<?php

namespace App\Exceptions;

use App\Models\News;
use Illuminate\Session\Store;
use Throwable;

class Handler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    private $session;

    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    public function handle(News $new)
    {
        if (!$this->isNewViewed($new)) {
            $new->increment('reads', 1);
            $this->storeNew($new);
        }
    }

    private function isNewViewed($new)
    {
        $viewed = $this->session->get('viewed_new', []);

        return array_key_exists($new->id, $viewed);
    }

    private function storeNew($new)
    {
        $key = 'viewed_new.' . $new->id;

        $this->session->put($key, time());
    }
}
