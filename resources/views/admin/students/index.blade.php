@extends('layouts.backend')
@section('page-title', 'Students')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Students
                </h3>



                {{-- <a href="{{ route('admin.students.create') }}" class="btn btn-primary">Add</a> --}}

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
                                <th>Learning Style</th>
                                <th>Learning Style Score</th>
                                <th>Learning Style Average</th>
                                <th>Learning Style Variance</th>
                                <th>Learning Style Standard Daviation</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>
                            @foreach ($students as $ind => $student)

                            @php
                                $learningStyle = $student->userLearningStyle();
                            @endphp


                                <tr>

                                    <td>{{ $ind + 1 }}</td>

                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>

                                    <td>{{ $learningStyle['learning_style'] ? $learningStyle['learning_style']->style_en:'' }}</td>

                                    <td>{{ $learningStyle['total_score'] }}</td>
                                    <td>{{ $learningStyle['total_average'] }}</td>
                                    <td>{{ $learningStyle['total_variation'] }}</td>
                                    <td>{{ $learningStyle['total_sd'] }}</td>

                                    <td>{{ $student->created_at }}</td>
                                    <td>{{ $student->updated_at }}</td>

                                    <td>
                                        <div class="btn-group" role="group" aria-label="Horizontal Primary">

                                            <a href="{{ route('admin.students.edit', $student->id) }}"
                                                class="btn btn-sm btn-alt-primary">Edit</a>
                                            <form id="form-{{ $student->id }}"
                                                action="{{ route('admin.students.destroy', $student->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input type="button" onclick="confirmDelete({{ $student->id }})"
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
