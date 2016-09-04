var progress = 0;
function setprogress(){

    $('#progress > div.progress-bar').attr('style', 'width: ' + progress + '%');
    if (progress == 100) {
        progress = 0;
    } else {
        progress++;
    }

}
$( "#btnConvert" ).click(function() {
    progress = 0;
    setprogress();
    $('#progresscont').show();
    setInterval(setprogress,200);
});