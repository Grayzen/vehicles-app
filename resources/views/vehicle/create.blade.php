@extends('layouts.app')

@section('head')

@endsection

@section('content')

<div class="w-full p-3">
        <!--Table Card-->
        <div class="bg-white border rounded shadow">
            <div class="border-b p-3">
                <h5 class="font-bold uppercase text-gray-600 text-center">Add New Vehicle</h5>
            </div>

            <div class="p-5">
                <form id="create_vehicle" class="w-full max-w-lg mx-auto" action="{{ route('vehicle.store') }}" method="post">
                    @csrf

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-3" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>
            @endif

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="employee_id">
                              Employee
                            </label>
                            <div class="relative">
                              <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="employee_id" name="employee_id">
                                    <option value="">Undept or Choose Employee</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}"  {{ old('employee_id') == $employee->id ? "selected" : "" }}>{{ $employee->name }} {{ $employee->surname }}</option>
                                @endforeach
                              </select>
                              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                              </div>
                            </div>
                          </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">

                      <div class="w-full md:w-2/4 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="vin">
                            VIN
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="vin" name="vin" type="text" placeholder="0abc1df23g4hj5klm" value="{{ old('vin') }}">
                      </div>

                      <div class="w-full md:w-2/4 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="registration_no">
                            REGISTRATION NO
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="registration_no" name="registration_no" type="text" placeholder="XXX-XXX" value="{{ old('registration_no') }}">
                      </div>

                    </div>

                    <div class="flex flex-wrap -mx-3 mb-2">

                      <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="brand">
                          Brand
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="brand" name="brand" type="text" placeholder="Mazda" value="{{ old('brand') }}">
                      </div>

                      <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="model">
                          Model
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="model" name="model" type="text" placeholder="RX7" value="{{ old('model') }}">
                      </div>

                      <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="year">
                          Year
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="year" name="year" type="text" placeholder="2022" value="{{ old('year') }}">
                      </div>

                    </div>

                    <div class="flex flex-wrap -mx-3 mb-2">

                      <div class="w-full md:w-2/4 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="type">
                          Type
                        </label>
                        <div class="relative">
                          <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="type" name="type" required>
                            <option value="">choose..</option>
                            <option value="convertible" {{ old('type') == "convertible" ? "selected" : "" }}>convertible</option>
                            <option value="coupe" {{ old('type') == "coupe" ? "selected" : "" }}>coupe</option>
                            <option value="hatchback" {{ old('type') == "hatchback" ? "selected" : "" }}>hatchback</option>
                            <option value="sedan" {{ old('type') == "sedan" ? "selected" : "" }}>sedan</option>
                            <option value="small" {{ old('type') == "small" ? "selected" : "" }}>small</option>
                            <option value="station wagon" {{ old('type') == "station wagon" ? "selected" : "" }}>station wagon</option>
                            <option value="MPV" {{ old('type') == "MPV" ? "selected" : "" }}>MPV</option>
                            <option value="SUV" {{ old('type') == "SUV" ? "selected" : "" }}>SUV</option>
                          </select>
                          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                          </div>
                        </div>
                      </div>

                      <div class="w-full md:w-2/4 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="fuel">
                          Fuel
                        </label>
                        <div class="relative">
                          <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="fuel" name="fuel" required>
                            <option value="">choose..</option>
                            <option value="diesel" {{ old('fuel') == "diesel" ? "selected" : "" }}>diesel</option>
                            <option value="electric" {{ old('fuel') == "electric" ? "selected" : "" }}>electric</option>
                            <option value="gas" {{ old('fuel') == "gas" ? "selected" : "" }}>gas</option>
                            <option value="hybrid" {{ old('fuel') == "hybrid" ? "selected" : "" }}>hybrid</option>
                          </select>
                          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                          </div>
                        </div>
                      </div>

                    </div>

                    <div class="items-center text-center mt-6 mb-3">
                        <button class="bg-blue-400 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Add Vehicle
                        </button>
                    </div>
                  </form>

            </div>
        </div>
        <!--/table Card-->
    </div>

@endsection


@section('script')

@endsection
