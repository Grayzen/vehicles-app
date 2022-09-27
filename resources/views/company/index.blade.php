@extends('layouts.app')

@section('head')

@endsection

@section('content')

<div class="w-full p-3">
        <!--Table Card-->
        <div class="bg-white border rounded shadow">
            <div class="border-b p-3">
                <h5 class="font-bold uppercase text-gray-600">Companies</h5>
            </div>
            <div class="p-5">
                <table class="w-full p-5 text-gray-700">
                    <thead>
                        <tr>
                            <th class="text-left text-blue-900">Name</th>
                            <th class="text-left text-blue-900">Employee Count</th>
                            <th class="text-left text-blue-900">Vehicles Count</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($companies as $company)
                            <tr>
                                <td>{{ $company->name }}</td>
                                <td>{{ count($company->employees) }}</td>
                                <td>{{ count($company->employees[0]->vehicles) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
        <!--/table Card-->
    </div>

@endsection


@section('script')

@endsection
