$("#txtNomeZona").keyup(function (e) {
    var nomeZona = $(this).val();
    if (nomeZona === '') {
        $("#resultzona").empty(); // Remove qualquer mensagem existente
        return; // Sai da função se o campo estiver vazio
    }
});

$("#txtNomeZona").blur(function () {
    var nomeZona = $(this).val();
    if (nomeZona !== '') {
        $.post('../js/ajaxValidaZona.php', {'txtNomeZona' : nomeZona}, function(data) {
            if (data === 'invalido') {
            alert('Número de caracteres inválido!');
        } else {
            // Envie o formulário se a validação for bem-sucedida
            $("#seu-formulario").unbind('submit').submit();
        }
            $("#resultzona").html(data);
        });
    }
});