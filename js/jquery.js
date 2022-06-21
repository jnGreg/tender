 $(document).ready(function() {
    $('#voivodeship').change(function() {
        loadCity($(this).find(':selected').val())
    })
    $('#category').change(function() {
        loadSubcategory($(this).find(':selected').val())
    })
});
 function loadCity(voivodeshipId) {
    $("#city").children().remove()
    $.ajax({
        type: "POST",
        url: "ajax.php",
        data: "get=city&voivodeshipId=" + voivodeshipId
    }).done(function(result) {
        $("#city").append($(result));
    });
}
 function loadSubcategory(categoryId) {
    $("#subcategory").children().remove()
    $.ajax({
        type: "POST",
        url: "ajax.php",
        data: "get=subcategory&categoryId=" + categoryId
    }).done(function(result) {
        $("#subcategory").append($(result));
    });
}