<?php
require_once('../core/DonationManager.php');
require_once('../core/Database.php');
require_once('../core/Ong.php');
require_once('../core/OngManager.php');
?>
          <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Perfil</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row --> 

            <div class="row">
            <div class="col-lg">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i><?php echo 'Dados'; ?>                            
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                    <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>CNPJ</th>
                                        <th>Email</th>
                                        <th>CPF Doador</th>
                                        <th>Senha CPF</th>
                                        <th>Adress</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                
                                $ong = OngManager::getInstance()->getOngFromId(3);
                                $nome = $ong->getName();
                                $email = $ong->getEmail();
                                $CNPJ = $ong->getCnpj();
                                $CPF = $ong->getCpf();
                                $pass = $ong->getRemotePassword();
                                $adress = $ong->getAddress();

                                echo '<tr class="gradeA">';
                                echo '<td>'.$nome."</td>";
                                echo '<td>'.$CNPJ.'</td>';
                                echo '<td>'.$email.'</td>';
                                echo '<td>'.$CPF."</td>";
                                echo '<td>'.$pass."</td>";
                                echo '<td>'.$adress."</td>";
                                echo '</tr>';
                                ?>                                                                             
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->                 
                    </div>                      
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.row -->  	
        </div>	