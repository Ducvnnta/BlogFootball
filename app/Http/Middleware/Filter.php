<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Session\Store;
use Session;

class Filter
{
    private $session;

    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $news = $this->getViewedPosts();

        if (!is_null($news))
        {
            $news = $this->cleanExpiredViews($news);
            $this->storeNews($news);
        }

        return $next($request);
    }

    private function getViewedPosts()
    {
        return $this->session->get('viewed_new', null);
    }

    private function cleanExpiredViews($news)
    {
        $time = time();

        // Let the views expire after one hour.
        $throttleTime = 3600;

        return array_filter($news, function ($timestamp) use ($time, $throttleTime)
        {
            return ($timestamp + $throttleTime) > $time;
        });
    }

    private function storeNews($news)
    {
        $this->session->put('viewed_new', $news);
    }
}
