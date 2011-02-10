function toggleAmmado(){
    $('#ammadoHolder').toggle();
}

$(document).ready ( function() {
    $('#closeAmmado').click(function() {
        toggleAmmado();
        $('#ammadoHolder iframe').attr('src', $('#ammadoHolder iframe').attr('src'));
    });
});

