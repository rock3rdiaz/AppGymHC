/*#########################################################################################################################################}
 * ########################################################################################################################################
 * @autor: rockerdiaz
 * @date: Diciembre de 2012
 * @version: 1.0
 * ##########################################################################################################################################3
 * ########################################################################################################################################* 
 * 
 * */





$(document).ready(function(){

	/*************************************************************************************************/
	/***************************** Handlers de la aplicacion ***************************************/
	
	/*Handler del evento sobre el boton de envio del formulario principal de la Valoracion funcional*/
	$("#btn_guardar_val_funcional", ".form").click(function(){
		objValFuncional.enviarForm();
	});
	
	/*Handler del evento sobre el boton de envio del formulario principal del examen medico*/
	$("#btn_guardar_ex_medico", ".form").click(function(){
		objExMedico.enviarForm();
	});

	/*Handler del evento sobre el boton de envio del formulario principal de la creacion de citas.*/
	$("#btn_guardar_cita").click(function(){
		objCitas.enviarForm();		
	});	

	$("#btn_enviar_programa_ejercicios").click(function(){
		objProgramaEjercicios.enviarForm();
	});

	/*Handler del evento sobre el boton de adicionado de enfermedad del examen medico*/
	$("#btn_agregar_enfermedad", ".form").click(function(){
		$("#div_add_enfermedad").removeAttr('hidden');
		objExMedico.addHtmlEnfermedad();
	});

	/*Handler del evento sobre el combo desplegable que permite seleccionar el plan de entrenamiento al cual se le asignara programa de ejercicios.*/
	//$("#listado_planes_entrenamiento_libres").on('change', objProgramaEjercicios.ajaxImprimirPlanEntrenamiento);
	$("#ProgramaEjercicios_idPlan_entrenamiento").change(function(){
		objProgramaEjercicios.crearBotonImprimirPlanEntrenamiento($(this));
	});

	/*Handler del evento sobre el enlace que permite dada la cedula de un usuario validar si existe y traer su nombre completo.*/
	$("#cita-form #btn_buscar_usuario").click(function(){
			objCitas.ajaxBuscarUsuario($("#cedula_usuario_cita"));
	});

	/*Handler del evento sobre el combo desplegable que permite seleccionar la valoracion funcional a la que se le asignara un plan de entrenamiento.*/
	$("#PlanEntrenamiento_idValoracion_funcional").change(function(){
		objPlanEntrenamiento.ajaxBuscarAntecedentesImportantes($(this));
	});

	/*Handler del evento sobre los botones construidos para agregar ejercicios a los dias de la semana. Funcion para crear el plan de ejercicios de un usuario.*/
	$("#div_rutina button").click(function(){
		objProgramaEjercicios.addHtmlEjercicios($(this));
	});

	
	/*@summary: Funcion que permite calcular la edad de un usuario a partir de su fecha de nacimiento. Realiza el calculo pasando las fechas de nacimiento y actual a dias.
	 * @param string fecha_nacimiento -> Fecha de nacimiento del usuario seleccionado
	 * @return int edad -> Edad del usuario
	 * */
	getEdad = function(fecha_nacimiento){
		const anio_base = 1900;//Constante definida como punto base
		
		
		var arr_datos_fecha_nacimiento = fecha_nacimiento.split('-');
		
		/*Variable que almacenara un objeto que nos permite obtener los datos de la fecha actual*/
		var today = new Date();		
		
		var anios = today.getFullYear();//Capturamos el anio
		var meses =  today.getMonth() + 1;//Obtenemos el mes
		var dias = today.getDate();//Obtenemos el dia
		
		var num_dias_actual = ((anios - anio_base) * 365) + (meses * 30) + dias;
		var num_dias_usuario = ((parseInt(arr_datos_fecha_nacimiento[0]) - anio_base) * 365) + (parseInt(arr_datos_fecha_nacimiento[1]) * 30) + parseInt(arr_datos_fecha_nacimiento[2]);
				
		return parseInt((num_dias_actual - num_dias_usuario) / 365);
	}
	


/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/	
/*Objeto literal que se encarga de todo el trabajo a a realizar con el formulario de creacion de planes de entrenamiento*/	
	objPlanEntrenamiento = 
	{
		ajaxBuscarAntecedentesImportantes : function(obj){

			$.ajax({
				url: "http://localhost/AppGymHC/branches/branches_0.5/index.php?r=fisioterapeuta/planEntrenamiento/ajaxBuscarAntecedentesImportantes",
				//url: "http://192.168.0.171/AppGymHC/branches/branches_0.5/index.php?r=fisioterapeuta/planEntrenamiento/ajaxBuscarAntecedentesImportantes",

				dataType: "json",

				type: "post",

				data: "id_valoracion_funcional="+obj.val(),

				success: function(datos){

					/*Almaceno el ULTIMO registro con los antecedentes a mostrar. Linea necesaria si es que el usuario ha pasado varias veces por la evaluacion medica, en este caso, seleccionamos el ultimo dictamen*/
					var last_index = datos.length - 1;

					$("#edad_usuario_pe").attr('value', getEdad(datos[last_index].fecha_nac));
					$("#telefono_usuario_pe").attr('value', datos[last_index].celular);

					/*Existe una propiedad llamada 'nombre' dentro del objeto JSON?*/
					if(datos[last_index].nombre){
						$("#eps_usuario_pe").attr('value', datos[last_index].nombre);
					}
					else{
						$("#eps_usuario_pe").attr('value', 'No registra');
					}

					
					$("#fecha_valoracion_funcional_pe").attr('value', datos[last_index].fecha_hora);
					$("#objetivo_ejercicio_pe").attr('value', datos[last_index].objetivo_ejercicio);
					$("#programa_entrenamiento_pe").attr('value', datos[last_index].programa_entrenamiento);
					$("#riesgo_cardiovascular_pe").attr('value', datos[last_index].riesgo_cardiovascular);
					$("#riesgo_osteomuscular_pe").attr('value', datos[last_index].riesgo_osteomuscular);
					$("#frecuencia_semanal_ejercicio_pe").attr('value', datos[last_index].sesiones_semana);
					$("#imc_pe").attr('value', datos[last_index].imc);
					$("#porcentaje_graso_pe").attr('value', datos[last_index].porc_grasa);
					$("#core_pe").attr('value', datos[last_index].estabilidad_core);
				},

				error: function(datos){
					alert("Error en la peticion! "+datos.responseText);
				}
			});			
		}
	}
/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

	
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/	
/*Objeto literal que se encarga de todo el trabajo a a realizar con el formulario de citas*/	
	objCitas = 
	{

		enviarForm : function(){
			var codigo_usuario = $("#Cita_idVUsuario").val();

			if(codigo_usuario != ''){
				$("#Cita_idVUsuario").removeAttr('disabled');
				$("#cita-form").submit();
			}
			else{
				alert("Debe seleccionar un usuario!");
			}					
		},

		/*@summary: Metodo que permite buscar el nombre de un usuario dado el valor de la cedula.
		*@param [obj] obj [Objeto que tiene como propiedades el valor de la cedula digitado por el usuario en el 
		*                 fomrulario de crecion de citas.]
		*/
		ajaxBuscarUsuario : function(obj){
			var cedula = obj.val();

			$.ajax({
				url: "http://localhost/AppGymHC/branches/branches_0.5/index.php?r=secretaria/cita/ajaxBuscarUsuario",
				//url: "http://192.168.0.231/AppGymHC/branches/branches_0.5/index.php?r=secretaria/cita/ajaxBuscarUsuario",

				dataType: "html",

				type: "post",

				data: "cedula_usuario="+cedula,

				success: function(datos){
					/*Se ha encontrado algun usuario?*/
					if(datos != 'Usuario no encontrado! :('){
						var arr_datos = new Array();
						arr_datos = datos.split('|');//['nombre_usuario', 'codigo_usuario']

						alert(arr_datos[0]);//Mostramos el nombre del usuario encontrado

						$("#Cita_idVUsuario").attr('value', arr_datos[1]);
					}
					else{
						alert(datos);
					}				
				},

				error: function(datos){
					alert("Error en la peticion! "+datos.responseText);
				}
			});
		},
	}	
/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
	
	
	
	
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/	
	/*Objeto literal que se encarga de todo el trabajo a a realizar con el formulario de Valoracion funcional*/
	objValFuncional = {

			/*Funcion que pemrite ubicar los datos personales de las personas que poseen citas pendientes*/
			setDatosGenerales : function() {
				var str_datos_usuario = $("#html_listado_citas").val();
				var arr_datos = new Array();
				
				arr_datos = str_datos_usuario.split('|');//Separo la cadena acorde al delimitador definido.
				
				/*Realizo la asignacion de cada valor en su lugar correspondiente. Inhabilito los controles*/
				$('#txt_id_usuario_vf').attr('value', arr_datos[3]);
				$('#txt_id_usuario_vf').attr('disabled', 'true');

				$('#txt_nombres_usuario_vf').attr('value', arr_datos[4]);
				$('#txt_nombres_usuario_vf').attr('disabled', 'true');

				$('#txt_fecha_nacimiento_usuario_vf').attr('value', arr_datos[2]);
				$('#txt_fecha_nacimiento_usuario_vf').attr('disabled', 'true');				

				$('#txt_edad_usuario_vf').attr('value', getEdad(arr_datos[2]));
				$('#txt_edad_usuario_vf').attr('disabled', 'true');

				$('#txt_id_cita_vf').attr('value', arr_datos[0]);
				$('#txt_id_cita_vf').attr('disabled', 'true');

				$('#txt_motivo_cita_vf').attr('value', arr_datos[5].toUpperCase());
				$('#txt_motivo_cita_vf').attr('disabled', 'true');



				/* Una vez se han ubicado los datos generales, debo enviar el id del usuario a la funcion 'setAntecedentesUsuario' para traer
				* los datos de la impresion diagnostica, mismos que se ubicaran en el apartado de antecedentes del usuario.
				*/
				this.ajaxSetAntecedentesUsuario($('#txt_id_usuario_vf').val());

			},

			/*Funcion que permite traer via peticion ajax los antecedentes del usuario mediante la impresion diagnostica almacenada en la evaluacion medica del mismo.
			*	@param: int $id_usuario [Id del usuario que se desea evaluar funcionalmente]
			*/
			ajaxSetAntecedentesUsuario: function(id_usuario){

				$.ajax({
					url: "http://localhost/AppGymHC/branches/branches_0.5/index.php?r=medico/evaluacionMedica/ajaxGetDatosImpresionDiagnostica",
					//url: "http://192.168.0.231/AppGymHC/branches/branches_0.5/index.php?r=medico/evaluacionMedica/ajaxGetDatosImpresionDiagnostica",
					
					dataType: "html",

					type: "post",

					data: "id_usuario="+id_usuario,

					success: function(datos){

						if(datos == 'No hay datos'){
							alert('No existen antecedentes medicos! :(');
							$("#txt_factor_cardiovascular_vf").attr('value', '');
							$("#txt_factor_cardiovascular_vf").attr('disabled', true);

							$("#txt_factor_musculoesqueletico_vf").attr('value', '');
							$("#txt_factor_musculoesqueletico_vf").attr('disabled', true);

							$("#txt_conducta_vf").attr('value', '');
							$("#txt_conducta_vf").attr('disabled', true);''

							$("#txt_observaciones_vf").attr('value', '');
							$("#txt_observaciones_vf").attr('disabled', true);

							$("#txt_recomendaciones_nuctricionales_vf").attr('value', '');
							$("#txt_recomendaciones_nuctricionales_vf").attr('disabled', true);

							$("#txt_tipo_actividad_fisica_vf").attr('value', '');
							$("#txt_tipo_actividad_fisica_vf").attr('disabled', true);

							$("#txt_justificacion_actividad_fisica_vf").attr('value', '');
							$("#txt_justificacion_actividad_fisica_vf").attr('disabled', true);
						}

						else{
							var arr_datos = new Array();
							arr_datos = datos.split('|');

							$("#txt_factor_cardiovascular_vf").attr('value', arr_datos[0]);
							$("#txt_factor_cardiovascular_vf").attr('disabled', true);

							$("#txt_factor_musculoesqueletico_vf").attr('value', arr_datos[1]);
							$("#txt_factor_musculoesqueletico_vf").attr('disabled', true);

							$("#txt_conducta_vf").attr('value', arr_datos[2]);
							$("#txt_conducta_vf").attr('disabled', true);

							$("#txt_observaciones_vf").attr('value', arr_datos[3]);
							$("#txt_observaciones_vf").attr('disabled', true);

							$("#txt_recomendaciones_nuctricionales_vf").attr('value', arr_datos[4]);
							$("#txt_recomendaciones_nuctricionales_vf").attr('disabled', true);

							$("#txt_tipo_actividad_fisica_vf").attr('value', arr_datos[5]);
							$("#txt_tipo_actividad_fisica_vf").attr('disabled', true);

							$("#txt_justificacion_actividad_fisica_vf").attr('value', arr_datos[6]);
							$("#txt_justificacion_actividad_fisica_vf").attr('disabled', true);
						}						
					},

					error: function(data){
						alert('Error en la peticion ' + data.responseText);
					}
				});
			},
		
			/*Funcion que me permite realizar un 'submit' sobre el formulario principal*/
			enviarForm : function(){
				/*Comprobamos que el id del usuadio no este vacio*/
				if($('#txt_id_usuario_vf').val() == ""){
					alert("Debe seleccionar el usuario a evaluar!");
				}
				else{
					/*Habilito los controles para procesarlos desde el controlador.*/
					$('#txt_id_usuario_vf').removeAttr('disabled');
					$('#txt_id_cita_vf').removeAttr('disabled');
					$("#valoracion-funcional-form").submit();
				}
			},

			/*@summary: Funcion que permite realizar los calculos dedicados a las medidas antropometricas
			 *@param: Object obj -> Objeto jquery que genera el evento
			 *@return: Ninguno
			*/
			validateMedidasAntropometricas : function(){
				/*Variables que almacenan los valores de entrada*/
				var peso        = $("#MedidasAntropometricas_peso_actual").val();
				var talla       = $("#MedidasAntropometricas_talla").val();
				var edad        = $("#txt_edad_usuario_vf").val();
				var frec_reposo = $("#MedidasAntropometricas_frecuencia_cardiaca_reposo").val();
				var porc_entr_1 = $("#MedidasAntropometricas_valor_porc_entrenamiento1").val();
				var porc_entr_2 = $("#MedidasAntropometricas_valor_porc_entrenamiento2").val();

				/*Variables que almacenaran los resultados/*/
				var valor_imc;
				var valor_porc_entr_1;
				var valor_porc_entr_2;
				var frec_maxima = 220 - edad;

				/*Calculos para 'imc'*/
				if($.isNumeric(peso) && $.isNumeric(talla)){
					valor_imc = ((peso / talla) * (peso / talla)).toFixed(1);
				}
				else{
					if(!$.isNumeric(peso)){
						valor_imc = '#PesoAc';
					}
					if(!$.isNumeric(talla)){
						valor_imc = '#Talla';
					}
				}

				/*Calculos para 'poc_entrenamiento1' y 'porc_entrenamiento2'*/
				if($.isNumeric(frec_reposo) && $.isNumeric(porc_entr_1) && $.isNumeric(porc_entr_2)){
					valor_porc_entr_1 = parseFloat((frec_maxima - (frec_reposo * (porc_entr_1 / 100))+ frec_reposo)).toFixed(0);
					valor_porc_entr_2 = parseFloat((frec_maxima - (frec_reposo * (porc_entr_2 / 100)) + frec_reposo)).toFixed(0);
				}
				else{					
					if(!$.isNumeric(frec_reposo)){
						valor_porc_entr_1 = '#FrcR';
						valor_porc_entr_2 = '#FrcR';
					}
					if(!$.isNumeric(porc_entr_1)){
						valor_porc_entr_1 = '#%En1';
						valor_porc_entr_2 = '#%En1';
					}
					if(!$.isNumeric(porc_entr_2)){
						valor_porc_entr_1 = '#%En2';
						valor_porc_entr_2 = '#%En2';
					}
				}	

				/*Seteamos los valores en los lugares correspondientes*/			
				$("#MedidasAntropometricas_frecuencia_cardiaca_maxima").attr('value', frec_maxima);
				$("#MedidasAntropometricas_porc_entrenamiento1").attr('value', valor_porc_entr_1);
				$("#MedidasAntropometricas_porc_entrenamiento2").attr('value', valor_porc_entr_2);
				$("#MedidasAntropometricas_imc").attr('value', valor_imc);
			}
	}
/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
	





	

/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/	
/*Objeto literal que se encarga de todo el trabajo a a realizar con el formulario de programa de ejercicios*/
	objProgramaEjercicios = {

		/*Metodo que permite imprimir el plan de entrenamiento asociado a la  seleccion realizada al momento de generar un programa de ejercicios.*/
		crearBotonImprimirPlanEntrenamiento: function(obj){
			var id_plan_entrenamiento = obj.val();
			var href = '/AppGymHC/branches/branches_0.5/index.php?r=instructor/programaEjercicios/imprimirPlanEntrenamiento&id_plan_entrenamiento='+id_plan_entrenamiento;

			/*El boton ya existe?*/
			if($("#btn_imprimir").length > 0){
				$("#div_crear_boton_imprimir #btn_imprimir").remove();//Eliminamos el boton del DOM
			}

			var html_boton = '<a id="btn_imprimir" class="btn btn-info" href='+href+'><i class="icon-white icon-eye-open"></i> Ver</a>'
			$("#div_crear_boton_imprimir").append(html_boton);
    	},

    	/*Metodo encargado de generar los elementos html a adicionar como ejercicios en el programa de ejercicios
    	*@param [obj] Objeto javascript que contiene el boton presionado (boton del dia de la semana a trabajar)
    	*/
    	addHtmlEjercicios: function(obj){    
    		var grupo_elementos = Math.round(Math.random()*10000);
    		var combo = this.ajaxCrearComboEjercicios(grupo_elementos, obj[0].id);//Combo desplegable con los ejercicios
    		
    		var html = '<div class="row-fluid div_'+grupo_elementos+'">'+
	        				'<div class="span12">'+
	            				'<div class="row-fluid">'+
	                				'<div class="span7">'+
	                					'<label>Seccion de trabajo y ejercicio<span class="required">*</span></label>'+
	                					combo+
	                				'</div>'+
	                				'<div class="span2">'+
	                					'<label>Series<span class="required">*</span></label>'+
	                					'<input type="text" class="span12 listado_series_ejercicios">'+
	                				'</div>'+
	                				'<div class="span2">'+
	                					'<label><label>Repeticiones<span class="required">*</span></label></label>'+
	                					'<input type="text" class="span12 listado_repeticiones_ejercicios">'+
	                				'</div>'+
	                				'<div class="span1">'+
	                					'<label>:(</label>'+
	                					'<button id="'+grupo_elementos+'" class="btn btn-info btn-mini" type="button" rel="tooltip" title="Cancelar"><i class="icon-minus icon-white"></i></button>'+
	                				'</div>'+
						        '</div>'+
						    '</div>'+
						'</div>';
			$("#div_rutina #dia_"+obj[0].id).append(html);
			$("#"+grupo_elementos).on('click', this.delHtmlEjercicio);			
    	},

    	/*@summary:Metodo que me permite obtener los datos de los ejercicios de la bd via ajax (metodo getJSON). Posteriormente se construye un*
    	*			combo desplegable que contendra todos los ejercicios existente en el sistema.
    	*@param:  [int]         grupo_elementos     [Numero que identifica de manera unica cada uno de los tags <select> que se van a crear. Este numero es igual al atributo 'id' del boton que genero el evento de insertado y al contenedor donde se grupan todos los elementos html] 
    	*@param   [string]      dia                 [Nombre del dia de la semana en el que se va a adicionar el ejercicio inasertado]
    	*@return: [Objeto HTML] select_html         [Elementos html ya generados y listos para insertar en su lugar correspondiente]
    	*/
    	ajaxCrearComboEjercicios: function(grupo_elementos, dia){
    		var select_html = '<select name="'+dia+'" id="select_'+grupo_elementos+'" class="span12 listado_id_ejercicios"></select>';
    		var option;

    		$.getJSON(
    			'http://localhost/AppGymHC/branches/branches_0.5/index.php?r=instructor/ejercicio/ajaxGetComboEjercicios',
    			//data,
				function(data){
					if(data.length == 0){
						alert('No existen ejercicios almacenados :(');							
					}
					else{
						$.each(data, function(index){
							option = '<option value="'+data[index].idEjercicio+'">'+data[index].seccion_trabajo+' -- '+data[index].descripcion+'</option>'; 
							$("select#select_"+grupo_elementos).append(option);
						});    					
					}					
				}				
			);

			return select_html;
    	},

    	/*Metodo que se encarga de eliminar los elementos html del o los ejercicios ingresados por el usuario.*/
    	delHtmlEjercicio: function(){
    		$("div#div_rutina div.div_"+this.id).remove();
    	},

    	/*Funcion que me permite realizar un 'submit' sobre el formulario principal*/
    	enviarForm: function(){
    		//Ha seleccionado un lpan de entrenamiento a asociar?
    		if($("#listado_planes_entrenamiento_libres").val() == ''){
    			alert('Debe seleccionar un plan de entrenamiento libre! :(');
    		}
    		else{
    			/*Existen ejercicios presentes adicionados por el usuario?*/
    			if($(".listado_id_ejercicios").length == 0){
    				alert('No puede crear un programa de ejercicios sin ejercicios! :\'(');
    			}
    			else{
    				/*Almacenamos los grupos de datos (por sus clases html) en variables locales*/
    				var listado_id_ejercicios = $(".listado_id_ejercicios");
    				var listado_series_ejercicios = $(".listado_series_ejercicios");
    				var listado_repeticiones_ejercicios = $(".listado_repeticiones_ejercicios");
    				var series_repeticiones = $.merge(listado_series_ejercicios, listado_repeticiones_ejercicios);//Array que contiene todas las series y repeticiones agregadas por el usuario

    				/*Validamos que todas las series y reeticiones sean numericas*/
    				$.each(series_repeticiones, function(i){
    					if(!$.isNumeric(series_repeticiones[i].value)){
    						alert('Existen errores en los datos de las series y las repeticiones! :(');
    						return false;
    					}
    				});    				

    				var obj_json = '[';

    				for(var i = 0; i < listado_id_ejercicios.length; i++){
	    				obj_json += '{"dia":"'+listado_id_ejercicios[i].name+'","idEjercicio":"'+listado_id_ejercicios[i].value+'","series":"'+listado_series_ejercicios[i].value+'","repeticiones":"'+listado_repeticiones_ejercicios[i].value+'"}';
	    				
    					/*Existe un elemento siguiente?*/
						if((listado_id_ejercicios.length - i) > 1){
							obj_json += ',';
						}
						else{
							obj_json += ']';
						}
    				}
    				$("#datos_programa_ejercicio").attr('value', obj_json);//Almacenamos el objeto json con los datos en el campo oculto para enviarlo a php    				
    				$("#programa-ejercicios-form").submit();
    			}
    		}    		
    	}
	}
/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
	
	
	
	
	
	
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/	
	/*Objeto literal que se encarga de todo el trabajo a realizar con el formulario de Examen medico*/
	objExMedico = {	
		
		/*Metodo que permite construir los elementos HTML que se deben generar al momento de querer adicionar una enfermedad.
		* Todos loe elementos se crean dentro del elemento del DOM #div_add_enfermedad.
		*/
		addHtmlEnfermedad: function(){
			/*Generamos un numero que identificara de manera unica a cada uno de los objetos a crear via js de manera dinamica*/
			var grupo_elementos = Math.round(Math.random()*10000);

			var html = //'<div class="well">\
							'<div class="row-fluid '+grupo_elementos+'">\
	        					<div class="span12">\
	            					<div class="row-fluid">\
	                					<div class="span4">\
	                						<label>Descripcion<span class="required">*</span></label>\
	                						<input type="text" class="descripciones">\
	                					</div>\
	                					<div class="span4">\
	                						<label>Tipo de enfermedad<span class="required">*</span></label>\
	                						<select name="tipo_enfermedad" class="tipos">\
	                							<option value="familiar">Antecedente familiar</option>\
												<option value="personal">Antecedente personal</option>\
											</select>\
	                					</div>\
	                					<div class="span4">\
	                						<label>.:: Eliminar ::.</label>\
	                						<button id="'+grupo_elementos+'" class="btn btn-info btn-mini" type="button" rel="tooltip" title="Cancelar"><i class="icon-minus icon-white"></i></button>\
	                					</div>\
						            </div>\
						        </div>\
						    </div>';
						//</div>';
				

			$("#div_add_enfermedad .well").append(html);

			/*Una vez se ha creado el boton de eliminar la enfermedad, se le genera el handler que procesara el evento de eliminado.*/
			$("#"+grupo_elementos).on("click", this.delHtmlEnfermedad);			
		},

		/*Metodo para eliminar el HTML creado cuando se desea eliminar una enfermedad agregada.*/
		delHtmlEnfermedad: function(){
			$("#div_add_enfermedad .well div."+this.id).remove();	
			
			if($(".descripciones").length == 0){
				$("#div_add_enfermedad").attr('hidden', true);
			}						
		},

		/*Metodo que permite construir un array de objetos json que contienen los datos de todas las enfermedades a 
		* asociar a la evaluacion medica actual.
		*/
		addEnfermedades: function(){
			var enfermedades_json = '[';//variable que almacenara el objeto json con los datos de las enfermedades a almacenar

			var array_descripciones = $(".descripciones");
			var array_tipos        = $(".tipos");

			for (var i = 0; i < array_descripciones.length; i++){
				enfermedades_json += '{"descripcion":"'+array_descripciones[i].value+'\","tipo":"'+array_tipos[i].value+'\"}';

				/*Existe un elemento siguiente?*/
				if((array_descripciones.length - i) > 1){
					enfermedades_json += ',';
				}
				else{
					enfermedades_json += ']';
				}
			}
			return enfermedades_json;
		},

		/*Funcion que realiza el request al servidor para insertar una enfermedad asociada al examen medico actual.
		* Se capturan los valores que se desean almacenar y se envian a la accion que se encarga de guardarlos en la base de datos.
		* Mediante un campo oculto ($("#lista_emfermedades_asociadas")) se concatenan los id's de las enfermedades ya almacenadas
		* para realizar su posterior relacion con las tablas necesarias via PHP.
		*
		*/
		ajaxAddEnfermedad: function(){
			//console.debug($("#txt_descripcion_enfermedad").val());
			
			var descripcion = $("#txt_descripcion_enfermedad").val();
			var tipo = $("#tipo_enfermedad").val();	

			
			
			$.ajax({
				url: 'http://localhost/AppGymHC/branches/branches_0.5/index.php?r=medico/enfermedad/create',
				//url: 'http://192.168.0.171/AppGymHC/branches/branches_0.5/index.php?r=medico/enfermedad/create',
				
				dataType: 'html',
				
				type: 'post',
				
				data: "descripcion="+descripcion+"&tipo="+tipo,

				success: function(datos){
					if($.isNumeric(datos)){
						alert("Enfermedad guardada con exito! :)");

						if($("#lista_enfermedades_asociadas").val() == ''){
							$("#lista_enfermedades_asociadas").attr('value', datos);
						}
						else{
							var enfermedades = $("#lista_enfermedades_asociadas").val() + '|' + datos;
							$("#lista_enfermedades_asociadas").attr('value', enfermedades);
						}
						objExMedico.delHtmlEnfermedad();//Elimino los elementos HTML de la enfermedad recien creada.
					}
					else{
						alert("No se ha logrado almacenar la enfermedad! :(");
					}
				},

				error: function(){
					alert("Se ha producido un error! :'(");
				}
			});
		},
			
			
			/*Funcion que pemrite ubicar los datos personales de las personas que poseen citas pendientes*/
			setDatosGenerales : function() {
				var str_datos_usuario = $("#html_listado_citas").val();
				var arr_datos = new Array();
				
				arr_datos = str_datos_usuario.split('|');//Separo la cadena acorde al delimitador definido.
				
				/*Realizo la asignacion de cada valor en su lugar correspondiente*/
				$('#txt_id_cita_em').attr('value', arr_datos[0]);
				$('#txt_id_cita_em').attr('disabled', 'true');

				$('#txt_id_usuario_em').attr('value', arr_datos[3]);
				$('#txt_id_usuario_em').attr('disabled', 'true');

				$('#txt_nombres_usuario_em').attr('value', arr_datos[4]);
				$('#txt_nombres_usuario_em').attr('disabled', 'true');

				$('#txt_fecha_nacimiento_usuario_em').attr('value', arr_datos[2]);	
				$('#txt_fecha_nacimiento_usuario_em').attr('disabled', 'true');

				$('#txt_edad_usuario_em').attr('value', getEdad(arr_datos[2]));
				$('#txt_edad_usuario_em').attr('disabled', 'true');

				$('#txt_sexo_em').attr('value', arr_datos[5]);
				$('#txt_sexo_em').attr('disabled', 'true');

				$('#txt_direccion_residencia_usuario_em').attr('value', arr_datos[6]);
				$('#txt_direccion_residencia_usuario_em').attr('disabled', 'true');		

				$('#txt_telefono_usuario_em').attr('value', arr_datos[7]);
				$('#txt_telefono_usuario_em').attr('disabled', 'true');	

				$('#txt_motivo_cita_em').attr('value', arr_datos[8].toUpperCase());
				$('#txt_motivo_cita_em').attr('disabled', 'true');	

				this.ajaxBuscarDatosExtraUsuario(arr_datos[3]);
									
			},

			/*Metodo que permite obterner (si estos existieran) los datos extra del usuario, como su ocupacion, eps a la que pertenece, etc.*/
			ajaxBuscarDatosExtraUsuario : function(id_usuario){
				$.ajax({
					url: 'http://localhost/AppGymHC/branches/branches_0.5/index.php?r=medico/evaluacionMedica/ajaxGetDatosExtraUsuario',
					//url: 'http://192.168.0.171/AppGymHC/branches/branches_0.5/index.php?r=medico/evaluacionMedica/ajaxGetDatosExtraUsuario',
					
					dataType: 'json',
					
					type: 'post',
					
					data: "id_usuario="+id_usuario,

					success: function(datos){
						/*Algun resultado devuelto por php?*/
						if(datos.length > 0){
							$("#DatosExtraUsuario_lugar_nacimiento").attr('value', datos[0].lugar_nacimiento);
							$("#DatosExtraUsuario_ocupacion").attr('value', datos[0].ocupacion);
							$("#DatosExtraUsuario_estado_civil").attr('value', datos[0].estado_civil);
							$("#DatosExtraUsuario_idEPS").attr('value', datos[0].idEPS);
							$("#DatosExtraUsuario_tipo_aporte").attr('value', datos[0].tipo_aporte);
							$("#DatosExtraUsuario_acompaniante").attr('value', datos[0].acompaniante);
							$("#DatosExtraUsuario_parentezco_acompaniante").attr('value', datos[0].parentezco_acompaniante);
						}		
						else{
							$("#DatosExtraUsuario_lugar_nacimiento").attr('value', '');
							$("#DatosExtraUsuario_ocupacion").attr('value', '');
							$("#DatosExtraUsuario_estado_civil").attr('value', '');
							$("#DatosExtraUsuario_idEPS").attr('value', '');
							$("#DatosExtraUsuario_tipo_aporte").attr('value', '');
							$("#DatosExtraUsuario_acompaniante").attr('value', '');
							$("#DatosExtraUsuario_parentezco_acompaniante").attr('value', '');
						}	
					},

					error: function(){
						alert("Se ha producido un error! :'(" + datos.responseText);
					}
				});
			},
			
			
			/*Funcion que me permite realizar un 'submit' sobre el formulario principal*/
			enviarForm : function(){
				/*Comprobamos que el id del usuario no este vacio*/
				if($('#txt_id_usuario_em').val() == ""){
					alert("Debe seleccionar el usuario a evaluar!");
				}
				else{
					/*Habilito los controles para procesarlos desde el controlador.*/
					$('#txt_id_usuario_em').removeAttr('disabled');
					$('#txt_id_cita_em').removeAttr('disabled');

					var enfermedades_json = this.addEnfermedades();
					$("#lista_enfermedades_asociadas").attr('value', enfermedades_json);					
					$("#evaluacion-medica-form").submit();	
				}
			},
			
			/*@summary: Funcion que permite trabajar con la parte del formulario dedicada a los antecedentes deportivos.
			 * 			Habilita e inhabilita los controles de acuerdo a si el usuario practica o no deporte.
			 * 
			 * @param: Obj obj -> Objeto select con sus opciones
			 * 
			 * @return: ninguno
			 * 
			 * */
			validateAntecedentesDeportivos: function(obj){
				var practica_si_no = obj.val();//Valor que define si el susario practica o no deporte
				
				/*Practica deporte?*/
				if(practica_si_no == 'no'){
					/*Elemento 'tipo_practica'*/
					$('#AntecedentesDeportivos_tipo_practica').append('<option value="ninguno" selected="true" class="option_extra">Ninguno</option>');
					$('#AntecedentesDeportivos_tipo_practica').attr('disabled', 'true');
					
					/*Elemento 'idDeporte'. Hace referencia al deporte que practica*/
					$('#AntecedentesDeportivos_idDeporte').append('<option value="" selected="true" class="option_extra">Ninguno</option>');
					$('#AntecedentesDeportivos_idDeporte').attr('disabled', 'true');
					
					/*Elemento 'frecuencia_practica*/
					$('#AntecedentesDeportivos_frecuencia_practica').append('<option value="" selected="true" class="option_extra">Ninguno</option>');
					$('#AntecedentesDeportivos_frecuencia_practica').attr('disabled', 'true');
				}
				if(practica_si_no == 'si'){
					/*Elemento 'tipo_practica'*/
					$('.option_extra').remove();
					$('#AntecedentesDeportivos_tipo_practica').removeAttr('disabled');
					
					/*Elemento 'idDeporte'. Hace referencia al deporte que practica*/
					$('.option_extra').remove();
					$('#AntecedentesDeportivos_idDeporte').removeAttr('disabled');
					
					/*Elemento 'frecuencia_practica*/
					$('.option_extra').remove();
					$('#AntecedentesDeportivos_frecuencia_practica').removeAttr('disabled');
				}
			},
			
			
			/*@summary: Funcion que permite trabajar con la parte del formulario dedicada a los antecedentes ginecobstetricos.
			 * 			Habilita e inhabilita los controles de acuerdo a si estos items aplican o no al usuario.
			 * 
			 * @param: Obj obj -> Objeto select con sus opciones
			 * 
			 * @return: ninguno
			 * 
			 * */
			validateAntecedentesGinecobstetricos: function(obj){
				var aplica_si_no = obj.val();
				
				/*Aplican estas caracterisiticas al usuario?*/
				if(aplica_si_no == 'no'){
					/*Elemento 'ciclos'*/
					$('#AntecedentesGinecobstetricos_ciclo').append('<option value="" selected="true" class="option_extra">Ninguno</option>');
					$('#AntecedentesGinecobstetricos_ciclo').attr('disabled', 'true');
					
					/*Elemento 'P.F'*/
					$('#AntecedentesGinecobstetricos_pf').append('<option value="" selected="true" class="option_extra">Ninguno</option>');
					$('#AntecedentesGinecobstetricos_pf').attr('disabled', 'true');
					
					/*Elemento 'otros'*/					
					$('#AntecedentesGinecobstetricos_otros').attr('disabled', 'true');
				}				
				if(aplica_si_no == 'si'){
					/*Elemento 'ciclos'*/
					$(".option_extra").remove();
					$('#AntecedentesGinecobstetricos_ciclo').removeAttr('disabled');
					
					/*Elemento 'P.F'*/
					$(".option_extra").remove();
					$('#AntecedentesGinecobstetricos_pf').removeAttr('disabled');
					
					/*Elemento 'otros'*/					
					$('#AntecedentesGinecobstetricos_otros').removeAttr('disabled');
				}
			},
			
			
			/*@summary: Funcion que permite trabajar con la parte del formulario dedicada al examen fisico.
			 * 			Se encarga de realizar los calculos respectivos.
			 * 
			 * @param: Obj obj -> Objeto input con su valor
			 * 
			 * @return: ninguno
			 * 
			 * */
			validateExamenFisico: function (){
				/*Almacenamos las variables de entrada a los calculos.*/
				var valor_talla = $("#MedidasFisicas_talla").val();
				var valor_peso = $("#MedidasFisicas_peso").val();
						
				/*Calculo relacionado con la talla; 'Peso ideal'*/
				if($.isNumeric(valor_talla)){
					var valor_peso_ideal;//Variable que almacenara el valor del peso ideal de acuerdo al valor de la talla.
					if($("#txt_sexo_em").val() == 'M'){
						valor_peso_ideal = 51.65 + (1.85 * (valor_talla - 60)); 						
					}
					else{
						valor_peso_ideal = 48.67 + (1.65 * (valor_talla - 60));						
					}
					$("#MedidasFisicas_peso_ideal").attr('value', valor_peso_ideal.toFixed(1));//[valor].toFixed(decimales) permite definir el numero de decimales a mostrar
				}
				else{
					$("#MedidasFisicas_peso_ideal").attr('value', '#Talla');
				}
				
				/*Calculo relacionado con el peso; 'Gasto basal energia'*/
				if($.isNumeric(valor_peso)){
					var valor_gasto_basal;//Variable que almacenara el valor del gasto basal de acuerdo al valor del peso.
					if($("#txt_sexo_em").val() == 'M'){
						valor_gasto_basal = valor_peso * 24; 						
					}
					else{
						valor_gasto_basal = valor_peso * 24 * 0.9;					
					}
					$("#MedidasFisicas_gasto_basal_energia").attr('value', valor_gasto_basal.toFixed(1));//[valor].toFixed(decimales) permite definir el numero de decimales a mostrar
				}
				else{
					$("#MedidasFisicas_gasto_basal_energia").attr('value', '#Peso');
				}
			},
	}
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
	
});
