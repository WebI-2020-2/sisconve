var clock = document.getElementById("clock");
var dateTime = document.getElementById("date-time");

function refreshTime() {

    var time = new Date();
    var hour, minu, seco, day, mont, year, nmDy;
    var days = ["Segunda-Feira", "Terça-Feira", "Quarta-Feira", "Quinta-Feira", "Sexta-Feira", "Sabado", "Domingo"];
    var months = ["janeiro", "fevereiro", "março", "abril", "maio", "junho", "julho", "agosto", "setembro", "outubro", "novembro", "dezembro"]

    hour = time.getHours() < 10 ? "0"+time.getHours() : time.getHours();
    minu = time.getMinutes() < 10 ? "0"+time.getMinutes() : time.getMinutes();
    seco = time.getSeconds() < 10 ? "0"+time.getSeconds() : time.getSeconds();
    day  = time.getDate() < 10 ? "0"+time.getDate() : time.getDate();
    mont = time.getMonth();
    year = time.getFullYear();
    nmDy = time.getDay();

    dateTime.innerHTML = `${days[nmDy-1]}, ${day} de ${months[mont]} de ${year}`;
    clock.innerHTML = `${hour}:${minu}:${seco}`


}
-
refreshTime();
setInterval(() => refreshTime(), 1000);
