"use strict";

/*
	Abrir en ventana nueva enlaces creados en tiempo de ejecución:

	1.- Un enlace:

	var nuevoEnlace = document.getElementById('nuevoEnlace');
	RWD.utils.enlaces.abrirVentanaNueva([nuevoEnlace]);

	2.- Varios enlaces:

	var nuevosEnlaces = document.querySelectorAll('.nuevoEnlace');
	nuevosEnlaces = RWD.utils.dom.nodeListToArray(nuevosEnlaces);
	RWD.utils.enlaces.abrirVentanaNueva(nuevosEnlaces);
*/

// https://developer.mozilla.org/en-US/docs/Web/API/Element/matches
if (!Element.prototype.matches) {
	Element.prototype.matches = Element.prototype.msMatchesSelector;
}

var RWD = RWD || {};

RWD.config = RWD.config || {};

RWD.config.enlacesVentanaNueva = {
	mensaje: 'Se abrirá en ventana nueva',
	carpetasDescargas: [],
	extensionesArchivosDescargables: [],
	clasesCssExcluidas: [],
	subdominiosExcluidos: []
};

RWD.utils = RWD.utils || {};

RWD.utils.array = RWD.utils.array || {};

// https://medium.freecodecamp.org/reduce-f47a7da511a9
RWD.utils.array.flat = function (arr) {
	var newArr = arr.reduce(function (total, amount) {
		return total.concat(amount);
	}, []);

	return newArr;
};

RWD.utils.dom = RWD.utils.dom || {};

// https://gomakethings.com/converting-a-nodelist-to-an-array-with-vanilla-javascript/
RWD.utils.dom.nodeListToArray = function (nodeList) {
	return [].slice.call(nodeList);
};

RWD.utils.enlaces = (function (config, utilsArray, utilsDom) {
	var dataAttributeRegistroAnalytics = 'data-adi-ga-event';

	function abrirVentanaNueva(enlaces) {
		enlaces = enlaces || getEnlacesExternosDescargas();

		manipulaEnlacesExternosDescargas(enlaces, [addTargetBlank, addTitle, addRelNoopener]);
	}

	function getEnlacesExternosDescargas(enlaces) {
		enlaces = enlaces || getEnlacesPaginaConHref();

		var enlacesExternos = enlaces.filter(esEnlaceExterno);
		var enlacesNoExternos = enlaces.filter(noEsEnlaceExterno);
		var enlacesCarpetasDescargas = enlacesNoExternos.filter(esEnlaceCarpetaDescargas);
		var enlacesNoCarpetasDescargas = enlacesNoExternos.filter(noEsEnlaceCarpetaDescargas);
		var enlacesArchivosDescargables = enlacesNoCarpetasDescargas.filter(esEnlaceArchivoDescargable);
		var enlacesExternosDescargas = utilsArray.flat([enlacesExternos, enlacesCarpetasDescargas, enlacesArchivosDescargables]);

		return enlacesExternosDescargas;
	}

	function getEnlacesPaginaConHref() {
		var enlaces;

		enlaces = document.querySelectorAll('a[href]');
		enlaces = utilsDom.nodeListToArray(enlaces);
		return enlaces;
	}

	function esEnlaceExterno(element) {
		var subdominios = [];
		var dominioPagina = [location.hostname];
		subdominios = dominioPagina.concat(RWD.config.enlacesVentanaNueva.subdominiosExcluidos);

		var dominioUrl = element.hostname;
		var href = element.getAttribute('href');
		var esInterno = false;
		// Evitar falsos positivos de enlaces cuyo protocolo es 'mailto:', 'tel:', 'file:', etc.
		// IE y Edge no implementan element.protocol
		for (var i = 0; i < subdominios.length; i++) {
			var subdominio = subdominios[i];
			if (href.indexOf("http") !== 0 || dominioUrl === subdominio) {
				esInterno = true;
				break;
			}
		}

		return !esInterno;
	};

	function noEsEnlaceExterno(element) {
		return !esEnlaceExterno(element);
	}

	function esEnlaceCarpetaDescargas(element) {
		var url = element.getAttribute('href');
		var carpetasDescargas = config.carpetasDescargas.slice();
		var match = false;

		if (carpetasDescargas.length > 0) {
			var patron = carpetasDescargas.join('|');
			patron = patron.replace(/\//g, '\/');
			patron = "(" + patron + ")";
			var expresionRegular = new RegExp(patron);
			match = expresionRegular.test(url);
		}

		return match;
	};

	function noEsEnlaceCarpetaDescargas(element) {
		return !esEnlaceCarpetaDescargas(element);
	};

	function esEnlaceArchivoDescargable(element) {
		var url = element.getAttribute('href');
		var extensionesArchivos = config.extensionesArchivosDescargables.slice();
		var match = false;

		if (extensionesArchivos.length > 0) {
			var patron = extensionesArchivos.join('|');
			patron = patron.replace(/\./g, '');
			patron = ".+\\.(" + patron + ")(\\?.*)?$";
			var expresionRegular = new RegExp(patron, "i");
			match = expresionRegular.test(url);
		}

		return match;
	}

	function manipulaEnlacesExternosDescargas(enlaces, manipulaciones) {
		enlaces = enlaces || [];
		manipulaciones = manipulaciones || [];

		if (enlaces.length === 0) enlaces = getEnlacesExternosDescargas();

		enlaces.forEach(function (enlace) {
			manipulaciones.forEach(function (manipular) {
				manipular(enlace);
			});
		});
	}

	function addTargetBlank(element) {
		var match = !tieneClassExcluido(element);

		if (match) {
			element.setAttribute('target', '_blank');
		}
	}

	function tieneClassExcluido(element) {
		// https://developer.mozilla.org/es/docs/Web/API/Element/classList
		var match = RWD.config.enlacesVentanaNueva.clasesCssExcluidas.some(function (classExcluido) {
			return element.classList.contains(classExcluido);
		});

		return match;
	}

	function addTitle(element) {
		var match = !tieneClassExcluido(element);

		if (match) {
			var title = element.getAttribute('title');

			if (title === null || title === '') {
				element.setAttribute('title', config.mensaje);
			} else if (title !== config.mensaje) {
				var titleText = title + ' [' + config.mensaje + ']';
				element.setAttribute('title', titleText);
			}
		}
	}

	// https://medium.com/@jitbit/target-blank-the-most-underestimated-vulnerability-ever-96e328301f4c
	// No añadimos el noreferrer porque impide registrar el tráfico en analytics
	function addRelNoopener(element) {
		var match = !tieneClassExcluido(element);

		if (match) {
			var rel = element.getAttribute('rel');

			if (rel === null) {
				element.setAttribute('rel', 'noopener');
			} else {
				var relText = rel;

				if (/noopener/.test(relText) === false) {
					relText = relText + ' noopener';
				}

				relText = relText.trim();

				element.setAttribute('rel', relText);
			}
		}
	}

	return {
		abrirVentanaNueva: abrirVentanaNueva
	}
})(RWD.config.enlacesVentanaNueva, RWD.utils.array, RWD.utils.dom);

window.addEventListener('load', function () {
	RWD.utils.enlaces.abrirVentanaNueva();
});