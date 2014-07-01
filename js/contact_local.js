var id ;
var tabla ;
var id_tabla ;
var accion ;

function clic(g){
	cadena = g.split("-");
	id=cadena[0];
	tabla=cadena[1];
	id_tabla=cadena[2];
	accion = cadena[3];
}

jQuery(function ($) {
	var contact = {
		message: null,
		init: function () {
			$('#contact-form input.contact, #contact-form a.contact').click(function (e) {
				e.preventDefault();
				$.get("comentario.php?id="+id+"&tabla="+tabla+"&id_tabla="+id_tabla+"&accion="+accion, function(data){
					// create a modal dialog with the data
					$(data).modal({
						closeHTML: "<a href='#' title='Close' class='modal-close'>x</a>",
						position: ["15%",],
						overlayId: 'contact-overlay',
						containerId: 'contact-container',
						onOpen: contact.open,
						onShow: contact.show,
						onClose: contact.close
					});
				});
			});
		},
		open: function (dialog) {
			// dynamically determine height
			var h = 280;
			if ($('#contact-subject').length) {
				h += 26;
			}
			if ($('#contact-cc').length) {
				h += 22;
			}

			var title = $('#contact-container .contact-title').html();
			$('#contact-container .contact-title').html('Cargando...');
			dialog.overlay.fadeIn(200, function () {
				dialog.container.fadeIn(200, function () {
					dialog.data.fadeIn(200, function () {
						$('#contact-container .contact-content').animate({
							height: h
						}, function () {
							$('#contact-container .contact-title').html(title);
							$('#contact-container form').fadeIn(200, function () {
								$('#contact-message').focus();

							});
						});
					});
				});
			});
		},
		show: function (dialog) {
			$('#contact-container .contact-send').click(function (e) {
				e.preventDefault();
				// validate form
				if (contact.validate()) {
					var msg = $('#contact-container .contact-message');
					msg.fadeOut(function () {
						msg.removeClass('contact-error').empty();
					});
					$('#contact-container .contact-title').html('Guardando...');
					$('#contact-container form').fadeOut(200);
					$('#contact-container .contact-content').animate({
						height: '80px'
					}, function () {
						$('#contact-container .contact-loading').fadeIn(200, function () {
							$.ajax({
								url: 'comentario.php',
								data: $('#contact-container form').serialize() + '&action=send',
								type: 'post',
								cache: false,
								dataType: 'html',
								success: function (data) {
									$('#contact-container .contact-loading').fadeOut(200, function () {
										$('#contact-container .contact-title').html('Comentario registrado con éxito');
										msg.html(data).fadeIn(200);
										





										$('#contact-container .contact-message').fadeOut();
										$('#contact-container .contact-title').html('Comentario registrado con éxito...');
										$('#contact-container form').fadeOut(200);
										$('#contact-container .contact-content').animate({
											height: 40
										}, function () {
											dialog.data.fadeOut(200, function () {
												dialog.container.fadeOut(200, function () {
													dialog.overlay.fadeOut(200, function () {
														$.modal.close();
													});
												});
											});
										});


										document.getElementById("g_"+tabla+"_"+id).style.display="none";
										document.getElementById("a_"+tabla+"_"+id).style.display="inline";
										var pendientes_revisar = document.getElementById("pendientes_revisar").value ;
										var pendientes_corregir = document.getElementById("pendientes_corregir").value ;
										var aprobadas = document.getElementById("aprobadas").value ;
										//alert(aprobadas + pendientes_revisar + pendientes_corregir );
										if(accion=="comentario"){
											document.getElementById("r_"+tabla+"_"+id).style.color="#996600";
											document.getElementById("pendientes_revisar").value= --pendientes_revisar ;
											document.getElementById("pendientes_corregir").value= ++pendientes_corregir;
										}
										else if(accion=="ok"){
											document.getElementById("r_"+tabla+"_"+id).style.color="#009900";
											document.getElementById("pendientes_revisar").value= --pendientes_revisar ;
											document.getElementById("aprobadas").value=++aprobadas;
											var sum=Number(pendientes_revisar) + Number(pendientes_corregir) + Number(aprobadas) ;
											
											document.getElementById("porcentaje_avance").value= Math.round( ((Number(aprobadas) * 100 ) / sum ) * 100 ) / 100 ;
										}

										/*
										if (document.getElementById("porcentaje_avance").value == 100) {
											document.getElementById("imprimir_generador").style.display="inline";
										}; */

									
									 										





									});
								},
								error: contact.error
							});
						});
					});
				}
				else {
					if ($('#contact-container .contact-message:visible').length > 0) {
						var msg = $('#contact-container .contact-message div');
						msg.fadeOut(200, function () {
							msg.empty();
							contact.showError();
							msg.fadeIn(200);
						});
					}
					else {
						$('#contact-container .contact-message').animate({
							height: '30px'
						}, contact.showError);
					}
					
				}
			});
		},
		close: function (dialog) {
			$('#contact-container .contact-message').fadeOut();
			$('#contact-container .contact-title').html('Goodbye...');
			$('#contact-container form').fadeOut(200);
			$('#contact-container .contact-content').animate({
				height: 40
			}, function () {
				dialog.data.fadeOut(200, function () {
					dialog.container.fadeOut(200, function () {
						dialog.overlay.fadeOut(200, function () {
							$.modal.close();
						});
					});
				});
			});
		},
		error: function (xhr) {
			alert(xhr.statusText);
		},
		validate: function () {
			contact.message = '';
			if (!$('#contact-container #contact-message').val()) {
				contact.message += 'Tu comentario es requerido. ';
			}

			if (contact.message.length > 0) {
				return false;
			}
			else {
				return true;
			}
		},
		showError: function () {
			$('#contact-container .contact-message')
				.html($('<div class="contact-error"></div>').append(contact.message))
				.fadeIn(200);
		}
	};

	contact.init();

});