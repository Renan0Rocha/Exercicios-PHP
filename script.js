function cadRealizado() {
    alert("Cadastro realizado com sucesso!")
}
function cpfInvalido() {
    alert("O cpf informado não é válido");
}
function entrada() {
    Nome = prompt("Informe o seu Nome antes de acessar:");
    return nome;
}

function atualizarContador() {
    var contador = parseInt(document.getElementById("contador").innerHTML);
    contador--;
    document.getElementById("contador").innerHTML = contador;
}

function obterNome() {
    var nome = prompt("Por favor, insira seu nome:");
    return nome;
  }