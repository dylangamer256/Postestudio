function filtrarTareas() {

    let input =
    document.getElementById("buscador");

    let filtro =
    input.value.toLowerCase();

    let tabla =
    document.querySelector(".tabla-tareas");

    let filas =
    tabla.getElementsByTagName("tr");

    for(let i = 1; i < filas.length; i++){

        let texto =
        filas[i].textContent.toLowerCase();

        if(texto.includes(filtro)){

            filas[i].style.display = "";

        }else{

            filas[i].style.display = "none";

        }

    }

}
