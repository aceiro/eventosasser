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
		coursesName: [	'',
						'Bacharelado em Administração',
						'Bacharelado em Arquitetura e Urbanismo',
						'Licenciatura em Pedagogia',
						'Bacharelado em Comunicação Social Publicidade e Propaganda',
						'Bacharelado em Engenharia Civil',
						'Bacharelado em Engenharia de Produção',
						'Bacharelado em Sistemas de Informação',
						'Bacharelado em Educação Física',
						'Licenciatura em Educação Física',
						'Bacharelado em Fisioterapia',
						'Bacharelado em Nutrição',
						'Bacharelado em Farmácia',
						'Tecnólogo em Design de Interiores',
						'Tecnólogo em Gestão Financeira',
						'Tecnólogo em Gestão da Produção Industrial'
					  ],

		getCourseQuantity: function(){
			return this.coursesName.length;
		}
	};


	var buildSelectOptionForCourses = function(){
			var selectTag = '<select>{{option_tag}}</select>';
			var optionTag = '<option>{{course_name}}</option>';

			var courses   = asserCourseDetail.coursesName;
			var options   = '';
			for (var i = 0; i < asserCourseDetail.getCourseQuantity(); i++) {
				var courseName   = courses[i];
				var strOptionTag = optionTag.replace(/{{course_name}}/i,courseName);
				options+=strOptionTag;
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
		addTableFilter: function(selectorTableId, selectorContentId ){
			var $table  = $(selectorTableId), 
			    $select = $(selectorContentId);

			/* sorting table */
            $table.tablesorter();
            
            /* hidden or show a row from table */
            $select.change(function () {			    
			    var reg   = new RegExp(this.value, 'i');      
			    var tds   = $('tbody tr');
			    var match = tds.filter(function (i, v) {
			              return reg.test($(v).text());       
			    });

			    tds.not(match).css('display', 'none');   
			    match.css('display', '');           

			  }).focus(function () {
			    this.value = "";
			    $(this).css('color', 'black');
			    $(this).unbind('focus');
			  }).css('color', '#C0C0C0');
		},

		init: function(){}
	};

})(window);


										