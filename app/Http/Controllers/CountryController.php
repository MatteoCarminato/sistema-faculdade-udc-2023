<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Validation\Rule;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::orderBy('name')->paginate(10);
        return view('private.payment_form.create');
    }

    public function create()
    {
        return view('private.countries.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:countries,name',
            'slug' => 'required|unique:countries,slug',
            'phone_code' => 'nullable|integer',
            'flag' => 'nullable|image|max:1024',
        ]);

        if ($request->hasFile('flag')) {
            $data['flag'] = $request->file('flag')->store('public/flags');
        }

        $country = Country::create($data);

        return redirect()->route('countries.show', $country);
    }

    public function show(Country $country)
    {
        return view('private.countries.show', compact('country'));
    }

    public function edit(Country $country)
    {
        return view('private.countries.edit', compact('country'));
    }

    public function update(Request $request, Country $country)
    {
        $data = $request->validate([
            'name' => ['required', Rule::unique('countries')->ignore($country)],
            'slug' => ['required', Rule::unique('countries')->ignore($country)],
            'phone_code' => 'nullable|integer',
            'flag' => 'nullable|image|max:1024',
        ]);

        if ($request->hasFile('flag')) {
            $data['flag'] = $request->file('flag')->store('public/flags');
        }

        $country->update($data);

        return redirect()->route('countries.show', $country);
    }

    public function destroy(Country $country)
    {
        $country->delete();

        return redirect()->route('countries.index');
    }
}