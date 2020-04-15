<?php

namespace App\Exceptions;
//هندل کردن خطاها
use App\Http\Middleware\Authenticate;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;

class Handler extends ExceptionHandler
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
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param \Exception $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Exception $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
dd($exception);
//        header must has Accept: application/json
        if ($request->wantsJson()) {

            if ($exception instanceof ValidationException) {
                return $this->renderValidationException($exception);
            }
            if ($exception instanceof AuthenticationException){
                return $this->renderAuthenticationException($exception);
            }

            return $this->renderOtherExceptions($exception);
        }
        return parent::render($request, $exception);
    }

    /**
     * @param Exception $exception
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    private function renderValidationException(Exception $exception)
    {
        return response([
            'errors' => $exception->errors()
        ], 422);
//            validation error status is 422
    }

    /**
     * @param Exception $exception
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    private function renderOtherExceptions(Exception $exception)
    {
        $exception = $this->prepareException($exception);
        $code = method_exists($exception, 'getStatusCode') ? $exception->getStatusCode() : 500;

        $message = 'خطایی در سرور رخ داده است';

        if (!($code == 500 || empty($exception->getMessage()))) {
            $message = $exception->getMessage();
        }
        return response([
            'message' => $message
        ], $code);
    }

    private function renderAuthenticationException(Exception $exception)
    {
        return response([
            'error'=>'UNAUTHORIZED'
        ],401);
    }
}
