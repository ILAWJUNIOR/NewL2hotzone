<script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ url('js/bootstrap4.1.min.js') }}"></script>

<script src="{{ url('js/icheck.min.js') }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</html>