$(document).ready(() => {
	
    $("#documentacao").on("click", () => {
        // Requisição Ajax com jQuery
        //$("#pagina").load("documentacao.html")

        // Requisição Ajax com por meio do get
        /*
        $.get("documentacao.html", data => {
            $("#pagina").html(data)
        })
        */
       
        // Requisição Ajax com por meio do post
        $.post("documentacao.html", data => {
            $("#pagina").html(data)
        })
    })

    $("#suporte").on("click", () => {
        // Requisição Ajax com jQuery
        //$("#pagina").load("suporte.html")

        // Requisição Ajax com por meio do get
        /*
        $.get("suporte.html", data => {
            $("#pagina").html(data)
        })
        */
        
        // Requisição Ajax com por meio do post
        $.post("suporte.html", data => {
            $("#pagina").html(data)
        })
    })

    // Ajax
    $("#competencia").on("change", e => {
        // Pegando o valor da tag competencia on.change
        let competencia = $(e.target).val()
        
        // Requisição Ajax no modelo jQuery
        $.ajax({
            // Método, url, dados que serão enviados para o back-end, tipo de dados esperado pelo front-end("json"), tratamento de sucesso, tratamento de erro
            type: "GET",
            url: "app.php",
            data: "competencia="+competencia,
            dataType: "json",
            success: dados => {
                // Sobrescrevendo conteúdo interno das tags com os dados em json, recebidos do back-end pela requisição
                $("#numeroVendas").html(dados.numeroVendas)
                $("#totalVendas").html(dados.totalVendas)

                console.log(dados.numeroVendas, dados.totalVendas)
            },
            error: erro => {
                // capturando erro e exibindo-o no console
                console.log(erro)
            },
        })

        
    })
})