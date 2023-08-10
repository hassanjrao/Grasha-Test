@extends('layouts.backend')
@section('page-title', 'Tutors')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Tutors
                </h3>



                {{-- <a href="{{ route('admin.tutors.create') }}" class="btn btn-primary">Add</a> --}}

            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                               <th>Teaching Style</th>
                                <th>Teaching Style Score</th>
                                <th>Teaching Style Average</th>
                                <th>Teaching Style Variance</th>
                                <th>Teaching Style Standard Daviation</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>
                            @foreach ($tutors as $ind => $tutor)

                            @php
                                $learningStyle = $tutor->userLearningStyle();
                            @endphp


                                <tr>

                                    <td>{{ $ind + 1 }}</td>

                                    <td>{{ $tutor->name }}</td>
                                    <td>{{ $tutor->email }}</td>

                                    <td>{{ $learningStyle['learning_style'] ? $learningStyle['learning_style']->style_en:'' }}</td>

                                    <td>{{ $learningStyle['total_score'] }}</td>
                                    <td>{{ $learningStyle['total_average'] }}</td>
                                    <td>{{ $learningStyle['total_variation'] }}</td>
                                    <td>{{ $learningStyle['total_sd'] }}</td>

                                    <td>{{ $tutor->created_at }}</td>
                                    <td>{{ $tutor->updated_at }}</td>

                                    <td>
                                        <div class="btn-group" role="group" aria-label="Horizontal Primary">

                                            <a href="{{ route('admin.tutors.edit', $tutor->id) }}"
                                                class="btn btn-sm btn-alt-primary">Edit</a>
                                            <form id="form-{{ $tutor->id }}"
                                                action="{{ route('admin.tutors.destroy', $tutor->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input type="button" onclick="confirmDelete({{ $tutor->id }})"
                                                    class="btn btn-sm btn-alt-danger" value="Delete">

                                            </form>
                                        </div>
                                    </td>

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


@endsection
