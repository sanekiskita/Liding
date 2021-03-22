
$(document).ready(function () {
    $(document).keydown(function (e) {
        switch (e.keyCode) 
        {
            case 37:alert("left arrow");break;
            case 38:alert("up arrow");break;
            case 39:alert("right arrow");break;
            case 40:alert("down arrow");break;
        }
    });
});
