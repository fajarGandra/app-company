<!-- Vendor JS Files -->
<script type="text/javascript" src="{{ asset('be/assets/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('be/assets/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('be/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('be/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('be/assets/vendor/chart.js/chart.min.js') }}"></script>
<script src="{{ asset('be/assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('be/assets/vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('be/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('be/assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('be/assets/vendor/php-email-form/validate.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('js/iziToast.min.js') }}" type="text/javascript"></script>

<!-- Template Main JS File -->
<script src="{{ asset('be/assets/js/main.js') }}"></script>
<script src="{{ asset('be/assets/js/app.js') }}"></script>


<script>
    $(function() {

        @if (session('alert.status'))
            show_alert_dialog(`{{ session('alert.status') }}`, `{{ session('alert.message') }}`);
        @endif


        @if ($errors->any())
            var status = `01`;
            var message = `<ul>`;
            @foreach ($errors->all() as $error)
                message += `<li>{{ $error }}</li>`;
            @endforeach
            message += `</ul>`;
            show_alert_dialog(status, message);
        @endif

        @if (request()->get('alert_status'))
            show_alert_dialog("{{ request()->get('alert_status') }}",
                "{{ request()->get('alert_message') }}");
        @endif

    });

    function display_data_in_modal(
        title,
        body,
        modal_size = '',
        form_action_button = '',
        form_action = '',
        form_method = '',
        button_color = ''
    ) {
        $('#data-modal .modal-title').html(title);
        $('#data-modal .modal-body').html(body);
        $('#data-modal .modal-dialog').addClass(modal_size);
        $('#data-modal #modal-form').attr('action', form_action);
        $('#data-modal #modal-form').attr('method', form_method);

        if (form_action_button !== '') {
            $('#data-modal #modal-form-action').html(form_action_button);
            $('#data-modal #modal-form-action').prop('type', 'submit');
            $('#data-modal #modal-form-action').removeClass('d-none');
        }

        button_color !== '' ?
            $('#modal-form-action').addClass(button_color) :
            $('#modal-form-action').addClass('btn-primary');

        $('#data-modal').modal('show');
    }

    $(document).ready(function() {
        $('.js-select2').select2();
    });
</script>
