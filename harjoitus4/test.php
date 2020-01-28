<?php
<form method="post" action="http://localhost/esim1/print.php">
  <table>
   <tr> 
    <td>Nimi:<input type="text" name="nimi"></td>
    <td>Osoite:<input type="text" name="osoite"></td>
   </tr>
   <tr> 
    <td valign="top"> 
     <p>Olen:<br>
     <input type="radio" name="sukupuoli" value="nainen">
     Nainen<br>
     <input type="radio" name="sukupuoli" value="mies">
     Mies<br>
     <input type="radio" name="sukupuoli" value="en tiedä">
     En tiedä</p>
    </td>
   <td valign="top">Olen:<br>
    <select name="uskonto" size="4">
     <option value="muslimi">muslimi </option>
     <option value="kristitty">kristitty </option>
     <option value="buddhalainen">buddhalainen </option>
     <option value="hindu">hindu </option>
     <option value="taolainen">taolainen </option>
     <option value="konfutselainen">konfutselainen </option>
     <option value="juutalainen">juutalainen </option>
     <option value="jokin muu">jokin muu </option>
    </select>
   </td>
  </tr>
  <tr> 
   <td>&nbsp;</td>
   <td align="right"> 
    <input type="submit" value="Lähetä" name="submit">
   </td>
  </tr>
  </table>
  </form>
?>