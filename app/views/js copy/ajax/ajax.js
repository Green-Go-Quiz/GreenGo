//Variavél que recebe o objeto XMLHttpRequest
var requisicao;

function ValidarDados(campo, valor, php) {


    //Verfiicação do Browser no caso de Chrome, Firefox, Safari:
    if(window.XMLHttpRequest) {
        requisicao = new XMLHttpRequest();
    }

    //No caso do IE (Microsoft):
    else if(window.ActiveXObject) {
        requisicao = new ActiveXObject("Microsoft.XMLHTTP")
    } 

    //Envio do campo e valor para verificação no arquivo PHP via método GET

    var url = php+"?campo="+campo+"&valor"+valor;

    //Processar a requisição usando Open

    requisicao.open("Get", url, true);

    //Função ao ter o retorno do objeto:
    requisicao.onreadystatechange = function() {

        //Exibre a mensagem "Verificando" enquanto carrega
        if(requisicao.readyState == 1) {
            document.getElementById('campo_' + campo + '').innerHTML = '<font color="gray">Verificando...</font>';
        }

        //Verifica se o Ajax realizou todas as operações corretamente
        if(requisicao.readyState == 4 && requisicao.status == 200) {
            //Resposta retornada pelo PHP
            var resposta = requisicao.responseText;

        //Resposta na Div do campo:
        document.getElementById('campo_'+ campo + '').innerHTML = resposta;
       }
    }

    requisicao.send(null);
    
    }