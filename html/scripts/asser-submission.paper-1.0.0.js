var ASSER = ASSER || {};

ASSER.submission = {};


var PaperSubmission = (function(window){

/* private fields */
var privates = {};


/* private methods */
var buildInputForID = function(rows){
		var tdId    = '<td> Autor ({autorId}) </td>';
		return tdId.replace(/{autorId}/, (rows+1) );
};

var buildInputForAuthor = function(rows){
			var tdAuthor = '<td style=\"width: 30em\"> <input type=\"text\" id=\"autor{autorId}\" name=\"autor[]\" size=\"40\" maxlength=\"255\" readonly=\"readonly\" style=\"cursor: not-allowed\"/> </td>';
			return tdAuthor.replace(/{autorId}/g, (rows+1));
};

var buildInputForEmail = function(rows){
			var tdEmail = '<td style="width: 30em"> <input type=\"text\" id=\"email{emailId}\" name=\"email[]\" size=\"40\" maxlength=\"255\" /> </td>';
			return tdEmail.replace(/{emailId}/g, (rows+1));
};

var buildButtonSearch = function(rows) {
	var tdButtonSearch = '<td> <button  class="button button-find" type="button" onclick="searchOnJsonList({autorId});">Buscar</button> </td>';
	return tdButtonSearch.replace(/{autorId}/g, (rows+1));
};

var validateForm = function(){
	 $("#register-form").validate({
		        rules: {
		            titulo: "required",
		            curso: "required",
					orientador: "required",
					tipo:"required",
		            autor1: "required",
		            email1: "required",
				    resumo: "required",
				    keyword: "required",
		        },
		        
		        messages: {
		            titulo: "Escreva o titulo",
					curso: "Escreva o nome do seu curso",
					tipo: "(*) obrigatório",
					orientador: "(*) obrigatório",
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
			var cellAuthorEmail = row.insertCell(1);
			var cellAuthorName  = row.insertCell(2);
			var cellAuthorButton= row.insertCell(3);


			cellAuthorId.innerHTML    = buildInputForID(numberOfRows) ;
			cellAuthorName.innerHTML  = buildInputForAuthor(numberOfRows) ;
			cellAuthorEmail.innerHTML = buildInputForEmail(numberOfRows) ;
			cellAuthorButton.innerHTML= buildButtonSearch(numberOfRows);


			var scrollTable = document.getElementById('table-authors-container');
			scrollTable.scrollTop 	  = scrollTable.scrollHeight;
		},

		init: function(){ validateForm(); }
	};

})(window);

