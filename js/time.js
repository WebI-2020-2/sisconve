var clock = document.getElementById("clock");

function refreshTime() {

    var time = new Date();
    var hour, minu, seco, day, mont, year;

    hour = time.getHours() < 10 ? "0"+time.getHours() : time.getHours();
    minu = time.getMinutes() < 10 ? "0"+time.getMinutes() : time.getMinutes();
    seco = time.getSeconds() < 10 ? "0"+time.getSeconds() : time.getSeconds();
    day  = time.getDate() < 10 ? "0"+time.getDate() : time.getDate();
    mont = time.getMonth()+1 < 10 ? "0"+(time.getMonth()+1) : time.getMonth()+1;
    year = time.getFullYear();

    clock.innerHTML = `${hour}:${minu}:${seco} - ${day}/${mont}/${year}`;

}

refreshTime();
setInterval(() => refreshTime(), 1000);
