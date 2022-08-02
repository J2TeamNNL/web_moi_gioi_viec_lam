@extends('layout_frontpage.master')
@section('content')
    <h2 class="section-title">
        {{ __('frontpage.title') }}
    </h2>
    <div class="row">
        @include('layout_frontpage.sidebar')

        <div class="col-md-9">
            <div class="row">
                @foreach($posts as $post)
                    <x-post :post="$post"/>
                @endforeach
            </div>
            <ul class="pagination pagination-info" style="float: right">
                {{ $posts->appends(request()->all())->links() }}
            </ul>
        </div>
    </div>
@endsection
@push('js')

    <script type="text/javascript">
        $(document).ready(function () {

            const slider2 = document.getElementById('sliderRefine');

            const minSalary = parseInt($("#input-min-salary").val());
            const maxSalary = parseInt($("#input-max-salary").val());

            noUiSlider.create(slider2, {
                start: [minSalary, maxSalary],
                connect: true,
                step: 50,
                range: {
                    'min': [{{ $configs['filter_min_salary'] }} - 100],
                    'max': [{{ $configs['filter_max_salary'] }} + 500]
                }
            });

            let val;
            slider2.noUiSlider.on('update', function (values, handle) {
                val = Math.round(values[handle]);
                if (handle) {
                    $('#span-max-salary').text(val);
                    $('#input-max-salary').val(val);
                } else {
                    $('#span-min-salary').text(val);
                    $('#input-min-salary').val(val);
                }
            });
        });
    </script>
@endpush