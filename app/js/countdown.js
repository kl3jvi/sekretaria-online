var count = 60;

var counter = setInterval(timer, 1000); //1000 will  run it every 1 second

function timer() {
    count = count - 1;
    if (count <= 0) {
        clearInterval(counter);
        //counter ended, do something here
        document.getElementById('resendCode').innerHTML = "Ridergo Kodin";
        document.getElementById('resendCode').setAttribute("href", "#");
        return;
    }

    //Do code for showing the number of seconds here
    document.getElementById('resendCode').innerHTML = count;
}