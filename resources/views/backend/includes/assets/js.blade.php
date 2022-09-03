
<!-- bundle -->
<script src="{{ asset('/') }}backend/assets/js/vendor.min.js"></script>
<script src="{{ asset('/') }}backend/assets/js/app.min.js"></script>
<script src="{{ asset('/') }}backend/assets/js/vendor/toastrjs.min.js"></script>
<script src="//cdn.ckeditor.com/4.17.2/full/ckeditor.js"></script>

<!-- plugin js -->
<script src="{{ asset('/') }}backend/assets/js/vendor/dropzone.min.js"></script>
<!-- init js -->
<script src="{{ asset('/') }}backend/assets/js/ui/component.fileupload.js"></script>

@if(Session::has('success'))
    <script>
        $(document).ready(function () {
            toastr.success("{{ Session::get('success') }}");
        });
    </script>
@endif
@if(Session::has('error'))
    <script>
        $(document).ready(function () {
            toastr.success("{{ Session::get('error') }}");
        });
    </script>
@endif

@yield('script')
