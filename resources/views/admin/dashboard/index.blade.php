@extends('layouts.backend')

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
                            <dt class="fs-3 fw-bold">{{ $tutors }}</dt>
                            <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">{{ __('admin.tutors') }}</dd>
                        </dl>
                        <div class="item item-rounded-lg bg-body-light">
                            <i class="nav-main-link-icon fa fa-briefcase"></i>

                        </div>
                    </div>
                    <div class="bg-body-light rounded-bottom">

                        <div
                            class="block-content block-content-full block-content-sm  d-flex align-items-center justify-content-between">

                            <a href="{{ route('admin.tutors.index') }}">
                                <span>{{ __('admin.view_tutors') }}</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>


                            <form id="form-tutor-delete" {{-- action="{{ route('admin.tutors.destroy', $tutor->id) }}" --}} method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="button" onclick="confirmAllDelete('tutor')" class="btn btn-sm btn-alt-danger"
                                    value="Eliminar datos de Tutores">

                            </form>

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
                            <dt class="fs-3 fw-bold">{{ $students }}</dt>
                            <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">{{ __('admin.students') }}</dd>
                        </dl>
                        <div class="item item-rounded-lg bg-body-light">
                            <i class="nav-main-link-icon fa fa-briefcase"></i>

                        </div>
                    </div>


                    <div
                        class="block-content block-content-full block-content-sm  d-flex align-items-center justify-content-between">

                        <a href="{{ route('admin.students.index') }}">
                            <span>{{ __('admin.view_students') }}</span>
                            <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                        </a>


                        <form id="form-student-delete" {{-- action="{{ route('admin.students.destroy', $student->id) }}" --}} method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="button" onclick="confirmAllDelete('student')" class="btn btn-sm btn-alt-danger"
                                value="Eliminar datos de Estudiantes.">

                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')
    <script>
        function confirmAllDelete(type) {
            Swal.fire({
                title: '¿Estás seguro',
                text: "Deseas eliminar los datos",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#198754',
                confirmButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: '¡Sí, bórralo!',
                reverseButtons: true,
                focusCancel: true,

            }).then((result) => {
                if (result.isConfirmed) {
                    // fire ask for password alert
                    askForPassword(type)

                }
            })
        }

        // ask for password alert
        function askForPassword(type) {
            Swal.fire({
                title: 'Ingresa tu contraseña de administrador.',
                input: 'password',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Confirmar',
                confirmButtonColor: '#d33',
                showLoaderOnConfirm: true,
                cancelButtonColor: '#198754',
                confirmButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                inputValidator: (value) => {
                    if (!value) {
                        return 'Debes ingresar tu contraseña.'
                    }
                },
                preConfirm: (password) => {
                    return fetch(`/admin/dashboard/delete-all`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content')
                            },
                            body: JSON.stringify({
                                password: password,
                                type: type
                            })
                        })
                        .then(response => {
                            console.log(response)
                            if (!response.ok) {
                                throw new Error('Contraseña incorrecta.')
                            }
                            return response.json()
                        })
                        .catch(error => {
                            console.log("error", error)
                            Swal.showValidationMessage(

                                `Solicitud fallida: ${error}`
                            )
                        })
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                console.log("last", result)
                if (result.isConfirmed) {
                    // success alert
                    Swal.fire({
                        icon: 'success',
                        title: '¡Eliminado!',
                        text: 'Los registros han sido eliminados.',
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {
                        if (result.dismiss === Swal.DismissReason.timer) {
                            window.location.reload()
                        }
                    })
                }
            })
        }
    </script>
@endsection
