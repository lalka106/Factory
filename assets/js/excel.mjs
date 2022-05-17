import jsPDF from "jspdf";

const btnExcel = document.querySelector("#btnExcel");

btnExcel.addEventListener("click",function () {

    let imgData = myCanvas.toDataURL();
    console.log(imgData);
    let doc = new jsPDF();

    doc.setFontSize(40);
    doc.text("Диаграммы", 35, 25);
    // for (let i =0;i<3;i++) {
    doc.addImage(imgData, "JPEG", 15, 40, 180, 180);
    // }
    doc.save('a4.pdf'); // will save the file in the current working directory

});