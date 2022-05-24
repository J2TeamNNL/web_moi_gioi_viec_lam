@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
                        Create
                    </a>
                    <label for="csv" class="btn btn-info mb-0">
                        Import CSV
                    </label>
                    <input type="file" name="csv" id="csv" class="d-none" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table-data">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Job Title</th>
                            <th>Location</th>
                            <th>Remotable</th>
                            <th>Is Part-time</th>
                            <th>Range Salary</th>
                            <th>Date Range</th>
                            <th>Status</th>
                            <th>Is Pinned</th>
                            <th>Created At</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
<script>
    $(document).ready(function() {
        {{--$.ajax({--}}
        {{--    url: '{{ route('api.posts') }}',--}}
        {{--    dataType: 'json',--}}
        {{--    data: {param1: 'value1'},--}}
        {{--})--}}
        $("#csv").change(function(event) {
            var formData = new FormData();
            formData.append('file', $(this)[0].files[0]);
            $.ajax({
                url: '{{ route('admin.posts.import_csv') }}',
                type: 'POST',
                dataType: 'json',
                enctype: 'multipart/form-data',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response){
                    $.toast({
                        heading: 'Import Success',
                        text: 'Your data have been imported',
                        showHideTransition: 'slide',
                        position: 'bottom-right',
                        icon: 'success'
                    })
                },
                error: function(response){

                }
            });
        });
    });
</script>
@endpush