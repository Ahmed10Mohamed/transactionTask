<!-- Footer -->
<footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl">
        <div class="py-2 footer-container d-flex align-items-center justify-content-between flex-md-row flex-column">
            <div>
                ©
                <script>
                    document.write(new Date().getFullYear());
                </script>
                {{-- , made with ❤️ by <a href="https://pixinvent.com" target="_blank" class="fw-semibold">Pixinvent</a>
                --}}
            </div>

        </div>
    </div>
</footer>
<!-- / Footer -->
<input type="hidden" data-url="{{url('check_lang')}}" class="get_lang">

<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>

<!-- Drag Target Area To SlideIn Menu On Small Screens -->
<div class="drag-target"></div>
</div>
@yield('script')

<!-- / Layout wrapper -->
<script src="{{asset('backend/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{asset('backend/vendor/libs/popper/popper.js')}}"></script>
<script src="{{asset('backend/vendor/js/bootstrap.js')}}"></script>

<script src="{{asset('backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{asset('backend/vendor/libs/node-waves/node-waves.js')}}"></script>

<script src="{{asset('backend/vendor/libs/hammer/hammer.js')}}"></script>
<script src="{{asset('backend/vendor/libs/i18n/i18n.js')}}"></script>

<script src="{{asset('backend/vendor/js/menu.js')}}"></script>

<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{asset('backend/vendor/libs/apex-charts/apexcharts.js')}}"></script>
    <script src="{{asset('backend/vendor/libs/select2/select2.js')}}"></script>

    <script src="{{asset('backend/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
     <script src="{{asset('backend/vendor/libs/moment/moment.js')}}"></script>
    <script src="{{asset('backend/vendor/libs/flatpickr/flatpickr.js')}}"></script>
    <script src="{{asset('backend/vendor/libs/tagify/tagify.js')}}"></script>
    <script src="{{asset('backend/vendor/libs/typeahead-js/typeahead.js')}}"></script>
    <script src="{{asset('backend/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
    <script src="{{asset('backend/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
    <script src="{{asset('backend/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
    <script src="{{asset('backend/vendor/libs/bloodhound/bloodhound.js')}}"></script>
    <script src="{{asset('backend/vendor/libs/tagify/tagify.js')}}"></script>
    <script src="{{asset('backend/vendor/libs/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('backend/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
    <script src="{{asset('backend/vendor/libs/datatables-responsive/datatables.responsive.js')}}"></script>
    <script src="{{asset('backend/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js')}}"></script>



<!-- Main JS -->
<script src="{{asset('backend/js/main.js')}}"></script>



<!-- Core JS -->
<script type="text/javascript" src="{{asset('js/toaster.js')}}"></script>


<!-- BEGIN PAGE LEVEL JS-->
@if(session()->has('success') )
<script>
    toastr.success('{{ session()->get("success") }}')
</script>


@endif
@if(session()->has('fail') || $errors->any() )

<script>
    let failMessage = "{{ $errors->first() ?: session()->get('fail') }}" ;
        let failTitle = "حدث خطا"
        toastr.error(failMessage, failTitle);
</script>

@endif
@if (!Session::has('first_visit'))

<script type="text/javascript">
    $(window).on('load',function(){
        var url = $('.get_lang').attr('data-url');
        window.location = url;

    });
</script>
@endif


</body>

</html>









