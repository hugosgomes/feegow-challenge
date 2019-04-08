
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.mask.min.js"></script>

<!-- Última versão CSS compilada e minificada -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Última versão JavaScript compilada e minificada -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script type="text/javascript" src="js/index.js"></script>

<div id="alerts"></div>

<div class="jumbotron text-center">
  <h1>Desafio Feegow</h1>  
</div>

<div class="container">
  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <select name="specialities" id="specialities"></select><!--Lista de Especialidades-->
    </div>
    <div class="col-sm-4"></div>
  </div>
</div>
<br><br><br>

<div class="container" id="container-medicos">
<!--Lista de Médicos-->
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Preencha Seus Dados</h4>
      </div>
      <div class="modal-body text-center">
        <form action="" method="post" id="ajax_form">
            <input type="hidden" name="professional_id" id="id-medico">
            <input type="hidden" name="specialty_id" id="id-especialidade">
            <div class="form-group">
                <input class="form-control" name="name" type="text" id="nome" placeholder="Nome Completo" required>
            </div>
            <div class="form-group">
                <select class="form-control" name="source_id" id="sources">
                </select><!--Lista de Especialidades-->
            </div>
            <div class="form-group">
                <input class="form-control class="form_datetime" name="birthdate" type="date" id="datanascimento" placeholder="Data de Nascimento" required>
            </div>
            <div class="form-group">
            <input class="form-control" name="cpf" type="text" id="cpf" placeholder="CPF (Somente Números)">
            </div>
            <button type="submit" class="btn btn-success">SOLICITAR HORÁRIOS</button>
        </form>
      </div>
    </div>

  </div>
</div>