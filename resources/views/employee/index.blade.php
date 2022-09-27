@extends('layouts.app')

@section('head')

@endsection

@section('content')

<div class="w-full p-3">
        <!--Table Card-->
        <div class="bg-white border rounded shadow">
            <a href="{{ route('employee.create') }}" class="float-right flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded mr-3 mt-2" type="submit">
                Add New Employee
            </a>
            <div class="border-b p-3">
                <h5 class="font-bold uppercase text-gray-600 pl-2 mb-2">Employees</h5>
            </div>
            <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                <table class="min-w-full mb-2">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Name</th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Surname</th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Email</th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Edit</th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Delete</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        @if(count($employees) < 1)
                            <tr>
                                <td colspan="6" class="text-center">
                                    <div for="" class="my-5 font-bold">There Is No Any Employees</div>
                                </td>
                            </tr>
                        @else
                            @foreach ($employees as $key => $employee)
                            <tr>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-500">{{ $employee->name }}</div>
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-500">{{ $employee->surname }}</div>
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-500">{{ $employee->email }}</div>
                                </td>

                                <td
                                    class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                    <a href="{{ route('employee.edit', $employee->id) }}"><svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg></a>
                                </td>
                                <td
                                    class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                        <button type="button" class="delete_button" data-delete="{{ $employee->id }}"><svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg></button>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!--/table Card-->
    </div>

@endsection

@section('script')
@if (session()->has('success'))
<script>
    Swal.fire(
        'Added!',
        '{{ session()->get("success") }}',
        'success'
    );
</script>
@elseif (session()->has('error'))
<script>
    Swal.fire(
        'Added!',
        '{{ session()->get("error") }}',
        'success'
    );
</script>
@endif

<script>
    $(".delete_button").click(function(e) {
        e.preventDefault();
        let employee = $(this).data("delete");
        let csrf = '{{ csrf_token() }}';
        Swal.fire({
          title: 'Do You Want to Delete this Employee?',
          text: "Deleted Employee Cannot Be Restored Again",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: 'employee/' + employee,
              method: 'delete',
              data: {
                id: employee,
                _token: csrf
              },
              success: function(response) {
                console.log(response);
                Swal.fire(
                  'Deleted!',
                  'Employee has been deleted.',
                  'success'
                ).then((result) => {
                    setTimeout(function() {
                        location.href = "{{ route('employee.index')}}";
                    }, 100);
                });
              }
            });
          }
        })
      });
</script>

@endsection



