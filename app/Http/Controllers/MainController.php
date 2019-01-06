<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMainRequest;

use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class MainController extends Controller
{
    /**
     * Display form.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('main.index');
    }

    /**
     * Process request.
     *
     * @param \App\Http\Requests\StoreMainRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreMainRequest $request): JsonResponse
    {
        if (!app()->runningUnitTests()) {
            sleep(3);
        }

        return new JsonResponse([
            'behaviour' => 'confirmWithDialogAndReset',
            'message' => 'Your request has been processed successfully.'
        ]);
    }
}
