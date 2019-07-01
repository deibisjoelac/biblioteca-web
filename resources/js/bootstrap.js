
/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');
	require('bootstrap');
	window.dt = require( 'datatables.net' )();
} catch (e) {}

require('datatables.net-bs4');
/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */
$.extend( true, $.fn.dataTable.defaults, {

    aLengthMenu: [
        [5, 10, 20, 50, -1],
        ["5","10", "20", "50", "Todos"]
    ],
    dom  : `<'row w-100'
                <'col-md-7'l>
                <'col-md-5'f>
            >
            <'row '<'col-sm-12 col-12 col-md-12'tr>>
            <'row '<'col-sm-12 col-12 col-md-5 text-overflowp-2'i>
                    <'col-sm-12 col-12  col-md-7 p-2'p>
            >`,

    iDisplayLength: 5,
	language: {
		"url": "/Spanish.json"
	},

} );


window.eliminar = function (btn) {
	let form = $(btn).closest('form');
	if (window.confirm("¿ Desea Registrar la entrega del Libro ?")) {
		$(form).submit();
	}

    return false ;
}
 $(function () {
	 $('#tabla-prestamos').DataTable();
	 $('#tabla-libros').DataTable();
	 $('#tabla-alumnos').DataTable();
	 $('#tabla-usuarios').DataTable();
	 $('#tabla-carreras').DataTable();
	 $('#tabla-reporte-libros-prestamos').DataTable();
 });

$(document).on('input','.solo-letras',function(){
    this.value = this.value.replace(/[^A-Za-z ]/g, "");
})


$(document).on('input','.solo-numeros',function(){
    this.value = this.value.replace(/[^0-9]/g, "");
})
