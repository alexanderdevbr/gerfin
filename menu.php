<?
$sql    = ($_SESSION["ticket"] != "S") ? '' :'| <a href="index.php?menu_sql=S">SQL</a>';
$logout = ($_SESSION["ticket"] != "S") ? '' :'| <a href="index.php?menu_logout=S">Logout</a>';
?>

      <table width="100%" border="0" cellspacing="0" cellpadding="0" background="images/links.gif" class="menu_superior">
        <tr> 
          <td width="37%" height="28">&nbsp;</td>
          <td width="63%" height="28"> 
            <div align="right">
				  <a href="index.php?menu_cadastros=S">Cadastros</a>
				| <a href="index.php?menu_cartoes=S">Resumo Cart&otilde;es</a>
				| <a href="index.php?menu_pagaberto=S">Pag. Aberto</a>
				<?=$sql.$logout ?>
				&nbsp;
			</div>
          </td>
        </tr>
      </table>