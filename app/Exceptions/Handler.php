<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
{
    // Check if it's an HTTP error (like 404, 500, etc.)
    if ($this->isHttpException($exception)) {
        $status = $exception->getStatusCode();

        // Detect admin area by URL prefix, guard, or route name
        if ($request->is('admin/*')) {
            // Admin error pages
            if (view()->exists("errors.admin.$status")) {
                return response()->view("errors.admin.$status", ['exception' => $exception], $status);
            }
        } else {
            // Frontend error pages
            if (view()->exists("errors.frontend.$status")) {
                return response()->view("errors.frontend.$status", ['exception' => $exception], $status);
            }
        }
    }

    return parent::render($request, $exception);
}
}
