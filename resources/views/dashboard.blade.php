@extends('layouts.app')

@section('head')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js" integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>
@endsection

@section('content')

<div class="flex flex-wrap">
    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
        <!--Metric Card-->
        <div class="bg-white border rounded shadow p-2">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded p-3 bg-green-600"><i class="fas fa-car fa-2x fa-fw fa-inverse"></i></div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h5 class="font-bold uppercase text-gray-500">Total Vehicles</h5>
                    <h3 class="font-bold text-3xl">{{ $totalVehicles }} <span class="text-green-500"><i class="fas fa-caret-up"></i></span></h3>
                </div>
            </div>
        </div>
        <!--/Metric Card-->
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
        <!--Metric Card-->
        <div class="bg-white border rounded shadow p-2">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded p-3 bg-purple-600"><i class="fas fa-users fa-2x fa-fw fa-inverse"></i></div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h5 class="font-bold uppercase text-gray-500">Total Employees</h5>
                    <h3 class="font-bold text-3xl">{{ $totalEmployees }} <span class="text-pink-500"><i class="fas fa-exchange-alt"></i></span></h3>
                </div>
            </div>
        </div>
        <!--/Metric Card-->
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
        <!--Metric Card-->
        <div class="bg-white border rounded shadow p-2">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded p-3 bg-blue-500"><i class="fas fa-car-side fa-2x fa-fw fa-inverse"></i></div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h5 class="font-bold uppercase text-gray-500">Undept Vehicles</h5>
                    <h3 class="font-bold text-3xl">{{ $undeptVehiclesCount }} <span class="text-red-600"><i class="fas fa-caret-up"></i></span></h3>
                </div>
            </div>
        </div>
        <!--/Metric Card-->
    </div>

</div>

<!--Divider-->
<hr class="border-b-2 border-gray-400 my-8 mx-4">

<div class="flex flex-row flex-wrap flex-grow mt-2">

    <div class="w-full md:w-1/2 p-3">
        <!--Graph Card-->
        <div class="bg-white border rounded shadow">
            <div class="border-b p-3">
                <h5 class="font-bold uppercase text-gray-600">Graph</h5>
            </div>
            <div class="p-5">
                <canvas id="chartjs-7" class="chartjs" width="undefined" height="undefined"></canvas>
                <script>
                new Chart(document.getElementById("chartjs-7"), {
                    "type": "bar",
                    "data": {
                        "labels": [{{ implode(",", $vehicleYears) }}],
                        "datasets": [{
                            "label": "Vehicles Density",
                            "data": [{{ implode(",", $vehicleTimes) }}],
                            "borderColor": "rgb(255, 99, 132)",
                            "backgroundColor": "rgba(255, 99, 132, 0.2)"
                        }
                        // , {
                        //     "label": "Adsense Clicks",
                        //     "data": [{{ implode(",", $vehicleTimes) }}],
                        //     "type": "line",
                        //     "fill": false,
                        //     "borderColor": "rgb(54, 162, 235)"
                        // }
                    ]
                    },
                    "options": {
                        "scales": {
                            "yAxes": [{
                                "ticks": {
                                    "beginAtZero": true
                                }
                            }]
                        }
                    }
                });
                </script>
            </div>
        </div>
        <!--/Graph Card-->
    </div>

    <div class="w-full md:w-1/2 p-3">
        <!--Graph Card-->
        <div class="bg-white border rounded shadow">
            <div class="border-b p-3">
                <h5 class="font-bold uppercase text-gray-600">Graph</h5>
            </div>
            <div class="p-5">
                <canvas id="chartjs-0" class="chartjs" width="undefined" height="undefined"></canvas>
                <script>
                new Chart(document.getElementById("chartjs-0"), {
                    "type": "line",
                    "data": {
                        "labels": [{{ implode(",", $vehicleYears) }}],
                        "datasets": [{
                            "label": "Vehicles Density",
                            "data": [0, {{ implode(",", $vehicleTimes) }}],
                            // "fill": false,
                            "borderColor": "rgb(75, 192, 192)",
                            // "lineTension": 0.1
                        }]
                    },
                    "options": {}
                });
                </script>
            </div>
        </div>
        <!--/Graph Card-->
    </div>


    <div class="border-b p-3">
        <h5 class="font-bold uppercase text-gray-600">Undept Vehicles</h5>
    </div>
    <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
        <table id="undeptVehicleTable" class="min-w-full mb-2">
            <thead>
                <tr>
                    {{-- <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Vehicle Type</th> --}}
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Vin</th>
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Registration No</th>
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Type</th>
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Fuel</th>
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Brand</th>
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Model</th>
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Year</th>
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Edit</th>
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Delete</th>
                </tr>
            </thead>

            <tbody class="bg-white">
                @if(count($undeptVehicles) < 1)
                    <tr>
                        <td colspan="6" class="text-center">
                            <div for="" class="my-5 font-bold">There Is No Any Undept Vehicles</div>
                        </td>
                    </tr>
                @else
                    @foreach ($undeptVehicles as $key => $vehicle)
                    <tr class="tbody">

                        {{-- <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-500">{{ $vehicle->vehicle_type }}</div>
                        </td> --}}

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-500">{{ $vehicle->vin }}</div>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-500">{{ $vehicle->registration_no }}</div>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-500">{{ $vehicle->type }}</div>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-500">{{ $vehicle->fuel }}</div>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-500">{{ $vehicle->brand }}</div>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-500">{{ $vehicle->model }}</div>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-500">{{ $vehicle->year }}</div>
                        </td>
                        <td
                            class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                            <a href="{{ route('vehicle.edit', $vehicle->id) }}"><svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg></a>
                        </td>
                        <td
                            class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                            <form action="{{ route('vehicle.destroy', $vehicle->id) }}" method="post" name="delete_form">
                                @csrf
                                @method('delete')
                                <button type="button" class="delete_button"><svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg></button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>


</div>

@endsection

@section('script')

<script>

    $(document).ready(function(){
            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#undeptVehicleTable tr.tbody").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

</script>

@endsection
