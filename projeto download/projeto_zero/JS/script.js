function executar(acao) {
    let formData = new FormData();
    formData.append("acao", acao);

    fetch("gerarArquivo.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById("resultado").innerHTML = data;
    })
    .catch(error => {
        document.getElementById("resultado").innerHTML = "ERRO: " + error;
    });
}

document.addEventListener("DOMContentLoaded", iniciarValidacao);

// função executar (mantive a sua)
function executar(acao) {
  let formData = new FormData();
  formData.append("acao", acao);

  fetch("gerarArquivo.php", {
    method: "POST",
    body: formData
  })
  .then(response => response.text())
  .then(data => {
    document.getElementById("resultado").innerHTML = data;
  })
  .catch(error => {
    document.getElementById("resultado").innerHTML = "ERRO: " + error;
  });
}

// Função principal (agora executada quando DOM estiver pronto)
function iniciarValidacao() {
    const form = document.getElementById("meuForm");
    const divMensagem = document.getElementById("mensagemErro");

    // garante que o formulário exista antes de adicionar o listener
    if (!form) return;

    form.addEventListener("submit", (e) => validarFormulario(e, divMensagem));
}

// Função que valida o formulário
function validarFormulario(e, divMensagem) {
    divMensagem.innerHTML = "";
    divMensagem.className = "";

    const nome = document.getElementById("nome").value.trim();
    const sobrenome = document.getElementById("sobrenome").value.trim();
    
    const erros = [];

    // Requisito: pelo menos 3 caracteres (ajuste aqui se quiser outro valor)
    if (nome.length < 3) {
     erros.push("O nome deve ter pelo menos 3 caracteres.");
    }

    if (sobrenome.length < 3) {
     erros.push("O sobrenome deve ter pelo menos 3 caracteres.");
    }

    if (erros.length > 0) {
     e.preventDefault();
     exibirErros(erros, divMensagem);
    } else {
     exibirSucesso(divMensagem);
    }
}

// Função que exibe erros
function exibirErros(erros, divMensagem) {
    divMensagem.className = "alert alert-danger";
    divMensagem.innerHTML = `<strong>Corrija os seguintes erros:</strong>
    <ul class="mb-0">
        ${erros.map(erro => `<li>${erro}</li>`).join("")}
    </ul>
    `;
}

// Função que exibe mensagem de sucesso
function exibirSucesso(divMensagem) {
    divMensagem.className = "alert alert-success";
    divMensagem.textContent = "Dados válidos! Enviando...";

    setTimeout(() => {
        divMensagem.innerHTML = "";
        divMensagem.className = "";
    }, 3000);
}