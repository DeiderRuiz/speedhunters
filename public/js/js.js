//Función para mostrar tarjeta del auto cuando se selecciona en el select
function seleccionarAuto() {
    let selectAuto = document.getElementById("seleccionar");
    let cards="";
    cards=selectAuto.value;
    for (let contenedor = 1; contenedor <= selectAuto.childElementCount-1; contenedor++) {
        let Contenedor = document.getElementById(contenedor);
        console.log(Contenedor.id);
        if (cards == selectAuto.value) {
            if (Contenedor.id == selectAuto.value) {
                document.getElementById(cards).classList.remove ("hidden");
            }
            else{
                document.getElementById(Contenedor.id).classList.add ("hidden");
            };
        };
    };
};