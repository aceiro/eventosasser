var ASSER = ASSER || {};

ASSER.submission = {};


var PaperSubmission = (function(window){

/* private fields */
var privates = {};


/* private methods */
var buildInputForID = function(rows){
		var tdId    = '<td> Autor ({autorId}) </td>';
		var newTdId = tdId.replace(/{autorId}/, (rows+1) );
		return newTdId;
};

var buildInputForAuthor = function(rows){
			var tdAuthor = '<td style=\"width: 30em\"> <input type=\"text\" id=\"authorPlus[{autorId}][author]\" name=\"authorPlus[{autorId}][author]\" size=\"40\" maxlength=\"255\" /> </td>';
			var newTdId  = tdAuthor.replace(/{autorId}/g, (rows+1));
		return newTdId;
};

var buildInputForEmail = function(rows){
			var tdEmail = '<td style="width: 30em"> <input type=\"text\" id=\"authorPlus[{autorId}][email]\" name=\"authorPlus[{autorId}][email]\" size=\"40\" maxlength=\"255\" /> </td>';
			newTdEmail  = tdEmail.replace(/{autorId}/g, (rows+1));
		return newTdEmail;
		
};

var validateForm = function(){
	 $("#register-form").validate({
		        rules: {
		            titulo: "required",
		            curso: "required",
					orientador: "required",
		            autor1: "required",
		            email1: "required",
				    resumo: "required",
				    keyword: "required",
		        },
		        
		        messages: {
		            titulo: "Escreva o titulo",
					curso: "Escreva o nome do seu curso",
					orientador: "Escreva o nome do seu orientador",
					autor1: "(*) obrigatório",
					email1: "(*) obrigatório",
					resumo: "Copie e cole seu resumo",
		            keyword: "Copie e cole as palavras-chave"
		        },
		        
		        submitHandler: function(form) {
		            form.submit();
					}
				});
};

/* public methods and fields */
ASSER.submission =  {

		addNewAuthorRowToTable: function(){
			var numberOfRows  = document.getElementById('table-authors').rows.length
			var authorsTable  = document.getElementById('table-authors');

			var row  = authorsTable.insertRow( numberOfRows );
			var cellAuthorId 	= row.insertCell(0);
			var cellAuthorName  = row.insertCell(1);
			var cellAuthorEmail = row.insertCell(2);


			cellAuthorId.innerHTML    = buildInputForID(numberOfRows) ;
			cellAuthorName.innerHTML  = buildInputForAuthor(numberOfRows) ;
			cellAuthorEmail.innerHTML = buildInputForEmail(numberOfRows) ;


			var scrollTable = document.getElementById('table-authors-container');
			scrollTable.scrollTop 	  = scrollTable.scrollHeight;
		},

		init: function(){ validateForm(); }
	};

})(window);

