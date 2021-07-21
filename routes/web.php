<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/  

Route::get('/', function () {
    return view('sicinar.login.loginInicio');
});

    Route::group(['prefix' => 'control-interno'], function() {
    Route::post('menu', 'usuariosController@actionLogin')->name('login');
    Route::get('status-sesion/expirada', 'usuariosController@actionExpirada')->name('expirada');
    Route::get('status-sesion/terminada','usuariosController@actionCerrarSesion')->name('terminada');
 
    // Auto registro en sistema
    Route::get( 'Autoregistro/usuario'              ,'usuariosController@actionAutoregUsu')->name('autoregusu');
    Route::post('Autoregistro/usuario/registro'     ,'usuariosController@actionRegaltaUsu')->name('regaltausu');

    // BackOffice del sistema
    Route::get('BackOffice/usuarios'                ,'usuariosController@actionNuevoUsuario')->name('nuevoUsuario');
    Route::post('BackOffice/usuarios/alta'          ,'usuariosController@actionAltaUsuario')->name('altaUsuario');
    Route::get('BackOffice/buscar/todos'            ,'usuariosController@actionBuscarUsuario')->name('buscarUsuario');        
    Route::get('BackOffice/usuarios/todos'          ,'usuariosController@actionVerUsuario')->name('verUsuarios');
    Route::get('BackOffice/usuarios/{id}/editar'    ,'usuariosController@actionEditarUsuario')->name('editarUsuario');
    Route::put('BackOffice/usuarios/{id}/actualizar','usuariosController@actionActualizarUsuario')->name('actualizarUsuario');
    Route::get('BackOffice/usuarios/{id}/Borrar'    ,'usuariosController@actionBorrarUsuario')->name('borrarUsuario');    
    Route::get('BackOffice/usuario/{id}/activar'    ,'usuariosController@actionActivarUsuario')->name('activarUsuario');
    Route::get('BackOffice/usuario/{id}/desactivar' ,'usuariosController@actionDesactivarUsuario')->name('desactivarUsuario');

    Route::get('BackOffice/usuario/{id}/{id2}/email','usuariosController@actionEmailRegistro')->name('emailregistro');    

    //Catalogos
    //Procesos
    Route::get('proceso/nuevo'      ,'catalogosController@actionNuevoProceso')->name('nuevoProceso');
    Route::post('proceso/nuevo/alta','catalogosController@actionAltaNuevoProceso')->name('AltaNuevoProceso');
    Route::get('proceso/ver/todos'  ,'catalogosController@actionVerProceso')->name('verProceso');
    Route::get('proceso/{id}/editar/proceso','catalogosController@actionEditarProceso')->name('editarProceso');
    Route::put('proceso/{id}/actualizar'    ,'catalogosController@actionActualizarProceso')->name('actualizarProceso');
    Route::get('proceso/{id}/Borrar','catalogosController@actionBorrarProceso')->name('borrarProceso');    
    Route::get('proceso/excel'      ,'catalogosController@exportCatProcesosExcel')->name('downloadprocesos');
    Route::get('proceso/pdf'        ,'catalogosController@exportCatProcesosPdf')->name('catprocesosPDF');
    //Funciones de procesos
    Route::get('funcion/nuevo'      ,'catalogosfuncionesController@actionNuevaFuncion')->name('nuevaFuncion');
    Route::post('funcion/nuevo/alta','catalogosfuncionesController@actionAltaNuevaFuncion')->name('AltaNuevaFuncion');
    Route::get('funcion/ver/todos'  ,'catalogosfuncionesController@actionVerFuncion')->name('verFuncion');
    Route::get('funcion/{id}/editar/funcion','catalogosfuncionesController@actionEditarFuncion')->name('editarFuncion');
    Route::put('funcion/{id}/actualizar'    ,'catalogosfuncionesController@actionActualizarFuncion')->name('actualizarFuncion');
    Route::get('funcion/{id}/Borrar','catalogosfuncionesController@actionBorrarFuncion')->name('borrarFuncion');    
    Route::get('funcion/excel'      ,'catalogosfuncionesController@exportCatFuncionesExcel')->name('downloadfunciones');
    Route::get('funcion/pdf'        ,'catalogosfuncionesController@exportCatFuncionesPdf')->name('catfuncionesPDF');    
    //Actividades
    Route::get('actividad/nuevo'      ,'catalogostrxController@actionNuevaTrx')->name('nuevaTrx');
    Route::post('actividad/nuevo/alta','catalogostrxController@actionAltaNuevaTrx')->name('AltaNuevaTrx');
    Route::get('actividad/ver/todos'  ,'catalogostrxController@actionVerTrx')->name('verTrx');
    Route::get('actividad/{id}/editar/actividad','catalogostrxController@actionEditarTrx')->name('editarTrx');
    Route::put('actividad/{id}/actualizar'      ,'catalogostrxController@actionActualizarTrx')->name('actualizarTrx');
    Route::get('actividad/{id}/Borrar','catalogostrxController@actionBorrarTrx')->name('borrarTrx');    
    Route::get('actividad/excel'      ,'catalogostrxController@exportCatTrxExcel')->name('downloadtrx');
    Route::get('actividad/pdf'        ,'catalogostrxController@exportCatTrxPdf')->name('cattrxPDF');
    //Rubros sociales
    Route::get('rubro/nuevo'      ,'catalogosrubrosController@actionNuevoRubro')->name('nuevoRubro');
    Route::post('rubro/nuevo/alta','catalogosrubrosController@actionAltaNuevoRubro')->name('AltaNuevoRubro');
    Route::get('rubro/ver/todos'  ,'catalogosrubrosController@actionVerRubro')->name('verRubro');
    Route::get('rubro/{id}/editar/rubro','catalogosrubrosController@actionEditarRubro')->name('editarRubro');
    Route::put('rubro/{id}/actualizar'  ,'catalogosrubrosController@actionActualizarRubro')->name('actualizarRubro');
    Route::get('rubro/{id}/Borrar','catalogosrubrosController@actionBorrarRubro')->name('borrarRubro');    
    Route::get('rubro/excel'      ,'catalogosrubrosController@exportCatRubrosExcel')->name('downloadrubros');
    Route::get('rubro/pdf'        ,'catalogosrubrosController@exportCatRubrosPdf')->name('catrubrosPDF');    
    //Imnuebles edo.
    Route::get('inmuebleedo/nuevo'      ,'catalogosinmueblesedoController@actionNuevoInmuebleedo')->name('nuevoInmuebleedo');
    Route::post('inmuebleedo/nuevo/alta','catalogosinmueblesedoController@actionAltaNuevoInmuebleedo')->name('AltaNuevoInmuebleedo');
    Route::get('inmuebleedo/ver/todos'  ,'catalogosinmueblesedoController@actionVerInmuebleedo')->name('verInmuebleedo');
    Route::get('inmuebleedo/{id}/editar/rubro','catalogosinmueblesedoController@actionEditarInmuebleedo')->name('editarInmuebleedo');
    Route::put('inmuebleedo/{id}/actualizar'  ,'catalogosinmueblesedoController@actionActualizarInmuebleedo')->name('actualizarInmuebleedo');
    Route::get('inmuebleedo/{id}/Borrar','catalogosinmueblesedoController@actionBorrarInmuebleedo')->name('borrarInmuebleedo');
    Route::get('inmuebleedo/excel'      ,'catalogosinmueblesedoController@exportCatInmueblesedoExcel')->name('downloadinmueblesedo');
    Route::get('inmuebleedo/pdf'        ,'catalogosinmueblesedoController@exportCatInmueblesedoPdf')->name('catinmueblesedoPDF');
    //tipos de archivos
    Route::get('formato/nuevo'              ,'formatosController@actionNuevoFormato')->name('nuevoFormato');
    Route::post('formato/nuevo/alta'        ,'formatosController@actionAltaNuevoFormato')->name('AltaNuevoFormato');
    Route::get('formato/ver/todos'          ,'formatosController@actionVerFormatos')->name('verFormatos');
    Route::get('formato/{id}/editar/formato','formatosController@actionEditarFormato')->name('editarFormato');
    Route::put('formato/{id}/actualizar'    ,'formatosController@actionActualizarFormato')->name('actualizarFormato');
    Route::get('formato/{id}/Borrar'        ,'formatosController@actionBorrarFormato')->name('borrarFormato');    
    Route::get('formato/excel'              ,'formatosController@exportCatRubrosExcel')->name('downloadrubros');
    Route::get('formato/pdf'                ,'formatosController@exportCatRubrosPdf')->name('catrubrosPDF');     

    //catalogo de documentos
    Route::get('docto/buscar/todos'        ,'doctosController@actionBuscarDocto')->name('buscarDocto');    
    Route::get('docto/nuevo'               ,'doctosController@actionNuevoDocto')->name('nuevoDocto');
    Route::post('docto/nuevo/alta'         ,'doctosController@actionAltaNuevoDocto')->name('AltaNuevoDocto');
    Route::get('docto/ver/todos'           ,'doctosController@actionVerDoctos')->name('verDoctos');
    Route::get('docto/{id}/editar/formato' ,'doctosController@actionEditarDocto')->name('editarDocto');
    Route::put('docto/{id}/actualizar'     ,'doctosController@actionActualizarDocto')->name('actualizarDocto');    
    Route::get('docto/{id}/editar/formato1','doctosController@actionEditarDocto1')->name('editarDocto1');
    Route::put('docto/{id}/actualizar1'    ,'doctosController@actionActualizarDocto1')->name('actualizarDocto1');
    Route::get('docto/{id}/Borrar'         ,'doctosController@actionBorrarDocto')->name('borrarDocto');    
    Route::get('docto/excel'               ,'doctosController@exportCatDoctosExcel')->name('catDoctosExcel');
    Route::get('docto/pdf'                 ,'doctosController@exportCatDoctosPdf')->name('catDoctosPDF');     

    //Municipios sedesem
    Route::get('municipio/ver/todos','catalogosmunicipiosController@actionVermunicipios')->name('verMunicipios');
    Route::get('municipio/excel'    ,'catalogosmunicipiosController@exportCatmunicipiosExcel')->name('downloadmunicipios');
    Route::get('municipio/pdf'      ,'catalogosmunicipiosController@exportCatmunicipiosPdf')->name('catmunicipiosPDF');
    
    //OSC
    //Directorio
    Route::get('oscs/nueva'           ,'oscController@actionNuevaOsc')->name('nuevaOsc');
    Route::post('oscs/nueva/alta'     ,'oscController@actionAltaNuevaOsc')->name('AltaNuevaOsc');
    Route::get('oscs/ver/todas'       ,'oscController@actionVerOsc')->name('verOsc');
    Route::get('oscs/buscar/todas'    ,'oscController@actionBuscarOsc')->name('buscarOsc');    
    Route::get('oscs/{id}/editar/oscs','oscController@actionEditarOsc')->name('editarOsc');
    Route::put('oscs/{id}/actualizar' ,'oscController@actionActualizarOsc')->name('actualizarOsc');
    Route::get('oscs/{id}/Borrar'     ,'oscController@actionBorrarOsc')->name('borrarOsc');
    Route::get('oscs/excel'           ,'oscController@exportOscExcel')->name('oscexcel');
    Route::get('oscs/pdf'             ,'oscController@exportOscPdf')->name('oscPDF');

    Route::get('oscs/{id}/editar/osc1','oscController@actionEditarOsc1')->name('editarOsc1');
    Route::put('oscs/{id}/actualizar1','oscController@actionActualizarOsc1')->name('actualizarOsc1'); 
    Route::get('oscs/{id}/editar/osc2','oscController@actionEditarOsc2')->name('editarOsc2');
    Route::put('oscs/{id}/actualizar2','oscController@actionActualizarOsc2')->name('actualizarOsc2');        
 
    Route::get('oscs5/ver/todas'       ,'oscController@actionVerOsc5')->name('verOsc5');
    Route::get('oscs5/{id}/editar/oscs','oscController@actionEditarOsc5')->name('editarOsc5');
    Route::put('oscs5/{id}/actualizar' ,'oscController@actionActualizarOsc5')->name('actualizarOsc5');    

    //IAPS Aportaciones monetarias
    Route::get('aportaciones/nueva'            ,'aportacionesController@actionNuevaApor')->name('nuevaApor');
    Route::post('aportaciones/nueva/alta'      ,'aportacionesController@actionAltaNuevaApor')->name('AltaNuevaApor');
    Route::get('aportaciones/ver/todas'        ,'aportacionesController@actionVerApor')->name('verApor');
    Route::get('aportaciones/buscar/todas'     ,'aportacionesController@actionBuscarApor')->name('buscarApor');
    Route::get('aportaciones/{id}/editar/iaps' ,'aportacionesController@actionEditarApor')->name('editarApor');
    Route::put('aportaciones/{id}/actualizar'  ,'aportacionesController@actionActualizarApor')->name('actualizarApor');
    Route::get('aportaciones/{id}/editar/iaps1','aportacionesController1@actionEditarApor1')->name('editarApor1');
    Route::put('aportaciones/{id}/actualizar1' ,'aportacionesController1@actionActualizarApor1')->name('actualizarApor1');    
    Route::get('aportaciones/{id}/Borrar'      ,'aportacionesController@actionBorrarApor')->name('borrarApor');
    //Route::get('aportaciones/excel'           ,'aportacionesController@exportAporExcel')->name('aporExcel');
    //Route::get('aportaciones/pdf'             ,'aportacionesController@exportAporPdf')->name('aporPDF');    

    //Cursos de capacitación
    Route::get('cursos/nuevo'            ,'cursosController@actionNuevoCurso')->name('nuevoCurso');
    Route::post('cursos/nuevo/alta'      ,'cursosController@actionAltaNuevoCurso')->name('AltaNuevoCurso');
    Route::get('cursos/ver/todos'        ,'cursosController@actionVerCursos')->name('verCursos');
    Route::get('cursos/{id}/editar/curso','cursosController@actionEditarCurso')->name('editarCurso');
    Route::put('cursos/{id}/actualizar'  ,'cursosController@actionActualizarCurso')->name('actualizarCurso');
    Route::get('cursos/{id}/Borrar'      ,'cursosController@actionBorrarCurso')->name('borrarCurso');
    //Route::get('aportaciones/excel'           ,'aportacionesController@exportAporExcel')->name('aporExcel');
    //Route::get('aportaciones/pdf'             ,'aportacionesController@exportAporPdf')->name('aporPDF');    
      
    //Requisitos Jurídicos
    Route::get('rjuridicos/nueva'              ,'rJuridicosController@actionNuevaJur')->name('nuevaJur');
    Route::post('rjuridicos/nueva/alta'        ,'rJuridicosController@actionAltaNuevaJur')->name('AltaNuevaJur');  
    Route::get('rjuridicos/buscar/todos'       ,'rJuridicosController@actionBuscarJur')->name('buscarJur');          
    Route::get('rjuridicos/ver/todasj'         ,'rJuridicosController@actionVerJur')->name('verJur');
    Route::get('rjuridicos/{id}/editar/iapsj'  ,'rJuridicosController@actionEditarJur')->name('editarJur');
    Route::put('rjuridicos/{id}/actualizarj'   ,'rJuridicosController@actionActualizarJur')->name('actualizarJur'); 
    Route::get('rjuridicos/{id}/Borrarj'       ,'rJuridicosController@actionBorrarJur')->name('borrarJur');

    Route::get('rjuridicos/{id}/editar/iapsj12','rJuridicosController@actionEditarJur12')->name('editarJur12');
    Route::put('rjuridicos/{id}/actualizarj12' ,'rJuridicosController@actionActualizarJur12')->name('actualizarJur12');    
    Route::get('rjuridicos/{id}/editar/iapsj13','rJuridicosController@actionEditarJur13')->name('editarJur13');
    Route::put('rjuridicos/{id}/actualizarj13' ,'rJuridicosController@actionActualizarJur13')->name('actualizarJur13'); 
    Route::get('rjuridicos/{id}/editar/iapsj14','rJuridicosController@actionEditarJur14')->name('editarJur14');
    Route::put('rjuridicos/{id}/actualizarj14' ,'rJuridicosController@actionActualizarJur14')->name('actualizarJur14');
    Route::get('rjuridicos/{id}/editar/iapsj15','rJuridicosController@actionEditarJur15')->name('editarJur15');
    Route::put('rjuridicos/{id}/actualizarj15' ,'rJuridicosController@actionActualizarJur15')->name('actualizarJur15');

    //Requisitos de operación
    //Padron de beneficiarios
    Route::get('padron/nueva'           ,'padronController@actionNuevoPadron')->name('nuevoPadron');
    Route::post('padron/nueva/alta'     ,'padronController@actionAltaNuevoPadron')->name('AltaNuevoPadron');
    Route::get('padron/ver/todas'       ,'padronController@actionVerPadron')->name('verPadron');
    Route::get('padron/buscar/todas'    ,'padronController@actionBuscarPadron')->name('buscarPadron');    
    Route::get('padron/{id}/editar/padron','padronController@actionEditarPadron')->name('editarPadron');
    Route::put('padron/{id}/actualizar' ,'padronController@actionActualizarPadron')->name('actualizarPadron');
    Route::get('padron/{id}/Borrar'     ,'padronController@actionBorrarPadron')->name('borrarPadron');
    Route::get('padron/excel'           ,'padronController@actionExportPadronExcel')->name('ExportPadronExcel');
    Route::get('padron/pdf'             ,'padronController@actionExportPadronPdf')->name('ExportPadronPdf');

    //Programa de trabajo
    Route::get('programat/nuevo'           ,'progtrabController@actionNuevoProgtrab')->name('nuevoProgtrab');
    Route::post('programat/nuevo/alta'     ,'progtrabController@actionAltaNuevoProgtrab')->name('AltaNuevoProgtrab');
    Route::get('programat/ver/todos'       ,'progtrabController@actionVerProgtrab')->name('verProgtrab');
    Route::get('programat/buscar/todos'    ,'progtrabController@actionBuscarProgtrab')->name('buscarProgtrab');    
    Route::get('programat/{id}/editar/progt','progtrabController@actionEditarProgtrab')->name('editarProgtrab');
    Route::put('programat/{id}/actualizar' ,'progtrabController@actionActualizarProgtrab')->name('actualizarProgtrab');
    Route::get('programat/{id}/Borrar'     ,'progtrabController@actionBorrarProgtrab')->name('borrarProgtrab');
    Route::get('programat/excel/{id}'      ,'progtrabController@actionExportProgtrabExcel')->name('ExportProgtrabExcel');
    Route::get('programat/pdf/{id}/{id2}'  ,'progtrabController@actionExportProgtrabPdf')->name('ExportProgtrabPdf');

    Route::get('programadt/{id}/nuevo'         ,'progtrabController@actionNuevoProgdtrab')->name('nuevoProgdtrab');
    Route::post('programadt/nuevo/alta'   ,'progtrabController@actionAltaNuevoProgdtrab')->name('AltaNuevoProgdtrab');
    Route::get('programadt/{id}/ver/todosd'         ,'progtrabController@actionVerProgdtrab')->name('verProgdtrab');
    Route::get('programadt/{id}/{id2}/editar/progdt','progtrabController@actionEditarProgdtrab')->name('editarProgdtrab');
    Route::put('programadt/{id}/{id2}/actualizardt' ,'progtrabController@actionActualizarProgdtrab')->name('actualizarProgdtrab');
    Route::get('programadt/{id}/{id2}/Borrardt','progtrabController@actionBorrarProgdtrab')->name('borrarProgdtrab');

    //Informe de labores - Programa de trabajo
    //Route::get('informe/nuevo'           ,'informeController@actionNuevoInforme')->name('nuevoInforme');
    //Route::post('informe/nuevo/alta'     ,'informeController@actionAltaNuevoInforme')->name('AltaNuevoInforme');
    Route::get('informe/ver/todos'       ,'informeController@actionVerInformes')->name('verInformes');
    Route::get('informe/buscar/todos'    ,'informeController@actionBuscarInforme')->name('buscarInforme');    
    //Route::get('informe/{id}/editar/inflab','informeController@actionEditarInforme')->name('editarInforme');
    //Route::put('informe/{id}/actualizar' ,'informeController@actionActualizarInforme')->name('actualizarInforme');
    //Route::get('informe/{id}/Borrar'     ,'informeController@actionBorrarInforme')->name('borrarInforme');
    //Route::get('informe/excel/{id}'      ,'informeController@actionExportInformeExcel')->name('ExportInformeExcel');
    Route::get('informe/pdf/{id}/{id2}'  ,'informeController@actionExportInformePdf')->name('ExportInformePdf');

    Route::get('informe/{id}/ver/todosi','informeController@actionVerInformelab')->name('verInformelab');
    //Route::get('informe/{id}/nuevo'     ,'informeController@actionNuevoInformelab')->name('nuevoInformelab');
    //Route::post('informe/nuevo/alta'    ,'informeController@actionAltaNuevoInformelab')->name('altaNuevoInformelab'); 
    Route::get('informe/{id}/{id2}/editar/inflabdet'    ,'informeController@actionEditarInformelab')->name('editarInformelab');
    Route::put('informe/{id}/{id2}/actualizarinflabdet' ,'informeController@actionActualizarInformelab')->name('actualizarInformelab');
    //Route::get('informe/{id}/{id2}/Borrarinflabdet'     ,'informeController@actionBorrarInformelab')->name('borrarInformelab');


    //Requisitos operativos
    Route::get('rop/ver/todasc'          ,'rOperativosController@actionVerReqop')->name('verReqop');
    Route::get('rop/buscar/todos'        ,'rOperativosController@actionBuscarReqop')->name('buscarReqop');        
    Route::get('rop/nueva'               ,'rOperativosController@actionNuevoReqop')->name('nuevoReqop');
    Route::post('rop/nueva/alta'         ,'rOperativosController@actionAltaNuevoReqop')->name('AltaNuevoReqop');      
    Route::get('rop/{id}/editar/reqop'   ,'rOperativosController@actionEditarReqop')->name('editarReqop');
    Route::put('rop/{id}/actualizarreqop','rOperativosController@actionActualizarReqop')->name('actualizarReqop'); 
    Route::get('rop/{id}/Borrarreqop'    ,'rOperativosController@actionBorrarReqop')->name('borrarReqop');

    Route::get('rop/{id}/editar/reqop1'   ,'rOperativosController@actionEditarReqop1')->name('editarReqop1');
    Route::put('rop/{id}/actualizarreqop1','rOperativosController@actionActualizarReqop1')->name('actualizarReqop1');    

    Route::get('rop/{id}/editar/reqop2'   ,'rOperativosController@actionEditarReqop2')->name('editarReqop2');
    Route::put('rop/{id}/actualizarreqop2','rOperativosController@actionActualizarReqop2')->name('actualizarReqop2'); 

    Route::get('rop/{id}/editar/reqop3'   ,'rOperativosController@actionEditarReqop3')->name('editarReqop3');
    Route::put('rop/{id}/actualizarreqop3','rOperativosController@actionActualizarReqop3')->name('actualizarReqop3');    

    Route::get('rop/{id}/editar/reqc9'   ,'rOperativosController@actionEditarReqc9')->name('editarReqc9');
    Route::put('rop/{id}/actualizarreqc9','rOperativosController@actionActualizarReqc9')->name('actualizarReqc9');    

    //Requisitos administrativos
    //Requisito contable - Edos financieros, Balanza de comprobación
    //Route::get('balanza/nueva'             ,'balanzaController@actionNuevaBalanza')->name('nuevaBalanza');
    //Route::post('balanz/nueva/alta'        ,'balanzaController@actionAltaNuevaBalanza')->name('AltaNuevaBalanza');
    //Route::get('balanza/ver/todos'         ,'balanzaController@actionVerBalanza')->name('verBalanza');
    //Route::get('balanza/buscar/todos'      ,'balanzaController@actionBuscarBalanza')->name('buscarBalanza');    
    //Route::get('balanza/{id}/editar/activo','balanzaController@actionEditarBalanza')->name('editarBalanza');
    //Route::put('balanza/{id}/actualizar'   ,'balanzaController@actionActualizarBalanza')->name('actualizarBalanza');
    //Route::get('balanza/{id}/Borrar'       ,'balanzaController@actionBorrarBalanza')->name('borrarBalanza');
    //Route::get('balanza/excel'             ,'balanzaController@actionExportvExcel')->name('ExportBalanzaExcel');
    //Route::get('balanza/pdf'               ,'balanzaController@actionExportBalanzaPdf')->name('ExportBalanzaPdf');

    //Route::get('balanza/{id}/editar/balanza1'   ,'balanzaController@actionEditarBalanza1')->name('editarBalanza1');
    //Route::put('balanza/{id}/actualizarbalanza1','balanzaController@actionActualizarBalanza1')->name('actualizarBalanza1');  

    //Requisitos administrativos
    // Otros requisitos admon.  
    Route::get('rcontables/ver/todasc'         ,'rContablesController@actionVerReqc')->name('verReqc');
    Route::get('rcontables/buscar/todos'       ,'rContablesController@actionBuscarReqc')->name('buscarReqc');        
    Route::get('rcontables/nueva'              ,'rContablesController@actionNuevoReqc')->name('nuevoReqc');
    Route::post('rcontables/nueva/alta'        ,'rContablesController@actionAltaNuevoReqc')->name('AltaNuevoReqc');      
    Route::get('rcontables/{id}/editar/reqc'   ,'rContablesController@actionEditarReqc')->name('editarReqc');
    Route::put('rcontables/{id}/actualizarreqc','rContablesController@actionActualizarReqc')->name('actualizarReqc'); 
    Route::get('rcontables/{id}/Borrarreqc'    ,'rContablesController@actionBorrarReqc')->name('borrarReqc');

    Route::get('rcontables/{id}/editar/reqc6'   ,'rContablesController@actionEditarReqc6')->name('editarReqc6');
    Route::put('rcontables/{id}/actualizarreqc6','rContablesController@actionActualizarReqc6')->name('actualizarReqc6');    

    Route::get('rcontables/{id}/editar/reqc7'   ,'rContablesController@actionEditarReqc7')->name('editarReqc7');
    Route::put('rcontables/{id}/actualizarreqc7','rContablesController@actionActualizarReqc7')->name('actualizarReqc7'); 

    Route::get('rcontables/{id}/editar/reqc8'   ,'rContablesController@actionEditarReqc8')->name('editarReqc8');
    Route::put('rcontables/{id}/actualizarreqc8','rContablesController@actionActualizarReqc8')->name('actualizarReqc8');    

    Route::get('rcontables/{id}/editar/reqc9'   ,'rContablesController@actionEditarReqc9')->name('editarReqc9');
    Route::put('rcontables/{id}/actualizarreqc9','rContablesController@actionActualizarReqc9')->name('actualizarReqc9');    

    Route::get('rcontables/{id}/editar/reqc11'   ,'rContablesController@actionEditarReqc11')->name('editarReqc11');
    Route::put('rcontables/{id}/actualizarreqc11','rContablesController@actionActualizarReqc11')->name('actualizarReqc11');  

    Route::get('rcontables/{id}/editar/reqc10'   ,'rContablesController@actionEditarReqc10')->name('editarReqc10');
    Route::put('rcontables/{id}/actualizarreqc10','rContablesController@actionActualizarReqc10')->name('actualizarReqc10');     
    Route::get('rcontables/{id}/editar/reqc11'   ,'rContablesController@actionEditarReqc11')->name('editarReqc11'); 
    Route::put('rcontables/{id}/actualizarreqc11','rContablesController@actionActualizarReqc11')->name('actualizarReqc11');
    
    // quotas de 5 al millar meses
    Route::get('rcontables/{id}/editar/reqc1002'   ,'rContablesController@actionEditarReqc1002')->name('editarReqc1002');
    Route::put('rcontables/{id}/actualizarreqc1002','rContablesController@actionActualizarReqc1002')->name('actualizarReqc1002');
    Route::get('rcontables/{id}/editar/reqc1003'   ,'rContablesController@actionEditarReqc1003')->name('editarReqc1003');
    Route::put('rcontables/{id}/actualizarreqc1003','rContablesController@actionActualizarReqc1003')->name('actualizarReqc1003');
    Route::get('rcontables/{id}/editar/reqc1004'   ,'rContablesController@actionEditarReqc1004')->name('editarReqc1004');
    Route::put('rcontables/{id}/actualizarreqc1004','rContablesController@actionActualizarReqc1004')->name('actualizarReqc1004');
    Route::get('rcontables/{id}/editar/reqc1005'   ,'rContablesController@actionEditarReqc1005')->name('editarReqc1005');
    Route::put('rcontables/{id}/actualizarreqc1005','rContablesController@actionActualizarReqc1005')->name('actualizarReqc1005');
    Route::get('rcontables/{id}/editar/reqc1006'   ,'rContablesController@actionEditarReqc1006')->name('editarReqc1006');
    Route::put('rcontables/{id}/actualizarreqc1006','rContablesController@actionActualizarReqc1006')->name('actualizarReqc1006');
    Route::get('rcontables/{id}/editar/reqc1007'   ,'rContablesController@actionEditarReqc1007')->name('editarReqc1007');
    Route::put('rcontables/{id}/actualizarreqc1007','rContablesController@actionActualizarReqc1007')->name('actualizarReqc1007');
    Route::get('rcontables/{id}/editar/reqc1008'   ,'rContablesController@actionEditarReqc1008')->name('editarReqc1008');
    Route::put('rcontables/{id}/actualizarreqc1008','rContablesController@actionActualizarReqc1008')->name('actualizarReqc1008');
    Route::get('rcontables/{id}/editar/reqc1009'   ,'rContablesController@actionEditarReqc1009')->name('editarReqc1009');
    Route::put('rcontables/{id}/actualizarreqc1009','rContablesController@actionActualizarReqc1009')->name('actualizarReqc1009');
    Route::get('rcontables/{id}/editar/reqc1010'   ,'rContablesController@actionEditarReqc1010')->name('editarReqc1010');
    Route::put('rcontables/{id}/actualizarreqc1010','rContablesController@actionActualizarReqc1010')->name('actualizarReqc1010');
    Route::get('rcontables/{id}/editar/reqc1011'   ,'rContablesController@actionEditarReqc1011')->name('editarReqc1011');
    Route::put('rcontables/{id}/actualizarreqc1011','rContablesController@actionActualizarReqc1011')->name('actualizarReqc1011');
    Route::get('rcontables/{id}/editar/reqc1012'   ,'rContablesController@actionEditarReqc1012')->name('editarReqc1012');
    Route::put('rcontables/{id}/actualizarreqc1012','rContablesController@actionActualizarReqc1012')->name('actualizarReqc1012');

    // Validar y autorizar Incripción al RSE
    Route::get('validar/ver/irse'             ,'validarrseController@actionVerIrse')->name('verirse');
    Route::get('validar/buscar/irse'          ,'validarrseController@actionBuscarIrse')->name('buscarirse');  
    Route::get('validar/nueva'                ,'validarrseController@actionNuevoValrse')->name('nuevoValrse');
    Route::post('validar/nueva/alta'          ,'validarrseController@actionAltaNuevoValrse')->name('AltaNuevoValrse');    
    Route::get('validar/{id}/editar/valrse'   ,'validarrseController@actionEditarValrse')->name('editarValrse');
    Route::put('validar/{id}/actualizarvalrse','validarrseController@actionActualizarValrse')->name('actualizarValrse');     
    Route::get('validar/{id}/{id2}/pdf'       ,'validarrseController@actionIrsePDF')->name('irsePDF');   
    
    // Agenda
    //Programar diligencias
    Route::get('progdil/nuevo'           ,'progdilController@actionNuevoProgdil')->name('nuevoProgdil');
    Route::post('progdil/nuevo/alta'     ,'progdilController@actionAltaNuevoProgdil')->name('AltaNuevoProgdil');
    Route::get('progdil/ver/todas'       ,'progdilController@actionVerProgdil')->name('verProgdil');
    Route::get('progdil/buscar/todas'    ,'progdilController@actionBuscarProgdil')->name('buscarProgdil');    
    Route::get('progdil/{id}/editar/progdilig','progdilController@actionEditarProgdil')->name('editarProgdil');
    Route::put('progdil/{id}/actualizar' ,'progdilController@actionActualizarProgdil')->name('actualizarProgdil');
    Route::get('progdil/{id}/Borrar'     ,'progdilController@actionBorrarProgdil')->name('borrarProgdil');
    //Route::get('progdil/excel'           ,'progdilController@exportProgdilExcel')->name('ProgdilExcel');
    Route::get('progdil/{id}/pdf'        ,'progdilController@actionMandamientoPDF')->name('mandamientoPDF');

    Route::get('progdil/reporte/reportepv','progdilController@actionReporteProgvisitas')->name('reporteProgvisitas');
    Route::post('progdil/pdf/reportepv'   ,'progdilController@actionProgramavisitasPdf')->name('programavisitasPdf');
    Route::get('progdil/reporte/reportepdf' ,'progdilController@actionReporteProgvisitasExcel')->name('reporteProgvisitasExcel');
    Route::post('progdil/Excel//reporteexel','progdilController@actionProgramavisitasExcel')->name('programavisitasExcel');

    //Visitas de diligencia
    Route::get('visitas/nueva'             ,'visitasController@actionNuevaVisita')->name('nuevaVisita');
    Route::post('visitas/nueva/alta'       ,'visitasController@actionAltaNuevaVisita')->name('altaNuevaVisita');
    Route::get('visitas/ver/todas'         ,'visitasController@actionVerVisitas')->name('verVisitas');
    Route::get('visitas/buscar/todas'      ,'visitasController@actionBuscarVisita')->name('buscarVisita');    
    Route::get('visitas/{id}/editar/visita','visitasController@actionEditarVisita')->name('editarVisita');
    Route::put('visitas/{id}/actualizar'   ,'visitasController@actionActualizarVisita')->name('actualizarVisita');
    Route::get('visitas/{id}/Borrar'       ,'visitasController@actionBorrarVisita')->name('borrarVisita');   
    //Route::get('visitas/excel'           ,'visitasController@exportVisitasExcel')->name('VisitasExcel');
    Route::get('visitas/{id}/pdf'          ,'visitasController@actionActaVisitaPDF')->name('actavisitaPDF'); 

    //Indicadores
    Route::get('indicador/ver/todos'        ,'indicadoresController@actionVerCumplimiento')->name('vercumplimiento');
    Route::get('indicador/buscar/todos'     ,'indicadoresController@actionBuscarCumplimiento')->name('buscarcumplimiento');    
    Route::get('indicador/ver/todamatriz'   ,'indicadoresController@actionVermatrizCump')->name('vermatrizcump');
    Route::get('indicador/buscar/matriz'    ,'indicadoresController@actionBuscarmatrizCump')->name('buscarmatrizcump');      
    Route::get('indicador/ver/todasvisitas' ,'indicadoresController@actionVerCumplimientovisitas')->name('vercumplimientovisitas');
    Route::get('indicador/buscar/allvisitas','indicadoresController@actionBuscarCumplimientovisitas')->name('buscarcumplimientovisitas');    
    Route::get('indicador/{id}/oficiopdf'   ,'indicadoresController@actionOficioInscripPdf')->name('oficioInscripPdf'); 

    //Estadísticas
    //OSC
    Route::get('numeralia/graficaixedo'   ,'estadisticaOscController@OscxEdo')->name('oscxedo');
    Route::get('numeralia/graficaixmpio'  ,'estadisticaOscController@OscxMpio')->name('oscxmpio');
    Route::get('numeralia/graficaixrubro' ,'estadisticaOscController@OscxRubro')->name('oscxrubro');    
    Route::get('numeralia/graficaixrubro2','estadisticaOscController@OscxRubro2')->name('oscxrubro2'); 
    Route::get('numeralia/filtrobitacora' ,'estadisticaOscController@actionVerBitacora')->name('verbitacora');        
    Route::post('numeralia/estadbitacora' ,'estadisticaOscController@Bitacora')->name('bitacora'); 
    Route::get('numeralia/mapaxmpio'      ,'estadisticaOscController@actiongeorefxmpio')->name('georefxmpio');            
    Route::get('numeralia/mapas'          ,'estadisticaOscController@Mapas')->name('verMapas');        
    Route::get('numeralia/mapas2'         ,'estadisticaOscController@Mapas2')->name('verMapas2');        
    Route::get('numeralia/mapas3'         ,'estadisticaOscController@Mapas3')->name('verMapas3');        

    //padrón
    Route::get('numeralia/graficpadxedo'    ,'estadisticaPadronController@actionPadronxEdo')->name('padronxedo');
    //Route::get('numeralia/graficpadxmpio' ,'estadisticaPadronController@actionPadronxMpio')->name('padronxmpio');
    Route::get('numeralia/graficpadxserv'   ,'estadisticaPadronController@actionPadronxServicio')->name('padronxservicio');
    Route::get('numeralia/graficpadxsexo'   ,'estadisticaPadronController@actionPadronxsexo')->name('padronxsexo');
    Route::get('numeralia/graficpadxedad'   ,'estadisticaPadronController@actionPadronxedad')->name('padronxedad');
    Route::get('numeralia/graficpadxranedad','estadisticaPadronController@actionPadronxRangoedad')->name('padronxrangoedad');

    //Agenda
    Route::get('numeralia/graficaagenda1'     ,'progdilController@actionVerProgdilGraficaxmes')->name('verprogdilgraficaxmes');    
    Route::post('numeralia/graficaagendaxmes' ,'progdilController@actionProgdilGraficaxmes')->name('progdilgraficaxmes');
    Route::get('numeralia/graficaagenda2'     ,'progdilController@actionVerprogdilGraficaxtipo')->name('verprogdilgraficaxtipo');        
    Route::post('numeralia/graficaagendaxtipo','progdilController@actionProgdilGraficaxtipo')->name('progdilgraficaxtipo');
});

