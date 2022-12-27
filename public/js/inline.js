var i = 0;
var c = 1;
var options = $('#student_id option');
var students = $.map(options, function (option) {return option.value;});
//console.log(students);

$("#dynamic-ar").click(function () {
    ++i;
    ++c;
    var html = '';
    html += '<tr>';
    html += '<td>' + c + '</td>';
    html += '<td><select class="js-example-basic-single" name="addMoreInputFields[' + i + '][student]" style="width: 100%;">';
    for(var z=0 ; z<students.length ; z++){
        html += '<option value="' + students[z] +'">' + students[z] +'</option>';
       }
    html += '</select></td>';
    html += '<td><input type="number" name="addMoreInputFields[' + i + '][receipt]" placeholder="Ejemplo 138813" class="form-control" /></td>';
    html += '<td><select class="js-example-basic-single"  name="addMoreInputFields[' + i + '][payment]" style="width: 100%;"><option value="">Seleccionar Tipo</option><option value="C-FCET">C-FCET</option><option value="Dep. Banco">Dep. Banco</option><option value="Tranf. Banco">Tranf. Banco</option></select></td>';
    html += '<td><input type="number" name="addMoreInputFields[' + i + '][amount]" placeholder="Ejemplo 150" class="form-control" /></td>';
    html += '<td><button type="button" class="btn btn-outline-danger remove-input-field">Eliminar</button></td>';
    html += '</tr>';
    
    $("#dynamicAddRemove").append(html);
    $('.js-example-basic-single').select2();
    
});

$(document).on('click', '.remove-input-field', function () {
    $(this).parents('tr').remove();
});




