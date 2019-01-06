<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class MultiCheckboxController extends Controller
{
    /**
     * Get form.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('multi-checkbox.index')
            ->with('sessionDialog', session('sessionDialog'));
    }

    /**
     * Remove records.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request): JsonResponse
    {
        if (!app()->runningUnitTests()) {
            sleep(3);
        }

        $message = 'The following records have been removed successfully: "';
        $message .= implode(', ', $request->input('items'));
        $message .= '"';

        session()->flash('sessionDialog', json_encode([
            'type' => 'top-alert',
            'message' => $message,
        ]));

        return new JsonResponse;
    }

    /**
     * Export records.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function export(Request $request): array
    {
        // used different name for the index
        return $request->input('records');
    }
}
