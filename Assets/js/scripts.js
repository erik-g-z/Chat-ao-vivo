function abrirchat() {
	window.open("/chat", "chatWindow", "width=400, height=400");
}

function iniciarSuporte() {
	setTimeout(getChamado, 2000);
}

function getChamado() {
	$.ajax({
		'url': "/ajax/getChamado",
		dataType: 'json',
		success: function (json) {
			resetChamados();

			if (json.chamados.length > 0) {
				for (var i in json.chamados) {
					if (json.chamados[i].status == '1') {
						$('#area-chamados').append("<tr class='chamado' data-id='" + json.chamados[i].id + "'><td>" + json.chamados[i].data_inicio + "</td><td>" + json.chamados[i].nome + "</td><td>Em atendimento</td></tr>");
					} else {
						$('#area-chamados').append("<tr class='chamado' data-id='" + json.chamados[i].id + "'><td>" + json.chamados[i].data_inicio + "</td><td>" + json.chamados[i].nome + "</td><td><button onclick='abrirChamado(this)'>Abrir Chamado</button></td></tr>");
					}
				}
			}
			setTimeout(getChamado, 2000);
		},
		error: function () {
			setTimeout(getChamado, 2000);
		}
	});
}

function resetChamados() {
	$('.chamado').remove();
}

function abrirChamado(obj) {
	var id = $(obj).closest('.chamado').attr('data-id');
	window.open('/chat?id=' + id, 'chatWindow', 'width=400, height=400');
}

function keyUpChat(event, obj) {
	if (event.keyCode == 13) {//tecla enter
		var msg = obj.value;
		obj.value = '';

		var dt = new Date();
		var hr = dt.getHours() + ":" + dt.getMinutes();
		var nome = $('.input-area').attr('data-nome');

		$.ajax({
			url: '/ajax/sendMessage',
			type: 'POST',
			data: { msg: msg }
		});
	}
}

function updateChat() {
	$.ajax({
		url: '/ajax/getmessage',
		dataType: 'json',
		success: function (json) {
			if (json.mensagens.length > 0) {
				for (var i in json.mensagens) {
					var hr = json.mensagens[i].data_enviado;
					if (json.mensagens[i].origem == 0) {
						var nome = 'Suporte';
					} else {
						var nome = json.mensagens[i].nome;
					}
					var msg = json.mensagens[i].mensagem;

					$('.chat-area').append('<div class="msg-item">' + hr + ' - <strong>' + nome + '</strong>: ' + msg + '</div>');
				}

				$('.chat-area').scrollTop($('.chat-area')[0].scrollHeight);
			}
			setTimeout(updateChat, 2000);
		},
		error: function () {
			setTimeout(updateChat, 2000);
		}
	});
}