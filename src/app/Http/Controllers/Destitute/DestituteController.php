<?php

namespace App\Http\Controllers\Destitute;

use App\Http\Controllers\Controller;
use App\Http\Requests\Destitute\DestituteRequest;
use App\Models\Destitute\Destitute;
use App\Models\Sonko\Sonko;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DestituteController extends Controller
{
    public function index()
    {
        $destitutes = Destitute::query()->get();

        return view('destitutes.index', compact('destitutes'));
    }

    public function create()
    {
        $sonkos = Sonko::query()->where('status', 'active')->get();

        return view('destitutes.create', compact('sonkos'));
    }

    public function store(DestituteRequest $request): RedirectResponse
    {
        Destitute::query()->create($request->all());

        return redirect()->route('destitute.index')->with('success', 'Успешно добавлен');
    }

    public function show(Destitute $destitute)
    {
        return view('destitutes.show', compact('destitute'));
    }

    public function edit(Destitute $destitute)
    {
        $sonkos = Sonko::query()->where('status', 'active')->get();

        return view('destitutes.edit', compact('destitute', 'sonkos'));
    }

    public function update(Destitute $destitute, DestituteRequest $request): RedirectResponse
    {
        $destitute->update($request->all());

        return redirect()->route('destitute.index')->with('success', 'Успешно добавлен');
    }

    public function destroy(Destitute $destitute)
    {
        try {
            $destitute->delete();
        } catch (\Throwable $exception) {
            return redirect()->with('error', $exception->getMessage());
        }

        return back()->with('success', 'Успешно добавлен');
    }
}
