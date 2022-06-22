
function show_alert_dialog(status, message) {
	if (!(typeof message === 'string' || message instanceof String))
		message = message.responseText;

	message = message.replace(/(\r\n|\n|\r)/g, ' ');

	$('#alert-dialog .modal-title').html(
		status == '00' ? 'Selamat' : 'Mohon Maaf'
	);
	$('#alert-dialog .modal-title').css(
		'color',
		status == '00' ? 'green' : 'red'
	);
	$('#alert-dialog .modal-body').html(message);

	$('#alert-dialog').modal('show');
}

function showAlertDialog(title, body = null, buttons = null) {
	$('#alert-dialog .modal-title').html(title);
	$('#alert-dialog .modal-title').css('color: black');

	if (body) {
		$('#alert-dialog .modal-body').html(body);
	} else {
		$('#alert-dialog .modal-body').html('Apakah anda yakin?');
    }

	if (buttons) {
		$('#alert-dialog .modal-footer').html(buttons);
	}

	$('#alert-dialog').modal('show');
}