<script src="{{ asset('') }}paper/assets/js/core/jquery.min.js"></script>
<script src="{{ asset('') }}paper/assets/js/core/popper.min.js"></script>
<script src="{{ asset('') }}paper/assets/js/core/bootstrap.min.js"></script>
<script src="{{ asset('') }}paper/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="{{ asset('') }}paper/assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('') }}paper/assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('') }}paper/assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
<script src="{{asset('node_modules/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/jquery.form.min.js') }}"></script>
<script src="{{ asset('node_modules/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{asset('node_modules/sweetalert/dist/sweetalert.min.js')}}"></script>
<script src="{{ asset('node_modules/izitoast/dist/js/iziToast.min.js') }}"></script>
@yield('custom_js')
