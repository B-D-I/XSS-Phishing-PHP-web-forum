

// function to display the current time on the home page
function ShowTime() {
    // data class for time created using hours, minutes and seconds, followed by the month and year
    var date = new Date();
    var hour = date.getHours();
    var min = date.getMinutes();
    var sec = date.getSeconds();
    var day = date.getDate();
    var month = date.getMonth() + 1;	// get.month returns an interger between 0 (Jan) and 11 (Dec).
    //first month is represented as 0, so + 1 required
    var year = date.getFullYear();

    hour = updateTime(hour);    // defines where to place '0' in function below
    min = updateTime(min);
    sec = updateTime(sec);
    month = updateTime(month);
    year = updateTime(year);

    // 'clock' id called and 'innerText' used to placing string of the time in the span.
    document.getElementById("clock").innerText = day + '-' + month + '-' + year + ' | ' + hour + " : " + min + " : " + sec;
    var t = setTimeout(function(){ ShowTime() }, 1000);
}
// function to place a '0' before the digit, if under 10 (e.g 09:08)
function updateTime(k) {
    if (k < 10) {             // if the digit is less than 10
        return "0" + k;         // place a '0' before the digit
    }
    else {
        return k;
    }
}
ShowTime(); // call the function