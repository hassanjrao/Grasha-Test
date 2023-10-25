@extends('layouts.backend')
@section('page-title', __('admin.grouping'))
@section('css_before')
<!-- Page JS Plugins CSS -->

@endsection



@section('content')
<!-- Page Content -->
<div class="content">

    <div class="row row-deck">

        <div class="col-sm-6 col-xxl-6 col-md-6">
            <!-- New Customers -->
            <div class="block block-rounded d-flex flex-column">

                <div
                    class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                        <dt class="fs-3 fw-bold">{{ __('admin.tutors') }}</dt>
                    </dl>
                    <div class="item item-rounded-lg bg-body-light">
                        {{ $tutors }}

                    </div>
                </div>

            </div>

        </div>


        <div class="col-sm-6 col-xxl-6 col-md-6">
            <!-- New Customers -->
            <div class="block block-rounded d-flex flex-column">

                <div
                    class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                        <dt class="fs-3 fw-bold">{{ __('admin.students') }}</dt>
                    </dl>
                    <div class="item item-rounded-lg bg-body-light">
                        {{ $students }}

                    </div>
                </div>

            </div>

        </div>

    </div>

    <div class="row row-deck mb-4 justify-content-center">

        <div class="col-sm-4 ">

               <form method="GET" action="{{ route('admin.grouping.index') }}">

                    <div class="input-group">
                        @php
                            $totalStudents = 5;
                            if($total_students){
                                $totalStudents = $total_students;
                            }
                        @endphp
                        <input type="number" min="1" value="{{ $totalStudents }}" class="form-control" name="total_students" required >
                        <button type="submit" class="btn btn-primary">Generate</button>
                      </div>
               </form>


        </div>
    </div>


    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{ __('admin.grouping') }}
            </h3>



            {{-- <a href="{{ route('admin.students.create') }}" class="btn btn-primary">Add</a> --}}

        </div>

        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
            <div class="table-responsive">

                <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                    <thead>
                        <tr>
                            <th>{{ '#' }}</th>
                            <th>{{ __('admin.tutor_name') }}</th>

                            @for ($i=1; $i<=$totalStudents; $i++) <th>{{ __('admin.student')." ".$i }}</th>

                                @endfor


                        </tr>

                    </thead>

                    <tbody>

                        @foreach ($groups as $ind=> $group)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $group['tutor_name'] }}</td>

                            @foreach ($group['students'] as $student)
                            <td>{{ $student['student_name'] }}</td>
                            @endforeach

                            @if(count($group['students']) <$totalStudents) @for ($i=1; $i<=$totalStudents-count($group['students']); $i++) <td>
                                </td>

                                @endfor
                                @endif

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


        </div>

    </div>

</div>








</div>
<!-- END Page Content -->
@endsection

@section('js_after')

<script src="{{ asset('js/pages/tables_datatables_students.js') }}"></script>

<script>
    // function confirmAllDelete(type) {
        //     Swal.fire({
        //         title: '¿Estás seguro',
        //         text: "Deseas eliminar los datos",
        //         icon: 'warning',
        //         showCancelButton: true,
        //         cancelButtonColor: '#198754',
        //         confirmButtonColor: '#d33',
        //         cancelButtonText: 'Cancelar',
        //         confirmButtonText: '¡Sí, bórralo!',
        //         reverseButtons: true,
        //         focusCancel: true,

        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             // fire ask for password alert
        //             askForPassword(type)

        //         }
        //     })
        // }

        // // ask for password alert
        // function askForPassword(type) {
        //     Swal.fire({
        //         title: 'Ingresa tu contraseña de administrador.',
        //         input: 'password',
        //         inputAttributes: {
        //             autocapitalize: 'off'
        //         },
        //         showCancelButton: true,
        //         confirmButtonText: 'Confirmar',
        //         confirmButtonColor: '#d33',
        //         showLoaderOnConfirm: true,
        //         cancelButtonColor: '#198754',
        //         confirmButtonColor: '#d33',
        //         cancelButtonText: 'Cancelar',
        //         inputValidator: (value) => {
        //             if (!value) {
        //                 return 'Debes ingresar tu contraseña.'
        //             }
        //         },
        //         preConfirm: (password) => {
        //             return fetch(`/admin/dashboard/delete-all`, {
        //                     method: 'POST',
        //                     headers: {
        //                         'Content-Type': 'application/json',
        //                         'Accept': 'application/json',
        //                         'X-Requested-With': 'XMLHttpRequest',
        //                         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
        //                             .getAttribute('content')
        //                     },
        //                     body: JSON.stringify({
        //                         password: password,
        //                         type: type
        //                     })
        //                 })
        //                 .then(response => {
        //                     console.log(response)
        //                     if (!response.ok) {
        //                         throw new Error('Contraseña incorrecta.')
        //                     }
        //                     return response.json()
        //                 })
        //                 .catch(error => {
        //                     console.log("error", error)
        //                     Swal.showValidationMessage(

        //                         `Solicitud fallida: ${error}`
        //                     )
        //                 })
        //         },
        //         allowOutsideClick: () => !Swal.isLoading()
        //     }).then((result) => {
        //         console.log("last", result)
        //         if (result.isConfirmed) {
        //             // success alert
        //             Swal.fire({
        //                 icon: 'success',
        //                 title: '¡Eliminado!',
        //                 text: 'Los registros han sido eliminados.',
        //                 showConfirmButton: false,
        //                 timer: 1500
        //             }).then((result) => {
        //                 if (result.dismiss === Swal.DismissReason.timer) {
        //                     window.location.reload()
        //                 }
        //             })
        //         }
        //     })
        // }
</script>


@endsection
