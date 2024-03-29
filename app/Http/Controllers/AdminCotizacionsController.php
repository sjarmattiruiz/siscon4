<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminCotizacionsController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "id";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = true;
			$this->table = "cotizacions";
			
			
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Apellido y nombre","name"=>"apeynombre","join"=>"afiliados,apeynombres"];
			$this->col[] = ["label"=>"Clinica","name"=>"clinica","join"=>"clinicas,nombre"];
			$this->col[] = ["label"=>"Medico","name"=>"medico","join"=>"medicos,nombremedico"];
			$this->col[] = ["label"=>"Aposid","name"=>"aposid"];
			$this->col[] = ["label"=>"Necesidad","name"=>"necesidad","join"=>"necesidads,necesidad"];
			$this->col[] = ["label"=>"Fecha Cirugia","name"=>"fecha_cirugia"];
			$this->col[] = ["label"=>"Articulos","name"=>"articulos"];
			$this->col[] = ["label"=>"Cantidad","name"=>"cantidad"];
			$this->col[] = ["label"=>"Precio","name"=>"precio"];
			$this->col[] = ["label"=>"Procedencia","name"=>"procedencia","join"=>"procedencias,procedencia"];
			$this->col[] = ["label"=>"Estado","name"=>"estado","join"=>"estados,estado"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Apellido y nombre','name'=>'apeynombre','type'=>'datamodal','validation'=>'required|min:1|max:255','width'=>'col-sm-10', 'datamodal_table'=>'afiliados','datamodal_columns'=>'apeynombres,documento,nroAfiliado','datamodal_select_to'=>'apeynombres:apeynombre','datamodal_size'=>'large'];
			$this->form[] = ['label'=>'Clinica','name'=>'clinica','type'=>'select2', 'datatable'=>'clinicas,nombre','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Medico','name'=>'medico','type'=>'select2', 'datatable'=>'medicos,nombremedico','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Aposid','name'=>'aposid','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'clinicas,nombre'];
			$this->form[] = ['label'=>'Fecha Cirugia (tentativa)','name'=>'fecha_cirugia','type'=>'date','validation'=>'required|date','width'=>'col-sm-10','datatable'=>'estados,estado'];
			$this->form[] = ['label'=>'Necesidad','name'=>'necesidad','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'necesidads,necesidad'];
			$this->form[] = ['label'=>'Observacion','name'=>'observacion','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'medicos,nombremedico'];
			$this->form[] = ['label'=>'Articulos','name'=>'articulos','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'necesidads,necesidad'];
			$this->form[] = ['label'=>'Precio','name'=>'precio','type'=>'money', 'priceformat_parameters'=>['prefix'=> 'ARS.', 'thousandsSeparator'=>'.', 'centsSeparator'=>','],'validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Cantidad','name'=>'cantidad','type'=>'number','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Procedencia','name'=>'procedencia','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'procedencias,procedencia'];
			$this->form[] = ['label'=>'Estado','name'=>'estado','type'=>'select2','datatables'=>'estados,estado','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'estados,estado','value'=>'2', 'disabled'=>'disabled'];
			$this->form[] = ['label'=>'Document','name'=>'document','type'=>'upload','upload_encrypt'=>false];

			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Apellido y Nombre','name'=>'apeynombre','type'=>'select2','datatable'=>'afiliados,apeynombres','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Aposid','name'=>'aposid','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Articulos','name'=>'articulos','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Clinica','name'=>'clinica','type'=>'select2','datatable'=>'clinicas,nombre','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Estado','name'=>'estado','type'=>'select2','datatable'=>'estados,estado','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Fecha Cirugia','name'=>'fecha_cirugia','type'=>'date','validation'=>'required|date','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Medico','name'=>'medico','type'=>'select2','datatable'=>'medicos,nombremedico','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Necesidad','name'=>'necesidad','type'=>'select2','datatable'=>'necesidads,necesidad','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Observacion','name'=>'observacion','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Precio','name'=>'precio','type'=>'money','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Procedencia','name'=>'procedencia','type'=>'select2','datatable'=>'procedencias,procedencia','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			# OLD END FORM

			/* 
	        | ---------------------------------------------------------------------- 
	        | Sub Module
	        | ----------------------------------------------------------------------     
			| @label          = Label of action 
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class  
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        | 
	        */
	        $this->sub_module = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)     
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        | 
	        */
	        $this->addaction = array();
			$this->addaction[] = ['label'=>'PENDIENTE DE ADJUDICACION','url'=>'#','icon'=>'fa fa-check','color'=>'warning', 'showIf'=>'[estado] == "2"'];
			$this->addaction[] = ['label'=>'SOLICITUD ADJUDICADA','url'=>'#','icon'=>'fa fa-check','color'=>'success', 'showIf'=>'[estado] == "3"'];


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Button Selected
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button 
	        | Then about the action, you should code at actionButtonSelected method 
	        | 
	        */
	        $this->button_selected = array();

	                
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
	        */
	        $this->alert        = array();
	                

	        
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add more button to header button 
	        | ----------------------------------------------------------------------     
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
	        */
	        $this->index_button = array();



	        /* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
	        */
	        $this->table_row_color = array();     	          

	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | You may use this bellow array to add statistic at dashboard 
	        | ---------------------------------------------------------------------- 
	        | @label, @count, @icon, @color 
	        |
	        */
	        $this->index_statistic = array();



	        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        $this->script_js = NULL;


            /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        $this->pre_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code after index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it after index table
	        | $this->post_index_html = "<p>test</p>";
	        |
	        */
	        $this->post_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array 
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
	        $this->load_js = array();
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Add css style at body 
	        | ---------------------------------------------------------------------- 
	        | css code in the variable 
	        | $this->style_css = ".style{....}";
	        |
	        */
	        $this->style_css = NULL;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include css File 
	        | ---------------------------------------------------------------------- 
	        | URL of your css each array 
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
	        $this->load_css = array();
	        
	        
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for button selected
	    | ---------------------------------------------------------------------- 
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here
	            
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
	    public function hook_query_index(&$query) {
	        //Your code here
	            
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
	    	//Your code here
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {        
	        //Your code here
			$postdata['estado'] = 2;
			

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) {        
	        //Your code here
			$postdata['estado'] = 2;
	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_edit(&$postdata,$id) {        
	        //Your code here
			$postdata['estado'] = 2;
	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {
	        //Your code here 
			$postdata['estado'] = 2;
	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    }



	    //By the way, you can still create your own method in here... :) 


	}