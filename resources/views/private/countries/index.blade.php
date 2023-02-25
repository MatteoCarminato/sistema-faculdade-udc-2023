@extends('layouts.app')

@section('content')
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Slug</th>
                <th>Phone Code</th>
                <th>Flag</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($countries as $country)
                <tr>
                    <td>{{ $country->name }}</td>
                    <td>{{ $country->slug }}</td>
                    <td>{{ $country->phone_code }}</td>
                    <td>{{ $country->flag }}</td>
                    <td>
                        <a href="{{ route('countries.show', $country) }}">Show</a>
                        <a href="{{ route('countries.edit', $country) }}">Edit</a>
                        <form action="{{ route('countries.destroy', $country) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('countries.create') }}">Create</a>
@endsection