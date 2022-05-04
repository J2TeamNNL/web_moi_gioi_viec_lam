<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">

                @if(date('Y') == 2022)
                    2022  © {{ config('app.name') }}
                @else
                2022 - {{ date('Y') }} © {{ config('app.name') }}
                @endif
            </div>
            <div class="col-md-6">
                <div class="text-md-right footer-links d-none d-md-block">
                    <a href="javascript: void(0);">About</a>
                    <a href="javascript: void(0);">Support</a>
                    <a href="javascript: void(0);">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</footer>
