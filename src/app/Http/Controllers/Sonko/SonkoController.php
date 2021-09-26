<?php

namespace App\Http\Controllers\Sonko;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sonko\SonkoRequest;
use App\Models\Sonko\Sonko;
use Illuminate\Http\RedirectResponse;

class SonkoController extends Controller
{
    public function index()
    {
        $sonkos = Sonko::query()->get();

        return view('sonkos.index', compact('sonkos'));
    }

    public function create()
    {
        return view('sonkos.create');
    }

    public function store(SonkoRequest $request)
    {
        Sonko::query()->create($request->all());

        return redirect()->route('sonko.index')->with('success', 'Успешно добавлен');
    }

    public function show(Sonko $sonko)
    {
        return view('sonkos.show', compact('sonko'));
    }

    public function edit(Sonko $sonko)
    {
        return view('sonkos.edit', compact('sonko'));
    }

    public function update(Sonko $sonko, SonkoRequest $request): RedirectResponse
    {
        $sonko->update($request->all());

        return redirect()->route('sonko.index')->with('success', 'Успешно обновлен');
    }

    public function destroy(Sonko $sonko): RedirectResponse
    {
        try {
            $sonko->delete();
        } catch (\Throwable $exception) {
            return back()->with('error', $exception->getMessage());
        }

        return redirect()->route('sonko.index')->with('success', 'Успешно удален');
    }
}
