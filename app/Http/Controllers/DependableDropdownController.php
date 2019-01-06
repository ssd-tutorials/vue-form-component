<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttributesRequest;
use App\Http\Requests\StoreDropdownRequest;

use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class DependableDropdownController extends Controller
{
    /**
     * Get form.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('dependable-dropdown.index')
            ->with('sizes', AttributesRequest::sizes());
    }

    /**
     * Get list of names.
     *
     * @param \App\Http\Requests\AttributesRequest $request
     * @return array
     */
    public function attributes(AttributesRequest $request): array
    {
        return [
            'records' => $request->data(),
            'summary' => [
                'total' => $request->nonEmpty()->count() === 3 ? number_format($request->items['brand'], 2) : 0
            ]
        ];
    }

    /**
     * Store data.
     *
     * @param  \App\Http\Requests\StoreDropdownRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreDropdownRequest $request): JsonResponse
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
