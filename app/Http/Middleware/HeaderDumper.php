<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Psr\Log\LoggerInterface;

class HeaderDumper
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $this->logger->info(
            'request',
            [
                'header' => strval($request->headers)
            ]
        );
        // // by helper function.
        // info('request', ['header' => strval($request->headers)]);

        $response = $next($request);

        $this->logger->info(
            'response',
            [
                'header' => strval($response->headers)
            ]
        );

        return $response;
    }
}
