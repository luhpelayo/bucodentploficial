$(document).ready(function(){
    $('.delete-confirm').click(function(event) {
        var form =  $(this).closest("form");
        event.preventDefault();
        swal({
            title: 'Estás Seguro?',
            text: "Esta acción no se puede revertir!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar!',
            cancelButtonText: 'Cancelar!'
        })
        .then((willDelete) => {
          if (willDelete) {
            form.submit();
          }
        });
    });

    $('#student_id2').change(function(){
      var student_id2 = $(this).val();
      //$('#tomo_code').empty();
      $.ajax({
        url:'/portal/actas/auxiliar',
        type:'get',
        data:{student_id2:student_id2},
        dataType: 'json',
        success:function(r){
          //console.log(r);  
          $('#tomo_code2').val(r);
        }, error:function(){
          alert('El estudiante no tiene TFG');
          $('#tomo_code2').val(null);
        }
      });
    });

    $('#work_status').change(function(){
      var work_status = $(this).val();
      $.ajax({
        url:'/portal/tracking/work/auxiliar',
        type:'get',
        data:{work_status:work_status},
        dataType: 'json',
        success:function(r){
          if (r == "Vigente") {
            $('#work_endate').prop('disabled', true);
          }else{
            $('#work_endate').prop('disabled', false);
          }  
        }, error:function(){
          alert('Ups, paso algo');
          $('#work_endate').val(null);
        }
      });
    });

    $('#student_id3').change(function(){
      var student_id3 = $(this).val();
      $.ajax({
        url:'/portal/tracking/academic/auxiliar',
        type:'get',
        data:{student_id3:student_id3},
        dataType: 'json',
        success:function(r){
          //console.log(r);  
          $('#name_student').val(r.student_name + " " + r.student_lastname);
        }, error:function(){
          alert('Ups, Intente de Nuevo');
          $('#name_student').val(null);
        }
      });
    });

    $('#matter_id2').change(function(){
      var matter_id2 = $(this).val();
      $.ajax({
        url:'/portal/industrial-practices/auxiliar',
        type:'get',
        data:{matter_id2:matter_id2},
        dataType: 'json',
        success:function(r){
          console.log(r);  
          $('#matter_teacher2').val(r);
        }, error:function(){
          alert('Ups! Algo salio Mal');
          $('#matter_teacher2').val(null);
        }
      });
    });

    $('#investigation_id2').change(function(){
      var investigation_id2 = $(this).val();
      $.ajax({
        url:'/portal/laboratory/trace/auxiliar',
        type:'get',
        data:{investigation_id2:investigation_id2},
        dataType: 'json',
        success:function(r){
          console.log(r);  
          $('#investigation_subject2').val(r.investigation_subject);
          $('#investigation_name2').val(r.investigation_name);
          $('#investigation_stardate2').val(r.investigation_stardate);
          $('#investigation_endate2').val(r.investigation_endate);
        }, error:function(){
          alert('Ups! Algo salio Mal');
          $('#investigation_subject2').val(null);
          $('#investigation_name2').val(null);
          $('#investigation_stardate2').val(null);
          $('#investigation_endate2').val(null);
        }
      });
    });

    $('#training_id').change(function(){
      var training_id = $(this).val();
      $.ajax({
        url:'/portal/training/template/auxiliar',
        type:'get',
        data:{training_id:training_id},
        dataType: 'json',
        success:function(r){
          console.log(r);  
          $('#training_teacher2').val(r.training_teacher);
          $('#training_quantity2').val(r.training_quantity);
          $('#training_stardate2').val(r.training_stardate);
          $('#training_endate2').val(r.training_endate);
        }, error:function(){
          alert('Ups! Algo salio Mal');
          $('#training_teacher2').val(null);
          $('#training_quantity2').val(null);
          $('#training_stardate2').val(null);
          $('#training_endate2').val(null);
        }
      });
    });

});



