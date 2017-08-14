var App = (function () {
  'use strict';
  
  App.masks = function( ){

    $("[data-mask='data']").mask("99/99/9999");
	$("[data-mask='cpf']").mask("999.999.999-99");
	$("[data-mask='rg']").mask("99.999.999-*");
	$("[data-mask='cep']").mask("99999-999");
	$("[data-mask='cel']").mask("(99) 99999-9999");
	$("[data-mask='tel']").mask("(99) 9999-9999");
	
    
  };

  return App;
})(App || {});
