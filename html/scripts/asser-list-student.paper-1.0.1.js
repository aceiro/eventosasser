var ASSER = ASSER || {};

ASSER.liststudentpaper = {};


var StudentAbstractPaper = (function(window){

    /* private fields */
    var privates = {};

    var colors ={
        COLOR_APPROVED      :  '#5AF28F',   /*green*/

        COLOR_RESEND        :  '#F2DB80',   /*orange*/
        COLOR_RESEND_HOVER  :  '#F5CF38',

        COLOR_EDITED        :  '#90A1D4'    /*purple*/
    }


    /* private methods */
    var privateMethods = function(){

    };





    /* public methods and fields */
    ASSER.liststudentpaper =  {


        changeTitleToUpperCase: function () {
            var $tds = $('table tr td:nth-child(2)');
            $tds.each(function(){
                var $title = $(this);
                $title.text($title.text().toString().toUpperCase() );
            });
        },

        changeColorForRows: function(){
            var  $rowsResend  = $('table tr:contains("Re-enviar")'),
                $rowsApproved = $('table tr:contains("Aprovado")'),
                $rowsEdited   = $('table tr:contains("Corrigido")');


            /* $rowsResend.each(function(){
                var $row = $(this);
                $row.css("cursor","pointer");
                $row.css("background-color", colors.COLOR_RESEND);

                $row.hover(function(){
                    $row.css("background-color", colors.COLOR_RESEND_HOVER);
                    $row.attr("title", "Clique para corrigir o resumo")	;
                }, function(){
                    $row.css("background-color", colors.COLOR_RESEND);
                    $row.attr("title", "")	;
                });

                $row.click(function(){
                    var cellId = this.cells[0];
                    window.location.href='../resumo/editar_resumo.php?id=' + cellId.innerText;
                });

            }); */

            $rowsApproved.each(function(){
                var $row = $(this);
                $row.css("background-color", colors.COLOR_APPROVED );
            });

            $rowsEdited.each(function(){
                var $row = $(this);
                $row.css("background-color", colors.COLOR_EDITED);
            });
        },

        init: function(){
            this.changeColorForRows();
            this.changeTitleToUpperCase();
        }
    };

})(window);
