$(document).ready(function() {
    $.get('api/index.php', function (data) {
        if(data.success){            
            option = '<option>Selecione a Especialidade</option>';
            $.each(data.content, function(i, obj){
                option += '<option value="'+obj.especialidade_id+'">'+obj.nome+'</option>';
            });
            $('#specialities').append(option);
        }
    }, 'json');
    source = true;
    $.get('api/index.php', {source}, function (data) {
        if(data.success){            
            option = '<option>Como Conheceu</option>';
            $.each(data.content, function(i, obj){
                option += '<option value="'+obj.origem_id+'">'+obj.nome_origem+'</option>';
            });
            $('#sources').append(option);
        }
    }, 'json');
    $('#cpf').mask('000.000.000-00', {reverse: true});
});

$(document).on('change',"#specialities",function(){
    specialistId = $('#specialities').val();
    $.get('api/index.php', {specialistId}, function (data) {        
        $('#container-medicos *').remove();    
        if(data.success){          
            var prefixo = "";
            $.each(data.content, function(i, obj){
                prefixo = (obj.sexo != "Masculino") ? "Dra. " : "Dr. ";
                $('#container-medicos').append('<div class="col-sm-4"><div class="panel panel-primary"><div class="panel-body"><h4>'+
                prefixo+''+obj.nome+'</h4><br>'+'CRM '+obj.documento_conselho+'<br>'+
                '<button type="button" class="btn btn-info agendar" data-toggle="modal" data-target="#myModal" id-medico="'+obj.profissional_id+'">AGENDAR</button></div></div></div>');
            });
        }
    }, 'json');
    $('#id-especialidade').val(specialistId);
});

$(document).on('click',".agendar",function(){
    $('#id-medico').val($(this).attr('id-medico'));
});

$(document).ready(function(){
    $('#ajax_form').submit(function(){
        var dados = $( this ).serialize();
        jQuery.ajax({
            type: "POST",
            url: "action_page.php",
            data: dados,
            success: function( data )
            {
                $('#myModal').modal('hide');
                $('#alerts *').remove();
                $('#alerts').append('<div class="alert alert-success" role="alert">'+
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                '<strong class="text-center">AGENDAMENTO EFETUADO COM SUCESSO!</strong></div>');
                
                $(".alert").fadeTo(3000, 500).slideUp(500, function(){
                    $("alert").slideUp(500);
                });
            }
        });        
        return false;
    });    
});