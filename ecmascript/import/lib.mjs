export const saudacao = () => {

    let data = new Date().toLocaleDateString()
    return `Olá, seja muito bem-vindo. Hoje é ${data}`
}

export function getEnderecoByCEP(cep) {

    return fetch(`https://viacep.com.br/ws/${cep}/json/`)
        .then(response => response.json())
}