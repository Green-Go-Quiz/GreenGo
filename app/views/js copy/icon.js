function atualizarImagem() {
    var selectElement = document.getElementById("imagem");
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    var imagemSelecionada = selectedOption.getAttribute("data-imagem");
    var previewImagem = document.getElementById("previewImagem");
    previewImagem.setAttribute("src", imagemSelecionada);
  }