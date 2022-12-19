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
})