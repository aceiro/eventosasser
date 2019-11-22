// fix because there is a bug in this code
$(function() {
    $( "input[type=submit]" )
      .button()
        .click(function( event ) {      });
  });

// fix because there is a bug in this code
$(function() {
    $( "input[type=reset]" )
        .button()
        .click(function( event ) {      });
});


var ASSER = ASSER || {};
ASSER.courses = {};

var Courses = (function(window){

	var privates = {};
	var asserCourseDetail = {
		coursesName: [		'TODOS',
							'BACHARELADO EM ARQUITETURA E URBANISMO',
							'BACHARELADO EM ENGENHARIA DE PRODUÇÃO',
							'BACHARELADO EM EDUCAÇÃO FÍSICA',
							'BACHARELADO EM ADMINISTRAÇÃO',
							'LICENCIATURA EM PEDAGOGIA',
							'BACHARELADO EM ENGENHARIA CIVIL',
							'BACHARELADO EM SISTEMAS DE INFORMAÇÃO',
							'LICENCIATURA EM EDUCAÇÃO FÍSICA',
							'BACHARELADO EM FISIOTERAPIA',
							'BACHARELADO EM NUTRIÇÃO',
							'BACHARELADO EM FARMÁCIA',
							'TECNÓLOGO EM DESIGN DE INTERIORES',
							'TECNÓLOGO EM GESTÃO FINANCEIRA',
							'TECNÓLOGO EM GESTÃO DA PRODUÇÃO INDUSTRIAL'
					  ],

		getCourseQuantity: function(){
			return this.coursesName.length;
		}
	};

	var getCookie = function (cname) {
		var name = cname + "=";
		var ca = document.cookie.split(';');
		for(var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') {
				c = c.substring(1);
			}
			if (c.indexOf(name) == 0) {
				return c.substring(name.length, c.length);
			}
		}
		return "";
	}

    var buildSelectYearOptionForCourses = function(){

        var id_year_selected = getCookie('id_year_event_selected');

        var selectTag = '<label> Ano:</label> <select>{{option_tag}}</select>';

        var optionTag = '<option> </option>';
        if(id_year_selected == 1) {
            optionTag = optionTag + '<option id="1" selected >  2016 </option>';
            optionTag = optionTag + '<option id="2" >  2017 </option>';
			optionTag = optionTag + '<option id="3" >  2018 </option>';
			optionTag = optionTag + '<option id="4" >  2019 </option>';
        } else if(id_year_selected == 2) {
            optionTag = optionTag + '<option id="1" >  2016 </option>';
            optionTag = optionTag + '<option id="2" selected >  2017 </option>';
			optionTag = optionTag + '<option id="3" >  2018 </option>';
			optionTag = optionTag + '<option id="4" >  2019 </option>';
        }else if(id_year_selected == 3) {
                optionTag = optionTag + '<option id="1" >  2016 </option>';
                optionTag = optionTag + '<option id="2" >  2017 </option>';
				optionTag = optionTag + '<option id="3" selected>  2018 </option>';
				optionTag = optionTag + '<option id="4" >  2019 </option>';
		}else if(id_year_selected == 4) {
					optionTag = optionTag + '<option id="1" >  2016 </option>';
					optionTag = optionTag + '<option id="2" >  2017 </option>';
					optionTag = optionTag + '<option id="3" >  2018 </option>';
					optionTag = optionTag + '<option id="4" selected>  2019 </option>';
        }else{
            optionTag = optionTag + '<option id="1" >  2016 </option>';
            optionTag = optionTag + '<option id="2" >  2017 </option>';
			optionTag = optionTag + '<option id="3" >  2018 </option>';
			optionTag = optionTag + '<option id="4" >  2019 </option>';
		}



        var select = selectTag.replace(/{{option_tag}}/i,optionTag);
        return select;
    }


	var buildSelectOptionForCourses = function(){
			var selectTag = '<label> Curso:</label> <select>{{option_tag}}</select>';
			var optionTag = '<option id="{{value_id}}" {{isselected}}>{{course_name}}</option>';

			var courses   = asserCourseDetail.coursesName;
			var options   = '';
			var id_course_selected = getCookie('id_course_selected');

			for (var i = 0; i < asserCourseDetail.getCourseQuantity(); i++) {
				var courseName     = courses[i];
				var strOptionTag   = optionTag.replace(/{{course_name}}/i,courseName);
				var strOptionTagId = strOptionTag.replace(/{{value_id}}/i,""+i);

				if(i==id_course_selected){
					var strOptionTagSelected = strOptionTagId.replace(/{{isselected}}/i,"selected");
					options+=strOptionTagSelected;
				}else{
					var strOptionTagSelected = strOptionTagId.replace(/{{isselected}}/i,"");
					options+=strOptionTagSelected;
				}
			}
			var select = selectTag.replace(/{{option_tag}}/i,options);

			return select;
	};


	ASSER.courses = {
		findCourseDetail: function(){
			return asserCourseDetail;
		}, 
		getSelectOptions: function(){
			return buildSelectOptionForCourses();
		},
		addSelectOptionCourse: function(divId){
			var contentSelect = document.getElementById(divId);
			contentSelect.innerHTML = buildSelectOptionForCourses();
		},
        addSelectYearCourse: function(divId){
            var contentSelect = document.getElementById(divId);
            contentSelect.innerHTML = buildSelectYearOptionForCourses();
        },
        addSelectYearFilter: function(selectorContentId ){
            var $select = $(selectorContentId);

            /* hidden or show a row from table */
            $select.change(function () {
                var $id = $(this).children(":selected").attr("id");
                document.cookie = "id_year_event_selected="+$id;
                window.location = "lista_resumos_x_autores.php?e="+$id;


            }).focus(function () {
                this.value = "";
                $(this).css('color', 'black');
                $(this).unbind('focus');
            }).css('color', '#C0C0C0');
        },
		addTableFilter: function(selectorTableId, selectorContentId ){
			var $table  = $(selectorTableId), 
			    $select = $(selectorContentId);

			/* sorting table */
            $table.tablesorter();
            
            /* hidden or show a row from table */
            $select.change(function () {
				var $id = $(this).children(":selected").attr("id");
				document.cookie = "id_course_selected="+$id;
				window.location = "lista_resumos_x_autores.php?id="+$id;

			}).focus(function () {
			    this.value = "";
			    $(this).css('color', 'black');
			    $(this).unbind('focus');
			  }).css('color', '#C0C0C0');
		},

		init: function(){}
	};

})(window);


										