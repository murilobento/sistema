
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