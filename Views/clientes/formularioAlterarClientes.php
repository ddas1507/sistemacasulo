<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" language="javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#cliente_cep").blur(function(e){
		if($.trim($("#cliente_cep").val()) != ""){
			$.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cliente_cep").val(), function(){
				if(resultadoCEP["resultado"]){
					$("#cliente_rua").val(unescape(resultadoCEP["tipo_logradouro"])+": "+unescape(resultadoCEP["logradouro"]));
					$("#cliente_bairro").val(unescape(resultadoCEP["bairro"]));
					$("#cliente_cidade").val(unescape(resultadoCEP["cidade"]));
					$("#cliente_estado").val(unescape(resultadoCEP["uf"]));
				}else{
					alerta("N�o foi possivel encontrar o endere�o");
				}
			});				
		}		
	})
});
</script>
<script>
function mascara(src, mask){
	var i = src.value.length;
	var saida = mask.substring(0,1);
	var texto = mask.substring(i)
	
	if (texto.substring(0,1) != saida){
		src.value += texto.substring(0,1);
	}
} 

function proximoCampo(atual,proximo){
	if(atual.value.length >= atual.maxLength){
		document.getElementById(proximo).focus();
	}
}
</script>
<link rel="stylesheet" href="head/css/smk-accordion.css" />

<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<style type="text/css">
	.container_demo{
		max-width: 1024px;
		margin: 20px auto 20px;
	}
</style>
<form name="formularioAlterarTecnicos" action="index.php" method="post">
	<table class="tabela-nevegacao">
		<tr>
			<td align="left">
				<div class="breadcrumb">
				  <span class="left"></span>
				  <ul>
					<li><a href="#" class="active">Voc&ecirc; est&aacute; em: </a></li>
					<li><a href="index.php?content=listarClientes&show=listarClientes">Clientes</a></li>
					<li><a href="#" class="active">Alterar Registro</a></li>
				  </ul>
				  <span class="right"></span>
				</div>
			</td>
		</tr>
	</table>
	<table width="100%">
		<tr>
			<td valign="top">
				<div class="container_demo">
					<!-- Accordion begin -->
					<div class="accordion_example4">
						<!-- Section  -->
						<div class="accordion_in">
							<div class="acc_head">Dados da Empresa</div>
							<div class="acc_content">
								<table width="100%">
									<tr class="tr_out" onmouseover="this.className='tr_over'" onmouseout="this.className='tr_out'"><td class="tamanho-da-tdleft-form">Raz&atilde;o Social:</td><td ><input type="text" name="cliente_razaosocial" id="cliente_razaosocial" size="30px" maxlength="50"  class="posicao-dos-campos-form" placeholder="Raz&atilde;o Social" value="<?php echo $oquefazer->registros->CLIENTE_RAZAOSOCIAL;?>"/></td></tr>
									<tr class="tr_out" onmouseover="this.className='tr_over'" onmouseout="this.className='tr_out'"><td class="tamanho-da-tdleft-form">Nome Fantasia:</td><td><input type="text" name="cliente_nomefantasia" id="cliente_nomefantasia" size="30px" maxlength="50"  class="posicao-dos-campos-form" placeholder="Nome fantasia" value="<?php echo $oquefazer->registros->CLIENTE_NOMEFANTASIA;?>"/></td></tr>
									<tr class="tr_out" onmouseover="this.className='tr_over'" onmouseout="this.className='tr_out'"><td class="tamanho-da-tdleft-form">CNPJ:</td><td><input type="text" name="cliente_cnpj" id="cliente_cnpj" size="30px" maxlength="18"  class="posicao-dos-campos-form" onkeypress="mascara(this, '##.###.###/####-##')" onkeyup="proximoCampo(this, 'cliente_cep')" placeholder="CNPJ" value="<?php echo $oquefazer->registros->CLIENTE_CNPJ;?>"/></td></tr>
									
									<tr class="tr_out" onmouseover="this.className='tr_over'" onmouseout="this.className='tr_out'"><td class="tamanho-da-tdleft-form">Dominio:</td><td><input type="text" name="cliente_dominio" id="cliente_dominio" size="30px" maxlength="50"  class="posicao-dos-campos-form"  placeholder="Dominio" value="<?php echo $oquefazer->registros->CLIENTE_DOMINIO;?>"/></td></tr>
									<tr class="tr_out" onmouseover="this.className='tr_over'" onmouseout="this.className='tr_out'"><td class="tamanho-da-tdleft-form">Area de atua&ccedil;&atilde;o:</td><td><input type="text" name="cliente_areadeatuacao" id="cliente_areadeatuacao" size="30px" maxlength="50"  class="posicao-dos-campos-form" placeholder="Area de atua&ccedil;&atilde;o" value="<?php echo $oquefazer->registros->CLIENTE_AREADEATUACAO;?>"/></td></tr>
									<tr class="tr_out" onmouseover="this.className='tr_over'" onmouseout="this.className='tr_out'"><td class="tamanho-da-tdleft-form">Informa&ccedil;&otilde;es Adicionais:</td><td><textarea type="text" name="cliente_informacoesadicionais" id="cliente_informacoesadicionais" cols="60" rows="5"  class="posicao-dos-campos-form" placeholder="Informa&ccedil;&otilde;es Adicionais"><?php echo $oquefazer->registros->CLIENTE_INFORMACOESADICIONAIS;?></textarea></td></tr>
								</table>
							</div>
						</div>
						<div class="accordion_in">
							<div class="acc_head">Dados Pessoais</div>
							<div class="acc_content">
								<table width="100%">
									<tr class="tr_out" onmouseover="this.className='tr_over'" onmouseout="this.className='tr_out'"><td class="tamanho-da-tdleft-form">Representante Legal:</td><td><input type="text" name="cliente_representantelegal" id="cliente_representantelegal" size="30px" maxlength="50"  class="posicao-dos-campos-form" placeholder="Representante Legal" value="<?php echo $oquefazer->registros->CLIENTE_REPRESENTANTELEGAL;?>"/></td></tr>
									<tr class="tr_out" onmouseover="this.className='tr_over'" onmouseout="this.className='tr_out'"><td class="tamanho-da-tdleft-form">Estado Civil:</td><td><input type="text" name="cliente_estadocivil" id="cliente_estadocivil" size="30px" maxlength="50" class="posicao-dos-campos-form" placeholder="Estado Civil" value="<?php echo $oquefazer->registros->CLIENTE_ESTADOCIVIL;?>"/></td></tr>
									<tr class="tr_out" onmouseover="this.className='tr_over'" onmouseout="this.className='tr_out'"><td class="tamanho-da-tdleft-form">Nacionalidade:</td><td><input type="text" name="cliente_nacionalidade" id="cliente_nacionalidade" size="30px" maxlength="50"  class="posicao-dos-campos-form" placeholder="Nacionalidade" value="<?php echo $oquefazer->registros->CLIENTE_NACIONALIDADE;?>"/></td></tr>
									<tr class="tr_out" onmouseover="this.className='tr_over'" onmouseout="this.className='tr_out'"><td class="tamanho-da-tdleft-form">Naturalidade:</td><td><input type="text" name="cliente_naturalidade" id="cliente_naturalidade" size="30px" maxlength="50"  class="posicao-dos-campos-form" placeholder="Naturalidade" value="<?php echo $oquefazer->registros->CLIENTE_NATURALIDADE;?>"/></td></tr>
									<tr class="tr_out" onmouseover="this.className='tr_over'" onmouseout="this.className='tr_out'"><td class="tamanho-da-tdleft-form">Profiss&atilde;o/Cargo:</td><td><input type="text" name="cliente_profissaocargo" id="cliente_profissaocargo" size="30px" maxlength="50"  class="posicao-dos-campos-form" placeholder="Profiss&atilde;o/Cargo" value="<?php echo $oquefazer->registros->CLIENTE_PROFISSAOCARGO;?>"/></td></tr>
									<tr class="tr_out" onmouseover="this.className='tr_over'" onmouseout="this.className='tr_out'"><td class="tamanho-da-tdleft-form">Data de Nascimento:</td><td><input type="date" name="cliente_datadenacimento" id="cliente_datadenacimento" size="30px" maxlength="30"  class="posicao-dos-campos-form" placeholder="Data de Nascimento" value="<?php echo $oquefazer->registros->CLIENTE_DATADENACIMENTO;?>"/></td></tr>
									<tr class="tr_out" onmouseover="this.className='tr_over'" onmouseout="this.className='tr_out'"><td class="tamanho-da-tdleft-form">Documento de identifica&ccedil;&atilde;o:</td><td><input type="text" name="cliente_documentoidentificacao" id="cliente_documentoidentificacao" size="30px" maxlength="30"  class="posicao-dos-campos-form" placeholder="Documento de identifica&ccedil;&atilde;o" value="<?php echo $oquefazer->registros->CLIENTE_DOCUMENTOIDENTIFICACAO;?>"/></td></tr>
									<tr class="tr_out" onmouseover="this.className='tr_over'" onmouseout="this.className='tr_out'"><td class="tamanho-da-tdleft-form">CPF:</td><td><input type="text" name="cliente_cpf" id="cliente_cpf" size="30px" maxlength="14"  class="posicao-dos-campos-form" onkeypress="mascara(this, '###.###.###-##')" onkeyup="proximoCampo(this, 'cliente_informacoesadicionais')" placeholder="CPF" value="<?php echo $oquefazer->registros->CLIENTE_CPF;?>"/></td></tr><tr class="tr_out" onmouseover="this.className='tr_over'" onmouseout="this.className='tr_out'"><td class="tamanho-da-tdleft-form">Telefone:</td><td><input type="text" name="cliente_telefone" id="cliente_telefone" size="30px" maxlength="12"  class="posicao-dos-campos-form" onkeypress="mascara(this, '##&nbsp;####-####')" onkeyup="proximoCampo(this, 'cliente_telefone2')" placeholder="Telefone" /></td></tr>
									<tr class="tr_out" onmouseover="this.className='tr_over'" onmouseout="this.className='tr_out'"><td class="tamanho-da-tdleft-form">Telefone:</td><td><input type="text" name="cliente_telefone" id="cliente_telefone" size="30px" maxlength="12"  class="posicao-dos-campos-form" onkeypress="mascara(this, '##&nbsp;####-####')" onkeyup="proximoCampo(this, 'cliente_telefone2')" placeholder="Telefone" value="<?php echo $oquefazer->registros->CLIENTE_TELEFONE;?>"/></td></tr>
									<tr class="tr_out" onmouseover="this.className='tr_over'" onmouseout="this.className='tr_out'"><td class="tamanho-da-tdleft-form">Telefone2:</td><td><input type="text" name="cliente_telefone2" id="cliente_telefone2" size="30px" maxlength="12"  class="posicao-dos-campos-form" onkeypress="mascara(this, '##&nbsp;####-####')" onkeyup="proximoCampo(this, 'cliente_telefone3')" placeholder="Telefone2" value="<?php echo $oquefazer->registros->CLIENTE_TELEFONE2;?>"/></td></tr>
									<tr class="tr_out" onmouseover="this.className='tr_over'" onmouseout="this.className='tr_out'"><td class="tamanho-da-tdleft-form">Telefone3:</td><td><input type="text" name="cliente_telefone3" id="cliente_telefone3" size="30px" maxlength="12"  class="posicao-dos-campos-form" onkeypress="mascara(this, '##&nbsp;####-####')" onkeyup="proximoCampo(this, 'cliente_celular')" placeholder="Telefone3" value="<?php echo $oquefazer->registros->CLIENTE_TELEFONE3;?>"/></td></tr>
									<tr class="tr_out" onmouseover="this.className='tr_over'" onmouseout="this.className='tr_out'"><td class="tamanho-da-tdleft-form">Celular:</td><td><input type="text" name="cliente_celular" id="cliente_celular" size="30px" maxlength="14"  class="posicao-dos-campos-form" onkeypress="mascara(this, '##&nbsp;#&nbsp;####-####')" onkeyup="proximoCampo(this, 'cliente_email')" placeholder="Celular" value="<?php echo $oquefazer->registros->CLIENTE_CELULAR;?>"/></td></tr>
									<tr class="tr_out" onmouseover="this.className='tr_over'" onmouseout="this.className='tr_out'"><td class="tamanho-da-tdleft-form">E-mail:</td><td><input type="email" name="cliente_email" id="cliente_email" size="30px" maxlength="50"  class="posicao-dos-campos-form"  placeholder="Email" value="<?php echo $oquefazer->registros->CLIENTE_EMAIL;?>"/></td></tr>
									<tr class="tr_out" onmouseover="this.className='tr_over'" onmouseout="this.className='tr_out'"><td class="tamanho-da-tdleft-form">E-mail2:</td><td><input type="email" name="cliente_email2" id="cliente_email2" size="30px" maxlength="50"  class="posicao-dos-campos-form"  placeholder="Email2" value="<?php echo $oquefazer->registros->CLIENTE_EMAIL2;?>"/></td></tr>
								</table>
							</div>
						</div>
						<div class="accordion_in">
							<div class="acc_head">Endere&ccedil;o</div>
							<div class="acc_content">
								<table width="100%">
									<tr class="tr_out" onmouseover="this.className='tr_over'" onmouseout="this.className='tr_out'"><td class="tamanho-da-tdleft-form">CEP:</td><td><input type="text" name="cliente_cep" id="cliente_cep" size="30px" maxlength="9"  class="posicao-dos-campos-form" placeholder="CEP" onkeypress="mascara(this, '#####-###')" onkeyup="proximoCampo(this, 'cliente_numero')" value="<?php echo $oquefazer->registros->CLIENTE_CEP;?>"/></td></tr>
									<tr class="tr_out" onmouseover="this.className='tr_over'" onmouseout="this.className='tr_out'"><td class="tamanho-da-tdleft-form">Rua:</td><td><input type="text" name="cliente_rua" id="cliente_rua" size="30px" maxlength="50"  class="posicao-dos-campos-form" placeholder="Rua" value="<?php echo $oquefazer->registros->CLIENTE_RUA;?>"/></td></tr>
									<tr class="tr_out" onmouseover="this.className='tr_over'" onmouseout="this.className='tr_out'"><td class="tamanho-da-tdleft-form">N&uacute;mero:</td><td><input type="text" name="cliente_numero" id="cliente_numero" size="30px" maxlength="50"  class="posicao-dos-campos-form" placeholder="N&uacute;mero" value="<?php echo $oquefazer->registros->CLIENTE_NUMERO;?>"/></td></tr>
									<tr class="tr_out" onmouseover="this.className='tr_over'" onmouseout="this.className='tr_out'"><td class="tamanho-da-tdleft-form">Complemento:</td><td><input type="text" name="cliente_complemento" id="cliente_complemento" size="30px" maxlength="50"  class="posicao-dos-campos-form" placeholder="Complemento" value="<?php echo $oquefazer->registros->CLIENTE_COMPLEMENTO;?>"/></td></tr>
									<tr class="tr_out" onmouseover="this.className='tr_over'" onmouseout="this.className='tr_out'"><td class="tamanho-da-tdleft-form">Bairro:</td><td><input type="text" name="cliente_bairro" id="cliente_bairro" size="30px" maxlength="50"  class="posicao-dos-campos-form" placeholder="Bairro" value="<?php echo $oquefazer->registros->CLIENTE_BAIRRO;?>"/></td></tr>
									<tr class="tr_out" onmouseover="this.className='tr_over'" onmouseout="this.className='tr_out'"><td class="tamanho-da-tdleft-form">Cidade:</td><td><input type="text" name="cliente_cidade" id="cliente_cidade" size="30px" maxlength="50"  class="posicao-dos-campos-form" placeholder="Cidade" value="<?php echo $oquefazer->registros->CLIENTE_CIDADE;?>"/></td></tr>
									<tr class="tr_out" onmouseover="this.className='tr_over'" onmouseout="this.className='tr_out'"><td class="tamanho-da-tdleft-form">Estado:</td><td><input type="text" name="cliente_estado" id="cliente_estado" size="30px" maxlength="50"  class="posicao-dos-campos-form" placeholder="Estado" value="<?php echo $oquefazer->registros->CLIENTE_ESTADO;?>"/></td></tr>
								</table>
							</div>
						</div>
						<div class="accordion_in">
							<div class="acc_head">Painel de controle - FTP</div>
							<div class="acc_content">
								<table width="100%">
									<tr class="tr_out" onmouseover="this.className='tr_over'" onmouseout="this.className='tr_out'" ><td class="tamanho-da-tdleft-form">Url:</td><td class="tamanho-da-tdright-form" ><input type="text" name="cliente_ftp_url" id="cliente_ftp_url" size="30px" maxlength="50"  class="posicao-dos-campos-form" placeholder="Url FTP" value="<?php echo $oquefazer->registros->CLIENTE_FTP_URL;?>"/></td></tr>
									<tr class="tr_out" onmouseover="this.className='tr_over'" onmouseout="this.className='tr_out'" ><td class="tamanho-da-tdleft-form">Usu&aacute;rio:</td><td class="tamanho-da-tdright-form" ><input type="text" name="cliente_ftp_usuario" id="cliente_ftp_usuario" size="30px" maxlength="50"  class="posicao-dos-campos-form" placeholder="Usu&aacute;rio FTP" value="<?php echo $oquefazer->registros->CLIENTE_FTP_USUARIO;?>"/></td></tr>
									<tr class="tr_out" onmouseover="this.className='tr_over'" onmouseout="this.className='tr_out'" ><td class="tamanho-da-tdleft-form">Senha:</td><td class="tamanho-da-tdright-form" ><input type="text" name="cliente_ftp_senha" id="cliente_ftp_senha" size="30px" maxlength="50"  class="posicao-dos-campos-form" placeholder="Senha FTP" value="<?php echo $oquefazer->registros->CLIENTE_FTP_SENHA;?>"/></td></tr>
								</table>
							</div>
						</div>
						<div class="accordion_in">
							<div class="acc_head">Painel de controle - Plataforma</div>
							<div class="acc_content">
								<table width="100%">
									<tr class="tr_out" onmouseover="this.className='tr_over'" onmouseout="this.className='tr_out'" ><td class="tamanho-da-tdleft-form">Plataforma:</td><td class="tamanho-da-tdright-form" ><input type="text" name="cliente_cms_nome" id="cliente_cms_nome" size="30px" maxlength="50"  class="posicao-dos-campos-form" placeholder="Plataforma" value="<?php echo $oquefazer->registros->CLIENTE_CMS_NOME;?>"/></td></tr>
									<tr class="tr_out" onmouseover="this.className='tr_over'" onmouseout="this.className='tr_out'" ><td class="tamanho-da-tdleft-form">Url:</td><td class="tamanho-da-tdright-form" ><input type="text" name="cliente_cms_url" id="cliente_cms_url" size="30px" maxlength="50"  class="posicao-dos-campos-form" placeholder="URL CMS" value="<?php echo $oquefazer->registros->CLIENTE_CMS_URL;?>"/></td></tr>
									<tr class="tr_out" onmouseover="this.className='tr_over'" onmouseout="this.className='tr_out'" ><td class="tamanho-da-tdleft-form">Usu&aacute;rio:</td><td class="tamanho-da-tdright-form" ><input type="text" name="cliente_cms_usuario" id="cliente_cms_usuario" size="30px" maxlength="50"  class="posicao-dos-campos-form" placeholder="Usu&aacute;rio CMS" value="<?php echo $oquefazer->registros->CLIENTE_CMS_USUARIO;?>"/></td></tr>
									<tr class="tr_out" onmouseover="this.className='tr_over'" onmouseout="this.className='tr_out'" ><td class="tamanho-da-tdleft-form">Senha:</td><td class="tamanho-da-tdright-form" ><input type="text" name="cliente_cms_senha" id="cliente_cms_senha" size="30px" maxlength="50"  class="posicao-dos-campos-form" placeholder="Senha CMS" value="<?php echo $oquefazer->registros->CLIENTE_CMS_SENHA;?>"/></td></tr>
								</table>
							</div>
						</div>
					</div>
					<!-- Accordion end -->
				</div>

				<script type="text/javascript" src="head/js/smk-accordion.js"></script>
				<script type="text/javascript">
					jQuery(document).ready(function($){
						$(".accordion_example4").smk_Accordion({
							closeAble: true, //boolean
							closeOther: false, //boolean
						});					
					});
				</script>
			</td>
		</tr>
		<tr >
			<td colspan="2" align="right">
					<input class="btn  btn-success false" type="submit" value="Alterar" name="Alterar" id="cliente_alterar"/>
					<input class="btn  btn-danger false" type="reset" value="Restaurar" name="Restaurar"/>
					<input type="hidden" value="gravarAlteracaoClientes" name="content"/>
					<input type="hidden" value="gravarAlteracaoClientes" name="show"/>
					<input type="hidden" value="<?php echo $oquefazer->registros->CLIENTE_ID;?>" name="clienteid"/>
			</td>
		</tr>
	</table>
</form>