<table width="65%" align="center" cellspacing="0" cellpadding="5" border="1">
    <tr>
      <?php require_once SERVER_ROOT."\\app\\view\\top-panel.php"; ?>
    </tr>
    <tr>
        <?php require_once SERVER_ROOT."\\app\\view\\left-panel.php"; ?>
        <td valign="top">
          <fieldset>
            <legend>UPDATE FAMILY TYPE</legend>
            <form method="POST">
          <table cellpadding="0" cellspacing="0">
            <tr>
              <td>Type name</td>
              <td>:</td>
              <?php
                if (isset($type)) {
                    echo "<td><input type='text' name='type' value=".$type['type']."></td>";
                }
              ?>
            </tr>
          </table>
          <input type="submit" value="UPDATE"><br><br>
          <?php
            if (isset($errorMsg)) {
              echo $errorMsg;
            }
          ?>
        </form>
      </fieldset>
    </td>
    </tr>
    <tr>
    	<td></td>
        <td align="center">
            Copyright &copy; 2017
        </td>
    </tr>
</table>