
$("#categoria").change(event => {
    $.get(`../subcategorias/${event.target.value}`, function(res, sta){
        $("#subcategoria").empty();
        res.forEach(element => {
            $("#subcategoria").append(`<option value=${element.id}> ${element.subcategoria} </option>`);
        });
    });
});
$("#categoria").change(event => {
    $.get(`../../subcategorias/${event.target.value}`, function(res, sta){
        $("#subcategoria").empty();
        res.forEach(element => {
            $("#subcategoria").append(`<option value=${element.id}> ${element.subcategoria} </option>`);
        });
    });
});
function calculaMargem(){
    document.getElementById("valorvenda").value = '0';
    var VTOTALLIQUIDO = parseFloat(document.getElementById("valorpago").value);
    var DESCONTO1 = parseFloat(document.getElementById("margem").value);
    var PDESCONTO = parseFloat( (VTOTALLIQUIDO * DESCONTO1)/100 );
    var TOTAL = parseFloat(VTOTALLIQUIDO) + parseFloat(PDESCONTO);
    document.getElementById("valorvenda").value = TOTAL.toFixed(2);
}   
//radio do cadastro pessoa
$('#form-id').change(function() {
    if ($('#rad1').prop('checked')) {
        $('#pf').show();
        $('#pj').hide();
    } else {
        $('#pj').show();
        $('#pf').hide();
    }
});

//script busca cep
 $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });