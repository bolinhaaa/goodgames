// função para preencher campo Sof House
//automaticamente
function cadSh() {
   
    // texto que sera inserido
    var valor = "Cadastro SH Teste";
   
    /* método AJAX para envio de informações via POST ou GET:
    url = endereço onde está a página requisitada
    type = método de requisição (POST ou GET)
    data = dados que serão enviados e nome dos campos
    success = função de retorno de informações da página requisitada
    */

    $.ajax({
        url: "script/cadDesenv.php",
        type: "post",
        data: { titulo:valor },
        success: function(response){
            var dest = document.getElementById("ok");
            dest.innerText = "\n" + response;
        }
    });
}

// Função para preencher tabela Console
function cadCon() {
   
    // valores que serão inseridos
    var desc = "Descrição do console";
   
    var fab = "Fabricante";

    var midia = "Tipo Midia"

    $.ajax({
        url: "script/cadConso.php",
        type: "post",
        data: { titulo:desc, fabricante:fab, tipo:midia },
        success: function(response){
            var dest = document.getElementById("ok");
            dest.innerText = "\n" + response;
        }
    });
}